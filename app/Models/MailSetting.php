<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\MailSetting
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $mail_protocol
 * @property string $mail_library
 * @property string $encryption
 * @property int $mail_port
 * @property string $mail_host
 * @property string $mail_username
 * @property string $mail_password
 * @property string $mail_title
 * @property string $reply_to
 * @property int $email_verification
 * @property int $contact_messages
 * @property string $contact_mail
 * @property string $send_mail
 *
 * @method static Builder|MailSetting newModelQuery()
 * @method static Builder|MailSetting newQuery()
 * @method static Builder|MailSetting query()
 * @method static Builder|MailSetting whereCreatedAt($value)
 * @method static Builder|MailSetting whereId($value)
 * @method static Builder|MailSetting whereUpdatedAt($value)
 * @method static Builder|MailSetting whereContactMail($value)
 * @method static Builder|MailSetting whereContactMessages($value)
 * @method static Builder|MailSetting whereEmailVerification($value)
 * @method static Builder|MailSetting whereEncryption($value)
 * @method static Builder|MailSetting whereMailHost($value)
 * @method static Builder|MailSetting whereMailLibrary($value)
 * @method static Builder|MailSetting whereMailPassword($value)
 * @method static Builder|MailSetting whereMailPort($value)
 * @method static Builder|MailSetting whereMailProtocol($value)
 * @method static Builder|MailSetting whereMailTitle($value)
 * @method static Builder|MailSetting whereMailUsername($value)
 * @method static Builder|MailSetting whereReplyTo($value)
 * @method static Builder|MailSetting whereSendMail($value)
 *  * @mixin Eloquent
 */
class MailSetting extends Model
{
    use HasFactory;

    protected $table = 'mail_settings';

    protected $fillable = [
        'encryption', 'mail_library', 'mail_protocol', 'mail_title', 'mail_password', 'mail_username', 'mail_port',
        'contact_messages', 'email_verification', 'reply_to', 'send_mail', 'mail_host',
    ];

    protected $casts = [
        'encryption' => 'string',
        'mail_library' => 'string',
        'mail_protocol' => 'integer',
        'mail_title' => 'string',
        'mail_password' => 'string',
        'mail_username' => 'string',
        'mail_port' => 'integer',
        'contact_messages' => 'integer',
        'email_verification' => 'integer',
        'reply_to' => 'string',
        'send_mail' => 'string',
        'mail_host' => 'string',
        'contact_mail' => 'string',
    ];

    protected $appends = ['mailer_type'];

    const SMTP = 1;

    const MAIL_LOG = 2;

    const SENDGRID = 3;

    const TYPE = [
        self::SMTP => 'SMTP',
        self::MAIL_LOG => 'MAIL_LOG',
        self::SENDGRID => 'SENDGRID',
    ];

    const SWIFT_MAILER = 1;

    const PHP_MAILER = 2;

    const LIBRARY_TYPE = [
        self::SWIFT_MAILER => 'SWIFT_MAILER',
        self::PHP_MAILER => 'PHP_MAILER',
    ];

    const TLS = 1;

    const SSL = 2;

    const ENCRYPTION_TYPE = [
        self::TLS => 'TLS',
        self::SSL => 'SSL',
    ];

    const EMAIL_VERIFICATION_ACTIVE = 1;

    const EMAIL_VERIFICATION_DEACTIVE = 0;

    const CONTACT_MESSAGES_ACTIVE = 1;

    const CONTACT_MESSAGES_DEACTIVE = 0;

    public function getMailerTypeAttribute($value): string
    {
        return self::TYPE[$this->mail_protocol];
    }

    public static $rules = [
        'encryption' => 'required',
        'mail_library' => 'required|max:190',
        'mail_protocol' => 'required',
        'mail_host' => 'required|max:100',
        'mail_title' => 'required|max:190',
        'mail_password' => 'required|min:6|max:190',
        'reply_to' => 'required|email:filter|max:100',
        'mail_port' => 'required|integer|min:1',
        'mail_username' => 'required|max:100',
        'contact_mail' => 'nullable|email:filter',
    ];
}
