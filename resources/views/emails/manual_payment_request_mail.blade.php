@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ getSettingValue()['logo'] }}" class="logo" width="120px" height="50px"
                 style="object-fit: cover"
                 alt="{{ getAppName() }}">
        @endcomponent
    @endslot
    <h2>Hello, </h2>
    <p>{{__('messages.mails.new_manual_payment_request')}}</p>
    {!! $input['super_admin_msg'] !!}
    <div style="margin-top: 10px; display:inline-block;">
        @if($input['notes'])
            <p>Notes :- {{ $input['notes'] ?? 'N/A' }}</p>
        @endif
{{--        @if($input['attachment'])--}}
{{--            <a href="{{url('download-mail-attachment'.'/' .$input['id'])}}" target="_blank"--}}
{{--               style="padding: 0.563rem 1.563rem;  border: 1px solid transparent; background-color: #6571ff;  color: #fff;">--}}
{{--                Download Attachment--}}
{{--            </a>--}}
{{--        @endif--}}
    </div>
    <p style="margin-top: 15px">{{ __('messages.mails.thanks_regard') }}</p>
    <p>{{ getAppName() }}</p>
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
