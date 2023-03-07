<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'amount',
        'type',
        'user_id',
        'status',
        'meta',
    ];

    protected $casts = [
        'transaction_id' => 'integer',
        'amount'         => 'double',
        'type'           => 'integer',
        'user_id'        => 'integer',
        'status'         => 'boolean',
    ];
    const SUCCESS = 1;

    const FAILED = 0;

    const STRIPE = 1;
    const PAYPAL = 2;

    const TYPE = [
        self::STRIPE => 'Stripe',
        self::PAYPAL => 'paypal',
    ];
}
