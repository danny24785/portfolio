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

    let lastScrollTop = 0;
	
    // On init
    $(window).on('scroll', function () {
        schrinkHeader();
        scrollUpDown();
    });
 
    // Add/remove classes based on page position
    function schrinkHeader() {
        if($(this).scrollTop() > 400 && !$('.header-website').hasClass('js-shrink')) {
            $('.header-website').addClass('js-shrink');
            $('#sticky-container').addClass('scrolled-down');
        } else {
            if($(this).scrollTop() < 200) {
                $('.header-website').removeClass('js-shrink');
                $('#sticky-container').removeClass('scrolled-down');
            }
        }

    }
     
    // Don't show sticky header when window is being scrolled down
    function scrollUpDown() {
         
        let st = $(this).scrollTop();
        let headerElement = '#sticky-container';
        let headerElementHeight = $('.header-website').height() + 'px';

        st > lastScrollTop
            ? $(headerElement).css('top', ('-' + headerElementHeight))
            : $(headerElement).css('top', '0')
        
        lastScrollTop = st;
    }

    // // Fade in effect content
    // $('#content-sidebar-wrapper')
    //     .css('display', 'flex')
    //     .hide()
    //     .fadeIn(500);

    

    $('#content-sidebar-wrapper').load().animate({
        opacity: 1,
        marginTop: 0
    }, 500, 'swing');

    
});