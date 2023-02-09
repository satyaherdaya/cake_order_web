<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status'
    ];

    public function customer()
    {
        $this->belongsTo(Customer::class);
    }

    public function admin()
    {
        $this->belongsTo(Admin::class);
    }
}
