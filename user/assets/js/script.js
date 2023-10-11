(function ($) {
  "use strict";

  //Hide Loading Box (Preloader)
  function handlePreloader() {
    if ($(".preloader").length) {
      $(".preloader").delay(200).fadeOut(500);
    }
  }

  //Update Header Style and Scroll to Top
  function headerStyle() {
    if ($(".main-header").length) {
      var windowpos = $(window).scrollTop();
      var siteHeader = $(".main-header");
      var sticky_header = $(".main-header .sticky-header");
      var scrollLink = $(".scroll-to-top");
      if (windowpos > 100) {
        siteHeader.addClass("fixed-header");
        sticky_header.addClass("animated slideInDown");
        scrollLink.fadeIn(300);
      } else {
        siteHeader.removeClass("fixed-header");
        sticky_header.removeClass("animated slideInDown");
        scrollLink.fadeOut(300);
      }
    }
  }

  headerStyle();

  //Submenu Dropdown Toggle
  if ($(".main-header li.dropdown ul").length) {
    $(".main-header .navigation li.dropdown").append(
      '<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>'
    );

    //Dropdown Button
    $(".main-header .navigation li.dropdown .dropdown-btn").on(
      "click",
      function () {
        $(this).prev("ul").slideToggle(500);
      }
    );

    //Disable dropdown parent link
    $(
      ".main-header .navigation li.dropdown > a,.hidden-bar .side-menu li.dropdown > a"
    ).on("click", function (e) {
      e.preventDefault();
    });
  }

  /*----------------------------------------------------*/
  /*  Main Slider js
    /*----------------------------------------------------*/
  function main_slider() {
    if ($("#main_slider").length) {
      $("#main_slider").revolution({
        sliderType: "standard",
        sliderLayout: "auto",
        delay: 400000000,
        disableProgressBar: "on",
        navigation: {
          onHoverStop: "off",
          touch: {
            touchenabled: "on",
          },
          arrows: {
            style: "zeus",
            enable: true,
            hide_onmobile: true,
            hide_under: 992,
            hide_onleave: true,
            hide_delay: 200,
            hide_delay_mobile: 1200,
            tmp:
              '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
            left: {
              h_align: "left",
              v_align: "center",
              h_offset: 50,
              v_offset: 0,
            },
            right: {
              h_align: "right",
              v_align: "center",
              h_offset: 50,
              v_offset: 0,
            },
          },
        },
        responsiveLevels: [4096, 1600, 1199, 992, 767, 480],
        gridwidth: [1170, 970, 970, 750, 700, 480],
        gridheight: [680, 680, 680, 600, 600, 600],
        lazyType: "smart",
        fallbacks: {
          simplifyAll: "off",
          nextSlideOnWindowFocus: "off",
          disableFocusListener: false,
        },
      });
    }
  }
  main_slider();

  /*----------------------------------------------------*/
  /*  Main Slider js
    /*----------------------------------------------------*/
  function main_slider2() {
    if ($("#main_slider2").length) {
      $("#main_slider2").revolution({
        sliderType: "standard",
        sliderLayout: "auto",
        delay: 400000000,
        disableProgressBar: "on",
        navigation: {
          onHoverStop: "off",
          touch: {
            touchenabled: "on",
          },
          arrows: {
            style: "zeus",
            enable: true,
            hide_onmobile: true,
            hide_under: 992,
            hide_onleave: true,
            hide_delay: 200,
            hide_delay_mobile: 1200,
            tmp:
              '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
            left: {
              h_align: "left",
              v_align: "center",
              h_offset: 50,
              v_offset: 0,
            },
            right: {
              h_align: "right",
              v_align: "center",
              h_offset: 50,
              v_offset: 0,
            },
          },
        },
        responsiveLevels: [4096, 1600, 1199, 992, 767, 480],
        gridwidth: [1170, 1170, 970, 750, 700, 480],
        gridheight: [876, 876, 700, 600, 600, 600],
        lazyType: "smart",
        fallbacks: {
          simplifyAll: "off",
          nextSlideOnWindowFocus: "off",
          disableFocusListener: false,
        },
      });
    }
  }
  main_slider2();

  /*----------------------------------------------------*/
  /*  Main Slider js
    /*----------------------------------------------------*/
  function main_slider3() {
    if ($("#main_slider3").length) {
      $("#main_slider3").revolution({
        sliderType: "standard",
        sliderLayout: "auto",
        delay: 400000000,
        disableProgressBar: "on",
        navigation: {
          onHoverStop: "off",
          touch: {
            touchenabled: "on",
          },
          arrows: {
            style: "zeus",
            enable: true,
            hide_onmobile: true,
            hide_under: 992,
            hide_onleave: true,
            hide_delay: 200,
            hide_delay_mobile: 1200,
            tmp:
              '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
            left: {
              h_align: "left",
              v_align: "center",
              h_offset: 50,
              v_offset: 0,
            },
            right: {
              h_align: "right",
              v_align: "center",
              h_offset: 50,
              v_offset: 0,
            },
          },
        },
        responsiveLevels: [4096, 1199, 992, 767, 480],
        gridwidth: [1170, 970, 750, 700, 480],
        gridheight: [850, 700, 600, 600, 600],
        lazyType: "smart",
        fallbacks: {
          simplifyAll: "off",
          nextSlideOnWindowFocus: "off",
          disableFocusListener: false,
        },
      });
    }
  }
  main_slider3();

  //Search Popup
  if ($("#search-popup").length) {
    //Show Popup
    $(".search-box-btn").on("click", function () {
      $("#search-popup").addClass("popup-visible");
    });
    $(document).keydown(function (e) {
      if (e.keyCode == 27) {
        $("#search-popup").removeClass("popup-visible");
      }
    });
    //Hide Popup
    $(".close-search,.search-popup .overlay-layer").on("click", function () {
      $("#search-popup").removeClass("popup-visible");
    });
  }

  //Event Countdown Timer
  if ($(".time-countdown").length) {
    $(".time-countdown").each(function () {
      var $this = $(this),
        finalDate = $(this).data("countdown");
      $this.countdown(finalDate, function (event) {
        var $this = $(this).html(
          event.strftime(
            "" +
              '<div class="counter-column"><span class="count">%D</span>Days</div> ' +
              '<div class="counter-column"><span class="count">%H</span>Hours</div>  ' +
              '<div class="counter-column"><span class="count">%M</span>Minutes</div>  ' +
              '<div class="counter-column"><span class="count">%S</span>Seconds</div>'
          )
        );
      });
    });
  }

  //Jquery Spinner / Quantity Spinner
  if ($(".quantity-spinner").length) {
    $("input.quantity-spinner").TouchSpin({
      verticalbuttons: true,
    });
  }

  //Tabs Box
  if ($(".tabs-box").length) {
    $(".tabs-box .tab-buttons .tab-btn").on("click", function (e) {
      e.preventDefault();
      var target = $($(this).attr("data-tab"));

      if ($(target).is(":visible")) {
        return false;
      } else {
        target
          .parents(".tabs-box")
          .find(".tab-buttons")
          .find(".tab-btn")
          .removeClass("active-btn");
        $(this).addClass("active-btn");
        target
          .parents(".tabs-box")
          .find(".tabs-content")
          .find(".tab")
          .fadeOut(0);
        target
          .parents(".tabs-box")
          .find(".tabs-content")
          .find(".tab")
          .removeClass("active-tab");
        $(target).fadeIn(300);
        $(target).addClass("active-tab");
      }
    });
  }

  //Main Slider Carousel
  if ($(".main-slider-carousel").length) {
    $(".main-slider-carousel").owlCarousel({
      animateOut: "fadeOut",
      animateIn: "fadeIn",
      loop: true,
      margin: 0,
      nav: true,
      //autoHeight: true,
      smartSpeed: 500,
      autoplay: 6000,
      navText: [
        '<span class="fa fa-angle-left"></span>',
        '<span class="fa fa-angle-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        800: {
          items: 1,
        },
        1024: {
          items: 1,
        },
        1200: {
          items: 1,
        },
      },
    });
  }

  // Single Item Carousel
  if ($(".single-item-carousel").length) {
    $(".single-item-carousel").owlCarousel({
      //animateOut: 'slideOutDown',
      //animateIn: 'fadeIn',
      loop: true,
      margin: 0,
      nav: true,
      singleItem: true,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      autoplayTimeout: 10000,
      navText: [
        '<span class="fa fa-angle-left"></span>',
        '<span class="fa fa-angle-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1024: {
          items: 1,
        },
      },
    });
  }

  // Two Item Carousel
  if ($(".two-item-carousel").length) {
    $(".two-item-carousel").owlCarousel({
      //animateOut: 'slideOutDown',
      //animateIn: 'fadeIn',
      loop: true,
      margin: 30,
      nav: true,
      singleItem: true,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      autoplayTimeout: 10000,
      navText: [
        '<span class="fa fa-angle-left"></span>',
        '<span class="fa fa-angle-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        800: {
          items: 2,
        },
        1024: {
          items: 2,
        },
        1200: {
          items: 2,
        },
      },
    });
  }

  // Gallery Carousel
  if ($(".gallery-carousel").length) {
    $(".gallery-carousel").owlCarousel({
      //animateOut: 'slideOutDown',
      //animateIn: 'fadeIn',
      loop: true,
      margin: 0,
      nav: true,
      singleItem: true,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      autoplayTimeout: 10000,
      navText: [
        '<span class="fa fa-angle-left"></span>',
        '<span class="fa fa-angle-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        800: {
          items: 3,
        },
        1024: {
          items: 4,
        },
        1200: {
          items: 5,
        },
      },
    });
  }

  // Four Item Carousel
  if ($(".four-item-carousel").length) {
    $(".four-item-carousel").owlCarousel({
      //animateOut: 'slideOutDown',
      //animateIn: 'fadeIn',
      loop: true,
      margin: 30,
      nav: true,
      singleItem: true,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      autoplayTimeout: 10000,
      navText: [
        '<span class="fa fa-angle-left"></span>',
        '<span class="fa fa-angle-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        800: {
          items: 3,
        },
        1024: {
          items: 4,
        },
        1200: {
          items: 4,
        },
      },
    });
  }

  //Fact Counter + Text Count
  if ($(".count-box").length) {
    $(".count-box").appear(
      function () {
        var $t = $(this),
          n = $t.find(".count-text").attr("data-stop"),
          r = parseInt($t.find(".count-text").attr("data-speed"), 10);

        if (!$t.hasClass("counted")) {
          $t.addClass("counted");
          $({
            countNum: $t.find(".count-text").text(),
          }).animate(
            {
              countNum: n,
            },
            {
              duration: r,
              easing: "linear",
              step: function () {
                $t.find(".count-text").text(Math.floor(this.countNum));
              },
              complete: function () {
                $t.find(".count-text").text(this.countNum);
              },
            }
          );
        }
      },
      { accY: 0 }
    );
  }

  //Accordion Box
  if ($(".accordion-box").length) {
    $(".accordion-box").on("click", ".acc-btn", function () {
      var outerBox = $(this).parents(".accordion-box");
      var target = $(this).parents(".accordion");

      if ($(this).hasClass("active") !== true) {
        $(outerBox).find(".accordion .acc-btn").removeClass("active");
      }

      if ($(this).next(".acc-content").is(":visible")) {
        return false;
      } else {
        $(this).addClass("active");
        $(outerBox).children(".accordion").removeClass("active-block");
        $(outerBox).find(".accordion").children(".acc-content").slideUp(300);
        target.addClass("active-block");
        $(this).next(".acc-content").slideDown(300);
      }
    });
  }

  //Product Tabs
  if ($(".burgers-tab").length) {
    $(".burgers-tab .burgers-tab-btns .p-tab-btn").on("click", function (e) {
      e.preventDefault();
      var target = $($(this).attr("data-tab"));

      if ($(target).hasClass("actve-tab")) {
        return false;
      } else {
        $(".burgers-tab .burgers-tab-btns .p-tab-btn").removeClass(
          "active-btn"
        );
        $(this).addClass("active-btn");
        $(".burgers-tab .p-tabs-content .p-tab").removeClass("active-tab");
        $(target).addClass("active-tab");
      }
    });
  }

  // Burgers Carousel
  if ($(".burgers-carousel").length) {
    $(".burgers-carousel").owlCarousel({
      loop: true,
      margin: 30,
      nav: true,
      smartSpeed: 700,
      autoplay: 5000,
      navText: [
        '<span class="fa fa-angle-left"></span>',
        '<span class="fa fa-angle-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        800: {
          items: 3,
        },
        1024: {
          items: 3,
        },
        1200: {
          items: 3,
        },
      },
    });
  }

  //Parallax Scene for Icons
  if ($(".parallax-scene-1").length) {
    var scene = $(".parallax-scene-1").get(0);
    var parallaxInstance = new Parallax(scene);
  }
  if ($(".parallax-scene-2").length) {
    var scene = $(".parallax-scene-2").get(0);
    var parallaxInstance = new Parallax(scene);
  }
  if ($(".parallax-scene-3").length) {
    var scene = $(".parallax-scene-3").get(0);
    var parallaxInstance = new Parallax(scene);
  }
  if ($(".parallax-scene-4").length) {
    var scene = $(".parallax-scene-4").get(0);
    var parallaxInstance = new Parallax(scene);
  }
  if ($(".parallax-scene-5").length) {
    var scene = $(".parallax-scene-5").get(0);
    var parallaxInstance = new Parallax(scene);
  }
  if ($(".parallax-scene-6").length) {
    var scene = $(".parallax-scene-6").get(0);
    var parallaxInstance = new Parallax(scene);
  }
  if ($(".parallax-scene-7").length) {
    var scene = $(".parallax-scene-7").get(0);
    var parallaxInstance = new Parallax(scene);
  }

  //Event Countdown Timer
  if ($(".time-countdown").length) {
    $(".time-countdown").each(function () {
      var $this = $(this),
        finalDate = $(this).data("countdown");
      $this.countdown(finalDate, function (event) {
        var $this = $(this).html(
          event.strftime(
            "" +
              '<div class="counter-column"><span class="count">%D</span>Days</div> ' +
              '<div class="counter-column"><span class="count">%H</span>Hours</div>  ' +
              '<div class="counter-column"><span class="count">%M</span>Minutes</div>  ' +
              '<div class="counter-column"><span class="count">%S</span>Seconds</div>'
          )
        );
      });
    });
  }

  //LightBox / Fancybox
  if ($(".lightbox-image").length) {
    $(".lightbox-image").fancybox({
      openEffect: "fade",
      closeEffect: "fade",
      helpers: {
        media: {},
      },
    });
  }

  //Contact Form Validation
  if ($("#contact-form").length) {
    $("#contact-form").validate({
      rules: {
        username: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        subject: {
          required: true,
        },
        message: {
          required: true,
        },
      },
    });
  }

  // Scroll to a Specific Div
  if ($(".scroll-to-target").length) {
    $(".scroll-to-target").on("click", function () {
      var target = $(this).attr("data-target");
      // animate
      $("html, body").animate(
        {
          scrollTop: $(target).offset().top,
        },
        1500
      );
    });
  }

  // Elements Animation
  if ($(".wow").length) {
    var wow = new WOW({
      boxClass: "wow", // animated element css class (default is wow)
      animateClass: "animated", // animation css class (default is animated)
      offset: 0, // distance to the element when triggering the animation (default is 0)
      mobile: false, // trigger animations on mobile devices (default is true)
      live: true, // act on asynchronously loaded content (default is true)
    });
    wow.init();
  }

  //Gallery Filters
  if ($(".filter-list").length) {
    $(".filter-list").mixItUp({});
  }

  /* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */

  $(window).on("scroll", function () {
    headerStyle();
  });

  /* ==========================================================================
   When document is loading, do
   ========================================================================== */

  $(window).on("load", function () {
    handlePreloader();
  });
})(window.jQuery);
