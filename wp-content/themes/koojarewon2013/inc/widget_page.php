<?php

class PageWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(false, 'Page Excerpt', array(
            'description' => 'A widget that displays the thumbnail and excerpt of a page'
        ), array(
        ));
    }
    
    function widget( $args, $instance )
    {
        extract( $args );
        
        $pageID = (int) $instance['page_id'];
        $title = apply_filters('widget_title', $instance['title']);
?>        
        <?php echo $before_widget;?>
        <?php if ($title) echo $before_title . $title . $after_title; ?>
        
<?php
        if ($pageID) {
            $foo = new WP_Query(array(
                'page_id' => $pageID
            ));
            while ($foo->have_posts()) {
            	$foo->the_post();
?>
            <?php if (has_post_thumbnail()) : ?>
                <p><a href="<?php the_permalink();?>"><?php the_post_thumbnail('kjw_300x110'); ?></a></p>
            <?php endif; ?>
                <?php the_excerpt_rss();?><br />
                <a href="<?php the_permalink();?>" title="Read more">Read more &rarr;</a>
<?php
            }
        }
?>
        
        <?php echo $after_widget;?>
<?php
    }
    
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['page_id'] = intval($new_instance['page_id']);
        
        return $instance;
    }
    
    function form( $instance )
    {
        $defaults = array(
            'title' => '',
            'page_id' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'page_id' ); ?>">Page</label>
            <?php wp_dropdown_pages(array(
                'show_option_none' => '---',
                'option_none_value' => 0,
                'selected' => $instance['page_id'],
                'id' => $this->get_field_id( 'page_id' ),
                'name' => $this->get_field_name( 'page_id' ),
            ))?>
        </p>
<?php
    }
}