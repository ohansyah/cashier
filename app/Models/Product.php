<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'barcode',
        'name',
        'price',
        'stock',
        'is_active',
        'image',
        'category_id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($product) {
            $path = storage_path('app/public/' . $product->image);
            if (file_exists($path)) {
                unlink($path);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
