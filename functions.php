<?php


//Menu Locations
register_nav_menus( array(
		'main' => __( 'Main Menu', 'oneroomschoolhouse' ),
	) );

//Featured Images
add_theme_support( 'post-thumbnails' ); 



//Register Custom Post Types

add_action( 'init', 'create_post_type' );
function create_post_type() {
  
	// Staff
  register_post_type( 'staff',
    array(
      'labels' => array(
        'name' => __( 'Staff' ),
        'singular_name' => __( 'Staff' ),

      ),
      'public' => true,
      'has_archive' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );

  	// Classes
  register_post_type( 'classes',
    array(
      'labels' => array(
        'name' => __( 'Classes' ),
        'singular_name' => __( 'Class' ),

      ),
      'public' => true,
      'has_archive' => false,
      'show_in_menu' => true,
      'menu_position' => 5,
      'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    )
  );

  	// Testimonials
  register_post_type( 'testimonials',
    array(
      'labels' => array(
        'name' => __( 'Testimonial' ),
        'singular_name' => __( 'Testimonials' ),

      ),
      'public' => true,
      'has_archive' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );
}


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_staff_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_staff_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)

	// Staff Categories
	$labels = array(
		'name'              => _x( 'Staff Tags', 'taxonomy general name' ),
		'singular_name'     => _x( 'Staff Tag', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Staff Tags' ),
		'all_items'         => __( 'All Tags' ),
		'parent_item'       => __( 'Parent Staff Tags' ),
		'parent_item_colon' => __( 'Parent Staff Tag' ),
		'edit_item'         => __( 'Edit Staff Tag' ),
		'update_item'       => __( 'Update Staff Tag' ),
		'add_new_item'      => __( 'Add New Staff Tag' ),
		'new_item_name'     => __( 'New Staff Tag' ),
		'menu_name'         => __( 'Staff Tags' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'staff_tag' ),
	);

	register_taxonomy( 'staff_tag', array( 'staff' ), $args );
}



// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_testimonial_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_testimonial_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)

  // Staff Categories
  $labels = array(
    'name'              => _x( 'Testimonial Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Testimonial Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Testimonial Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Testimonial Categories' ),
    'parent_item_colon' => __( 'Parent Testimonial Categories' ),
    'edit_item'         => __( 'Edit Testimonial Category' ),
    'update_item'       => __( 'Update Testimonial Category' ),
    'add_new_item'      => __( 'Add New Testimonial Category' ),
    'new_item_name'     => __( 'New Testimonial Category' ),
    'menu_name'         => __( 'Categories' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'testimonial_category' ),
  );

  register_taxonomy( 'testimonial_category', array( 'testimonials' , 'page' ), $args );
}


// Automatically install required plugins


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/TGM-Plugin-Activation-2.5.2/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    // This is an example of how to include a plugin bundled with a theme.
    array(
      'name'               => 'Advanced Custom Fields', // The plugin name.
      'slug'               => 'advanced-custom-fields', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/plugins/advanced-custom-fields.4.4.5.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),

    array(
      'name'               => 'Ninja Forms', // The plugin name.
      'slug'               => 'ninja-forms', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/plugins/ninja-forms.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),

    array(
      'name'               => 'Simple Post Exipiration', // The plugin name.
      'slug'               => 'simple-post-expiration', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/plugins/simple-post-expiration.1.0.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),

    array(
      'name'               => 'Events Calendar Pro', // The plugin name.
      'slug'               => 'events-calendar-pro', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/plugins/events-calendar-pro.4.0.3.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),

    array(
      'name'               => 'The Events Calendar', // The plugin name.
      'slug'               => 'the-events-calendar', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/plugins/the-events-calendar.3.12.3.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),

    array(
      'name'               => 'The Events Calendar Category Colors', // The plugin name.
      'slug'               => 'the-events-calendar-category-colors', // The plugin slug (typically the folder name).
      'source'             => get_stylesheet_directory() . '/plugins/the-events-calendar-category-colors.4.3.5.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    )

  );

  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings. Reference example.php file in TGMPA folder (removed for cleaner code).
   */
  $config = array(
    'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.

    
  );

  tgmpa( $plugins, $config );
}

