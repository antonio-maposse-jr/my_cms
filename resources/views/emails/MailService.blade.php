@extends('emails.layout')

@php $styleCss = 'style' @endphp
@section('mail-body')
    <div class="es-wrapper-color">
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td class="esd-email-paddings" valign="top">
                    <table class="es-content esd-footer-popover" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                        <tr>
                            <td class="esd-stripe" align="center">
                        <tr>
                            <td class="es-p25t es-p20r es-p20l esd-structure" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <td class="esd-container-frame" width="560" valign="top"
                                            align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td align="center" class="esd-block-image" 
                                                    {{$styleCss}}="font-size: 0px;">
                                                        <a target="_blank">
                                                            <img class="adapt-img"
                                                            src="{{  asset('assets/image/infyom-logo.png')  }}"
                                                            alt>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <table class="es-content-body" width="600" cellspacing="0" cellpadding="0"
                               bgcolor="#ffffff" align="center"
                        {{$styleCss}}="margin-top: 30px;margin-bottom: 30px;max-width: 600px;width: 100%;">
                            <tbody>
                            <tr>
                                <td class="esd-structure es-p20t es-p20r es-p20l" align="left"
                                {{$styleCss}}="padding: 30px !important;">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr class="pb-3">
                                            <td width="560" class="esd-container-frame" align="center"
                                                valign="top">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td {{$styleCss}}="margin-bottom: 10px;">
                                                            <h3 {{$styleCss}}="padding-bottom: 20px;"> {{ __('messages.emails.enquiry_details').' :' }} </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="esd-block-text" {{$styleCss}}="padding-bottom: 20px !important;">
                                                            <p {{$styleCss}}="font-size: 16px; color: #454545;"> {{ __('messages.emails.name').' :' }} </p>
                                                            <span>
                                                                {{ $data->name }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="esd-block-text" {{$styleCss}}="padding-bottom: 20px !important;">
                                                            <p {{$styleCss}}="font-size: 16px; color: #454545;"> {{ __('messages.emails.email').' :' }} </p>
                                                            <span>
                                                                {{ $data->email }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="esd-block-text" {{$styleCss}}="padding-bottom: 20px !important;">
                                                            <p {{$styleCss}}="font-size: 16px; color: #454545;"> {{ __('messages.emails.phone').' :' }} </p>
                                                            <span>
                                                                {{ $data->phone }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="esd-block-text">
                                                            <p {{$styleCss}}="font-size: 16px; color: #454545;"> {{ __('messages.emails.message').' :' }} </p>
                                                            <span>
                                                                {{ $data->message }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
