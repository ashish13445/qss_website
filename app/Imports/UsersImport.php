<?php 
namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class UsersImport
{
    public function import($file)
    {
        // Read the Excel file
        $data = Excel::load($file, function($reader) {
            // Optional: You can set the heading row
            $reader->noHeading();
        })->get();

        // Loop through the data and insert it into the database
        foreach ($data as $row) {
            User::create([
                'employee_id' => $row['employee_id'],
                'name' => $row['name'],
                'profile_picture' => $row['profile_picture'] ?? null,
                'email' => $row['email'],
                'password' => bcrypt('default_password'), // Default password
                'project_id' => $row['project_id'] ?? 1,
                'area_id' => $row['area_id'] ?? null,
                'reporting_manager_ids' => $row['reporting_manager_ids'] ?? null,
                'designation' => $row['designation'],
                'domain' => $row['domain'],
                'joining_date' => $row['joining_date'],
                'mobile_no' => $row['mobile_no'],
                'address' => $row['address'],
                'dob' => $row['dob'],
                'emergency_no' => $row['emergency_no'],
                'highest_qualification' => $row['highest_qualification'],
                'adhaar_no' => $row['adhaar_no'],
                'pan_no' => $row['pan_no'],
                'bank_name' => $row['bank_name'],
                'account_no' => $row['account_no'],
                'account_holder_name' => $row['account_holder_name'],
                'ifsc' => $row['ifsc'],
                'uan' => $row['uan'],
                'esic' => $row['esic'],
                'salary' => $row['salary'],
                'manday' => $row['manday'],
                'rest_days' => $row['rest_days'],
                'paid_leaves' => $row['paid_leaves'],
                'sick_leaves' => $row['sick_leaves'],
                'casual_leaves' => $row['casual_leaves'],
            ]);
        }
    }
}
