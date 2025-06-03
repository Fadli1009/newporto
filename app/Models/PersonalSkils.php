<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalSkils extends Model
{
    protected $fillable = ['nama_personalSkil', 'id_category', 'foto_skils'];
    public function category()
    {
       return  $this->hasOne(CategorySkils::class, 'id', 'id_category');
    }
}
