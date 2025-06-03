<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = ['judul', 'status', 'sub_judul', 'img', 'slug_project', 'desc'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug_project = Str::slug($model->judul);
        });
        static::updating(function ($model) {
            $model->slug_project = Str::slug($model->judul);
        });
    }
    public function status($status)
    {
        switch ($status) {
            case 1:
                return 'Post';
            case 0:
                return "Draft";
            default:
                return "tidak terbaca";
        }
    }
    public function projectImages()
    {
        return $this->hasMany(ProjectImages::class, 'id_project', 'id');
    }
}
