<div class="row">
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('language', __('messages.common.select_language').':', ['class' => 'form-label required']) }}
            {{ Form::select('lang_id', getLanguage(), isset($poll) ? $poll->lang_id :null, ['class' => 'form-select io-select2','required','data-control'=>'select2','placeholder' => __('messages.common.select_language')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('status',__('messages.status').' :', ['class' => 'form-label']) }}
            <div class="form-check form-switch form-check-custom">
                <input class="form-check-input w-35px h-20px is-active" name="status" type="checkbox" value="1"
                        {{(isset($poll) && ($poll->status)) ? 'checked' : ''}}>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('question', __('messages.poll.question').':', ['class' => 'form-label required']) }}
            {{ Form::text('question', isset($poll) ? $poll->question : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.question'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option1', __('messages.poll.option1').':', ['class' => 'form-label required']) }}
            {{ Form::text('option1', isset($poll) ? $poll->option1 : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.option1')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option2', __('messages.poll.option2').':', ['class' => 'form-label required']) }}
            {{ Form::text('option2', isset($poll) ? $poll->option2 : null, ['class' => 'form-control', 'placeholder' => __('messages.poll.option2')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option3', __('messages.poll.option3').':', ['class' => 'form-label']) }}
            {{ Form::text('option3', isset($poll) ? $poll->option3 : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.option3')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option4', __('messages.poll.option4').':', ['class' => 'form-label fs-6']) }}
            {{ Form::text('option4', isset($poll) ? $poll->option4 : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.option4')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option5', __('messages.poll.option5').':', ['class' => 'form-label']) }}
            {{ Form::text('option5', isset($poll) ? $poll->option5 : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.option5')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option6', __('messages.poll.option6').':', ['class' => 'form-label']) }}
            {{ Form::text('option6', isset($poll) ? $poll->option6 : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.option6')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option7', __('messages.poll.option7').':', ['class' => 'form-label']) }}
            {{ Form::text('option7', isset($poll) ? $poll->option7 : null, ['class' => 'form-control', 'placeholder' => __('messages.poll.option7')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option8', __('messages.poll.option8').':', ['class' => 'form-label']) }}
            {{ Form::text('option8', isset($poll) ? $poll->option8 : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.option8')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option9', __('messages.poll.option9').':', ['class' => 'form-label']) }}
            {{ Form::text('option9', isset($poll) ? $poll->option9 : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.option9')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('option10', __('messages.poll.option10').':', ['class' => 'form-label']) }}
            {{ Form::text('option10', isset($poll) ? $poll->option10 : null, ['class' => 'form-control', 'placeholder' =>  __('messages.poll.option10')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
                <span class="is-valid">
                    <input class="form-check-input" type="radio" name="vote_permission" value="1"
                           {{ !empty($poll) && $poll->vote_permission === 1 ? 'checked' : '' }} >
                    <label class="form-label mr-3">{{ __('messages.poll.all_user') }}</label>&nbsp;&nbsp;
                    
                        
                        <input class="form-check-input" type="radio" name="vote_permission" value="2" {{empty($poll) ? 'checked': ''}}
                                {{ !empty($poll) && $poll->vote_permission === 2 ? 'checked' : '' }} >
                         <label class="form-label">{{ __('messages.poll.register_user') }}</label>
                 </span>
        </div>
    </div>
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
        <a href="{{ route('polls.index') }}" type="reset"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>



