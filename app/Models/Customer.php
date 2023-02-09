<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'address'
    ];

    public $timestamps = false;

    public function transaction()
    {
        $this->hasMany(Transaction::class);
    }
}
