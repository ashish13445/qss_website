<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularizeRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'regularize_type', 'request_for','clock_in','clock_out','reporting_manager_id','shift','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
