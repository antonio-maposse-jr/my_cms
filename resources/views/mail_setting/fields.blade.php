<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => ['mails.update', $mailsetting->id], 'method' => 'PUT']) }}

            <div class="row">
                <div class="mb-5">
                    {{ Form::label('mail_protocol', __('messages.mails.mail_protocol').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::select('mail_protocol', \App\Models\MailSetting::TYPE, $mailsetting['mail_protocol'], ['class' => 'form-select','required','data-control'=>'select2','placeholder' => __('messages.mails.select_mail_protocol')]) }}
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('mail_library', __('messages.mails.mail_library').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::select('mail_library', \App\Models\MailSetting::LIBRARY_TYPE, $mailsetting['mail_library'], ['class' => 'form-select','required','data-control'=>'select2','placeholder' => __('messages.mails.select_mail_library')]) }}
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('encryption', __('messages.mails.encryption').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::select('encryption', \App\Models\MailSetting::ENCRYPTION_TYPE, $mailsetting['encryption'], ['class' => 'form-select ','required','data-control'=>'select2','placeholder' => __('messages.mails.select_encryption')]) }}
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('mail_host', __('messages.mails.mail_host').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::text('mail_host', $mailsetting['mail_host'], ['class' => 'form-control','required','placeholder' => __('messages.mails.mail_host')]) }}
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('mail_port', __('messages.mails.mail_port').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::number('mail_port',  $mailsetting['mail_port'], ['class' => 'form-control','required','placeholder' =>  __('messages.mails.mail_port')]) }}
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('mail_username', __('messages.mails.mail_user_name').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::text('mail_username', $mailsetting['mail_username'], ['class' => 'form-control','required','placeholder' => __('messages.mails.mail_user_name')]) }}
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('mail_password', __('messages.mails.mail_password').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::text('mail_password', $mailsetting['mail_password'], ['class' => 'form-control','required','placeholder' => __('messages.mails.mail_password')]) }}
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('mail_title', __('messages.mails.mail_title').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::text('mail_title', $mailsetting['mail_title'], ['class' => 'form-control','required','placeholder' => __('messages.mails.mail_title')]) }}
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('reply_to', __('messages.mails.reply_to').':', ['class' => 'form-label required mb-3']) }}
                    {{ Form::text('reply_to', $mailsetting['reply_to'], ['class' => 'form-control','required','placeholder' => __('messages.mails.reply_to')]) }}
                </div>
            </div>
            <div class="d-flex">
                {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2 float-right']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['mails.contact'], 'method' => 'POST']) !!}
            {{ Form::hidden('contact_setting', 1) }}
            <div class="col-lg-12">
                <h6 class="mb-4 fw-bolder">{{  __('messages.mails.contact_messages') }}</h6>
                <div class="mb-5" {{$styleCss}}="margin-top: 30px">
                {{ Form::label('reply_to', __('messages.mails.send_contact-messages_to_email_address').':', ['class' => 'form-label mb-3']) }}
                <div class="col-md-2">
                    <div class="form-group mb-5">
                        <div class="form-check form-switch">
                            <input class="form-check-input is-active" name="contact_messages"
                                   type="checkbox"
                                   value="1" {{ !empty($mailsetting) && $mailsetting->contact_messages === 1 ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    {{ Form::label('contact_mail', __('messages.mails.mail').' :', ['class' => 'form-label mb-3']) }}
                    {{ Form::email('contact_mail',  $mailsetting['contact_mail'], ['class' => 'form-control','placeholder' =>  __('messages.mails.mail')]) }}
                </div>
            </div>
        </div>
        <div class="d-flex">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
    </div>
    {{ Form::close() }}
</div>
</div>
