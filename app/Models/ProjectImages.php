<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImages extends Model
{
    protected $fillable = ['id_project', 'project_images'];
    public function project()
    {
        return $this->hasOne(Project::class, 'id_project', 'id');
    }
}
