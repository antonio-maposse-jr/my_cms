(function ($) {
  "use strict";

  /*------------------------------------
  // Header
  ------------------------------------*/
  // Fixed header
  $(window).on("scroll", function () {
    if ($("header").hasClass("sticky-on")) {
      const stickyPlaceHolder = $("#sticky-placeholder"),
        menu = $("#navbar-wrap"),
        menuH = menu.outerHeight(),
        topbarH = $("#topbar-wrap").outerHeight() || 0,
        targrtScroll = topbarH,
        header = $("header");
      if ($(window).scrollTop() > targrtScroll) {
        header.addClass("sticky");
        stickyPlaceHolder.height(menuH);
      } else {
        header.removeClass("sticky");
        stickyPlaceHolder.height(0);
      }
    }
  });
  // Fixed header mobile
  $(window).on("scroll", function () {
    if ($(".rt-mobile-header").hasClass("mobile-sticky-on")) {
      const stickyPlaceHolder = $("#mobile-sticky-placeholder"),
        menu = $("#mobile-menu-bar-wrap"),
        menuH = menu.outerHeight(),
        topbarH = $("#mobile-top-bar").outerHeight() || 0,
        targrtScroll = topbarH,
        header = $(".rt-mobile-header");
      if ($(window).scrollTop() > targrtScroll) {
        header.addClass("mobile-sticky");
        stickyPlaceHolder.height(menuH);
      } else {
        header.removeClass("mobile-sticky");
        stickyPlaceHolder.height(0);
      }
    }
  });

  // humburger
  $(".humburger").on("click", function () {
    $(".humburger").toggleClass("active");
  });

  /*-------------------------------------
  //  Mobile Menu Toggle
  -------------------------------------*/
  $(".sidebarBtn").on("click", function (e) {
    e.preventDefault();
    if ($(".rt-slide-nav").is(":visible")) {
      $(".rt-slide-nav").slideUp();
      $("body").removeClass("slidemenuon");
    } else {
      $(".rt-slide-nav").slideDown();
      $("body").addClass("slidemenuon");
    }
  });

  /*-------------------------------------
    Mobile Menu Dropdown
    -------------------------------------*/
  const rtMobileMenu = $(".offscreen-navigation .menu");

  if (rtMobileMenu.length) {
    rtMobileMenu.children("li").addClass("menu-item-parent");
    rtMobileMenu.find(".menu-item-has-children > a").on("click", function (e) {
      e.preventDefault();
      $(this).toggleClass("opened");
      const n = $(this).next(".sub-menu"),
        s = $(this).closest(".menu-item-parent").find(".sub-menu");
      rtMobileMenu
        .find(".sub-menu")
        .not(s)
        .slideUp(250)
        .prev("a")
        .removeClass("opened"),
        n.slideToggle(250);
    });
    rtMobileMenu
      .find(".menu-item:not(.menu-item-has-children) > a")
      .on("click", function (e) {
        $(".rt-slide-nav").slideUp();
        $("body").removeClass("slidemenuon");
      });
  }

  /*-------------------------------------
  // Trending slider
  ------------------------------------*/
  const rtTrendingSlider1 = new Swiper(".rt-treding-slider1", {
    slidesPerView: 1,
    loop: true,
    slideToClickedSlide: true,
    direction: "vertical",
    autoplay: {
      delay: 4000,
    },
    speed: 800,
  });

  /*-------------------------------------
  // banner-slider-thumbnail-style-2
  ------------------------------------*/

  const bannerSliderThumbnailStyle2 = new Swiper(
    ".banner-slider-thumbnail-style-2",
    {
      slidesPerView: 3,
      slideToClickedSlide: true,
      spaceBetween: 20,
      loop: true,
      speed: 1000,
      direction: "horizontal",
      mousewheel: true,

      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        576: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 2,
          direction: "vertical",
          pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
          },
          // centeredSlides: true,
        },
        1200: {
          slidesPerView: 3,
          direction: "vertical",
          pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
          },
        },
      },
    }
  );
  const bannerSliderStyle2 = new Swiper(".banner-slider-style-2", {
    loop: true,
    speed: 1000,
    thumbs: {
      swiper: bannerSliderThumbnailStyle2,
    },
  });

  /*-------------------------------------
  // banner-slider-thumbnail-style-2
  ------------------------------------*/

  var bannerSliderThumbnailStyle3 = new Swiper(
    ".banner-slider-thumbnail-style-3",
    {
      slidesPerView: 3,
      spaceBetween: 20,
      loop: true,
      speed: 1000,

      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        576: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1025: {
          slidesPerView: 2,
        },
        1400: {
          slidesPerView: 3,
          centeredSlides: true,
        },
      },
    }
  );
  var bannerSliderStyle3 = new Swiper(".banner-slider-style-3", {
    loop: true,
    speed: 1000,
    thumbs: {
      swiper: bannerSliderThumbnailStyle3,
    },
    navigation: {
      nextEl: ".btn-next-thumb",
      prevEl: ".btn-prev-thumb",
    },
    effect: 'fade',
    autoplay: {
      delay: 6000
    }
  });


  /*-------------------------------------
  // video Thumbnail slider
  ------------------------------------*/

  const videoSliderThumbnailStyle1 = new Swiper(
    ".video-slider-thumbnail-style-1",
    {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      speed: 800,
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        576: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
        1400: {
          slidesPerView: 4,
        },
      },
    }
  );
  const videoSliderStyle1 = new Swiper(".video-slider-style-1", {
    loop: true,
    speed: 800,
    thumbs: {
      swiper: videoSliderThumbnailStyle1,
    },
  });

  /*---------------------------------------
  //	rt-post-slider-style-1
  ---------------------------------------*/
  const rtPostSliderStyle1 = new Swiper(".rt-post-slider-style-1", {
    slidesPerView: 4,
    loop: true,
    spaceBetween: 24,
    slideToClickedSlide: true,
    autoplay: {
      delay: 5000,
    },
    navigation: {
      nextEl: ".btn-next",
      prevEl: ".btn-prev",
    },
    speed: 800,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });

  /*--------------------------------------
  //rt-post-slider-style-2
 -----------------------------------------*/
  const rtPostSliderStyle2 = new Swiper(".rt-post-slider-style-2", {
    slidesPerView: 3,
    spaceBetween: 24,
    slidesPerColumn: 3,
    slidesPerColumnFill: "row",
    loop: true,
    slideToClickedSlide: true,
    autoplay: {
      delay: 4000,
    },
    navigation: {
      nextEl: ".btn-next",
      prevEl: ".btn-prev",
    },
    speed: 800,
    breakpoints: {
      0: {
        slidesPerView: 1,
        slidesPerColumn: 2,
        slidesPerColumnFill: "row",
      },
      576: {
        slidesPerView: 1,
        slidesPerColumn: 2,
        slidesPerColumnFill: "row",
      },
      768: {
        slidesPerView: 2,
        slidesPerColumn: 2,
        slidesPerColumnFill: "row",
      },
      992: {
        slidesPerView: 2,
        slidesPerColumn: 2,
        slidesPerColumnFill: "row",
      },
      1200: {
        slidesPerView: 3,
        slidesPerColumn: 3,
        slidesPerColumnFill: "row",
      },
    },
  });

  /*---------------------------------------
  // rt-post-slider-style-3
  ----------------------------------------*/
  const rtPostSliderStyle3 = new Swiper(".rt-post-slider-style-3", {
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    slideToClickedSlide: true,
    autoplay: {
      delay: 4000,
    },
    navigation: {
      nextEl: ".btn-next",
      prevEl: ".btn-prev",
    },
    speed: 800,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });

  /*---------------------------------------
  // rt-post-slider-style-4
  ----------------------------------------*/
  const rtPostSliderStyle4 = new Swiper(".rt-post-slider-style-4", {
    slidesPerView: 5,
    spaceBetween: 24,
    loop: true,
    slideToClickedSlide: true,
    autoplay: {
      delay: 4000,
    },
    navigation: {
      nextEl: ".btn-next",
      prevEl: ".btn-prev",
    },
    speed: 800,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
      1600: {
        slidesPerView: 5,
      },
    },
  });

  /*---------------------------------------
  // rt-post-slider-style-5
  ----------------------------------------*/
  const rtPostSliderStyle5 = new Swiper(".rt-post-slider-style-5", {
    slidesPerView: 3,
    spaceBetween: 24,
    loop: true,
    slideToClickedSlide: true,
    autoplay: {
      delay: 4000,
    },
    navigation: {
      nextEl: ".btn-next",
      prevEl: ".btn-prev",
    },
    speed: 800,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
    },
  });

  /*---------------------------------------
  // rt-post-slider-style-6
  -----------------------------------------*/
  const rtPostSliderStyle6 = new Swiper(".rt-post-slider-style-6", {
    slidesPerView: 4,
    loop: true,
    spaceBetween: 0,
    slideToClickedSlide: true,
    autoplay: {
      delay: 5000,
    },
    speed: 800,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3,
      },
      1400: {
        slidesPerView: 3,
      },
      1600: {
        slidesPerView: 4,
      },
    },
  });

  /*--------------------------------------
  //	rt-post-slider-style-7
  --------------------------------------*/
  const rtPostSliderStyle7 = new Swiper(".rt-post-slider-style-7", {
    slidesPerView: 1,
    loop: true,
    slideToClickedSlide: true,
    autoplay: {
      delay: 5000,
    },
    speed: 800,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  /*-----------------------------------
  // counter up
  ----------------------------------*/
  let counter = true;
  $(".counter-appear").appear();
  $(".counter-appear").on("appear", function () {
    if (counter) {
      // with skill bar
      $(".skill-per").each(function () {
        const $this = $(this);
        const per = $this.attr("data-per");
        $this.css("width", per + "%");
        $({ animatedValue: 0 }).animate(
          { animatedValue: per },
          {
            duration: 1000,
            step: function () {
              $this.attr("data-per", Math.floor(this.animatedValue) + "%");
            },
            complete: function () {
              $this.attr("data-per", Math.floor(this.animatedValue) + "%");
            },
          }
        );
      });
      counter = false;
    }
  });

  /*-------------------------------------
     Input Quantity Up & Down activation code
     -------------------------------------*/
  $("#quantity-holder,#quantity-holder2")
    .on("click", ".quantity-plus", function () {
      const $holder = $(this).parents(".quantity-holder");
      const $target = $holder.find("input.quantity-input");
      let $quantity = parseInt($target.val(), 10) | 0;
      if ($.isNumeric($quantity)) {
        $quantity = $quantity + 1;
        $target.val($quantity);
      } else {
        $target.val($quantity);
      }
    })
    .on("click", ".quantity-minus", function () {
      const $holder = $(this).parents(".quantity-holder");
      const $target = $holder.find("input.quantity-input");
      let $quantity = parseInt($target.val(), 10) | 0;
      if ($.isNumeric($quantity) && $quantity >= 2) {
        $quantity = $quantity - 1;
        $target.val($quantity);
      } else {
        $target.val(1);
      }
    });

  /*================================== start Utilities ========================================*/

  window.onload = function () {
    // Dark
    const toggleSwitch = document.querySelector(
      '.theme-switch-box__input'
    );
    const currentTheme = localStorage.getItem("theme");
    if (currentTheme) {
      document.documentElement.setAttribute("data-theme", currentTheme);
      if (currentTheme === "dark") {
        toggleSwitch.checked = true;
      }
    }
    function switchTheme(e) {
      if (e.target.checked) {
        document.documentElement.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark");
      } else {
        document.documentElement.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light");
      }
    }
    if (toggleSwitch) {
      toggleSwitch.addEventListener("change", switchTheme, false);
    }
  };

  /*----------------------------------
  //TweenMax Mouse Effect
  -----------------------------------*/
  $(".motion-effects-wrap").mousemove(function (e) {
    parallaxIt(e, ".motion-effects1", -100);
    parallaxIt(e, ".motion-effects2", -200);
    parallaxIt(e, ".motion-effects3", 100);
    parallaxIt(e, ".motion-effects4", 200);
    parallaxIt(e, ".motion-effects5", -50);
    parallaxIt(e, ".motion-effects6", 50);
  });
  function parallaxIt(e, target_class, movement) {
    const $wrap = $(e.target).parents(".motion-effects-wrap");
    if (!$wrap.length) return;
    const $target = $wrap.find(target_class);
    const relX = e.pageX - $wrap.offset().left;
    const relY = e.pageY - $wrap.offset().top;
    TweenMax.to($target, 1, {
      x: ((relX - $wrap.width() / 2) / $wrap.width()) * movement,
      y: ((relY - $wrap.height() / 2) / $wrap.height()) * movement,
    });
  }

  /*-------------------------------------
    Theia Side Bar
    -------------------------------------*/
  if (typeof $.fn.theiaStickySidebar !== "undefined") {
    $(".sticky-coloum-wrap .sticky-coloum-item").theiaStickySidebar({
      additionalMarginTop: 130,
    });
  }
  /*-------------------------------------
  // Read more button
  ------------------------------------*/
  $(".rt-read-more").hover(
    function () {
      $(this).removeClass("rt-button-animation-out");
    },
    function () {
      $(this).addClass("rt-button-animation-out");
    }
  );

  /*------------------------------
   // Tooltip
   ------------------------------*/
  $(function () {
    $('[data-bs-toggle="tooltip"]').tooltip({
      offset: [0, 5],
    });
  });

  /*------------------------------------
  //  Offcanvas Menu activation code
  -----------------------------------*/
  $("#wrapper").on("click", ".offcanvas-menu-btn", function (e) {
    e.preventDefault();
    const $this = $(this),
      wrapper = $(this).parents("body").find(">#wrapper"),
      wrapMask = $("<div />").addClass("offcanvas-mask"),
      offCancas = $("#offcanvas-wrap"),
      position = offCancas.data("position") || "left";

    if ($this.hasClass("menu-status-open")) {
      wrapper.addClass("open").append(wrapMask);
      $this.removeClass("menu-status-open").addClass("menu-status-close");
      offCancas.css({
        transform: "translateX(0)",
      });
    } else {
      removeOffcanvas();
    }

    function removeOffcanvas() {
      wrapper.removeClass("open").find("> .offcanvas-mask").remove();
      $this.removeClass("menu-status-close").addClass("menu-status-open");
      if (position === "left") {
        offCancas.css({
          transform: "translateX(-105%)",
        });
      } else {
        offCancas.css({
          transform: "translateX(105%)",
        });
      }
    }
    $(".offcanvas-mask, .offcanvas-close").on("click", function () {
      removeOffcanvas();
    });

    return false;
  });

  /*-------------------------------------
  //	Offcanvas cart  activation code
  -------------------------------------*/
  $("#wrapper").on("click", ".cart-menu-btn", function (e) {
    e.preventDefault();
    const $this = $(this),
      wrapper = $(this).parents("body").find(">#wrapper"),
      wrapMask = $("<div />").addClass("offcanvas-mask"),
      offCancas = $("#cart-wrap"),
      position = offCancas.data("position") || "left";

    if ($this.hasClass("menu-open-btn")) {
      wrapper.addClass("open-cart").append(wrapMask);
      offCancas.css({
        transform: "translateX(0)",
      });
    } else {
      removeOffcanvas();
    }

    function removeOffcanvas() {
      wrapper.removeClass("open-cart").find("> .offcanvas-mask").remove();
      if (position === "left") {
        offCancas.css({
          transform: "translateX(-105%)",
        });
      } else {
        offCancas.css({
          transform: "translateX(105%)",
        });
      }
    }
    $(".offcanvas-mask, .offcanvas-close").on("click", function () {
      removeOffcanvas();
    });

    return false;
  });

  /*-----------------------------------
  //	Jquery Serch Box
  -----------------------------------*/
  $('a[href="#template-search"]').on("click", function (event) {
    event.preventDefault();
    const target = $("#template-search");
    target.addClass("open");
    setTimeout(function () {
      target.find("input").focus();
    }, 600);
    return false;
  });

  $("#template-search, #template-search button.close").on(
    "click keyup",
    function (event) {
      if (
        event.target === this ||
        event.target.className === "close" ||
        event.keyCode === 27
      ) {
        $(this).removeClass("open");
      }
    }
  );

  /*-------------------------------
   //  WOW
  -------------------------------*/
  const wow = new WOW({
    boxClass: "wow",
    animateClass: "animated",
    offset: 0,
    mobile: false,
    live: true,
    scrollContainer: null,
  });
  wow.init();

  /*-------------------------------
   //  Back to Top
  -------------------------------*/
  const backToTop = document.getElementById("back-to-top");
  window.onscroll = function () {
    scrollFunction();
  };
  function scrollFunction() {
    if (backToTop !== null) {
      if (
        document.body.scrollTop > 80 ||
        document.documentElement.scrollTop > 80
      ) {
        backToTop.style.display = "block";
      } else {
        backToTop.style.display = "none";
      }
    }
  }
  if (backToTop !== null) {
    backToTop.addEventListener("click", (e) => {
      e.preventDefault();
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });
  }

  /*-------------------------------------
    Window Load and Resize
    -------------------------------------*/
  $(window).on("load", function () {
    // Modal
    if ($(window).width() > 992) {
      $("#rtModal").modal("show");
    }

    // Page Preloader
    const preloader = $("#preloader");
    preloader &&
      $("#preloader").fadeOut("slow", function () {
        $(this).remove();
      });

    // video pop up
    const videoPopUp = $(".play-btn");
    if (videoPopUp.length) {
      videoPopUp.magnificPopup({
        type: "iframe",
        iframe: {
          markup:
            '<div class="mfp-iframe-scaler">' +
            '<div class="mfp-close"></div>' +
            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
            "</div>",
          patterns: {
            youtube: {
              index: "youtube.com/",
              id: "v=",
              src: "https://www.youtube.com/embed/%id%?autoplay=1",
            },
            vimeo: {
              index: "vimeo.com/",
              id: "/",
              src: "//player.vimeo.com/video/%id%?autoplay=1",
            },
            gmaps: {
              index: "//maps.google.",
              src: "%id%&output=embed",
            },
          },
          srcAction: "iframe_src",
        },
      });
    }
  });

  $(window).on("load resize", function () {
    // Masonry
    $(".masonry-items").masonry({
      itemSelector: ".masonry-item",
      columnWidth: ".masonry-item",
    });
  });

  /*-----------------------------------
   // Section background image
  ----------------------------------*/
  imageFunction();

  function imageFunction() {
    $("[data-bg-image]").each(function () {
      const img = $(this).data("bg-image");
      $(this).css({
        backgroundImage: "url(" + img + ")",
      });
    });
  }
  /*================================== end Utilities ========================================*/

  /*--------------------------------
   // Date
   -------------------------------*/
  const currentYear = document.querySelectorAll(".currentYear");
  if (currentYear.length > 0) {
    const date = new Date();
    const currYear = date.getFullYear();
    currentYear.forEach((ele) => {
      ele.innerText = currYear;
    });
  }

  const currentDate = document.querySelectorAll(".currentDate");
  if (currentDate.length > 0) {
    const date = new Date().toLocaleDateString("en-us", {
      weekday: "long",
      year: "numeric",
      month: "short",
      day: "numeric",
    });
    currentDate.forEach((ele) => {
      ele.innerText = date;
    });
  }

})(jQuery);
