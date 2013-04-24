
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/tuan_style.css"/>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/process.js"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="text_header">
    <div class="text_header_margin">
         <div class="text_header1">
			 <?php
                    $my_id1 = 145;
                    $post_id_8 = get_post($my_id1); 
                    echo $title3d = $post_id_8->post_content;
            ?>  
    	 </div>
         <div class="text_header_right"><p>Contact Us on:(07) 4630 8118</p></div>
    </div>
</div>
<div id="wrapper" class="hfeed">
	<div id="header">
        <div id="header_top">
            <div id="logo">
            <a href="<?php echo home_url( '/' ); ?>"><img src="<?php if ( function_exists( 'get_option_tree') ) {get_option_tree( 'id_logo', '', true );}?>"/></a>
            </div>
            <div id="menu">
                <?php $params = array( 
                           'theme_location'  =>'primary',
                           'limit'  => 5,
                           'format' => 'custom',
                           'link_before' => '<span>',
                           'link_after'  => '</span>' );
                    wp_nav_menu($params); 
                ?>
            </div>
        </div>
        <div id="header_bottom">
            <div id="slider_nivo">
                <?php if ( function_exists('show_nivo_slider') ) { show_nivo_slider(); } ?>
            </div>
            <div id="sidebar_header">
                <?php
                    $my_id = 30;
                    $post_id_7 = get_post($my_id); 
                ?>  
                            <h3 class="title_sidebar_header"><?php  echo $title = $post_id_7->post_title;?></h3>  
                            <div class="thumbnail_sidebar_header"><?php echo get_the_post_thumbnail(30); ?>  </div>                     
                            <p class="content_sidebar_header"><?php echo $title2 = $post_id_7->post_content;?></p>
                            <div id="div_image_for_more_about">
                                <a class="more_about1" href="<?php echo $permalink = get_permalink(30); ?> ">More About Us</a>
                                <a class="more_about2" href="<?php echo $permalink = get_permalink(19); ?>">Contact Us</a>
                            </div>                            
            </div>
        </div>
    <div id="header_for_page">
            <div id="title_for_page">
                <?php if (have_posts()) : ?>
                   <?php while (have_posts()) : the_post(); ?>    
                        <?php the_title();?>
                   <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div id="join_us">
                <p id="Text_Joinus">Join Us &nbsp;</p>
                <div id="join_us_icon">
                    <?php
                	if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
                		<div id="secondary" class="widget-area" role="complementary">
                			<ul class="xoxo_3">
                				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                			</ul>
               		</div><!-- #secondary .widget-area -->
                            
                    <?php endif; ?>
                </div>
            </div>
    </div><!-- #header_for_page -->
	</div><!-- #header -->
    
	<div id="main">
