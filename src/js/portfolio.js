
var headerSwiper;

jQuery(document).ready(function ($) {
    
    /**
     * 
     * Mobile menu
     * 
     */

    // Hamburger menu button
    $('#hamburger-btn').on('click', function(){
        $('#mobile-menu-overlay').animate({
            left: 0,
            opacity: 1
        }, 150, 'swing');
        $('#mobile-menu-overlay ul li').delay(100).animate({
            marginLeft: 0,
            opacity: 1
        }, 150, 'swing');
    });

    // Close mobile menu button
    $('#close-btn').on('click', function(){
        $('#mobile-menu-overlay').delay(100).animate({
            left: '-100vw',
            opacity: 0
        }, 100, 'swing');
        $('#mobile-menu-overlay ul li').animate({
            marginLeft: '-10rem',
            opacity: 0
        }, 100, 'swing');
    });

    
    /**
     * 
     * Sticky header
     * 
     */
	
    // On init
    $(window).on('scroll', function () {
        styleHeaderScrollDown(50, 25);
        showOnScrollUp();
        scrollInView('.entry-content p');
        scrollInView('.entry-content ul');
        scrollInView('.entry-content ol');
        scrollInView('.entry-content img');
        scrollInView('.entry-content h2');
        scrollInView('.entry-content h3');
        scrollInView('.entry-content h4');
        // scrollInView('h1.entry-title');
        // scrollInView('#footer-website'); 
        // scrollInView('.frm_form_field');
    });

    $(window).on('load', function () {
        scrollInView('.entry-content p');
        scrollInView('.entry-content ul');
        scrollInView('.entry-content ol');
        scrollInView('.entry-content img');
        scrollInView('.entry-content h2');
        scrollInView('.entry-content h3');
        scrollInView('.entry-content h4');
        // scrollInView('h1.entry-title');
        // scrollInView('#footer-website');
        // scrollInView('.frm_form_field');
        // scrollInView('.swiper-container');
        // scrollInView('.header-website');
    });
 
    // Add/remove classes based on page position
    function styleHeaderScrollDown(whenToAdd, whenToRemove) {
        if($(this).scrollTop() > whenToAdd && !$('.sticky-container-content').hasClass('js-shrink')) {
            $('.sticky-container-content').addClass('js-shrink');
            $('#sticky-container, #headerSwiper').addClass('scrolled-down');
        } else {
            if($(this).scrollTop() < whenToRemove) {
                $('.sticky-container-content').removeClass('js-shrink');
                $('#sticky-container, #headerSwiper').removeClass('scrolled-down');
            }
        }

    }

    let lastScrollTop = 0;
     
    // Don't show sticky header when window is being scrolled down
    function showOnScrollUp() {
         
        let st = $(this).scrollTop();
        let headerElement = '#sticky-container';
        let headerElementHeight = $('.sticky-container-content').height() + 'px';

        st > lastScrollTop
            ? $(headerElement).css('top', ('-' + headerElementHeight))
            : $(headerElement).css('top', '0')
        
        lastScrollTop = st;
    }


    /**
     * 
     * Swiper
     * 
     */

    headerSwiper = new Swiper('.swiper-container', {
        direction: 'horizontal',
        loop: true, 
        grabCursor: true,
        autoplay: {
            delay: 5000,
        },
        speed: 600,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints: {
            1921: {
                slidesPerView: 3,
                spaceBetween: 20
            }
        }
    });

    /**
     * 
     * Load elements when they scroll into view
     * 
     */
    function scrollInView(element) { 
        // '#content-sidebar-wrapper'
        let top_of_element = $(element).offset().top;
        let bottom_of_element = $(element).offset().top + $(element).outerHeight();
        let bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
        let top_of_screen = $(window).scrollTop();
    
        //  && (top_of_screen < bottom_of_element)

        if ((bottom_of_screen > top_of_element && (top_of_screen < bottom_of_element))){
            setTimeout(function() {
                $(element).css({
                    'opacity': 1,
                    'transition': '0.6s all ease-in-out',
                    'padding-top': '0'
                });
            }, 250);
        } /* else {
            setTimeout(function() {
                $(element).css({
                    'opacity': 0,
                    'transition': 'none',
                    'padding-top': '2rem'
                });
            }, 250);
        } */
    }

    /**
     * 
     * Smooth scroll when anchor tag is clicked
     * 
     */
    let animationSpeed = 400;

    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
    
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, animationSpeed);
    });


    /**
     * 
     * Scroll to top
     * 
     */
    window.onscroll = function() {
		scroll_function();
	}

	$('#scroll_top_btn').on('click', function(){
  		$("html, body").animate({ scrollTop: 0 }, animationSpeed);
	});

    function scroll_function() {
		if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			$('.btn_scroll_top').css('opacity', '1');
		} else {
			$('.btn_scroll_top').css('opacity', '0');
		}
	}

});