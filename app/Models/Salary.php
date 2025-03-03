<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'employee_name',
        'designation',
        'month',
        'year',
        'basic',
        'hra',
        'travel_allowance',
        'medical_allowance',
        'other_allowance',
        'bonus',
        'gross_total',
        'provident_fund',
        'esic',
        'profession_tax',
        'tds',
        'advances',
        'total_deduction',
        'net_salary',
    ];

    // Define the relationship if needed
    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'employee_id');
    }
}
