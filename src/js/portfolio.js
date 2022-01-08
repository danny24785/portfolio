jQuery(document).ready(function ($) {
    
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
});