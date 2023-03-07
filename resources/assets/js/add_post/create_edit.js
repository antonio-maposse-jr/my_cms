document.addEventListener('turbo:load', loadAddPostData)

listen('keyup', '#postTitle', function () {
    var Text = $.trim($(this).val())
    Text = Text.toLowerCase()
    Text = Text.replace(/[^a-zA-Z0-9-ğüşöçİĞÜŞÖÇ]+/g, '-')
    $('#postSlug').val(Text)
    $('#postHiddenSlug').val(Text)
})

listen('keyup', '#postSlug', function () {
    var Text = $(this).val()
    Text = Text.toLowerCase()
    console.log(Text)

    Text = Text.replace(/[^a-zA-Z0-9-ğüşöçİĞÜŞÖÇ]+/g, '-')
    $(this).val(Text)
})

let postLangId = ''
let postCategoryId = ''
let postSubCategoryId = ''

function loadAddPostData () {
    createTinymce()
    editTinymce()
    createVideoTinymce()
    editVideoTinymce()
    createAudioTinymce()
    editAudioTinymce()

    postLangId = $('#postEditLangId').val()
    postCategoryId = $('#postEditCategoryId').val()
    postSubCategoryId = $('#postEditSubCategoryId').val()

    if ($('#postTag').length) {
        new Tagify(document.querySelector('#postTag'))
    }

    let screen = $(window).width()
    if (screen >= 1470) {
        $('.post_ui').addClass('flex-column-fluid')
    } else {
        $('.post_ui').removeClass('flex-column-fluid')
    }

    $(window).on('resize', function () {
        if (screen >= 1470) {
            $('.post_ui').addClass('flex-column-fluid')
        } else {
            $('.post_ui').removeClass('flex-column-fluid')
        }
    })

    listen('click', '#scheduledPost', function () {
        if ($(this).prop('checked') == true) {
            $('.date-time').removeClass('d-none')
        } else if ($(this).prop('checked') == false) {
            $('.date-time').addClass('d-none')
        }
    })

    if ($('#scheduledPost').prop('checked') == true) {
        $('.date-time').removeClass('d-none')
    }

    const dt = new Date()
    const now = dt.getHours() + ':' + dt.getMinutes()

    $('#scheduledPostTime').flatpickr({

        enableTime: true,
        minDate: 'today',
        minTime: now,
        dateFormat: 'Y-m-d H:i',
        locale: lang,
    })

    listen('hidden.bs.modal', '#postFileModal', function () {
        $('#newPostImage').val('')
        $('.uploaded-post-img').empty()
        $('.modal-footer').addClass('d-none')
    })
    listen('click', '.btn-check', function () {
        $('.modal-footer').removeClass('d-none')
    })

    updateList = function () {
        var input = document.getElementById('file')
        var output = document.getElementById('fileList')
        var children = ''
        for (var i = 0; i < input.files.length; ++i) {
            children += '<li>' + input.files.item(i).name + '</li>'
        }
        output.innerHTML = '<ul>' + children + '</ul>'
    }

    updateAudioList = function () {
        var input = document.getElementById('audios')
        var output = document.getElementById('audioFileList')
        var children = ''
        for (var i = 0; i < input.files.length; ++i) {
            children += '<li>' + input.files.item(i).name + '</li>'
        }
        output.innerHTML = '<ul>' + children + '</ul>'
    }

    function previewImagesPost () {
        if (this.files) $.each(this.files, readAndPreviewPost)
    }

    // $('#postLanguageId').val('').trigger('change')
    // if (!isEmpty(postLangId)){
    //     setTimeout(function (){
    //         $('#postLanguageId').val(postLangId).trigger('change')
    //     },500)
    // }

    $('#postCategoriesId').select2({
        placeholder: Lang.get('messages.common.select_category'),

    })

    $('#postSubCategoryId').select2({
        placeholder: Lang.get('messages.common.select_subcategory'),

    })

    $('#postTypeFilter').select2({
        width: '100%',
    })

    $('#categoryFilter').select2({
        width: '100%',
    })

    $('#subCategoryFilter').select2({
        width: '100%',
    })

    $('#languageFilter').select2({
        width: '100%',
    })
    $('#postCreatedBy').select2({
        width: '100%',
    })
    $('#openAi').select2({
        width: '100%',
    })
}

