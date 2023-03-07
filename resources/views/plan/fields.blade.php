<div class="row">
    <div class="col-lg-6 mb-7">
        {{ Form::label('name', __('messages.common.name').':', ['class' => 'form-label required']) }}
        {{ Form::text('name', isset($plan) ? $plan->name : null, ['class' => 'form-control', 'placeholder' => __('messages.plans.plan_name'), 'required']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {{ Form::label('frequency', __('messages.plans.frequency').':',['class' => 'form-label required']) }}
        {{ Form::select('frequency', \App\Models\Plan::DURATION, isset($plan) ? $plan->frequency : null, ['class' => 'form-control', 'required', 'data-control' => 'select2']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {{ Form::label('currency_id', __('messages.plans.currency').':',['class' => 'form-label required']) }}
        {{ Form::select('currency_id', getCurrencies(), isset($plan) ? $plan->currency_id : null, ['class' => 'form-control select2Selector', 'required','placeholder' => __('messages.plans.select_currency'), 'data-control' => 'select2', 'required']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {!! Form::label('price', __('messages.plans.price').':',['class' => 'form-label required']) !!}
        {!! Form::text('price', isset($plan) ? number_format($plan->price) : null, ['class' => 'form-control price-format-input', 'min'=>'0', 'step' => '0.01', 'placeholder' => __('messages.plans.price'), 'required', isset($plan) && $plan->is_trial ? 'disabled' : '', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
    </div>
    <div class="col-lg-6 mb-7">
        {!! Form::label('no_of_posts', __('messages.plans.no_of_posts').':',['class' => 'form-label required']) !!}
        {!! Form::number('post_count', isset($plan) ? $plan->post_count : null, ['class' => 'form-control', 'min'=>'1', 'placeholder' => __('messages.plans.allowed_post'), 'required']) !!}
    </div>
    <div class="col-lg-6 mb-7">
        {!! Form::label('trial_days', __('messages.plans.trial_days').':',['class' => 'form-label']) !!}
        {!! Form::number('trial_days', isset($plan) ? $plan->trial_days : null, ['class' => 'form-control', 'placeholder' => __('messages.plans.enter_trial')]) !!}
    </div>
    <div>
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3','id' => 'planFormSubmit']) }}
        <a href="{{ route('plans.index') }}" class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>
