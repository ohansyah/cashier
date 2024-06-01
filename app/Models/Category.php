<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'is_active',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {
            $path = storage_path('app/public/' . $category->image);
            if (file_exists($path)) {
                unlink($path);
            }
        });
    }
}
