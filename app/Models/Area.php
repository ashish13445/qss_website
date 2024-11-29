<?php

namespace App\Models;
use App\Models\Project;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'project_id'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class ,'project_area');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
