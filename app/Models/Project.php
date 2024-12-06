<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Project extends Model
{ 
     use HasFactory;
    protected $table = 'projects';
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
