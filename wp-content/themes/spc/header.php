<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/foundation/css/app.css" type="text/css" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <script src="<?php bloginfo('template_directory') ?>/js/modernizr.foundation.js"></script>
    <?php wp_head(); ?>
    <!--[if lte IE 8]>
    <![endif]-->
</head>

<body>
<header class="row">
    <?php if(is_home()): ?>
        <h1 class="logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
    <?php else: ?>
        <h3 class="logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h3>
    <?php endif; ?>

    <nav>
        <?php wp_nav_menu('menu=primary&fallback_cb=&container='); ?>
    </nav>
</header>
