<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['slug_certificate', 'img', 'judul', 'sub_judul', 'desc', 'status'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug_certificate = Str::slug($model->judul);
        });
        static::updating(function ($model) {
            $model->slug_certificate = Str::slug($model->judul);
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
}
