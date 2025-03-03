<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Shuchkin\SimpleXLSX;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function uploadForm()
    {
        return view('salary.upload'); // Create a view for file upload
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
    
        if (!$xlsx = SimpleXLSX::parse($request->file('file'))) {
            return back()->with('error', 'Invalid Excel file.');
        }
    
        $expectedColumns = [
            'employee_id', 'employee_name', 'designation', 'month', 'year', 'basic', 'hra', 
            'travel_allowance', 'medical_allowance', 'other_allowance', 
            'bonus', 'gross_total', 'provident_fund', 'esic', 
            'profession_tax', 'tds', 'advances', 'total_deduction', 'net_salary'
        ];
        $header = $xlsx->rows()[0]; 
    
        if (array_diff($expectedColumns, $header)) {
            return back()->with('error', 'Invalid Excel format.');
        }
    
        $errors = []; // Array to store errors
    
        foreach ($xlsx->rows() as $index => $row) {
            if ($index === 0) continue; // Skip header row
    
            try {
                $data = array_combine($expectedColumns, array_map('trim', $row));
    
                // Validate required fields
                if (!$data['employee_id'] || !$data['employee_name'] || !$data['designation'] || !$data['month'] || !$data['year']) {
                    $errors[] = [
                        'row' => $index + 1,
                        'error' => 'Missing required fields',
                    ];
                    continue;
                }
    
                $user = User::where('employee_id', (string) $data['employee_id'])->first();
                if (!$user) {
                    $errors[] = [
                        'row' => $index + 1,
                        'error' => "Employee ID {$data['employee_id']} not found",
                    ];
                    continue;
                }
    
                // Salary Data
                $salaryData = [
                    'employee_name' => trim($data['employee_name']), 
                    'designation' => trim($data['designation']), 
                    'basic' => (float) $data['basic'],
                    'hra' => (float) $data['hra'],
                    'travel_allowance' => (float) $data['travel_allowance'],
                    'medical_allowance' => (float) $data['medical_allowance'],
                    'other_allowance' => (float) $data['other_allowance'],
                    'bonus' => (float) $data['bonus'],
                    'gross_total' => (float) $data['gross_total'],
                    'provident_fund' => (float) $data['provident_fund'],
                    'esic' => (float) $data['esic'],
                    'profession_tax' => (float) $data['profession_tax'],
                    'tds' => (float) $data['tds'],
                    'advances' => (float) $data['advances'],
                    'total_deduction' => (float) $data['total_deduction'],
                    'net_salary' => (float) $data['net_salary'],
                ];
    
                Salary::updateOrCreate(
                    [
                        'employee_id' => (string) $data['employee_id'],
                        'month' => $data['month'],
                        'year' => $data['year'],
                    ],
                    $salaryData
                );
    
            } catch (\Exception $e) {
                $errors[] = [
                    'row' => $index + 1,
                    'error' => $e->getMessage(),
                ];
                continue;
            }
        }
    
        return back()->with([
            'success' => 'Salaries imported successfully!',
            'errors' => $errors
        ]);
    }
    public function listSalaries()
{
    $user = Auth::user(); // Get authenticated user

    $salaries = $user->salaries()
        ->select(
            'month', 'year', 'employee_id', 'employee_name', 'designation',
            'basic', 'hra', 'travel_allowance', 'medical_allowance',
            'other_allowance', 'bonus', 'gross_total', 'provident_fund',
            'esic', 'profession_tax', 'tds', 'advances', 'total_deduction', 'net_salary'
        )
        ->orderBy('year', 'desc')
        ->orderByRaw("STR_TO_DATE(CONCAT('1 ', month, ' ', year), '%d %M %Y') DESC")
        ->get();

    // Month name to number mapping
    $monthMap = [
        "January" => 1, "February" => 2, "March" => 3, "April" => 4,
        "May" => 5, "June" => 6, "July" => 7, "August" => 8,
        "September" => 9, "October" => 10, "November" => 11, "December" => 12
    ];

    // Properly structure salaries grouped by year and month
    $formattedSalaries = [];

    foreach ($salaries as $salary) {
        $year = $salary->year;
        $month = $monthMap[$salary->month] ?? 0; // Convert month name to number

        if ($month === 0) {
            continue; // Skip invalid months
        }

        // Initialize year if not set
        if (!isset($formattedSalaries[$year])) {
            $formattedSalaries[$year] = [];
        }

        // Initialize month if not set
        if (!isset($formattedSalaries[$year][$month])) {
            $formattedSalaries[$year][$month] = [];
        }

        // Append salary details under the month
        $formattedSalaries[$year][$month][] = [
            'employee_id' => $salary->employee_id,
            'employee_name' => $salary->employee_name,
            'designation' => $salary->designation,
            'basic' => $salary->basic,
            'hra' => $salary->hra,
            'travel_allowance' => $salary->travel_allowance,
            'medical_allowance' => $salary->medical_allowance,
            'other_allowance' => $salary->other_allowance,
            'bonus' => $salary->bonus,
            'gross_total' => $salary->gross_total,
            'provident_fund' => $salary->provident_fund,
            'esic' => $salary->esic,
            'profession_tax' => $salary->profession_tax,
            'tds' => $salary->tds,
            'advances' => $salary->advances,
            'total_deduction' => $salary->total_deduction,
            'net_salary' => $salary->net_salary,
        ];
    }

    return response()->json($formattedSalaries);
}

public function downloadSalarySlip(Request $request)
{
    $request->validate([
        'employee_id' => 'required|string',
        'month' => 'required|numeric|min:1|max:12',
        'year' => 'required|numeric|min:2000',
    ]);
    $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $monthName = $months[$request->month - 1];
    // Fetch salary record
    $salary = Salary::where('employee_id', $request->employee_id)
        ->where('month', $monthName)
        ->where('year', $request->year)
        ->first();

    // 🔹 Return error response if no record is found
    if (!$salary) {
        return response()->json([
            'error' => 'Salary record not found',
            'message' => "No salary record found for Employee ID: {$request->employee_id}, Month: {$monthName}, Year: {$request->year}."
        ], 404);
    }

    // Convert month number to name
   

    // Generate PDF
    $pdf = Pdf::loadView('salary.slip', compact('salary', 'monthName', 'request'));
    return response($pdf->output(), 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="Salary_Slip_'.$request->employee_id.'_'.$monthName.'_'.$request->year.'.pdf"');
}
}
