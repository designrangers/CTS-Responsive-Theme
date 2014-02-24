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
function custom_post_coaches() { 
	// creating (registering) the custom type 
	register_post_type( 'coaches', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Coaches', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Coach', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Coaches', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Coach', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Coach', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Coach', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Coach', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Coaches', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Coaches section', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'coaches', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'coaches', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_coaches');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'coaching_level', 
    	array('coaches'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Coaching Level', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Coaching Level', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Coaching Level', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Coaching Levels', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Coaching Level', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Coaching Level:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Coaching Level', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Coaching Level', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Coaching Level', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Coaching Level Name', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'coaching-level' ),
    	)
    );  

    register_taxonomy( 'coaching_sports', 
    	array('coaches'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Sports Coached', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Sport', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Sports Coached', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Sports', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Sport', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Sport:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Sport', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Sport', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Sport', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Sport', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'sports-coached' ),
    	)
    );  
    register_taxonomy( 'coaching_packages', 
    	array('coaches'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Coaching Packages', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Coaching Package', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Coaching Packages', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Coaching Packages', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Coaching Package', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Coaching Package:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Coaching Package', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Coaching Package', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Coaching Package', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Coaching Package Location', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'coaching-package' ),
    	)
    );
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
	

?>