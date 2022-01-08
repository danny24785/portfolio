jQuery(document).ready(function ($) {
    
    /**
     * 
     * Mobile menu
     * 
     */

    // Hamburger menu button
    $('#hamburger-btn').on('click', function(){
        $('#mobile-menu-overlay').show();
        $(this).hide();
    });

    // Close mobile menu button
    $('#close-btn').on('click', function(){
        $('#mobile-menu-overlay').hide();
        $('#hamburger-btn').show();
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
});