<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'left' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="mobile-menu-overlay" class="mobile-menu-overlay">
    <div class="mobile-menu-inner">
        <div id="close-btn" class="close-btn">
            <ion-icon name="close-circle-outline"></ion-icon>
        </div>
        <div class="main-nav">
            <?php wp_nav_menu( array( 
                'theme_location' => 'Hoofdmenu', 
                'container' => false
            )); ?>
        </div>
    </div>
</div>

<div class="main-site-wrapper">

    <div id="sticky-container">
        <header class="header-website sticky-container-content">
            
            <div class="branding">
                <a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
            </div>

            <div class="main-nav">
                <?php wp_nav_menu( array( 
                    'theme_location' => 'Hoofdmenu', 
                    'container' => false
                )); ?>

                <div id="hamburger-btn" class="hamburger-btn">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>

        </header>

    </div>

    <div class="header-swiper" id="headerSwiper">
        <?php echo do_shortcode('[portfolio-header-texts]'); ?>
    </div>

    <div class="video-container">
        <video id="header-video" loop muted autoplay playsinline>
            <source src="/wp-content/themes/portfolio/assets/video/coding-background.mp4">
        </video>
    </div>

    <div class="arrow-down"><a href="#intro"></a></div>
    


    <div id="content-sidebar-wrapper" class="content-sidebar-wrapper">
        <main>