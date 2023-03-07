document.addEventListener('turbo:load', loadAdBannerData)

function loadAdBannerData () {
    
}
listen('change','#AdSpace',function () {
    let id = $(this).val()
    
    Turbo.visit(route('ad-spaces.create',{'id':id}))
})
listen('change', '#adBannerImageDesktop', previewImagesPostDesktop)

function previewImagesPostDesktop () {
    if (this.files) $.each(this.files, readAndPreviewPostDesktop)
}

function readAndPreviewPostDesktop (i, file) {
    var $preview = $('#preview').empty()
    if (!/\.(jpe?g|png|gif|webp|svg)$/i.test(file.name)) {
        $('#adBannerImageDesktop').val('')
        return alert(file.name + ' is not an image')
    }
    var reader = new FileReader()

    $(reader).on('load', function () {
        $preview.append($('<img/>', { src: this.result }).
            addClass('border-color img-fluid'))
    })

    reader.readAsDataURL(file)
}
listen('change', '#adBannerImageMobile', previewImagesPostMobile)
function previewImagesPostMobile () {

    if (this.files) $.each(this.files, readAndPreviewPostMobile)
}
function readAndPreviewPostMobile (i, file) {
    var $preview = $('#previewMobile').empty()

    if (!/\.(jpe?g|png|gif|webp|svg)$/i.test(file.name)) {
        $('#adBannerImageMobile').val('')
        return alert(file.name + ' is not an image')
    }
    var reader = new FileReader()
    $(reader).on('load', function () {
        $preview.append($('<img/>', { src: this.result }).
            addClass('border-color img-fluid'))
    })
    reader.readAsDataURL(file)
}