listen('click', '.select-post-image', function () {
    let imgUrl = $('input[name="preview_img"]:checked').val()
    $('#postFileModal').modal('hide')
    let oldContent = tinyMCE.activeEditor.getContent()
    tinymce.activeEditor.setContent(
        oldContent + '<img class="images" src=' + imgUrl +
        ' data-mce-src=' + imgUrl + '>')
})

listen('change', '#additionalImage', previewImagesPost)

function previewImagesPost () {
    if (this.files) $.each(this.files, readAndPreviewPost)
}

// window.addEventListener('error', function (data) {
//     displayErrorMessage(data.detail)
// })

function readAndPreviewPost (i, file) {
    var $preview = $('#preview').empty()
    if (!/\.(jpe?g|png|gif|webp|svg)$/i.test(file.name)) {
        $('#additionalImage').val('')
        return alert(file.name + ' is not an image')
    }

    var reader = new FileReader()

    $(reader).on('load', function () {
        $preview.append(
            $('<img/>', { src: this.result }).addClass('border-color'))
    })

    reader.readAsDataURL(file)

}

const addTinyMCE = () => {
    // Initialize
    tinymce.init({
        selector: '.text-gallery-description,.text-sort_list-description',
        themes: 'modern',
        height: 200,
        content_style: tinymce_textarea_coler,
    })
}

listen('click', '.btn-add-image', function () {
    let role = $(this).attr('data-role')

    imagePostData(role)
})

function imagePostData (role) {
    let url
    if (role == 'Customer') {
        url = route('customer-post-upload-image-get')
    } else {
        url = route('post-upload-image-get')
    }
    console.log(url)
    $.ajax({
        url: url,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#postFileModal').modal('show')
                $.each(result.data, function (key, value) {
                    let imagePostData = {
                        imageId: value.id,
                        imgUrl: value.imageUrls,
                        imgName: value.imageUrls.substring(
                            value.imageUrls.lastIndexOf('/') + 1),
                    }
                    let dataTemplate = prepareTemplateRender(
                        '#postTemplate', imagePostData)
                    $('.uploaded-post-img').append(dataTemplate)
                })
            }
        },
    })
}

listen('change', '#postTypeFilter', function () {
    window.livewire.emit('filterPostType', $(this).val())
})

listen('change', '#categoryFilter', function () {
    window.livewire.emit('filterCategory', $(this).val())
    window.livewire.emit('filterSubCategory', null)
})

listen('change', '#subCategoryFilter', function () {
    window.livewire.emit('filterSubCategory', $(this).val())
})

listen('change', '#languageFilter', function () {
    window.livewire.emit('filterLangId', $(this).val())
})

let dropdownBtnEle = ''
let dropdownEle = ''
let dropdownOpen = false
$(document).on('click', '.post-option', function (event) {
    dropdownBtnEle = $(this)
    dropdownEle = $(this).next()
    openDropdownManually(dropdownBtnEle, dropdownEle)
})

window.openDropdownManually = function (dropdownBtnEle, dropdownEle) {
    if (!dropdownBtnEle.hasClass('show')) {
        $('.post-option').removeClass('show')
        $('.menu-sub-dropdown').removeClass('show')
        dropdownBtnEle.addClass('show')
        dropdownEle.addClass('show')
        dropdownOpen = true
    } else {
        hideDropdownManually(dropdownBtnEle, dropdownEle)
    }
}

window.hideDropdownManually = function (dropdownBtnEle, dropdownEle) {
    dropdownBtnEle.removeClass('show')
    dropdownEle.removeClass('show')
    dropdownOpen = false
}

listen('click', '.post-item', function () {
    hideDropdownManually(dropdownBtnEle, dropdownEle)
})

listen('click', function (event) {
    let target = $(event.target)
    if (dropdownOpen && !target.closest('.post-option').length) {
        hideDropdownManually(dropdownBtnEle, dropdownEle)
    }
})

