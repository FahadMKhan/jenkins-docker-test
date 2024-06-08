jQuery(function ($) {
  /* -----------------------------------------
    Preloader
    ----------------------------------------- */
  $("#preloader").delay(1000).fadeOut();
  $("#loader").delay(1000).fadeOut("slow");

  /* -----------------------------------------
    rtl
    ----------------------------------------- */
  var isRTL = $("html").attr("dir") === "rtl";

  /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
  $(".banner-style-3 .banner-main-carousel").slick({
    dots: false,
    speed: 600,
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    autoplay: false,
    arrows: true,
    rtl: isRTL,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    responsive: [
    {
      breakpoint: 768,
      settings: {
        dots: true,
      },
    },
    ],
  });

  /* -----------------------------------------
    banner recent carousel
    ----------------------------------------- */
  $(".featured-posts-carousel").slick({
    dots: false,
    vertical: true,
    speed: 1000,
    autoplay: 100,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    infinite: true,
    verticalSwiping: true,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        verticalSwiping: false,
      },
    },
    ],
  });

  /* -----------------------------------------
    bigyapan slider
    ----------------------------------------- */
  $(".banner-style-3 .adver-slider").slick({
    dots: true,
    speed: 1000,
    autoplay: 100,
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: false,
    infinite: true,
    gap: 14,
    rtl: isRTL,
    responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    ],
  });

  /* -----------------------------------------
    customizer Post slider
    ----------------------------------------- */
  $(".post-slider").slick({
    dots: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    autoplay: true,
    arrows: true,
    rtl: isRTL,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    appendArrows : ".post-carousel .carousel-navigation",
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
      },
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      },
    },
    ],
  });

  /* -----------------------------------------
   marquee Ticker
  ----------------------------------------- */
  function configureMarqueeDirection() {
    const isRtl = $("body").hasClass("rtl");
    const direction = isRtl ? "right" : "left";

    $(".marquee").marquee({
      speed: 30,
      duration: 15000,
      gap: 0,
      delayBeforeStart: 0,
      direction: direction,
      duplicated: true,
      pauseOnHover: true,
      startVisible: true,
      easing: "linear",
    });
  }
  // Call the function to configure the marquee direction
  configureMarqueeDirection();

  /* -----------------------------------------
    widget vertical carousel
    ----------------------------------------- */
  $(".trending-post-carousel").slick({
    dots: false,
    vertical: true,
    speed: 1000,
    autoplay: 100,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    infinite: true,
    verticalSwiping: true,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        verticalSwiping: false,
      },
    },
    ],
  });

  /* -----------------------------------------
    widget slider
    ----------------------------------------- */
  $(".slider-post").slick({
    dots: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    infinite: true,
    rtl: isRTL,
  });

  /* -----------------------------------------
    toggle-button
    ----------------------------------------- */
  $(".menu-toggle").click(function () {
    $(this).toggleClass("show");
  });

  /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
  $(window).on("load resize", function () {
    if ($(window).width() < 992) {
      $(".main-navigation")
      .find("li")
      .last()
      .bind("keydown", function (e) {
        if (e.which === 9) {
          e.preventDefault();
          $("#masthead").find(".menu-toggle").focus();
        }
      });
    } else {
      $(".main-navigation").find("li").unbind("keydown");
    }
  });

  var primary_menu_toggle = $("#masthead .menu-toggle");
  primary_menu_toggle.on("keydown", function (e) {
    var tabKey = e.keyCode === 9;
    var shiftKey = e.shiftKey;

    if (primary_menu_toggle.hasClass("show")) {
      if (shiftKey && tabKey) {
        e.preventDefault();
        $(".main-navigation").toggleClass("toggled");
        primary_menu_toggle.removeClass("show");
      }
    }
  });

  $(".header-search-wrap")
  .find(".search-submit")
  .bind("keydown", function (e) {
    var tabKey = e.keyCode === 9;
    if (tabKey) {
      e.preventDefault();
      $(".search-icon").focus();
    }
  });

  $(".search-icon").on("keydown", function (e) {
    var tabKey = e.keyCode === 9;
    var shiftKey = e.shiftKey;
    if ($(".header-search-wrap").hasClass("show")) {
      if (shiftKey && tabKey) {
        e.preventDefault();
        $(".header-search-wrap").removeClass("show");
        $(".search-icon").focus();
      }
    }
  });

  /* -----------------------------------------
    header-search-bar
    ----------------------------------------- */
  var searchWrap = $(".header-search-wrap");
  $(".search-icon").click(function (e) {
    e.preventDefault();
    searchWrap.toggleClass("show");
    searchWrap.find("input.search-field").focus();
  });
  $(document).click(function (e) {
    if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
      $(".header-search-wrap").removeClass("show");
    }
  });

  /* -----------------------------------------
    ideal-magazine-scroll-to-top-button
    ----------------------------------------- */

  var ideal_magazine_scroll_btn = $(".scroll-to-top");

  $(window).scroll(function () {
    if ($(window).scrollTop() > 400) {
      ideal_magazine_scroll_btn.addClass("show");
    } else {
      ideal_magazine_scroll_btn.removeClass("show");
    }
  });

  ideal_magazine_scroll_btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate(
    {
      scrollTop: 0,
    },
    "300"
    );
  });
});
