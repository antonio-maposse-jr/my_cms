<?php

namespace App\Repositories;

use App\Models\MailSetting;

/**
 * Class UserRepository
 */
class MailSettingRepository extends BaseRepository
{
    public $fieldSearchable = [

    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return MailSetting::class;
    }

    public function update($input, $id)
    {
        $mailsetting = MailSetting::find($id);
        if (isset($input['email_setting'])) {
            $input['email_verification'] = (isset($input['email_verification'])) ? MailSetting::EMAIL_VERIFICATION_ACTIVE : MailSetting::EMAIL_VERIFICATION_DEACTIVE;
        }

        if (isset($input['contact_setting'])) {
            $input['contact_messages'] = (isset($input['contact_messages'])) ? MailSetting::CONTACT_MESSAGES_ACTIVE : MailSetting::CONTACT_MESSAGES_DEACTIVE;

            $mailsetting['contact_mail'] = $input['contact_mail'];
        }

        $mailsetting->update($input);
    }
}