function validatePostForm () {
    let slug = $('#postSlug').val()
    let description = $('#description').val()
    let keywords = $('#keywords').val()
    let tags = $('#postTag').val()
    let postLanguageId = $('#postLanguageId').val()
    let postCategoriesId = $('#postCategoriesId').val()
    let scheduledPost = $('#scheduledPost').prop('checked')
    let datePicker = $('#scheduledPostTime').val()
    let galleryTitle = $('.gallery-title').val()
    let sortListTitle = $('.sort-list-title').val()
    let sectionType = $('#postSectionType').val()

    if (isEmpty($.trim(slug))) {
        toastr.error(
            Lang.get('messages.common.required', { 'attribute': 'slug' }))
        return false
    } else if (slug.length > 180) {
        toastr.error(Lang.get('messages.common.max',
            { 'attribute': 'slug', 'max': 180 }))
        return false
    }
    if (isEmpty($.trim(description))) {
        toastr.error(Lang.get('messages.common.required',
            { 'attribute': 'description' }))
        return false
    }

    if (isEmpty($.trim(keywords))) {
        toastr.error(
            Lang.get('messages.common.required', { 'attribute': 'keywords' }))
        return false
    } else if (keywords.length > 180) {
        toastr.error(Lang.get('messages.common.max',
            { 'attribute': 'keywords', 'max': 180 }))
        return false
    }

    if (isEmpty($.trim(tags))) {
        toastr.error(
            Lang.get('messages.common.required', { 'attribute': 'tags' }))
        return false
    } else if (tags.length > 180) {
        toastr.error(Lang.get('messages.common.max',
            { 'attribute': 'tags', 'max': 180 }))
        return false
    }

    if (isEmpty($.trim(postLanguageId))) {
        toastr.error(
            Lang.get('messages.common.required', { 'attribute': 'language' }))
        return false
    }

    if (isEmpty($.trim(postCategoriesId))) {
        toastr.error(
            Lang.get('messages.common.required', { 'attribute': 'category' }))
        return false
    }

    if (scheduledPost && isEmpty(datePicker)) {
        toastr.error(Lang.get('messages.common.required',
            { 'attribute': 'date & time' }))
        return false
    }

    if (sectionType == 2) {
        if (isEmpty($.trim(galleryTitle))) {
            toastr.error(Lang.get('messages.common.required',
                { 'attribute': 'gallery list item title' }))
            return false
        } else if (galleryTitle.length > 180) {
            toastr.error(Lang.get('messages.common.max',
                { 'attribute': 'gallery list item title', 'max': 180 }))
            return false
        }
    }

    if (sectionType == 3) {
        if (isEmpty($.trim(sortListTitle))) {
            toastr.error(Lang.get('messages.common.required',
                { 'attribute': 'sort list item title' }))
            return false
        } else if (sortListTitle.length > 180) {
            toastr.error(Lang.get('messages.common.max',
                { 'attribute': 'sort list item title', 'max': 180 }))
            return false
        }
    }

    if ($('#createPostForm').length == 1) {
        if (sectionType == 6) {
            if (isEmpty($('#videoUrl').val()) &&
                isEmpty($('#uploadVideo').val())) {
                toastr.error('Please enter video url or upload video')
                return false
            }

            if ($('#videoUrl').val() && $('#uploadVideo').val()) {
                toastr.error(
                    'You can use any one of upload video or video URL option')
                return false
            }
        }
    }
    return true
}

listen('keyup', '.sort-list-title-text', function () {
    let dataId = $(this).attr('data-id')
    $('.accordion-button-' + dataId).
        text($('.sort-list-title-' + dataId).val())

})

listen('keyup', '.gallery-list-title-text', function () {
    let dataId = $(this).attr('data-id')
    $('.accordion-button-' + dataId).
        text($('.gallery-list-title-' + dataId).val())
})

listen('click', '#postSaveBtn', function () {
    let id = $('#hiddenId').val()
    let image = $('#image').val()
    let thumbnailUrl = $('.thumbnail-image-url').val()
    let thumbnailImage = $('#thumbnailImage').val()

    if (isEmpty(thumbnailImage)) {
        if (thumbnailUrl == '') {
            if (isEmpty(id) && isEmpty(image)) {
                toastr.error(Lang.get('messages.common.required',
                    { 'attribute': 'Thumbnail' }))
                return false
            }
        }
    }

    if (validatePostForm()) {
        $('.postSaveBtn').submit()
        return true
    } else {
        return false
    }
})
listen('change', '#categoryFilter', function () {
    $.ajax({
        url: route('posts.categoryFilter'),
        type: 'POST',
        data: {
            cat_id: $(this).val(),
        },
        success: function (response) {
            $('#subCategoryFilter').empty()
            $('#subCategoryFilter').
                append(
                    $('<option value=""></option>').
                        text(Lang.get('messages.common.select_subcategory')))
            $.each(response.data, function (i, v) {
                $('#subCategoryFilter').
                    append($('<option></option>').attr('value', v).text(i))
            })

            if (postSubCategoryId) {
                $('#subCategoryFilter').val(postSubCategoryId).trigger('change')
            }
        },
    })
})

