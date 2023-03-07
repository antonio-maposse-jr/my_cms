<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Subscription
 *
 * @property int $id
 * @property int $user_id
 * @property int $plan_id
 * @property string|null $transaction_id
 * @property float $plan_amount
 * @property float $payable_amount
 * @property int $plan_frequency
 * @property string $starts_at
 * @property string $ends_at
 * @property string|null $trial_ends_at
 * @property int $no_of_post
 * @property string|null $notes
 * @property int $status
 * @property int $payment_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Subscription newModelQuery()
 * @method static Builder|Subscription newQuery()
 * @method static Builder|Subscription query()
 * @method static Builder|Subscription whereCreatedAt($value)
 * @method static Builder|Subscription whereEndsAt($value)
 * @method static Builder|Subscription whereId($value)
 * @method static Builder|Subscription whereNoOfPost($value)
 * @method static Builder|Subscription whereNotes($value)
 * @method static Builder|Subscription wherePayableAmount($value)
 * @method static Builder|Subscription wherePaymentType($value)
 * @method static Builder|Subscription wherePlanAmount($value)
 * @method static Builder|Subscription wherePlanFrequency($value)
 * @method static Builder|Subscription wherePlanId($value)
 * @method static Builder|Subscription whereStartsAt($value)
 * @method static Builder|Subscription whereStatus($value)
 * @method static Builder|Subscription whereTransactionId($value)
 * @method static Builder|Subscription whereTrialEndsAt($value)
 * @method static Builder|Subscription whereUpdatedAt($value)
 * @method static Builder|Subscription whereUserId($value)
 * @mixin Eloquent
 */
class Subscription extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'plan_id',
        'transaction_id',
        'plan_amount',
        'payable_amount',
        'plan_frequency',
        'starts_at',
        'ends_at',
        'trial_ends_at',
        'no_of_post',
        'notes',
        'status',
        'payment_type',
    ];
    protected $casts = [
        'user_id'        => 'integer',
        'plan_id'        => 'integer',
        'transaction_id' => 'integer',
        'plan_amount'    => 'double',
        'payable_amount' => 'double',
        'plan_frequency' => 'integer',
        'starts_at'      => 'date',
        'ends_at'        => 'date',
        'trial_ends_at'  => 'date',
        'no_of_post'     => 'integer',
        'notes'          => 'string',
        'status'         => 'boolean',
        'payment_type'   => 'integer',

    ];
    protected $appends = ['attachment'];

    const ACTIVE = 1;

    public const ATTACHMENT_PATH = 'attachment';

    public function getAttachmentAttribute(): string
    {

        /** @var Media $media */
        $media = $this->getMedia(self::ATTACHMENT_PATH)->first();

        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return false;
    }

    const INACTIVE = 0;

    const STATUS_ARR = [
        self::ACTIVE   => 'Active',
        self::INACTIVE => 'Deactive',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function isExpired(): bool
    {
        $now = Carbon::now();

        if ($this->ends_at > $now) {
            return false;
        }

        // this means the subscription is ended.
        if ((!empty($this->trial_ends_at) && $this->trial_ends_at < $now) || $this->ends_at < $now) {
            return true;
        }

        // this means the subscription is not ended.
        return false;
    }

    const STRIPE = 1;

    const PAYPAL = 2;

    const MANUALLY = 3;
    const PAID = 4;
    const REJECTED = 5;
    const PAYMENT_GATEWAY = [
        self::STRIPE   => 'Stripe',
        self::PAYPAL   => 'Paypal',
        self::MANUALLY => 'Manually',
        self::REJECTED => 'Rejected',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
