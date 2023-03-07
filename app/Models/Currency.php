<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Currency
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @mixin \Eloquent
 */
class Currency extends Model
{
    use HasFactory;


    protected $fillable = [
        'currency_name',
        'currency_icon',
        'currency_code',
    ];
    protected $casts = [
        'currency_name' => 'string',
       
    ];
    const JPY_CODE = 'JPY';
}
