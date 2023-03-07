<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Plan
 *
 * @property int $id
 * @property string $name
 * @property int $post_count
 * @property float $price
 * @property int $currency_id
 * @property int $frequency
 * @property int|null $trial_days
 * @property int $is_default
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Plan newModelQuery()
 * @method static Builder|Plan newQuery()
 * @method static Builder|Plan query()
 * @method static Builder|Plan whereCreatedAt($value)
 * @method static Builder|Plan whereCurrencyId($value)
 * @method static Builder|Plan whereFrequency($value)
 * @method static Builder|Plan whereId($value)
 * @method static Builder|Plan whereIsDefault($value)
 * @method static Builder|Plan whereName($value)
 * @method static Builder|Plan wherePostCount($value)
 * @method static Builder|Plan wherePrice($value)
 * @method static Builder|Plan whereTrialDays($value)
 * @method static Builder|Plan whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Plan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'currency_id',
        'price',
        'frequency',
        'is_default',
        'trial_days',
        'post_count',
    ];
    
    protected $casts = [
        'name'         => 'string',
        'currency_id'  => 'integer',
        'price'        => 'double',
        'frequency'    => 'integer',
        'is_default'   => 'integer',
        'trial_days'   => 'integer',
        'post_count' => 'integer',  
    ];

    public static $rules = [
        'name' => 'required|string|min:2|unique:plans,name,',
        'currency_id' => 'required',
        'post_count' => 'required|numeric',
    ];

    const TRIAL_DAYS = 7;
    const MONTHLY = 1;
    const YEARLY = 2;
    const UNLIMITED = 3;

    const DURATION = [
        self::MONTHLY   => 'Month',
        self::YEARLY    => 'Year',
        self::UNLIMITED => 'Unlimited',
    ];
    const STRIPE = 1;
    const PAYPAL = 2;
    const MANUALLY = 3;

    const PAYMENT_METHOD = [
        self::STRIPE   => 'Stripe',
        self::PAYPAL   => 'Paypal',
        self::MANUALLY => 'Manually',
    ];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function hasZeroPlan()
    {
        if (getLogInUser()) {
            return $this->hasMany(Subscription::class)->where('plan_amount', 0)
                ->where('user_id', getLogInUser()->id);
        }

        return $this->hasMany(Subscription::class)->where('plan_amount', 0);
    }
}
