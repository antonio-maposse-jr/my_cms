<div class="row">
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('title', __('messages.menu.title').':', ['class' => 'form-label required']) }}
            {{ Form::text('title', isset($menu) ? $menu->title : null, ['class' => 'form-control', 'placeholder' => __('messages.menu.title'), 'required']) }}
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
</div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('parent_menu_id', __('messages.menu.parent_menu').':', ['class' => 'form-label']) }}
            {{ Form::select('parent_menu_id',$menus,isset($menu) ? $menu->parent_menu_id : null,['class' => 'form-select', 'id' =>'selectParentMenu', 'placeholder' => __('messages.menu.select_parent_menu'),'aria-label'=>"Select Parent Menu",'data-control'=>"select2",]) }}
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('link', __('messages.menu.link').':', ['class' => 'form-label required']) }}
            {{ Form::text('link', isset($menu) ? $menu->link : null, ['class' => 'form-control', 'placeholder' => __('messages.menu.link'), 'required']) }}
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-5">
        {{ Form::label('order', __('messages.menu.menu_order').':', ['class' => 'form-label']) }}
        {{ Form::number('order', isset($menu) ? $menu->order : null, ['class' => 'form-control', 'placeholder' =>  __('messages.menu.menu_order')]) }}
        <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
    <div class="mb-5 col-lg-6">
        {{ Form::label('showInMenu', __('messages.menu.show_in_menu').':', ['class' => 'form-label']) }}
            <div class="col-lg-8">
                <div class="form-check form-switch">
                    <input tabindex="12" type="checkbox" name="show_in_menu" value="1" class="form-check-input"
                           id="allowmarketing" {{ !empty($menu) && $menu->show_in_menu === 1 ? 'checked' : (old('show_in_menu') ?
                        'checked' : '' ) }}>
                    <label class="form-check-label" for="allowmarketing"></label>
                </div>
            </div>
    </div>
    <div>
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
        <a href="{{ route('menus.index') }}"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>


