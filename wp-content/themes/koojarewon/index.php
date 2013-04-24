<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>
<div id="main_col">
		<div id="container">
			<div id="container_left">
                    <?php
                            function custom_excerpt_length2( $length ) {
                            	return 200;
                            }
                            add_filter( 'excerpt_length', 'custom_excerpt_length2', 999 );
                        ?>
                <?php query_posts($query_string . '&cat=5&posts_per_page=1'); ?>
                <?php if (have_posts()) : ?>
                    	<?php while (have_posts()) : the_post(); ?>    
                            <h3 class="title_sidebar_header"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>  
                            <div class="thumbnail_sidebar_header"><?php the_post_thumbnail();?></div>                     
                            <div class="content_sidebar_header"><?php global $more;$more = 0;the_content("More...");?></div>                            
                    	<?php endwhile; ?>              
                <?php endif; ?>
                <?php 
                    remove_filter( 'the_excerpt', 'custom_excerpt_length2' );
                ?>
            </div>
            <div id="container_right">
                <?php
                    function custom_excerpt_length1( $length ) {
                    	return 29;
                    }
                    add_filter( 'excerpt_length', 'custom_excerpt_length1', 999 );
                ?>
                <?php query_posts($query_string . '&cat=6&posts_per_page=2'); ?>
                    <?php if (have_posts()) : ?>
                    	<?php while (have_posts()) : the_post(); ?>    
                            <h3 class="title_sidebar_header"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>  
                            <div class="thumbnail_sidebar_header"><?php the_post_thumbnail();?></div>                     
                            <div class="content_sidebar_header"><?php the_excerpt();?></div>                            
                    	<?php endwhile; ?>              
                <?php endif; ?>
                <?php 
                    remove_filter( 'the_excerpt', 'custom_excerpt_length1' );
                ?>
            </div>
		</div><!-- #container -->

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
