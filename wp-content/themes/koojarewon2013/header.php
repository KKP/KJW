<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name');?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/style.css" />
<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.ie.js" type="text/javascript"></script>
<![endif]-->
</head>
<body <?php body_class(); ?>>
<div id="topbar">
    <div class="inner">
        <span class="left intro">Lorem ipsum dolor sit amet consectetur adipiscing elit.Lorem ipsum dolor sit amet consectetur. <a href="#">Keep Reading</a></span>
        <span class="right phone">Contact Us On: (07) 4630 8118</span>
        <div class="clear"></div>
    </div>
</div><!-- #topbar -->

<div id="header">
    <div class="inner">
        <h1 id="logo"><a href="<?php bloginfo('home');?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'description' ); ?>" /></a></h1>
        <?php wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container' => 'div',
            'container_id' => 'menu',
            'menu_id' => '',
            'menu_class' => '',
        ));?>
    </div>
</div><!-- #header -->