<?php
ob_start();
/*
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/*********************
INCLUDE NEEDED FILES
*********************/

/*
library/joints.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once(get_template_directory().'/library/joints.php'); // if you remove this, Joints will break
/*
library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once(get_template_directory().'/library/custom-post-camps.php');
require_once(get_template_directory().'/library/custom-post-coaches.php');
require_once(get_template_directory().'/library/custom-post-athletes.php');
require_once(get_template_directory().'/library/custom-post-bucketlist.php');
require_once(get_template_directory().'/library/custom-post-specials.php');
/*
library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once(get_template_directory().'/library/admin.php'); // this comes turned off by default
/*
library/translation/translation.php
	- adding support for other languages
*/
// require_once(get_template_directory().'/library/translation/translation.php'); // this comes turned off by default

/*********************
GOOGLE FONTS
*********************/
function ggl_load_styles() {
    wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Montserrat:400,700|Signika:400,300');
    wp_enqueue_style( 'googleFonts');
}
add_action('wp_enqueue_scripts', 'ggl_load_styles');

/*********************
THUMNAIL SIZE OPTIONS
*********************/

// Thumbnail sizes
add_image_size( 'joints-thumb-600', 600, 150, true );
add_image_size( 'joints-thumb-300', 300, 100, true );
add_image_size( 'joints-thumb-400', 400, 400, true );
add_image_size( 'cts-camp-hero-637', 637, 350, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'joints-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'joints-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. 
*/


/*********************
MENUS & NAVIGATION
*********************/
// registering wp3+ menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu' ),   // main nav in header
		'top-secondary-nav' => __( 'Top Secondary Nav' ),   // secondary nav in the header
		'footer-links-1' => __( 'Footer Links 1' ), // secondary nav in footer
		'footer-links-2' => __( 'Footer Links 2' ), // secondary nav in footer
		'footer-links-3' => __( 'Footer Links 3' ) // secondary nav in footer
	)
);

// the main menu
function joints_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'jointstheme' ),  // nav name
    	'menu_class' => '',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'joints_main_nav_fallback'      // fallback function
	));
} /* end joints main nav */

// secondary top menu
function joints_top_secondary_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'Top Secondary Menu', 'jointstheme' ),  // nav name
    	'menu_class' => 'inline-list nav-secondary right',         // adding custom nav class
    	'theme_location' => 'top-secondary-nav',        // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'joints_top_secondary_fallback'      // fallback function
	));
} /* end secondary top menu */

// this is the fallback for the top secondary menu
function joints_top_secondary_fallback() {
	/* you can put a default here if you like */
}

// the 1st column footer menu
function joints_footer_links_1() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => '',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links 1', 'jointstheme' ),   // nav name
    	'menu_class' => 'side-nav-footer',      // adding custom nav class
    	'theme_location' => 'footer-links-1',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_1_fallback'  // fallback function
	));
} /* end joints 1st column footer menu */

// the 2nd column footer menu
function joints_footer_links_2() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => '',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links 2', 'jointstheme' ),   // nav name
    	'menu_class' => 'side-nav-footer',      // adding custom nav class
    	'theme_location' => 'footer-links-2',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_2_fallback'  // fallback function
	));
} /* end joints 2nd column footer menu */

// the 3rd column footer menu
function joints_footer_links_3() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => '',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links 3', 'jointstheme' ),   // nav name
    	'menu_class' => 'side-nav-footer',      // adding custom nav class
    	'theme_location' => 'footer-links-3',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_3_fallback'  // fallback function
	));
} /* end joints 3rd column footer menu */

// this is the fallback for header menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'top-bar top-bar-section',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function joints_footer_links_1_fallback() {
	/* you can put a default here if you like */
}
function joints_footer_links_2_fallback() {
	/* you can put a default here if you like */
}
function joints_footer_links_3_fallback() {
	/* you can put a default here if you like */
}

/*********************
EDITOR STYLES
*********************/

add_editor_style();

/*********************
ADVANCED CUSTOM FIELDS
*********************/

function get_image_with_alt($imagefield, $postID, $imagesize = 'full') {
$imageID = get_field($imagefield, $postID); 
$image = wp_get_attachment_image_src( $imageID, $imagesize ); 
$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); 
return '<img src="' . $image[0] . '" alt="' . $alt_text . '" />';
}

/*
*  Create a simple sub options page called 'Camps'
*/
 
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page( 'Camps Standard Text' );
    acf_add_options_sub_page( 'Bucket List Standard Text' );
    acf_add_options_sub_page( 'Partner Logos' );
    acf_add_options_sub_page( 'Footer Options' );
}
 
/*
*  Create an advanced sub page called 'Camps Standard Text' that sits under the General options menu
*/
 
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Camps Standard Text',
        'parent' => 'options-general.php',
        'capability' => 'manage_options'
    ));
}

 
/*
*  Create an advanced sub page called 'Camps Standard Text' that sits under the General options menu
*/
 
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Bucket List Standard Text',
        'parent' => 'options-general.php',
        'capability' => 'manage_options'
    ));
}

/*
*  Create an advanced sub page called 'Footer Options' that sits under the General options menu
*/
 
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Partner Logos',
        'parent' => 'options-general.php',
        'capability' => 'manage_options'
    ));
}

/*
*  Create an advanced sub page called 'Footer Options' that sits under the General options menu
*/
 
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Footer Options',
        'parent' => 'options-general.php',
        'capability' => 'manage_options'
    ));
}

/*********************
Order by last name
*********************/

function posts_orderby_lastname ($orderby_statement) 
{
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}

/*********************
Taxonomies – allow HTML in descriptions
*********************/

$filters = array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description');
foreach ( $filters as $filter ) {
    remove_filter($filter, 'wp_filter_kses');
}

/*********************
TinyMCE Customizations
*********************/

function cts_mce_buttons_3($buttons) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'tablecontrols';

	return $buttons;
}
add_filter('cts_buttons_3', 'cts_mce_buttons_3');


function cts_custom_mce( $init ) {
    $init['theme_advanced_disable'] = 'underline,spellchecker,wp_help';
    $init['theme_advanced_text_colors'] = '333333,0a3253,cb1e41,eb9e30,d25d12,3a82b6,469982,8aa79e,7f8a8c,2c2525,bec2c7';
    return $init;
}
 
add_filter('tiny_mce_before_init', 'cts_custom_mce');

add_filter( 'mce_buttons_2', 'cts_mce_buttons_2' );

function cts_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect');
    $buttons[] = 'hr';
    return $buttons;

}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'cts-button'
            ),
        array(
            'title' => 'Special Link',
            'selector' => 'a',
            'classes' => 'special'
            ),
        array(
            'title' => 'Intro Paragraph',
            'selector' => 'p',
            'classes' => 'intro'
            ),
		array(
            'title' => 'Extra space above',
            'selector' => 'h2, h3, h4, p, a',
            'classes' => 'extraspace-top'
            )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

/********************
Remove senseless dashboard widgets for non-admins. (Un)Comment or delete as you wish.
*********************/

function remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
remove_action( 'welcome_panel', 'wp_welcome_panel' );

// Filter Yoast Meta Priority
add_filter( 'wpseo_metabox_prio', function() { return 'low';});


/*********************
SIDEBARS
*********************/

// Sidebars & Widgetizes Areas
function joints_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'jointstheme'),
		'description' => __('The first (primary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'jointstheme'),
		'description' => __('The second (secondary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function joints_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<?php printf(__('<cite class="fn">%s</cite>', 'jointstheme'), get_comment_author_link()) ?> on
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'jointstheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'jointstheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'jointstheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

?>