<?php

namespace App\Models;
use App\Models\User;
use App\Models\Area;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'start_time'
    ];

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    public function areas()
    {
        return $this->belongsToMany(Area::class ,'project_area');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Area::class);
    }

}
