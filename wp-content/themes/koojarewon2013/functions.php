<?php
require(TEMPLATEPATH . '/inc/admin_functions.php');

class ThemeName
{
    var $themeMods;
    var $templateURL;
    
    function __construct()
    {
        $this->templateURL = get_bloginfo('template_url');
        $this->themeMods = get_theme_mods();
        
        add_theme_support('post-thumbnails');
        add_image_size('themecode_300x200', 300, 200, true);
        
        add_action('init', array(&$this, 'init'));
        add_action('widgets_init', array(&$this, 'widgets_init'));
        add_action('wp_enqueue_scripts', array(&$this, 'wp_enqueue_scripts'));
        
        add_shortcode('THEMECODE_CONTACT_FORM', array(&$this, 'shortcode_contact_form'));
        
        add_action('wp_ajax_themecode_submit_contact', array(&$this, 'submit_contact'));
        add_action('wp_ajax_nopriv_themecode_submit_contact', array(&$this, 'submit_contact'));
    }
    
    function init()
    {
        // register custom post types
        register_post_type('test',
            array(
                'labels' => array(
                    'name' => __( 'Tests' ),
                    'singular_name' => __( 'Test' ),
                    'add_new' => __( 'Add New Test' ),
                    'add_new_item' => __( 'Add New Test' ),
                    'edit_item' => __( 'Edit Test' ),
                    'new_item' => __( 'New Test' ),
                    'view_item' => __( 'View Test' ),
                    'search_items' => __( 'Search Tests' ),
                    'not_found' => __( 'No tests found' ),
                    'not_found_in_trash' => __( 'No tests found in Trash' ),
                ),
                'public' => true,
                'show_ui' => true,
                'menu_icon' => $this->templateURL . '/images/test.png',
                'has_archive' => false,
                'rewrite' => array('slug' => 'test'),
                'menu_position' => 5,
                'supports' => array(
                                'title',
                                'excerpt',
                                'editor',
                                'thumbnail',
                                'page-attributes',
                            ),
            )
        );
    }
    
    function widgets_init()
    {
        // register menus, sidebars
        register_nav_menu('main-menu', 'Main Menu');
        register_sidebar(array(
            'name' => 'Default Sidebar',
            'id' => 'default-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title">',
            'after_title' => '</h3>',
        ));
    }
    
    function wp_enqueue_scripts()
    {
        wp_enqueue_script('jquery');
        $jsObject = array(
            'ajaxurl' => admin_url('admin-ajax.php')
        );
        wp_localize_script('jquery', 'themecode', $jsObject);
        wp_enqueue_script('themecode', $this->templateURL . '/js/main.js', array('jquery'), false, true);
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
        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $message = isset($_POST['message']) ? trim($_POST['message']) : '';
        $errors = array();
        
        if (empty($name)) $errors['name'] = 'Your name is required.';
        if (empty($phone)) $errors['phone'] = 'Your phone number is required.';
        if (empty($email)) $errors['email'] = 'Your email address is required.';
        elseif (!is_email($email)) $errors['email'] = 'Your email address is invalid.';
        if (empty($message)) $errors['message'] = 'Your message is required.';
        
        if (sizeof($errors)) {
        	echo json_encode(array(
                'status' => 'FAILED',
                'errors' => $errors
        	));
        } else {
            // send mail
            $subject = '[' . get_bloginfo('name') . '] New Enquiry';
            $content = "Name: $name" . "\n";
            $content .= "Phone: $phone" . "\n";
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
            if (intval($this->themeMods['contact_thank_page_id'])) {
                $foo = new WP_Query(array(
                    'page_id' => $this->themeMods['contact_thank_page_id'],
                    'posts_per_page' => 1
                ));
                if ($foo->have_posts()) {
                	$foo->the_post();
                	$title = get_the_title();
                	$body = get_the_content();
                	$body = apply_filters('the_content', $body);
                	$body = str_replace(']]>', ']]&gt;', $body);
                }
            }
            if (empty($title)) $title = 'Thank you for your enquiry';
            if (empty($body)) $body = 'We will be in contact shortly.';
            
        	echo json_encode(array(
                'status' => 'SUCCESS',
                'title' => $title,
                'body' => $body,
        	));
        }
        exit();
    }
}

global $ThemeName, $ThemeNameAdmin;
$ThemeName = new ThemeName();
$ThemeNameAdmin = new ThemeNameAdmin();