function createTinymce () {
    tinymce.init({
        mode: 'specific_textareas',
        editor_selector: 'article-text-description',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        document_base_url: '{{ config(\'app.url\') }}',
        content_style: tinymce_textarea_coler,
    })
    tinymce.init({
        selector: '.text-gallery-description,.text-sort_list-description',
        themes: 'modern',
        height: 200,
        content_style: tinymce_textarea_coler,
    })
}

function editTinymce () {
    tinymce.init({
        mode: 'specific_textareas',
        editor_selector: 'article-text-description',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        document_base_url: '{{ config(\'app.url\') }}',
        content_style: tinymce_textarea_coler,
    })
    tinymce.init({
        selector: '.text-gallery-description,.text-sort_list-description',
        themes: 'modern',
        height: 200,
        content_style: tinymce_textarea_coler,
    })
}

function createVideoTinymce () {
    tinymce.init({
        mode: 'specific_textareas',
        editor_selector: 'video-text-description',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        document_base_url: '{{ config(\'app.url\') }}',
        content_style: tinymce_textarea_coler,
    })
    tinymce.init({
        selector: '.text-gallery-description,.text-sort_list-description',
        themes: 'modern',
        height: 200,
        content_style: tinymce_textarea_coler,
    })
}

function editVideoTinymce () {
    tinymce.init({
        mode: 'specific_textareas',
        editor_selector: 'video-text-description',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        document_base_url: '{{ config(\'app.url\') }}',
        content_style: tinymce_textarea_coler,
    })
    tinymce.init({
        selector: '.text-gallery-description,.text-sort_list-description',
        themes: 'modern',
        height: 200,
        content_style: tinymce_textarea_coler,
    })
}

function createAudioTinymce () {
    tinymce.init({
        mode: 'specific_textareas',
        editor_selector: 'audio-text-description',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        document_base_url: '{{ config(\'app.url\') }}',
        content_style: tinymce_textarea_coler,
    })
    tinymce.init({
        selector: '.text-gallery-description,.text-sort_list-description',
        themes: 'modern',
        height: 200,
        content_style: tinymce_textarea_coler,
    })
}

function editAudioTinymce () {
    tinymce.init({
        mode: 'specific_textareas',
        editor_selector: 'audio-text-description',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        document_base_url: '{{ config(\'app.url\') }}',
        content_style: tinymce_textarea_coler,
    })
    tinymce.init({
        selector: '.text-gallery-description,.text-sort_list-description',
        themes: 'modern',
        height: 200,
        content_style: tinymce_textarea_coler,
    })
}

