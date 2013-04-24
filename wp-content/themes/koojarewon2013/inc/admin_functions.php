<?php

class ThemeNameAdmin
{
    var $templateURL;
    
    var $optionFields = array(
        'contact_thank_page_id',
        'copyright_html',
    );
    
    var $testFields = array(
    
    );
    
    function __construct()
    {
        $this->templateURL = get_bloginfo('template_url');
        
        add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
        add_action('admin_menu', array(&$this, 'admin_menu'));
    	add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
    	add_action('save_post', array(&$this, 'save_post'));

    	// add column to posts screen
    	add_filter('manage_test_posts_columns', array(&$this, 'manage_test_posts_columns'));
    	add_action('manage_test_posts_custom_column', array(&$this, 'manage_test_posts_custom_column'), 10, 2);
    }
    
    function admin_enqueue_scripts()
    {
        global $hook_suffix;
        wp_enqueue_script('jquery');
        if (in_array($hook_suffix, array('post.php', 'post-new.php'))) {
            wp_enqueue_script('post_js', $this->templateURL . '/js/admin.post.js', array('jquery'), false, true);
        }
    }
    
    function admin_menu()
    {
        add_options_page('ThemeName Settings', 'ThemeName Settings', 'manage_options', 'themecode_settings', array(&$this, 'settings'));
    }
    
    function add_meta_boxes()
    {
        add_meta_box('themecode_slider', 'Slider Images', array(&$this, 'metabox_slider'), 'page', 'normal', 'high');
    }
    
    function metabox_slider($post)
    {
        $slider = get_post_meta($post->ID, 'slider', true);
        if (!empty($slider))
        	$slides = unserialize($slider);
        if (!isset($slides['image']))
            $slides = false;
        require_once(TEMPLATEPATH . '/inc/metabox_slider.php');
    }
    
    function save_post($post_id)
    {
        if ( (defined( 'DOING_AUTOSAVE' ) AND DOING_AUTOSAVE)
            OR !current_user_can( 'edit_post', $post_id ) ) return;
            
        $aPostTypes = array(
            'test',
        );
        
        foreach ($aPostTypes as $postType)
        {
            if ( !wp_is_post_revision( $post_id ) AND ($_POST['post_type'] == $postType) ) {
                foreach ($this->{$postType."Fields"} as $field=>$type) {
                    if ($type=='checkbox') {
                        update_post_meta($post_id, $field, isset($_POST[$field]) ? trim($_POST[$field]) : '');
                    } else {
                        if (isset($_POST[$field])) {
                            update_post_meta($post_id, $field, stripslashes(trim($_POST[$field])));
                        }
                    }
                }
            }
        }
        
        if ( !wp_is_post_revision( $post_id ) AND ($_POST['post_type'] == 'page') ) {
            update_post_meta($post_id, 'slider', isset($_POST['slider']) ? serialize($_POST['slider']) : null);
        }
    }
    
    function settings()
    {
        $saved = false;
        if (isset($_POST['action'])) {
            $theme_mods = isset($_POST['theme_mods']) ? $_POST['theme_mods'] : array();
            if (!is_array($theme_mods)) {
            	$theme_mods = array();
            }
            foreach ($this->optionFields as $field)
            {
                set_theme_mod($field, isset($theme_mods[$field]) ? stripslashes($theme_mods[$field]) : '');
            }
            $saved = true;
        }
        
        $themeMods = get_theme_mods();
        require_once(TEMPLATEPATH . '/inc/admin_settings.php');
    }
    
    function manage_test_posts_columns($columns)
    {
        unset($columns['date']);
        $columns['title'] = 'Lawyer';
        $columns['featured_image'] = 'Featured Image';
        return $columns;
    }
    
    function manage_test_posts_custom_column($column_name, $post_id)
    {
        switch ($column_name)
        {
            case 'featured_image':
                if (has_post_thumbnail($post_id)) {
                	echo get_the_post_thumbnail($post_id, 'thumbnail', array('style'=>'width:80px;height:auto;'));
                } else {
                    echo 'Not available';
                }
                break;
        }
    }
}