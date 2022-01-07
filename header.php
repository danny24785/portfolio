<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'left' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="main-site-wrapper">

    <header class="header-website">
        
        <div class="branding">
            <a href="<?php echo get_home_url(); ?>"><h2><?php echo get_bloginfo( 'name' ); ?></h2></a>
        </div>

        <div class="main-nav">
            <?php wp_nav_menu( array( 
                'theme_location' => 'Hoofdmenu', 
                'container' => false
            )); ?>
        </div>

    </header>

    <div class="content-sidebar-wrapper">
        <main>