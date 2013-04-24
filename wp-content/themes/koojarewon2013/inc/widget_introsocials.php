<?php

class IntroSocialsWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(false, 'Intro & Socials', array(
            'description' => 'A widget that displays the introduction & social links'
        ), array(
            'width' => 300,
        ));
    }
    
    function widget( $args, $instance )
    {
        extract( $args );
        
        $image_url = $instance['image_url'];
        $introtext = $instance['introtext'];
        $show_socials = isset( $instance['show_socials'] ) ? $instance['show_socials'] : false;
        $title = $instance['title'];
        $twitter_url = $instance['twitter_url'];
        $facebook_url = $instance['facebook_url'];
        $vimeo_url = $instance['vimeo_url'];
        $linkedin_url = $instance['linkedin_url'];
?>        
        <?php echo $before_widget;?>
        
    <?php if (!empty($image_url)) : ?>
        <img src="<?php echo $image_url;?>" />
    <?php endif; ?>
        
        <div class="introsocial">
            <p><?php echo nl2br($introtext)?></p>
        <?php if ($show_socials) : ?>
            <?php echo $before_title . $title . $after_title ?>
            <ol>
            <?php if (!empty($twitter_url)) : ?>
                <li><a class="tt" href="<?php echo $twitter_url?>">Follow us on Twitter</a></li>
            <?php endif; ?>
            <?php if (!empty($facebook_url)) : ?>
                <li><a class="fb" href="<?php echo $facebook_url?>">Join us on Facebook</a></li>
            <?php endif; ?>
            <?php if (!empty($vimeo_url)) : ?>
                <li><a class="vm" href="<?php echo $vimeo_url?>">Watch our video on Vimeo</a></li>
            <?php endif; ?>
            <?php if (!empty($linkedin_url)) : ?>
                <li><a class="li" href="<?php echo $linkedin_url?>">Connect with us on Linkedin</a></li>
            <?php endif; ?>
            </ol>
        <?php endif; ?>
        </div>
        
        <?php echo $after_widget;?>
<?php
    }
    
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['image_url'] = $new_instance['image_url'];
        $instance['introtext'] = $new_instance['introtext'];
        $instance['show_socials'] = $new_instance['show_socials'];
        $instance['twitter_url'] = $new_instance['twitter_url'];
        $instance['facebook_url'] = $new_instance['facebook_url'];
        $instance['vimeo_url'] = $new_instance['vimeo_url'];
        $instance['linkedin_url'] = $new_instance['linkedin_url'];
        
        return $instance;
    }
    
    function form( $instance )
    {
        $defaults = array(
            'title' => '',
            'image_url' => '',
            'introtext' => '',
            'show_socials' => true,
            'twitter_url' => '',
            'facebook_url' => '',
            'vimeo_url' => '',
            'linkedin_url' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
?>
        <p>
            <label for="<?php echo $this->get_field_id( 'image_url' ); ?>">Image URL</label>
            <input type="text" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" value="<?php echo $instance['image_url']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'introtext' ); ?>">Intro Text</label>
            <textarea id="<?php echo $this->get_field_id( 'introtext' ); ?>" name="<?php echo $this->get_field_name( 'introtext' ); ?>" class="widefat" rows="5"><?php echo $instance['introtext']; ?></textarea>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_socials'], true); ?> id="<?php echo $this->get_field_id( 'show_socials' ); ?>" name="<?php echo $this->get_field_name( 'show_socials' ); ?>" value="1" /> 
            <label for="<?php echo $this->get_field_id( 'show_socials' ); ?>">Show Social Links</label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Social Links Title</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>">Twitter URL</label>
            <input type="text" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" value="<?php echo $instance['twitter_url']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>">Facebook URL</label>
            <input type="text" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" value="<?php echo $instance['facebook_url']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'vimeo_url' ); ?>">Vimeo URL</label>
            <input type="text" id="<?php echo $this->get_field_id( 'vimeo_url' ); ?>" name="<?php echo $this->get_field_name( 'vimeo_url' ); ?>" value="<?php echo $instance['vimeo_url']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>">Linkedin URL</label>
            <input type="text" id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" value="<?php echo $instance['linkedin_url']; ?>" class="widefat" />
        </p>
<?php
    }
}