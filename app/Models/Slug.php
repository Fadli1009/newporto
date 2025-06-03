<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    protected $fillable = ['slug_home', 'slug_about', 'slug_about_me'];
}
