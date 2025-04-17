<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'clock_in', 'clock_out','date','shift_no','working_hours','remarks','location'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
