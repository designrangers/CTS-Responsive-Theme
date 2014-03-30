<?php
/* joints Custom Post Type Example
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
function custom_post_camps() { 
	// creating (registering) the custom type 
	register_post_type( 'camps', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Camps', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Camp', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Camps', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Camp', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Camp', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Camp', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Camp', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Camps', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Camps section', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'camp-calendar', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'camps/camp-calendar', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_camps');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'camps_type', 
    	array('camps'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Camp Types', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Camp Type', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Camp Types', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Camp Types', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Camp Type', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Camp Type:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Camp Type', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Camp Type', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Camp Type', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Camp Type Name', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'camps/camp-type' ),
    	)
    );  

    register_taxonomy( 'camps_lodging', 
    	array('camps'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Camp Lodging', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Camp Lodging', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Camp Lodging', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Camp Lodging', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Camp Lodging', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Camp Lodging:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Camp Lodging', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Camp Lodging', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Camp Lodging', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Camp Lodging Location', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'camp-lodging' ),
    	)
    );
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
	

?>