<?php
require(TEMPLATEPATH . '/inc/admin_functions.php');

class Koojarewon
{
    var $themeMods;
    var $templateURL;
    
    function __construct()
    {
        $this->templateURL = get_bloginfo('template_url');
        $this->themeMods = get_theme_mods();
        
        add_post_type_support('page', 'excerpt');
        add_theme_support('post-thumbnails');
        add_image_size('kjw_300x110', 300, 110, true);
        add_image_size('kjw_660x', 660, 0, false);
        
        add_action('init', array(&$this, 'init'));
        add_action('widgets_init', array(&$this, 'widgets_init'));
        add_action('wp_enqueue_scripts', array(&$this, 'wp_enqueue_scripts'));
        
        add_shortcode('KJW_CONTACT_FORM', array(&$this, 'shortcode_contact_form'));
        add_filter( 'widget_text', 'shortcode_unautop');
        add_filter( 'widget_text', 'do_shortcode', 11);
        
        add_action('wp_ajax_kjw_submit_contact', array(&$this, 'submit_contact'));
        add_action('wp_ajax_nopriv_kjw_submit_contact', array(&$this, 'submit_contact'));
    }
    
    function init()
    {
    }
    
    function widgets_init()
    {
        // register menus, sidebars
        register_nav_menu('main-menu', 'Main Menu');
        register_sidebar(array(
            'name' => 'Homepage Sidebar',
            'id' => 'homepage-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => 'Homepage Center Widgets',
            'id' => 'homepage-widgets',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => 'Default Sidebar',
            'id' => 'default-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => 'Footer Widgets',
            'id' => 'footer-widgets',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title">',
            'after_title' => '</h3>',
        ));
        
        require(TEMPLATEPATH . '/inc/widget_page.php');
        register_widget( 'PageWidget' );
        
        require(TEMPLATEPATH . '/inc/widget_introsocials.php');
        register_widget( 'IntroSocialsWidget' );
    }
    
    function wp_enqueue_scripts()
    {
        wp_enqueue_script('jquery');
        $jsObject = array(
            'ajaxurl' => admin_url('admin-ajax.php')
        );
        wp_localize_script('jquery', 'kjw', $jsObject);
        wp_enqueue_script('kjw', $this->templateURL . '/js/main.js', array('jquery'), false, true);
        
        if (is_page_template('template-home.php')) {
            wp_enqueue_script('caroufredsel', $this->templateURL . '/js/jquery.carouFredSel-6.2.0-packed.js', array('jquery'));
            wp_enqueue_script('lawbd-landing', $this->templateURL . '/js/home.js', array('jquery'), false, true);
        }
    }
    
    function shortcode_contact_form($atts)
    {
        extract(shortcode_atts(array(
            'param' => 'default'
        ), $atts));
        
        ob_start();
        require_once(TEMPLATEPATH . '/inc/contact_form.php');
        $html = ob_get_contents();
        ob_end_clean();
        
        return $html;
    }
    
    function submit_contact()
    {
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $message = isset($_POST['message']) ? trim($_POST['message']) : '';
        $errors = array();
        
        if (empty($name) OR $name == 'Your Name') $errors['name'] = 'Your name is required.';
        if (empty($email)) $errors['email'] = 'Your email address is required.';
        elseif (!is_email($email)) $errors['email'] = 'Your email address is invalid.';
        if (empty($message) OR $message == 'Your Message') $errors['message'] = 'Your message is required.';
        
        if (sizeof($errors)) {
        	echo json_encode(array(
                'status' => 'FAILED',
                'errors' => $errors
        	));
        } else {
            // send mail
            $subject = '[' . get_bloginfo('name') . '] New Enquiry';
            $content = "Name: $name" . "\n";
            $content .= "Email: $email" . "\n";
            $content .= "Message:" . "\n"
                        . '----------------------------------------' . "\n"
                        . stripslashes($message) . "\n"
                        . '----------------------------------------' . "\n"
                        . "\n";
            $content .= "This message is sent from the contact form on " . get_bloginfo('home');
            $to = get_bloginfo('admin_email');
            wp_mail($to, $subject, $content);
            
            $title = '';
            $body = '';
            if (empty($title)) $title = 'Thank you for your enquiry';
            if (empty($body)) $body = 'Thank you for your enquiry.<br />We will be in contact with you shortly.';
            
        	echo json_encode(array(
                'status' => 'SUCCESS',
                'title' => $title,
                'body' => $body,
        	));
        }
        exit();
    }
    
    function getSlider($postID)
    {
        $slider = get_post_meta($postID, 'slider', true);
        if (!empty($slider))
            $slides = unserialize($slider);
        
        if (!$slides)
            $slides = array();
            
        require_once(TEMPLATEPATH . '/inc/slider.php');
    }
    
}

global $Koojarewon, $KoojarewonAdmin;
$Koojarewon = new Koojarewon();
$KoojarewonAdmin = new KoojarewonAdmin();

function kjwOptionTree($option='', $default='', $echo=1)
{
    $value = function_exists('ot_get_option') ? ot_get_option("kjw_$option", $default) : '';
    if ($echo) {
    	echo $value;
    } else {
        return $value;
    }
}