<div class="row">
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('first_name', __('messages.staff.first_name').':', ['class' => 'form-label required']) }}
            {{ Form::text('first_name', isset($staff) ? $staff->first_name : null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required']) }}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-5">
            <div class="mb-5">
                {{ Form::label('last_name', __('messages.staff.last_name').':', ['class' => 'form-label required']) }}
                {{ Form::text('last_name', isset($staff) ? $staff->last_name : null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('email', __('messages.staff.email').':', ['class' => 'form-label required']) }}
            {{ Form::email('email', isset($staff) ? $staff->email : null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('contact', __('messages.staff.contact_no').':', ['class' => 'form-label required']) }}
            {{ Form::text('contact', isset($staff) ? $staff->contact : null, ['class' => 'form-control', 'placeholder' => __('messages.staff.contact_no'), 'required','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
        </div>
    </div>
    @if(!isset($staff))
        <div class="col-md-6 mb-5">
            <div class="mb-1">
                {{ Form::label('password',__('messages.staff.password').':' ,['class' => 'form-label ']) }}
                <span class="text-danger">{{isset($staff) ? null : '*' }}</span>
                <div class="position-relative">
                    <input class="form-control"
                           type="password" placeholder="{{__('messages.staff.password')}}" name="password"
                           autocomplete="off">
                    <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600 change-type">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5">
            <div class="mb-1">
                {{ Form::label('confirmPassword',__('messages.user.confirm_password').':' ,['class' => 'form-label ']) }}
                <span class="text-danger">{{isset($staff) ? null : '*' }}</span>
                <div class="position-relative">
                    <input class="form-control" type="password" placeholder="{{__('messages.user.confirm_password')}}"
                           name="password_confirmation"
                           autocomplete="off">
                    <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600 change-type">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                </div>
            </div>
        </div>
    @endif

    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('role', __('messages.staff.role').':', ['class' => 'form-label required']) }}
            {{ Form::select('role', $roles, !empty($staff->roles[0]) ? $staff->roles->first()->id : null, ['class' => 'form-select io-select2','required','data-control'=>'select2','placeholder' => __('messages.staff.role')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        {{ Form::label('gender', __('messages.staff.gender').':', ['class' => 'form-label required']) }}
        <div class="mb-5">
            <span class="is-valid">
                <input class="form-check-input" checked type="radio" name="gender" value="1"
                       {{ !empty($staff) && $staff->gender === 1 ? 'checked' : '' }} required>
                <label class="form-label mr-3">{{ __('messages.staff.male') }}</label>&nbsp;&nbsp;

                <input class="form-check-input" type="radio" name="gender" value="2"
                       {{ !empty($staff) && $staff->gender === 2 ? 'checked' : '' }} required>
                <label class="form-label">{{ __('messages.staff.female') }}</label>
            </span>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-1 mb-4">
            <label class="form-label">{{__('messages.status')}}:</label>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="form-check form-switch form-check-custom">
                    <input class="form-check-input w-35px h-20px is-active" name="status"
                           type="checkbox" {{ Request::is('admin/staff/create*') ?'checked' : '' }}
                           value="1" {{ !empty($staff) && $staff->status == 1 ? 'checked' : '' }} >
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label">{{__('messages.staff.profile')}}:</label>
            <div class="d-block">
                <div class="image-picker">
                    @php
                        $style= 'style="background-image: url('.(!empty($staff->profile_image) ? $staff->profile_image : asset('images/avatar.png')).')"';
                    @endphp
                    <div class="image previewImage" id="exampleInputImage"
                        {!! $style !!}>
                    </div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="Change Profile">
                        <label> 
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                            <input type="file" name="profile" class="image-upload d-none" accept="image/*"/> 
                            <input type="hidden" name="avatar_remove">
                        </label> 
                    </span>
                </div>
            </div>
            <div class="form-text">{{__('messages.common.allowed_types')}}</div>
        </div>
    </div>
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
        <a href="{{ route('staff.index') }}" type="reset"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>






