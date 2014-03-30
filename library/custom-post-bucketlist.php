<?php
/* Coaches Custom Post Type
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
function custom_post_bucketlist() { 
	// creating (registering) the custom type 
	register_post_type( 'bucketlist', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Bucket List', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Event', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Events', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Event', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Event', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Event', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Event', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Events', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Bucket List section', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'events', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'bucket-list/events', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_bucketlist');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'bucketlist_type', 
        array('bucketlist'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true, it acts like categories */             
            'labels' => array(
                'name' => __( 'Event Types', 'jointstheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Event Type', 'jointstheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Event Types', 'jointstheme' ), /* search title for taxomony */
                'all_items' => __( 'All Event Types', 'jointstheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Event Type', 'jointstheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Event Type:', 'jointstheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Event Type', 'jointstheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Event Type', 'jointstheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Event Type', 'jointstheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Event Type Name', 'jointstheme' ) /* name title for taxonomy */
            ),
            'show_admin_column' => true, 
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'bucketlist-event-type' ),
        )
    );  

    register_taxonomy( 'bucketlist_location', 
        array('bucketlist'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true, it acts like categories */             
            'labels' => array(
                'name' => __( 'Bucket List Locations', 'jointstheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Bucket List Location', 'jointstheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Bucket List Locations', 'jointstheme' ), /* search title for taxomony */
                'all_items' => __( 'All Bucket List Locations', 'jointstheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Bucket List Location', 'jointstheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Bucket List Location:', 'jointstheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Bucket List Location', 'jointstheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Bucket List Location', 'jointstheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Bucket List Location', 'jointstheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Bucket List Location Name', 'jointstheme' ) /* name title for taxonomy */
            ),
            'show_admin_column' => true, 
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'bucket-list-location' ),
        )
    );
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
	

?>