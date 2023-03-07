document.addEventListener('turbo:load', loadWebCustom);
function loadWebCustom(){
    // desktop
    if($(window).width() >= 728){
        $('.heder-ad').removeClass('d-none')
        $('.index-top-mobile').addClass('d-none')
        $('.index-top-desktop').removeClass('d-none')
    }
    // mobile
    if($(window).width() <= 728){
        $('.heder-ad').addClass('d-none')
        $('.index-top-desktop').addClass('d-none')
        $('.index-top-mobile').removeClass('d-none')
    }
     $(window).on('resize', function () {
         if($(window).width() >= 728){
             $('.heder-ad').removeClass('d-none')
             $('.index-top-mobile').addClass('d-none')
             $('.index-top-desktop').removeClass('d-none')
         }
        if($(window).width() <= 728){
        $('.heder-ad').addClass('d-none')
            $('.index-top-desktop').addClass('d-none')
            $('.index-top-mobile').removeClass('d-none')
        }
    
    });
    if (isEmpty(localStorage.getItem('front-mode'))){
        localStorage.setItem('front-mode','light')
    }

    if (localStorage.getItem('front-mode') === 'light'){
        $('body').removeClass('dark-mode')
        $('#themeSwitchCheckbox').prop('checked',false)
    }else{
        $('#themeSwitchCheckbox').prop('checked',true)
        $('body').addClass('dark-mode')
    }
    
    var rtTrendingSlider1 = new Swiper('.breaking-slider', {
        slidesPerView: 1,
        loop: true,
        slideToClickedSlide: true,
        direction: 'vertical',
        autoplay: {
            delay: 4000,
        },
        speed: 800,
    })

    if (($('#sliderCount').val()) > 1) {
        if ($(window).width() < 770) {
            $('.custom-swiper-slider').removeClass('custom-slider')
            $('.custom-swiper-slider').addClass('swiper-slide')
            $('.slider-navigation').removeClass('d-none')
        }
        $(window).on('resize', function () {
            if ($(window).width() < 770) {
                $('.custom-swiper-slider').removeClass('custom-slider')
                $('.custom-swiper-slider').addClass('swiper-slide')
                $('.slider-navigation').removeClass('d-none')
            }
        })
    }
    
    var swiper = new Swiper('.addition-image-swiper', {
        slidesPerView: screenWidth > 425 ? 3 : 1,
        spaceBetween: 5,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
    
    $('.testimonial-carousel').slick({
        dots: true,
        autoplay: true,
        autoplayspeed: 1500,
        centerPadding: '0',
        slidesToShow: 1,
        slidesToScroll: 1,
    })

   

    $('.alert').delay(5000).slideUp(300);

    $('#gRecaptchaContainerContactUs').empty()

    setTimeout(function () {
        loadCaptchaForContactUs()
        loadCaptchaPostDetailsPage()
        // var lazyLoadInstance = new LazyLoad({
        //
        // });
        //
        // lazyLoadInstance.update();
    },500)

    function loadCaptchaForContactUs(){
        let captchaContainer = document.getElementById('gRecaptchaContainerContactUs');

        if (!captchaContainer) {
            return false;
        }

        captchaContainer.innerHTML = ''
        let recaptcha = document.createElement('div')

        // setTimeout(function () {
        grecaptcha.render(recaptcha, {
            'sitekey': siteKey,
        })
        captchaContainer.appendChild(recaptcha)
        // }, 500)
    }

    function loadCaptchaPostDetailsPage(){
        let captchaContainer = document.getElementById('gRecaptchaContainerPostDetails');

        if (!captchaContainer) {
            return false;
        }

        captchaContainer.innerHTML = ''
        let recaptcha = document.createElement('div')

        // setTimeout(function () {
        grecaptcha.render(recaptcha, {
            'sitekey': siteKey,
        })
        captchaContainer.appendChild(recaptcha)
        // }, 500)
    }
}

window.myFunction = function () {
    if (localStorage.getItem('front-mode') === 'light'){
        localStorage.setItem('front-mode','dark')
        $('body').addClass('dark-mode')
    }else{
        localStorage.setItem('front-mode','light');
        $('body').removeClass('dark-mode')
    }
}

const jsrender = require('jsrender')
const assert = require('assert')
const { list } = require('postcss')
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
})

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

window.displaySuccessMessage = function (message) {
    toastr.success(message);
}

window.displayErrorMessage = function (message) {
    toastr.error(message);
}

listen('submit', '#subscriberForm', function (e) {
    e.preventDefault()
    if ($('.subscribe-form').val().length !== 0) {

        $.ajax({
            url: route('subscribe.store'),
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message)
                    $('#subscriberForm').trigger('reset')
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message)
            },
        })
    } else {
        displayErrorMessage(Lang.get('messages.emails.required'))
    }
})

