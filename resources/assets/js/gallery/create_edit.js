'use strict';

document.addEventListener('turbo:load', loadGalleryCreateEditData)

let albumId = ''
let categoryId = ''
let isEdit = false;
let galleryLangId = '';

function loadGalleryCreateEditData () {
    isEdit = $('#galleryEditIsEdit').val();
    galleryLangId =$('#galleryEditLangId').val();
    albumId = $('#galleryEditAlbumId').val();
    categoryId = $('#galleryEditCategoryId').val();
    $('#countryID, #stateID').
        select2({
            width: '100%',
        })
    
    $('#galleryLangId').val(galleryLangId).trigger('change');
    
    // if (isEdit && galleryLangId) {
    //     $('#galleryLangId').val(galleryLangId).trigger('change');
    // }
}

listen('change', '#galleryLangId', function () {
    $.ajax({
        url: route('album-list'),
        type: 'get',
        dataType: 'json',
        data: {langId: $(this).val()},
        success: function (data) {
            $('#galleryCategoryId').empty()
            $('#galleryCategoryId').select2({
                placeholder: Lang.get('messages.common.select_category'),
                allowClear: false,
            })
            $('#galleryAlbumId').empty()
            $('#galleryAlbumId').select2({
                placeholder: Lang.get('messages.gallery.select_album'),
                allowClear: false,
            })
            $('#galleryAlbumId').append(
                $('<option value=""></option>').text(Lang.get('messages.gallery.select_album')))
            $.each(data.data, function (i, v) {
                let ele = document.createElement('textarea')
                ele.innerHTML = v;
                $('#galleryAlbumId').append($('<option></option>').attr('value', i).text(ele.value))
            })

            if (isEdit && albumId) {
                $('#galleryAlbumId').val(albumId).trigger('change')
            }
        },
    })
})

listen('change', '#galleryAlbumId', function () {
    $.ajax({
        url: route('album-category-list'),
        type: 'get',
        dataType: 'json',
        data: {
            albumId: $(this).val(),
            langId: $('#galleryLangId').val(),
        },
        success: function (data) {
            $('#galleryCategoryId').empty()
            $('#galleryCategoryId').select2({
                placeholder: Lang.get('messages.common.select_category'),
                allowClear: false,
            })
            $.each(data.data, function (i, v) {
                let ele = document.createElement('textarea')
                ele.innerHTML = v;
                $('#galleryCategoryId').append($('<option></option>').attr('value', i).text(ele.value))
            })

            if (isEdit && categoryId) {
                $('#galleryCategoryId').val(categoryId).trigger('change')
            }
        },
    })
})

function previewImagesAlbum () {

    var $preview = $('#preview').empty()
    if (this.files) $.each(this.files, readAndPreview)

    function readAndPreview (i, file) {

        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return toastr.error(file.name + " " + Lang.get('messages.common.image_warning'));
        }

        var reader = new FileReader()

        $(reader).on('load', function () {
            $preview.append($('<img/>', { src: this.result})
            .addClass('border-color'))
        })

        reader.readAsDataURL(file)

    }

}

listen('change', '#galleryNewImage', previewImagesAlbum)


