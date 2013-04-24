<div id="sidebar">
    <div id="menu_sidebar">
        <h2>Others Connected to Us</h2> 
        <p><?php
                    $my_id3 = 149;
                    $post_id_9 = get_post($my_id3); 
                    echo $title9 = $post_id_9->post_content;
            ?> </p>
        <div id="content_menu_sidebar">
            <?php $params = array( 
                           'theme_location'  =>'secondary',
                           'limit'  => 5,
                           'format' => 'custom',
                           'link_before' => '<span>',
                           'link_after'  => '</span>' );
                    wp_nav_menu($params); 
            ?>
        </div>
    </div>
    <div id="calendar_top">
        <h2 class="title_calendar"><a href="<?php echo home_url( '/' ); ?>?page_id=19">Make A Reservation</a></h2>
        <div id="content_calendar">
             <?php
            		if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
            		<div id="secondary" class="widget-area" role="complementary">
            			<ul class="xoxo">
            				<?php dynamic_sidebar( 'primary-widget-area' ); ?>
            			</ul>
            		</div><!-- #secondary .widget-area -->
            
            <?php endif; ?>
        </div>
    </div>
    <div id="gallery_lighbox">
        
        <div id="content_calendar">
            <?php
            	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
            		<div id="secondary" class="widget-area" role="complementary">
            			<ul class="xoxo_2">
            				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
            			</ul>
            		</div><!-- #secondary .widget-area -->
            
            <?php endif; ?>
        </div>
    </div>
</div>
