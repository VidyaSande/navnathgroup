(function($) {
  "use strict";

  var $body = $('html, body');
  var revapi5;


	var blogIsotope = function() {
    var imgLoad = imagesLoaded($('.blog-masonry'));

    imgLoad.on('done', function(){
      $('.blog-masonry').isotope({
        "itemSelector": ".post-masonry",
      });
     });
   
   imgLoad.on('fail', function(){
      $('.blog-masonry').isotope({
        "itemSelector": ".post-masonry",
      });
   });  
     
  };
  blogIsotope();
             
  

  if ($('.back-to-top').length) {
    var scrollTrigger = 100, // px
    backToTop = function () {
      var scrollTop = $(window).scrollTop();
      if (scrollTop > scrollTrigger) {
        $('.back-to-top').addClass('show');
      } else {
        $('.back-to-top').removeClass('show');
      }
    };
    
    $(window).on('scroll', function () {
        backToTop();
    });
    $('.back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
          scrollTop: 0
        }, 700);
    });
  }



  var initSuperFish = function() {
    
    $(".sf-menu").superfish({
      delay: 400,
      animation: {opacity:'show', height:'show'},
      speed: 'fast',
      autoArrows: true,
      speedOut: 'fast',
      disableHI: true
    });
    
    // Replace SuperFish CSS Arrows to Font Awesome Icons
    $('.main-nav > ul.sf-menu > li').each(function(){
      $(this).find('.sf-with-ul').append('<i class="fa fa-angle-down"></i>');
    });
  }
  
  initSuperFish();



  // Filter Projects
  var projectsFilter = function() {
    var filter = $('.projects-filter'),
      portfolioGrid = $('.projects-grid');

    portfolioGrid.imagesLoaded(function(){
        portfolioGrid.isotope({
          itemSelector: '.project-item',
          layoutMode: 'masonry',
          masonry: { 
            columnWidth: '.project-item',
            //isFitWidth: true
          }
      });
    });

    var filterFns = {
        // show if number is greater than 50
        numberGreaterThan50: function() {
          var number = $(this).find('.number').text();
          return parseInt( number, 10 ) > 50;
        },
        // show if name ends with -ium
        ium: function() {
          var name = $(this).find('.name').text();
          return name.match( /ium$/ );
        }
    };

    filter.on('click', 'a', function() {
      var filterValue = $( this ).attr('data-filter');
      // use filterFn if matches value
      filterValue = filterFns[ filterValue ] || filterValue;
      portfolioGrid.isotope({ filter: filterValue });
      return false;
    });

    filter.each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on('click', 'a', function() {
          $buttonGroup.find('.active').removeClass('active');
          $( this ).addClass('active');
      });
    });

  }

  projectsFilter();


  var owlSlider = function() {

    var sliders = $('.owl-slider');
    if (sliders.length) {
      sliders.each(function(){
        var slider = $(this);
        slider.owlCarousel({
          singleItem:true,
          loop: true,
          autoplay: false,
          autoHeight: true,
          pagination: false,
          navigation : true,
          navigationText: [
            '<span class="prev-icon"><i class="fa fa-angle-left"></i></span>',
            '<span class="next-icon"><i class="fa fa-angle-right"></i></span>'
          ]
        });
      });
    }
  }

  owlSlider();

  $('.lightbox').nivoLightbox({
    keyboardNav: true,
  }); 

  $(".video-content").fitVids();

  $('textarea').autogrow(); 

  new WOW().init();

  $(".animsition").animsition({
    inClass               :   'fade-in',
    outClass              :   'fade-out',
    inDuration            :    800,
    outDuration           :    500,
    // linkElement           :   '.animsition-link',
    // linkElement           :   'a:not([target="_blank"]):not([href^=#]):not([data-rel*="lightcase"]):not([class*="no-redirect"])',
    loading               :    true,
    loadingParentElement  :   'body', //animsition wrapper element
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
                  '-webkit-animation-duration',
                  '-o-animation-duration'
                ],
    overlay               :   false,
    overlayClass          :   'animsition-overlay-slide',
    overlayParentElement  :   'body'
  });



  var mobileHeader = function() {
    var navigationToggle = $('.mobile-header .mobile-menu-toggle'),
      navToggleLink = navigationToggle.find('a'),
      mobileNav = $('.mobile-header .mobile-navigation'),
      dropToggle = $(".mobile-navigation .expander, .mobile-navigation a[href*='#']"),
      animTime = 200;


    var $nav = $('.mobile-navigation'),
      $button = $('#toggle-nav');

    $button.on('click', function (e) {
      var isActivating = !$nav.hasClass('active');

      $(this).toggleClass('active', isActivating);

      $nav.toggleClass('active').fadeToggle(300, function () {
          $nav.scrollTop(0);
      });

      $body.trigger(isActivating ? 'lock' : 'unlock');
    });

    if(dropToggle.length) {
      dropToggle.each(function() {
        $(this).on('tap click', function(e) {
          var dropToggleOpen = $(this).nextAll('ul').first();

          if(dropToggleOpen.length) {
            e.preventDefault();

            var dropParent = $(this).parent('li');

            if(dropToggleOpen.is(':visible')) {
              dropToggleOpen.slideUp(animTime);
              dropParent.removeClass('dropdown-open');
            } else {
              dropToggleOpen.slideDown(animTime);
              dropParent.addClass('dropdown-open');
            }

          }

        });
      });
    }

  }

  mobileHeader();



  // Mobile Header Scroller
  var mobileNavScroller = function() {
    var mobileMenuWrapper = $('.mobile-nav-content');
    if(mobileMenuWrapper.length){    
      mobileMenuWrapper.niceScroll({ 
        scrollspeed: 60,
        mousescrollstep: 40,
        cursorwidth: 0, 
        cursorborder: 0,
        cursorborderradius: 0,
        cursorcolor: "#eee",
        autohidemode: false, 
        horizrailenabled: false 
      });
    }
  }

