<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start_date', 'end_date', 'reason', 'status','type'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
