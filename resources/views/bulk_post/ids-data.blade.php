<div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="categoriesExampleModalLabel">{{ __('messages.bulk_post.category_ids_list') }}</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <table class="table">
            <tr>
                <th>{{__('messages.bulk_post.languages')}}</th>
                <th>{{__('messages.bulk_post.categories')}}</th>
                <th>{{__('messages.bulk_post.sub_categories')}}</th>
            </tr>
            @foreach ($lang as $languages)
                @foreach ($languages->Categories as $Categories)
                    @foreach ($Categories->subCategories as $subCategories)
                        <tr>
                            <td>{{$languages->name}}: {{__('messages.bulk_post.id')}} = {{$languages->id}} </td>
                            <td>{{$Categories->name}}: {{__('messages.bulk_post.id')}} = {{$Categories->id}}</td>
                            <td>{{$subCategories->name}}: {{__('messages.bulk_post.id')}} = {{$subCategories->id}}</td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </table>
    </div>
</div>

    
    

