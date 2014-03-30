<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<header class="section-light secondary-title-only">
	      <div class="row infographics-title">
		    <div class="medium-12 columns">
		    	<h2>
		    		<?php 
		          		$term =	$wp_query->queried_object;
						echo $term->name; 
					?>
				</h2>
		    	<h3>Bucket List Events</h3>
		    </div>
		</div>
	</header>		
				
    <section class="entry-content clearfix" itemprop="articleBody">

	</section> <!-- end article section -->
					
</article> <!-- end article -->
<!-- Category Filters -->
<div class="camp-categories">
  <div class="row">
    <div class="large-12 columns">
		<div class="cat">
			<ul class="inline-list">
				<li><a href="<?php echo home_url(); ?>/bucket-list/events">All</a></li>
				<?php
					$args = array (
						'taxonomy' => 'bucketlist_type',
						'title_li' => ''
					);

					wp_list_categories($args);
				?>
			</ul>
		</div>
    </div>
  </div>
</div>
<!--Events loop-->
<?php 
/* variable for alternating post styles */

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$oddpost = 'section-light';
$today = date('Ymd');
$args = array (
	'post_type' => 'bucketlist',
	'bucketlist_type'=> $term->slug,
	'meta_key' => 'bucketlist_start_date',
	'orderby' => 'meta_value_num',
	'order' => 'ASC',
    'meta_query' => array(
		array(
	        'key'		=> 'bucketlist_end_date',
	        'compare'	=> '>',
	        'value'		=> $today,
	    )
    ),
);

$camps_query = new WP_Query( $args );

if ( $camps_query->have_posts() ) {
	while ( $camps_query->have_posts() ) {
		$camps_query->the_post();
?>
	
	  	<div class="<?php echo $oddpost; ?>">
		  	<div class="row">
			  	<div class="large-8 medium-8 columns">
			  		<h3><?php the_title(); ?></h3>
			    	<p><?php the_field('bucketlist_summary'); ?></p>
			    	<a class="cts-button" href="<?php the_permalink(); ?>">More information</a>
			    </div>
			    <div class="large-4 medium-4 columns">
			    		<div class="camp-facts camp-single-facts">
							<h4>
								<span>Location:</span>
							</h4>
							<ul class="bucketlist-location">
								<?php foreach (get_the_terms($post->ID, 'bucketlist_location') as $cat) : ?>
								 <li>
								 	<?php echo $cat->name; ?>
								 </li>
								 <?php endforeach; ?>
							</ul>							
							<h4 class="camp-single-date">
								<span>Date:</span>
								<?php
									$startdate = DateTime::createFromFormat('Ymd', get_field('bucketlist_start_date'));
									$enddate = DateTime::createFromFormat('Ymd', get_field('bucketlist_end_date'));
									echo $startdate->format('F d') . '-' . $enddate->format('F d, Y'); 
								?>
							</h4>
							<h4 class="camp-single-type">Event Type:</h4>
							<ul class="camp-types">
								<?php foreach (get_the_terms($post->ID, 'bucketlist_type') as $cat) : ?>
								 <li>
								 	<a href="<?php echo get_term_link($cat->slug, 'bucketlist_type'); ?>">
								 		<img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
								 		<span><?php echo $cat->name; ?></span>
								 	</a>
								 </li>
								 <?php endforeach; ?>
							</ul>
						</div>


			    </div>
			</div>
		</div>
		<?php /* Changes every other post to a different class */
		if ('section-light' == $oddpost) $oddpost = 'section-xtralight ';
		else $oddpost = 'section-light';
		?>

<?php	
	}
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata(); ?>

<?php get_footer(); ?>