<?php

namespace Database\Seeders;

use App\Models\MailSetting;
use Illuminate\Database\Seeder;

class DefaultMailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailSetting::create([
            'encryption' => MailSetting::TLS,
            'mail_library' => MailSetting::SWIFT_MAILER,
            'mail_protocol' => MailSetting::SMTP,
            'mail_host' => 'mail@codingest.com',
            'mail_port' => 587,
            'mail_username' => 'info@codingest.com',
            'mail_password' => 'mail@123',
            'mail_title' => 'Varient',
            'reply_to' => 'info2@codingest.com',
            'email_verification' => 1,
            'contact_messages' => 1,
            'contact_mail' => 'info3@codingest.com',
            'send_mail' => 'info4@codingest.com',
        ]);
    }
}
