<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Slip</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .container { width: 700px; margin: auto; padding: 10px; border: 1px solid #000;display:flex }
        .header { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .company-details {
    width: 100%; /* Ensure full width */
    display: flex;
    flex-direction: row; /* Arrange in a row */
    align-items: center; /* Align vertically */
    justify-content: flex-start; /* Align content to the left */
    gap: 15px; /* Space between logo and text */
    margin-bottom: 20px;
     /* Debugging border, remove later */
}

.company-logo {
    max-width: 80px; /* Adjust as needed */
    height: auto;
    display: block; /* Ensures no extra spacing */
}

        .details { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .details th, .details td { border: 1px solid #000; padding: 8px; text-align: left; }
        .details th { background: #f2f2f2; }
        .footer { margin-top: 20px; font-size: 12px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <!-- <div class="header">MONTHLY SALARY SLIP</div> -->
        <div class="company-details">
    <img src="{{ public_path('images/logo.jpg') }}" class="company-logo" alt="Company Logo">
    <div class="head">
        <strong class="header">Quality Services & Solutions Pvt. Ltd.</strong><br>
        Flat - 8, Wing A, 3rd Floor, Moiz Apartment, 12th TPS Road, Santacruz (East), Mumbai - 400055.<br>
        Tel no: +91 22 6239 2018
    </div>
</div>
        <p class="header">Monthly Salary Slip</p>

        <table class="details">
            <tr>
                <th>Employee ID</th> <td>{{ $salary->employee_id }}</td>
                <th>Employee Name</th> <td>{{ $salary->employee_name }}</td>
            </tr>
            <tr>
                <th>Designation</th> <td>{{ $salary->designation }}</td>
                <th>Month & Year</th> <td>{{ $monthName }} {{ $salary->year }}</td>
            </tr>
        </table>

        <h3 style="margin-top: 20px;">Earnings & Deductions</h3>
        <table class="details">
            <thead>
                <tr>
                    <th>Earnings</th> <th>Amount </th>
                    <th>Deductions</th> <th>Amount </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic</td> <td> <span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->basic, 2) }}</td>
                    <td>Provident Fund</td> <td> <span style="font-family: DejaVu Sans;">₹</span>{{ number_format($salary->provident_fund, 2) }}</td>
                </tr>
                <tr>
                    <td>HRA</td> <td> <span style="font-family: DejaVu Sans;">₹</span>{{ number_format($salary->hra, 2) }}</td>
                    <td>ESIC</td> <td> <span style="font-family: DejaVu Sans;">₹</span>{{ number_format($salary->esic, 2) }}</td>
                </tr>
                <tr>
                    <td>Travel Allowance</td> <td> <span style="font-family: DejaVu Sans;">₹</span>{{ number_format($salary->travel_allowance, 2) }}</td>
                    <td>Profession Tax</td> <td><span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->profession_tax, 2) }}</td>
                </tr>
                <tr>
                    <td>Medical Allowance</td> <td> <span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->medical_allowance, 2) }}</td>
                    <td>TDS</td> <td> <span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->tds, 2) }}</td>
                </tr>
                <tr>
                    <td>Other Allowance</td> <td><span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->other_allowance, 2) }}</td>
                    <td>Advances</td> <td> <span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->advances, 2) }}</td>
                </tr>
                <tr>
                    <td>Bonus</td> <td><span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->bonus, 2) }}</td>
                    <td>Total Deductions</td> <td> <span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->total_deduction, 2) }}</td>
                </tr>
                <tr>
                    <th>Gross Total</th> <th><span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->gross_total, 2) }}</th>
                    <th>Net Salary</th> <th><span style="font-family: DejaVu Sans;">₹</span> {{ number_format($salary->net_salary, 2) }}</th>
                </tr>
            </tbody>
        </table>


        <div class="footer">
            <p>This is a computer-generated payslip and does not require a signature.</p>
        </div>
    </div>
</body>
</html>