listen('click', '.image-delete-btn', function (event) {
    let deleteImageId = $('input[name="preview_img"]:checked').attr('data-id')
    $.ajax({
        url: route('post-image.destroy', deleteImageId),
        type: 'get',
        success: function (result) {
            let id = result.data.id
            if (result) {
                $('#image-' + id).hide()
                $('.modal-footer').addClass('d-none')
                displaySuccessMessage(result.message)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('change', '#newPostImage', function () {
    if (this.files && this.files[0]) {
        let image = this.files[0]
        let ext = image.name.split('.').pop()
        let extensions = ['png', 'jpg', 'jpeg', 'webp', 'svg']
        if (!extensions.includes(ext)) {
            displayErrorMessage(Lang.get('messages.common.image_error'))
            return false
        }

        let formData = new FormData()
        formData.append('image', image)
        $.ajax({
            type: 'POST',
            url: route('editor.post-image-upload'),
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                displaySuccessMessage(result.message)

                let dataTemplate = prepareTemplateRender('#postTemplate', {
                    imgUrl: result.data.url,
                    imgName: result.data.url.substring(
                        result.data.url.lastIndexOf('/') + 1),
                    imageId: result.data.mediaId,
                })
                $('#newPostImage').val('')
                $('.uploaded-post-img').append(dataTemplate)
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message)
            },
        })
    }
})

listen('change', '#postLanguageId', function () {
    let lang_id = $(this).val()
    $.ajax({
        url: route('posts.language'),
        type: 'POST',
        data: { data: lang_id },
        success: function (response) {
            $('#postCategoriesId').empty()
            $('#postCategoriesId').
                append(
                    $('<option value=""></option>').
                        text(Lang.get('messages.common.select_category')))
            $.each(response.data, function (i, v) {
                $('#postCategoriesId').
                    append($('<option></option>').attr('value', v).text(i))
            })

            if (postCategoryId) {
                $('#postCategoriesId').val(postCategoryId).trigger('change')
            }
        },
    })
})

listen('change', '#postCategoriesId', function () {
    $.ajax({
        url: route('posts.category'),
        type: 'POST',
        data: {
            cat_id: $(this).val(),
            lang_id: $('#postLanguageId').val(),
        },
        success: function (response) {
            $('#postSubCategoryId').empty()
            $('#postSubCategoryId').
                append(
                    $('<option value=""></option>').
                        text(Lang.get('messages.common.select_subcategory')))
            $.each(response.data, function (i, v) {
                $('#postSubCategoryId').
                    append($('<option></option>').attr('value', v).text(i))
            })

            if (postSubCategoryId) {
                $('#postSubCategoryId').val(postSubCategoryId).trigger('change')
            }
        },
    })
})

listen('click', '.delete-posts-btn', function (event) {
    let role = $('#loginUserRole').val()
    let deletePostId = $(event.currentTarget).data('id')
    let url
    if (role) {
        url = route('customer-posts.destroy', deletePostId)
    } else {
        url = route('posts.destroy', deletePostId)
    }

    deleteItem(url, Lang.get('messages.post.post'))
})

listen('click', '#postAddItem', function () {
    $('.delete-gallery-item').removeClass('d-none')
    let data = {
        i: $('.accordion').length + 1,
        styleCss: 'style',
    }
    let galleryItemHtml = prepareTemplateRender('#galleryItemTemplate',
        data)

    $('.gallery-item-container').append(galleryItemHtml)
    addTinyMCE()
    tooltipLoad()
    IOInitImageComponent()
})

listen('click', '#addSortListItem', function () {
    $('.delete-sort_list-item').removeClass('d-none')
    let data = {
        i: $('.accordion').length + 1,
    }
    let invoiceItemHtml = prepareTemplateRender('#sortListItemTemplate',
        data)

    $('.sort_list-item-container').append(invoiceItemHtml)
    addTinyMCE()
    tooltipLoad()
    IOInitImageComponent()
})

listen('click', '.delete-gallery-item', function () {
    $(this).parent().parent().parent().remove()
    let countGallery = $('.accordion').length - 1
    $('#postGalleryTitle').addClass('gallery-title')
    if (countGallery == 0) {
        $('.delete-gallery-item').addClass('d-none')
        $('#postGalleryTitle').addClass('gallery-title')
    }
})

listen('click', '.delete-sort_list-item', function () {
    $(this).parent().parent().parent().remove()
    let countSort = $('.accordion').length - 1
    $('#sortListTitle').addClass('sort-list-title')
    if (countSort == 0) {
        $('.delete-sort_list-item').addClass('d-none')
        $('#sortListTitle').addClass('sort-list-title')
    }
})

listen('change', '.image-upload', function () {
    if ($('#postTitle').length && this.files && this.files[0]) {
        let image = this.files[0]
        let ext = image.name.split('.').pop()
        let extensions = ['png', 'jpg', 'jpeg', 'webp', 'svg']
        if (!extensions.includes(ext)) {
            displayErrorMessage(Lang.get('messages.common.image_error'))
            $(this).val('')
            return false
        }
    }
})

listen('keyup', '.thumbnail-image-url', function () {
    let thumbnailUrl = $('.thumbnail-image-url').val()
    $('#thumbnailInputImage').
        css('background-image', 'url(' + thumbnailUrl + ')')
})

listen('blur', '.thumbnail-image-url', function () {
    let thumbnailUrl = $('.thumbnail-image-url').val()

    function isImage (url) {
        return /^https?:\/\/.+\.(jpg|jpeg|png|webp|svg)$/.test(url)
    }

    if (!isImage('' + thumbnailUrl + '')) {
        $('.thumbnail-image-url').val('')
        $('#thumbnailInputImage').
            css('background-image', 'url(' + defaultImage + ')')
        displayErrorMessage(Lang.get('messages.post.thumbnail_image'))
        return false
    }
})

listen('blur', '#videoUrl', function () {
    let videUrl = $('#videoUrl').val()
    if (videUrl === '') {
        $('#embedVideoUrl').val('')
        $('.video_i_frame').empty()
        $('#thumbnailImageUrl').val('')
        $('#thumbnailInputImage').
            css('background-image', 'url(' + defaultImage + ')')
    }
})

listen('click', '.get-video-by-url', function (event) {
    let videoUrl = $('#videoUrl').val()
    $.ajax({
        url: route('get-video-by-url'),
        data: { videoUrl: videoUrl },
        type: 'post',
        success: function (result) {
            if (result.success) {
                $('.video_i_frame').empty()
                $('.video_i_frame').append(result.data.html)
                $('.video_i_frame').css('text-align', 'center')
                $('#embedVideoUrl').val(result.data.embed_url)
                $('#thumbnailImageUrl').val(result.data.thumbnail_url)
                $('#thumbnailInputImage').
                    css('background-image',
                        'url(' + result.data.thumbnail_url + ')')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('change', '#uploadVideo', function () {
    if (this.files && this.files[0]) {
        let image = this.files[0]
        let ext = image.name.split('.').pop()
        let extensions = ['mp4', 'mov', 'mkv', 'webm', 'avi']
        if (!extensions.includes(ext)) {
            displayErrorMessage(Lang.get('messages.common.video_error'))
            $('.video-tag').addClass('d-none')
            $(this).val('')
            return false
        }
        $('.video-tag').removeClass('d-none')
        var $source = $('#video_here')
        $source[0].src = URL.createObjectURL(this.files[0])
        $source.parent()[0].load()
    }
})
listenClick('#OpenAiCall', function () {
    let role = $(this).attr('data-role')
    $('#OpenAiCall').prop('disabled', true)
    let postTitle = $('#postTitle').val()
    let openAiModel = $('#openAi').val()
    let Temperature = $('#Temperature').val()
    let MaximumLength = $('#MaximumLength').val()
    let InputTopPId = $('#InputTopPId').val()
    let InputBestOfId = $('#InputBestOfId').val()
    let url
    if (role == 'Customer') {
        url = route('customer-open_ai')
    } else {
        url = route('open_ai')
    }
    $.ajax({
        url: url,
        type: 'POST',
        data:
            {
                postTitle: postTitle,
                openAiModel: openAiModel,
                Temperature: Temperature,
                MaximumLength: MaximumLength,
                InputTopPId: InputTopPId,
                InputBestOfId: InputBestOfId,
            },
        success: function (result) {
            if (result.success) {
                console.log(result.data)
                displaySuccessMessage(result.message)
                tinyMCE.activeEditor.setContent(
                    result.data.replace(/\n/g, '<br>'))
                $('#OpenAiCall').prop('disabled', false)
                $('html, body').
                    animate({
                        scrollTop: $('.btn-add-image').
                            offset().top - 100,
                    })
            }

        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#OpenAiCall').prop('disabled', false)
        },
    })
})

listenKeyup('#TemperatureOutput', function() {
    let value = $(this).val();
    if(value == ''){
        $(this).val(0)
        value = 0
    }
    if(value >= 1) {
        $(this).val(1)
    } 
    $('#Temperature').val(value);
});
listenKeyup('#MaximumLengthOutput', function() {
    let value = $(this).val();
    console.log(value)
    if(value == ''){
        $(this).val(0)
        value = 0
    }
    if(value >= 4000) {
        $(this).val(4000)
    }
    $('#MaximumLength').val(value);
});
listenKeyup('#topP', function() {
    let value = $(this).val();
    if(value == ''){
        $(this).val(0)
        value = 0
    }
    if(value >= 1) {
        $(this).val(1)
    }
    $('#InputTopPId').val(value);
});
listenKeyup('#BestOf', function() {
    let value = $(this).val();
    if(value == ''){
        $(this).val(0)
        value = 0
    }
    if(value >= 20) {
        $(this).val(20)
    }
    $('#InputBestOfId').val(value);
});
