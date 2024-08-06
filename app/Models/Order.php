<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'invoice_number',
        'total',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            
            /**
             * Generate invoice number
             * INV-YYYYMMDD-HHIISS-USERID
             * INV-20241230-235959-1
             */
            $order->invoice_number = 'INV-' . date('Ymd') . '-' . date('His') . '-' . $order->user_id;
        });
    }
}
