<div class="row">
    <div class="col-lg-6 mb-7">
        {{ Form::label('Document name', __('messages.common.name') . ':', ['class' => 'form-label required']) }}
        {{ Form::text('name', isset($premiumDocument) ? $premiumDocument->name : null, ['class' => 'form-control', 'placeholder' => __('name'), 'required']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {{ Form::label('Documente Type', __('Documente Type') . ':', ['class' => 'form-label required']) }}
        {{ Form::select('type', \App\Models\PremiumDocuments::DOCUMENT_TYPE, isset($premiumDocument) ? $premiumDocument->type : null, ['class' => 'form-control', 'required', 'data-control' => 'select2']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {{ Form::label('URL', __('URL') . ':', ['class' => 'form-label required']) }}
        {{ Form::text('url', isset($premiumDocument) ? $premiumDocument->url : null, ['class' => 'form-control', 'required', 'placeholder' => __('URL'), 'required']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {!! Form::label('Iframe', __('Iframe') . ':', ['class' => 'form-label required']) !!}
        {{ Form::text('iframe', isset($premiumDocument) ? $premiumDocument->iframe : null, ['class' => 'form-control', 'placeholder' => __('Iframe'), '']) }}
    </div>

    <div class="col-lg-6 mb-7">
        {{ Form::label('language', __('messages.page.language') . ' :', ['class' => 'form-label required  required']) }}
        {{ Form::select('lang_id', getLanguage(), isset($premiumDocument) ? $premiumDocument->lang_id : null, ['class' => 'form-select form-select-solid languageId', 'id' => 'postLanguageId', 'placeholder' => __('messages.common.select_language'), 'data-control' => 'select2', 'required']) }}
    </div>


    <div>
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3', 'id' => 'documentFormSubmit']) }}
        <a href="{{ route('premium-documents.index') }}" class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
    </div>
</div>