// -----------------------------
// Advanced Custom Fields Fields
// -----------------------------

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_service-sales-page-fields',
        'title' => 'Service Sales Page Fields',
        'fields' => array (
            array (
                'key' => 'field_561feff4846bd',
                'label' => 'Get Started Title',
                'name' => 'get_started_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Get Started',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_561ff067846be',
                'label' => 'Get Started Body Copy',
                'name' => 'get_started_body_copy',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
            array (
                'key' => 'field_561ff0a1846bf',
                'label' => 'Get Started Phone Number',
                'name' => 'get_started_phone_number',
                'type' => 'text',
                'instructions' => 'Phone number for additional information in the following format: xxx.xxx.xxxx',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_561ff11b846c0',
                'label' => 'Get Started Email',
                'name' => 'get_started_email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => 'hello@reasonmathtutoring.com',
                'prepend' => '',
                'append' => '',
            ),
            array (
                'key' => 'field_561ff147846c1',
                'label' => 'What you get title',
                'name' => 'what_you_get_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'What You Get',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_561ff17f846c2',
                'label' => '1on1 Tutoring Rate',
                'name' => '1on1_tutoring_rate',
                'type' => 'text',
                'instructions' => 'Enter number and qualifier (eg    $15/hour or $100/week)',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_561ff1f1846c3',
                'label' => 'In Home Tutoring Rate',
                'name' => 'in_home_tutoring_rate',
                'type' => 'text',
                'instructions' => 'Enter number and qualifier (eg    $15/hour or $100/week)',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_561ff210846c4',
                'label' => 'What You Get Body Copy',
                'name' => 'what_you_get_body_copy',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
            array (
                'key' => 'field_5627dcc41bfa8',
                'label' => 'Other Services Title',
                'name' => 'other_services_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Classes & More',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dcf11bfa9',
                'label' => 'Other Services Copy',
                'name' => 'other_services_copy',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'We also offer small-scale classes, test prep, and home school tutoring.',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dd2a1bfaa',
                'label' => 'First Service Text',
                'name' => 'first_service_text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dd621bfab',
                'label' => 'First Service Symbol',
                'name' => 'first_service_symbol',
                'type' => 'text',
                'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
                'default_value' => 'fa-superscript',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627deac1bfac',
                'label' => 'First Service Color',
                'name' => 'first_service_color',
                'type' => 'select',
                'choices' => array (
                    '#5b96E8' => 'Textbook Blue',
                    '#ffc31e' => 'No. 2 Yellow',
                    '#00A639' => 'Chalkboard Green',
                    '#b2004D' => 'Fall Sweater Maroon',
                    '#ff5921' => 'Recess Orange',
                    '#414042' => 'Dark Grey',
                    '#0f0f0f' => 'Light Grey',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e629fd256',
                'label' => 'First Service Link',
                'name' => 'first_service_link',
                'type' => 'page_link',
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e05d1bfaf',
                'label' => 'Second Service Text',
                'name' => 'second_service_text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dffb1bfae',
                'label' => 'Second Service Symbol',
                'name' => 'second_service_symbol',
                'type' => 'text',
                'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
                'default_value' => 'fa-superscript',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dfdc1bfad',
                'label' => 'Second Service Color',
                'name' => 'second_service_color',
                'type' => 'select',
                'choices' => array (
                    '#5b96E8' => 'Textbook Blue',
                    '#ffc31e' => 'No. 2 Yellow',
                    '#00A639' => 'Chalkboard Green',
                    '#b2004D' => 'Fall Sweater Maroon',
                    '#ff5921' => 'Recess Orange',
                    '#414042' => 'Dark Grey',
                    '#0f0f0f' => 'Light Grey',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e73ffd257',
                'label' => 'Second Service Link',
                'name' => 'second_service_link',
                'type' => 'page_link',
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e0801bfb0',
                'label' => 'Third Service Text',
                'name' => 'third_service_text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627e0ad1bfb1',
                'label' => 'Third Service Symbol',
                'name' => 'third_service_symbol',
                'type' => 'text',
                'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
                'default_value' => 'fa-superscript',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627e0db1bfb2',
                'label' => 'Third Service Color',
                'name' => 'third_service_color',
                'type' => 'select',
                'choices' => array (
                    '#5b96E8' => 'Textbook Blue',
                    '#ffc31e' => 'No. 2 Yellow',
                    '#00A639' => 'Chalkboard Green',
                    '#b2004D' => 'Fall Sweater Maroon',
                    '#ff5921' => 'Recess Orange',
                    '#414042' => 'Dark Grey',
                    '#0f0f0f' => 'Light Grey',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e770fd258',
                'label' => 'Third Service Link',
                'name' => 'Third_service_link',
                'type' => 'page_link',
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'services-type-page.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_staff',
        'title' => 'Staff',
        'fields' => array (
            array (
                'key' => 'field_565c9c45155be',
                'label' => 'Staff Title',
                'name' => 'staff_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'staff',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array (
    'id' => 'acf_classes-post-type',
    'title' => 'Classes Post Type',
    'fields' => array (
      array (
        'key' => 'field_569950b523eea',
        'label' => 'Banner Image',
        'name' => 'banner_image',
        'type' => 'image',
        'instructions' => 'For best results upload an image that is XX x XX.',
        'save_format' => 'id',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_5699482023ee6',
        'label' => 'Class Start Date',
        'name' => 'class_start_date',
        'type' => 'date_picker',
        'date_format' => 'MM d ',
        'display_format' => 'mm/dd/yy',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_5699490e23ee7',
        'label' => 'Class End Date',
        'name' => 'class_end_date',
        'type' => 'date_picker',
        'instructions' => 'If the class is only one day leave this blank',
        'date_format' => 'MM d',
        'display_format' => 'mm/dd/yy',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_5699492b23ee8',
        'label' => 'Registration End Date',
        'name' => 'registration_end_date',
        'type' => 'date_picker',
        'date_format' => 'm/d',
        'display_format' => 'mm/dd/yy',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_5699496023ee9',
        'label' => 'Class Tuition',
        'name' => 'class_tuition',
        'type' => 'text',
        'instructions' => 'Enter rate only (for example: $400.00, Free, $20 at door, etc.) Preferred dollar format is $xx.xx',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'classes',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));

register_field_group(array (
        'id' => 'acf_service-sales-page-fields',
        'title' => 'Classes Archive Page',
        'fields' => array (
            array (
                'key' => 'field_5627dcc41bfa8',
                'label' => 'Other Services Title',
                'name' => 'other_services_title',
                'type' => 'text',
                'default_value' => 'Classes & More',
                'placeholder' => 'Classes & More',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dcf11bfa9',
                'label' => 'Other Services Copy',
                'name' => 'other_services_copy',
                'type' => 'text',
                'default_value' => 'We also offer small-scale classes, test prep, and home school tutoring.',
                'placeholder' => 'We also offer small-scale classes, test prep, and home school tutoring.',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dd2a1bfaa',
                'label' => 'First Service Text',
                'name' => 'first_service_text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dd621bfab',
                'label' => 'First Service Symbol',
                'name' => 'first_service_symbol',
                'type' => 'text',
                'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
                'default_value' => 'fa-superscript',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627deac1bfac',
                'label' => 'First Service Color',
                'name' => 'first_service_color',
                'type' => 'select',
                'choices' => array (
                    '#5b96E8' => 'Textbook Blue',
                    '#ffc31e' => 'No. 2 Yellow',
                    '#00A639' => 'Chalkboard Green',
                    '#b2004D' => 'Fall Sweater Maroon',
                    '#ff5921' => 'Recess Orange',
                    '#414042' => 'Dark Grey',
                    '#0f0f0f' => 'Light Grey',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e629fd256',
                'label' => 'First Service Link',
                'name' => 'first_service_link',
                'type' => 'page_link',
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e05d1bfaf',
                'label' => 'Second Service Text',
                'name' => 'second_service_text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dffb1bfae',
                'label' => 'Second Service Symbol',
                'name' => 'second_service_symbol',
                'type' => 'text',
                'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
                'default_value' => 'fa-superscript',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627dfdc1bfad',
                'label' => 'Second Service Color',
                'name' => 'second_service_color',
                'type' => 'select',
                'choices' => array (
                    '#5b96E8' => 'Textbook Blue',
                    '#ffc31e' => 'No. 2 Yellow',
                    '#00A639' => 'Chalkboard Green',
                    '#b2004D' => 'Fall Sweater Maroon',
                    '#ff5921' => 'Recess Orange',
                    '#414042' => 'Dark Grey',
                    '#0f0f0f' => 'Light Grey',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e73ffd257',
                'label' => 'Second Service Link',
                'name' => 'second_service_link',
                'type' => 'page_link',
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e0801bfb0',
                'label' => 'Third Service Text',
                'name' => 'third_service_text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627e0ad1bfb1',
                'label' => 'Third Service Symbol',
                'name' => 'third_service_symbol',
                'type' => 'text',
                'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
                'default_value' => 'fa-superscript',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5627e0db1bfb2',
                'label' => 'Third Service Color',
                'name' => 'third_service_color',
                'type' => 'select',
                'choices' => array (
                    '#5b96E8' => 'Textbook Blue',
                    '#ffc31e' => 'No. 2 Yellow',
                    '#00A639' => 'Chalkboard Green',
                    '#b2004D' => 'Fall Sweater Maroon',
                    '#ff5921' => 'Recess Orange',
                    '#414042' => 'Dark Grey',
                    '#0f0f0f' => 'Light Grey',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5627e770fd258',
                'label' => 'Third Service Link',
                'name' => 'Third_service_link',
                'type' => 'page_link',
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-classes.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_contact-page',
    'title' => 'Contact Page',
    'fields' => array (
      array (
        'key' => 'field_56ad6aa4df5a0',
        'label' => 'First Column Icon',
        'name' => 'first_column_icon',
        'type' => 'text',
        'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_56ad6ce2df5a1',
        'label' => 'First Column Text',
        'name' => 'first_column_text',
        'type' => 'wysiwyg',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
      ),
      array (
        'key' => 'field_56ad6d0ddf5a2',
        'label' => 'Second Column Icon',
        'name' => 'second_column_icon',
        'type' => 'text',
        'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_56ad6d1ddf5a3',
        'label' => 'Second Column Text',
        'name' => 'second_column_text',
        'type' => 'wysiwyg',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
      ),
      array (
        'key' => 'field_56ad6d35df5a4',
        'label' => 'Third Column Icon',
        'name' => 'third_column_icon',
        'type' => 'text',
        'instructions' => 'The One Room School House theme uses Font Awesome for icons. You must use the font awesome reference code, eg: fa-rocket. For a full list of codes go to: http://fontawesome.io/icons/',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_56ad6d42df5a5',
        'label' => 'Third Column Text',
        'name' => 'third_column_text',
        'type' => 'wysiwyg',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'contact-page-template.php',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}


// Adds "Customize" to the Appearance Menu

function themename_customize_register($wp_customize){
    
    $wp_customize->add_section('themename_color_scheme', array(
        'title'    => __('Color Scheme', 'themename'),
        'description' => '',
        'priority' => 120,
    ));

    $wp_customize->add_section('main-menu', array(
      'title' => __('Main Menu'),
      'description' => __('Edit Main Menu Navigation Items, currently only five menu items are allowed and can be edited.'),
      'priority' => 160
      ));
 
    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[text_test]', array(
        'default'        => 'Arse!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('themename_text_test', array(
        'label'      => __('Text Test', 'themename'),
        'section'    => 'themename_color_scheme',
        'settings'   => 'themename_theme_options[text_test]',
    ));
 
    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[color_scheme]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
 
    $wp_customize->add_control('themename_color_scheme', array(
        'label'      => __('Color Scheme', 'themename'),
        'section'    => 'themename_color_scheme',
        'settings'   => 'themename_theme_options[color_scheme]',
        'type'       => 'radio',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));
 
    //  =============================
    //  = Checkbox                  =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[checkbox_test]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));
 
    $wp_customize->add_control('display_header_text', array(
        'settings' => 'themename_theme_options[checkbox_test]',
        'label'    => __('Display Header Text'),
        'section'  => 'themename_color_scheme',
        'type'     => 'checkbox',
    ));
 
 
    //  =============================
    //  = Select Box                =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[header_select]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'themename_theme_options[header_select]',
        'label'   => 'Select Something:',
        'section' => 'themename_color_scheme',
        'type'    => 'select',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));
 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test]', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
        'label'    => __('Image Upload Test', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'themename_theme_options[image_upload_test]',
    )));
 
    //  =============================
    //  = File Upload               =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[upload_test]', array(
        'default'           => 'arse',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
        'label'    => __('Upload Test', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'themename_theme_options[upload_test]',
    )));
 
 
    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[link_color]', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'themename_theme_options[link_color]',
    )));
 
 
    //  =============================
    //  = Page Dropdown             =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[page_test]', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('themename_page_test', array(
        'label'      => __('Page Test', 'themename'),
        'section'    => 'themename_color_scheme',
        'type'    => 'dropdown-pages',
        'settings'   => 'themename_theme_options[page_test]',
    ));

    // =====================
    //  = Category Dropdown =
    //  =====================
    $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->slug;
      $i++;
    }
    $cats[$category->slug] = $category->name;
  }
 
  $wp_customize->add_setting('_s_f_slide_cat', array(
    'default'        => $default
  ));
  $wp_customize->add_control( 'cat_select_box', array(
    'settings' => '_s_f_slide_cat',
    'label'   => 'Select Category:',
    'section'  => '_s_f_home_slider',
    'type'    => 'select',
    'choices' => $cats,
  ));
}
 
add_action('customize_register', 'main-menu');


// Limit excerpts for classes post type
function get_classes_excerpt(){
$excerpt = get_the_excerpt();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 225);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
return $excerpt;
}

?>