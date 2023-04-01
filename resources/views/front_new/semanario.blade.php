@extends('front_new.layouts.app')
@section('title')
    {!! !empty(getSEOTools()->home_title) ? getSEOTools()->home_title : __('Samanario') !!}
@endsection
@section('pageCss')
    <link href="{{asset('front_web/build/scss/home.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')

<div id="adobe-dc-view" style="height: 100px"></div>

@endsection
@section('extra_script')
<script src="https://documentservices.adobe.com/view-sdk/viewer.js" prefer></script>
<script type="text/javascript">
	document.addEventListener("adobe_dc_view_sdk.ready", function(){
		var adobeDCView = new AdobeDC.View({clientId: "66fa41f772ae42369f171060a2db359b", divId: "adobe-dc-view"});
		adobeDCView.previewFile({
			content:{location: {url: '{{ $pdfDoc->url  }}'    }},
			metaData:{fileName: "{{ $pdfDoc->name  }}"}
		}, {});
	});
</script>
@endsection
