

document.addEventListener('turbo:load', loadCreateEditPageData)
function loadCreateEditPageData() {
    pageCreatTinymce();
    pageEditTinymce()
    listen('keyup',"#pageTitlePage",function() {
        var Text = $.trim($(this).val());
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#pageSlug").val(Text);
        $("#pageSlugHidden").val(Text);
    });
}

function pageCreatTinymce(){
    tinymce.init({
        mode: 'specific_textareas',
        editor_selector: 'page-text-description',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin link pageembed code preview',
        toolbar: 'pageembed code preview',
        menubar: 'view',
        tiny_pageembed_classes: [
          { text: 'Big embed', value: 'my-big-class' },
          { text: 'Small embed', value: 'my-small-class' }
        ],
        a_plugin_option: true,
        a_configuration_option: 400,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        document_base_url: "{{ config('app.url') }}",
        height: 400,
        content_style: tinymce_textarea_coler,
    })
}
function pageEditTinymce(){
    tinymce.init({
        mode: 'specific_textareas',
        editor_selector: 'page-text-description',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin link pageembed code preview',
        toolbar: 'pageembed code preview',
        menubar: 'view',
        tiny_pageembed_classes: [
          { text: 'Big embed', value: 'my-big-class' },
          { text: 'Small embed', value: 'my-small-class' }
        ],
        a_plugin_option: true,
        a_configuration_option: 400,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        document_base_url: "{{ config('app.url') }}",
        height: 400,
        content_style: tinymce_textarea_coler
    })
}
function imageData() {
    $.ajax({
        url: route('editor.image-get'),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#pageFileModal').modal('show')
                $.each(result.data, function (key, value) {
                    let imageData = {
                        imageId: value.id,
                        imgUrl: value.imageUrls,
                        imgName: value.imageUrls.substring(
                            value.imageUrls.lastIndexOf('/') + 1),
                    }
                    let dataTemplate = prepareTemplateRender(
                        '#imageTemplate', imageData)
                    $('.uploaded-img').append(dataTemplate)
                })
            }
        },
    })
}

listen('click', '.page-btn-add-image', function () {
    $('#pageFileModal').modal('show')
    imageData()
})

listen('click', '.select-image', function () {
    let imgUrl = $('input[name="preview_img"]:checked').val()
    $('#pageFileModal').modal('hide')
    let oldContent = tinyMCE.activeEditor.getContent()
    tinymce.activeEditor.setContent(
        oldContent + '<img class="images" src=' + imgUrl +
        ' data-mce-src=' + imgUrl + '>')
})

listen('change', '#pageNewImage', function () {
    if (this.files && this.files[0]) {
        let image = this.files[0]
        let ext = image.name.split('.').pop();
        let extensions = ["png", "jpg", "jpeg", "webp","svg"];
        if (!extensions.includes(ext)){
            displayErrorMessage(Lang.get('messages.common.image_error'))
            return false;
        }
        let formData = new FormData()
        formData.append('image', image)
        $.ajax({
            type: 'POST',
            url: route('editor.image-upload'),
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                displaySuccessMessage(result.message)
                let dataTemplate = prepareTemplateRender('#imageTemplate', {
                    imgUrl: result.data.url,
                    imgName: result.data.url.substring(
                        result.data.url.lastIndexOf('/') + 1),
                    imageId: result.data.mediaId
                })
                $('#pageNewImage').val('')
                $('.uploaded-img').append(dataTemplate)
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message)
            },
        })
    }
})

listen('click', '.image-delete-btn-page', function (event) {
    let deleteImageId = $('input[name="preview_img"]:checked').attr('data-id');
    $.ajax({
        url: route('post-image.destroy', deleteImageId),
        type: 'get',
        success: function (result) {
            let id = result.data.id
            if (result) {
                $('#image-' + id).hide()
                $('.modal-footer').addClass('d-none')
            }
            displaySuccessMessage(result.message)
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('hidden.bs.modal', '#pageFileModal', function () {
    $('#pageNewImage').val('')
    $('.uploaded-img').empty()
    $('.modal-footer').addClass('d-none')
})

listen('click', '.btn-check', function () {
    $('.modal-footer').removeClass('d-none')
})


