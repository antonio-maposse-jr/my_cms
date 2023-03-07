<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactUsRequest;
use App\Mail\MailService;
use App\Models\Contact;
use App\Models\MailSetting;
use Illuminate\Support\Facades\Mail;

class ContactController extends AppBaseController
{
    //front contact
    public function index()
    {
        return view('front_new.contact-us');
    }

    public function store(CreateContactUsRequest $request)
    {
        if ((getSettingValue()['show_captcha'] == '1') && $request['g-recaptcha-response'] == null) {
            return $this->sendError('reCAPTCHA required!');
        }
        $input = $request->all();

        $contact = Contact::create($input);

        $status = MailSetting::where('contact_messages', 1)->first();

        if (! empty($status)) {
            Mail::to($status->contact_mail)->send(new MailService($contact));
        }

        return $this->sendSuccess('success');
    }

    //backend contact
    public function listContact()
    {
        return view('contact.index');
    }

    public function removeContact($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact) {
            $contact->delete();
        }

        return $this->sendSuccess('Contact deleted successfully.');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return $this->sendResponse($contact, 'Language Saved successfully.');
    }
}
