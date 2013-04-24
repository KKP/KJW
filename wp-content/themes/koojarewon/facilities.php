<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * Template Name: Page facilities
 * Author: nguyenthanhictu@gmail.com coder
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
		<div id="container">
			<div id="content" role="main">
            <?php query_posts( 'cat=13&posts_per_page=5' ); ?>
			<?php if (have_posts()) : ?>
               <?php while (have_posts()) : the_post(); ?>    
                    <div id="facility">
                        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        <div id="background_for_image">
                            <?php the_post_thumbnail();?>
                        </div>
                        <?php the_content();?>
                    </div>
               <?php endwhile; ?>
                 <?php endif; wp_reset_query();?>
                 

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
