 // Initialize Owl Carousel Plugin
 //new WOW().init();

 $(function(){ 
    
    //owl-carousel
    var heroSlider = $('.home-slider');
    heroSlider.owlCarousel({
        loop: true,
        items: 1,
        nav: true,
        dots: false,
        autoplay: false,
        autoplayTimeOut: 5000, //5sec
        navText:['<i class="ri-arrow-left-s-line"></i>','<i class="ri-arrow-right-s-line"></i>'], 
        //we will be using font awesome icon here
    });

    heroSlider.on("changed.owl.carousel", function(event){
        // selecting the current active item
        var item = event.item.index-2;
        // first removing animation for all captions
         
        $('.kids-caption').removeClass('animated fadeInDown');
        $('.kids-second-image').removeClass('animated fadeInRightSmall');
        $('.owl-item').not('.cloned').eq(item).find('.kids-caption').addClass('animated fadeInDown');
        $('.owl-item').not('.cloned').eq(item).find('.kids-second-image').addClass('animated fadeInRightSmall');
    });

    // No animation in other captions so we need to add animation to owl-item while slide changed.

    var kidsRutine = $('.kids-rutine');
    kidsRutine.owlCarousel({
        loop: true,
        //items: 3,
        nav: false,
        dots: true,
        autoplay: false,
        autoplayTimeOut: 5000, //5sec
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
                loop:false
            }
        }
    });

    /// Education Single Program 

    var educationSingleProgram = $('.education_signle_program');
    educationSingleProgram.owlCarousel({
        loop: true,
        thumbs: true,
        items: 1,
        nav: true,
        dots: false,
        responsiveClass: true, 
        autoplayHoverPause: true,
        autoplay: true,
        slideSpeed: 1000,
        paginationSpeed: 900,
        thumbsPrerendered: true,
        autoplayTimeout: 3000,
        navText:['<i class="ri-arrow-left-s-line"></i>','<i class="ri-arrow-right-s-line"></i>']
    });
    // Latest Blog 

    var latestBlog = $('.latest-blog');
    latestBlog.owlCarousel({
        loop: true,
        //items: 3,
        nav: false,
        dots: true,
        autoplay: false,
        autoplayTimeOut: 5000, //5sec
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
                loop:false
            }
        }
    });

    // Testimonial SLider

    var testimonialS = $('.testimonial');
    testimonialS.owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: true,
        autoplay: false,
        autoplayTimeOut: 5000,
        animateOut: 'slideOutLeft',
        animateIn: 'flipInX'
    }); 

    // Teacher SLider

    var ourTeacher = $('.our-teacher-slider');
    ourTeacher.owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: true,
        autoplay: false,
        autoplayTimeOut: 5000,
        animateOut: 'slideOutLeft',
        animateIn: 'flipInX',
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:4,
                nav:true,
                loop:false
            }
        }
    });

    // Main Menu Hover Effect
    /* $('.menu-item-has-children').hover(
        function () {
            $('.sub-menu').animate({ top: 15 }, 'slow');
            //$('.sub-menu').fadeOut();
        },
        function () {
            //$('.sub-menu').hide('slow');
            $('.sub-menu').animate({ left: 0 }, 'slow');
        }
    ); */

    // Second option menu

    /* $('nav.primary-menu ul li .sub-menu').parent().hover(function() {
        var submenu = $(this).children('.sub-menu');
        if ( $(submenu).is(':hidden') ) {
          $(submenu).slideDown(200);
        } else {
          $(submenu).slideUp(200);
        }
      }); */

    


    //Mobile Menu 
    $('.kidsMenu').click( 
        function() {
            $('#mobile_menu_panel').animate({ left: 0 }, 'slow');
            $('.kidsMenu').animate({left: 250 }, 'slow');
        });
    $('.close_mobile').click( 
        function() {
            $('#mobile_menu_panel').animate({ left: -250 }, 'slow');
            $('.kidsMenu').animate({left: 0 }, 'slow');
        }
    );
        
    /* $('.jan ul > .menu-item-has-children').click(function () {
        $('> ul.sub-menu',this).toggle('slow');
        //$('> ul.sub-menu',this).parent().addClass('show-child');
    }); */

    $('.jan ul li .sub-menu').parent().click(function() {
        var submenu = $(this).children('.sub-menu');
        if ( $(submenu).is(':hidden') ) {
          $(submenu).slideDown(200);
        } else {
          $(submenu).slideUp(200);
        }
      });

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $("#wrapper").addClass("header-scrolled");
            $("#header, .kidsMenu").addClass("animated fadeInSmallDown");
            //$("#header").addClass("animated fadeInSmallDown");
        } else {
            $("#wrapper").removeClass("header-scrolled");
            $("#header, .kidsMenu").removeClass("animated fadeInSmallDown");
            //$("#header").removeClass("animated fadeInSmallDown");
        }
    });

});

$(function(){
    //$('ul.sub-menu').hide();
    $('> ul.sub-menu',this).removeClass('animated fadeInUpVerySmall');

    $('nav.primary-menu ul li, ul.sub-menu li').hover(function () {

        if ($('> ul.sub-menu',this).length > 0) {
            //$('> ul.sub-menu',this).stop().slideDown('slow');
            //$('> ul.sub-menu',this).animate({ top: 96 },'fast');
            $('> ul.sub-menu',this).addClass('animated fadeInUpVerySmall');
        }

    },function () {

        if ($('> ul.sub-menu',this).length > 0) {
            //$('> ul.sub-menu',this).stop().slideUp('slow');
            //$('> ul.sub-menu',this).animate({top: 116 },'fast');
            $('> ul.sub-menu',this).addClass('animated fadeInUpVerySmall');
        }

    });

});