<h3 class="mt-5">{{__('messages.bulk_post.help_documents')}}</h3>
<samp>{{__('messages.bulk_post.you_can_use_csv_file')}}</samp>
<div>
    <button class="btn btn-success" id="categoryIdsList">{{__('messages.bulk_post.category_ids_list')}}</button>
    <a href="{{route('export-csv')}}" class="text-decoration-none">
        <button class="btn btn-success">{{__('messages.bulk_post.download_csv_template')}}</button>
    </a>
    <button class="btn btn-success" id="documentation">{{__('messages.bulk_post.documentation')}}</button>
</div>
<div>
    {{ Form::open(['route' => 'bulk-post-store','files' => 'true','method'=>'POST']) }}
    <div class="mt-5">
        {{ Form::label('name',__('messages.bulk_post.upload_csv_File').':',   ['class'=>'form-label required fs-6']) }}
        <input type="file" class="form-control" id="bulkPost" accept=".csv"
               name="bulk_post" value="{{!empty($adBanner)?$adBanner[1]->ad_banner:''}}">
    </div>
    <div class="mt-5">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
        <a href="{{ route('bulk-post-index') }}" class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
    {{ Form::close() }}
</div>