$('.thumbnail').click(function(){
      $('.modal-body').empty();
    var title = $(this).parent('a').attr("title");
    $('.modal-title').html(title);
    $($(this).parents('div').html()).appendTo('.modal-body');
    $('#myModal').modal({show:true});

});
 revapi5 = $('#slider-1').show().revolution({
          sliderType: 'standard',
          sliderLayout: 'auto',
          jsFileLocation: '',
          dottedOverlay: 'none',
          delay: 5000,
          lazyType:"none",
          navigation: {
            keyboardNavigation:"off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation:"off",
              mouseScrollReverse:"default",
            onHoverStop:"off",
            touch:{
              touchenabled:"on",
              swipe_threshold: 0.7,
              swipe_min_touches: 1,
              swipe_direction: "horizontal",
              drag_block_vertical: false
            }
            ,
            arrows: {
              style:"uranus",
              enable:true,
              hide_onmobile:false,
              hide_onleave:true,
              hide_delay:200,
              hide_delay_mobile:1200,
              tmp:'',
              left: {
                h_align:"left",
                v_align:"center",
                h_offset:20,
                v_offset:0
              },
              right: {
                h_align:"right",
                v_align:"center",
                h_offset:20,
                v_offset:0
              }
            }
            ,
            bullets: {
              enable:true,
              hide_onmobile:false,
              style:"hermes",
              hide_onleave:false,
              direction:"horizontal",
              h_align:"center",
              v_align:"bottom",
              h_offset:0,
              v_offset:20,
              space:5,
              tmp:''
            }
          },
          parallax: {
            type:"mouse",
            origo:"enterpoint",
            speed:6000,
            levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],
            type:"mouse",
          },
          visibilityLevels:[1240,1024,778,480],
          gridwidth:1170,
          gridheight:840,
          shadow:0,
          spinner:"spinner0",
          stopLoop:"off",
          stopAfterLoops:-1,
          stopAtSlide:-1,
          shuffle:"off",
          autoHeight:"off",
          fullScreenAutoWidth:"off",
          fullScreenAlignForce:"off",
          fullScreenOffsetContainer: "",
          fullScreenOffset: "",
          disableProgressBar:"on",
          hideThumbsOnMobile:"off",
          hideSliderAtLimit:0,
          hideCaptionAtLimit:0,
          hideAllCaptionAtLilmit:0,
          debugMode:false,
          fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
          }
        });
 
        $("#myCarousel").carousel();

// Enable Carousel Indicators
$(".item").click(function(){
    $("#myCarousel").carousel(1);
});

// Enable Carousel Controls
$(".left").click(function(){
    $("#myCarousel").carousel("prev");
});
 $('.carousel').carousel({
      interval: 1000
    })

})(jQuery);

