<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logoUrl = '/assets/image/infyom-logo.png';
        $favicon = '/assets/image/favicon-infyom.png';

        Setting::create(['key' => 'application_name', 'value' => 'InfyNews']);
        Setting::create(['key' => 'contact_no', 'value' => '+91 70963 36561']);
        Setting::create(['key' => 'email', 'value' => 'test@email.com']);
        Setting::create(['key' => 'copy_right_text', 'value' => 'All Rights Reserved ©2022']);
        Setting::create(['key' => 'site_key', 'value' => ' ']);
        Setting::create(['key' => 'secret_key', 'value' => ' ']);
        Setting::create(['key' => 'show_captcha', 'value' => 0]);
        Setting::create(['key' => 'facebook_url', 'value' => 'https://www.facebook.com/infyom/']);
        Setting::create(['key' => 'twitter_url', 'value' => 'https://twitter.com/infyom?lang=en']);
        Setting::create(['key' => 'instagram_url', 'value' => 'https://www.instagram.com/?hl=en']);
        Setting::create(['key' => 'pinterest_url', 'value' => 'https://www.pinterest.com/']);
        Setting::create(['key' => 'linkedin_url', 'value' => 'https://www.linkedin.com/organization-guest/company/infyom-technologies?challengeId=AQFgQaMxwSxCdAAAAXOA_wosiB2vYdQEoITs6w676AzV8cu8OzhnWEBNUQ7LCG4vds5-A12UIQk1M4aWfKmn6iM58OFJbpoRiA&submissionId=0088318b-13b3-2416-9933-b463017e531e']);
        Setting::create(['key' => 'vk_url', 'value' => 'https://vk.com/?lang=en']);
        Setting::create(['key' => 'telegram_url', 'value' => 'https://www.telegram.org/k/']);
        Setting::create(['key' => 'youtube_url', 'value' => 'https://www.youtube.com/']);
        Setting::create(['key' => 'show_cookie', 'value' => 1]);
        Setting::create(['key' => 'cookie_warning', 'value' => 'Your experience on this site will be improved by allowing cookies.']);
        Setting::create(['key' => 'logo', 'value' => $logoUrl]);
        Setting::create(['key' => 'favicon', 'value' => $favicon]);
        Setting::create(['key' => 'contact_address', 'value' => 'C-303, Atlanta Shopping Mall,Nr.Sudama Chowk, Mota Varachha,Surat-394101, Gujarat, India.']);
        Setting::create(['key' => 'about_text', 'value' => "Leading Web & Mobile Development Company with proven expertise, India's Leading Laravel Open-Source contributor with over 3 million+ Downloads."]);
        Setting::create(['key' => 'terms&conditions', 'value' => '']);
        Setting::create(['key' => 'privacy', 'value' => '']);
        Setting::create(['key' => 'support', 'value' => '']);
        Setting::create(['key' => 'comment_approved', 'value' => '1']);
        Setting::create(['key' => 'front_language', 'value' => '1']);
    }
}
