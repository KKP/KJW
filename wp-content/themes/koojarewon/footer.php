<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->
</div><!-- #wrapper -->
<div id="footer" role="contentinfo">
			<div id="content_footer">
                <div id="footer_left">
					<div class="logo_footer"> </div>
                    <p>P.O Box 1234<br />
                    Borghardt Road Highfields, QLD 4352<br />
                    (07) 4630 8118 | Fax: (123) 345-6789<br />
                    Email: info@koojarewon.com</p>
                    <div id="follow_us">
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
                <div id="footer_center">
                    <div id="show_title_category">
                        <!-- category-title -->
                           <?php
                            	if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
                            		<div id="secondary" class="widget-area" role="complementary">
                            			<ul class="xoxo_2">
                            				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                            			</ul>
                            		</div><!-- #secondary .widget-area -->
                            
                            <?php endif; ?>
                    </div>
                </div>
                <div id="footer_right">
                    <h1>Quick Contact</h1>
                    <?php query_posts($query_string . '&cat=8'); ?>
                    <?php if (have_posts()) : ?>
                    	<?php while (have_posts()) : the_post(); ?>                           
                            <?php 
             		             the_content();
                            ?>                              
                    	<?php endwhile; ?>              
                    <?php endif; ?>
                </div>
            </div>
</div><!-- #footer -->
<div class="copy_web">
		<div class="footer-copy">
				<p>&copy; 2012 Koojarewon Lutheran Camp. All rights reserved</p>
		</div>
</div>
<div class="load_images" style="display: none;">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/b1.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/b2.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/b3.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/b4.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/b5.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ab1.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ab2.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ab3.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ab4.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ab5.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/c1.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/c2.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/c3.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/c4.png"/>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/c5.png"/>
</div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