listen('submit', '#commentForm', function (e) {
    e.preventDefault()
    $.ajax({
        url: route('comment.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                $('.blog-post-comment-view').removeClass('d-none')
                $('#commentForm').trigger('reset')
                if ($('#googleCaptch').val() == 1) {
                    grecaptcha.reset()
                }
                displaySuccessMessage(result.message)
                $('.count-data').text(result.data.commentCount)
                if (result.data.commentCount > 0) {
                    $('.comment-data').removeClass('d-none')
                }

                if (result.data.commentCount > 3) {
                    $('.comment-view').attr('style','overflow-y: auto; height: 325px');
                }

                let userImage

                if (result.data.commentView.user_id != null) {
                    userImage = result.data.commentView.users.profile_image
                } else {
                    userImage = userProfile
                }

                let data = {
                    'id': result.data.commentView.id,
                    'user_id': result.data.commentView.user_id,
                    'name': result.data.commentView.name,
                    'comment': result.data.commentView.comment,
                    'status': result.data.commentView.status,
                    'image': userImage,
                    'time': moment(result.data.created_at).fromNow(),
                }
                let commentViewTemplate = $.templates('#commentViewTemplate')
                let commentViewHtml = commentViewTemplate.render(data)
                if (data.status === 1) {
                    $('.comment-view').prepend(commentViewHtml)
                }

            } else {
                displayErrorMessage(result.responseJSON.message)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('click', '.delete-comment-btn', function (event) {
    let commentId = $(event.currentTarget).data('id')
    let deleteId = $(this)
    $.ajax({
        url: route('comment.destroy', commentId),
        type: 'DELETE',
        success: function (result) {
            deleteId.parents('div.comment-view').
                find('.card-view-' + commentId).
                remove()
            displaySuccessMessage(result.message)
            if (result.data <= 3){
                $('.comment-view').attr('style','');
            }
            if (result.data == '0') {
                $('.blog-post-comment-view').addClass('d-none')
            } else {
                $('.blog-post-comment-view').removeClass('d-none')
                $('.count-data').text(result.data)
            }
        },
    })
})

listen('click', '.selectLanguage', function () {
    let langId = $(this).attr('data-id')
    $.ajax({
        url: route('language.change.home'),
        type: 'POST',
        data: { data: langId },
        success: function (result) {
            window.location.href = '/'
        },
    })
})

listen('click', 'body', function (e) {
    if ($(e.target).hasClass('search-input')) {
        $('#searchBox1').removeClass('d-none')
        $('#searchBox2').removeClass('d-none')
    } else if ($(e.target).hasClass('search-click')) {
        if ($('#searchBox1').hasClass('d-none')) {
            $('#searchBox1').removeClass('d-none')
        } else {
            $('#searchBox1').addClass('d-none')
        }
        if ($('#searchBox2').hasClass('d-none')) {
            $('#searchBox2').removeClass('d-none')
        } else {
            $('#searchBox2').addClass('d-none')
        }
    } else {
        $('#searchBox1').addClass('d-none')
        $('#searchBox2').addClass('d-none')
    }
})

/*-------------------------------------
//Contact Form initiating
-------------------------------------*/
listen('submit', '#contactUsFrom', function (e) {
    e.preventDefault()
    $.ajax({
        url: route('contact.store'),
        type: 'get',
        data: $(this).serialize(),
        success: function (result) {
            $('#contactUsFrom').trigger('reset')
            if ($('#contactPageGoogleCaptch').val() == 1) {
                grecaptcha.reset()
            }
            displaySuccessMessage(Lang.get('messages.common.success_msg'))
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('click', '#pageUrl', function () {
    window.location.href = $(this).attr('data-url')
})


window.isEmpty = (value) => {
    return value === undefined || value === null || value === '';
};

$(window).scroll(function () {
    var sticky = $('.top-bar'),
        scroll = $(window).scrollTop()

    if (scroll >= 120) sticky.addClass('fixed')
    else sticky.removeClass('fixed')
})

$(window).scroll(function () {
    var sticky = $('.header'),
        scroll = $(window).scrollTop()

    if (scroll >= 120) sticky.addClass('fixed')
    else sticky.removeClass('fixed')
})
let screenWidth = screen.width;

$(document).on('click','.set > a', function () {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active')
        $(this).siblings('.content').slideUp(200)
        $('.set > a i').removeClass('fa-minus').addClass('fa-plus')
    } else {
        $('.set > a i').removeClass('fa-minus').addClass('fa-plus')
        $(this).find('i').removeClass('fa-plus').addClass('fa-minus')
        $('.set > a').removeClass('active')
        $(this).addClass('active')
        $('.content').slideUp(200)
        $(this).siblings('.content').slideDown(200)
    }
})
$(document).on('click', '.change-type', function (e) {
    console.log(123)
    let inputField = $(this).siblings()
    let oldType = inputField.attr('type')
    let type = !isEmpty(oldType) ? oldType : 'password'
    if (type == 'password') {
        $(this).children().addClass('fa-eye')
        $(this).children().removeClass('fa-eye-slash')
        inputField.attr('type', 'text')
    } else {
        $(this).children().removeClass('fa-eye')
        $(this).children().addClass('fa-eye-slash')
        inputField.attr('type', 'password')
    }
})
