
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
    });

    let windowHeight = Math.round( $(window).height() );
 
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
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }
    });
});