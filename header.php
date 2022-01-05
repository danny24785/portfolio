<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'left' ); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<header class="header-website">
    
Header website

    <div class="main-nav">
        <?php wp_nav_menu( array( 
            'theme_location' => 'Hoofdmenu', 
            'container' => false
        )); ?>
    </div>

</header>

<div class="main-site-wrapper">
    <div class="main-site-wrapper-inner">
        <main>