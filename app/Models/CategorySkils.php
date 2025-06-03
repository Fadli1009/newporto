<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySkils extends Model
{
    protected $fillable = ['nama_kategori'];
    public function personalSkils()
    {
        return $this->hasMany(PersonalSkils::class, 'id_category');
    }
}
