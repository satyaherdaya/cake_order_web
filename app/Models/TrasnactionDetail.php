<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrasnactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'quantity_price'
    ];

    public function transaction()
    {
        $this->belongsTo(Transaction::class);
    }

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
