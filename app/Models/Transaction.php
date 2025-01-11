<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'date',
        'total',
        'produk_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }
protected $casts = [
    'date' => 'datetime', // Pastikan kolom 'date' di-cast menjadi objek Carbon
];

}
