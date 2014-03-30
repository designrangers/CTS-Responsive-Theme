<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="secondary-hero">
		<img src="http://localhost:8888/cts/wp-content/uploads/2014/02/camps-hero.jpg" alt="">
		<div class="description heroright">
			<h2 class="large"><span>CTS</span><br>
	Camp Calendar</h2>
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
				<li class="current-cat"><a href="#">All</a>
				<?php
					$args = array (
						'taxonomy' => 'camps_type',
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
$oddpost = 'section-light';
$today = date('Ymd');
$args = array (
	'post_type' => 'camps',
	'meta_key' => 'camp_start_date',
	'orderby' => 'meta_value_num',
	'order' => 'ASC',
    'meta_query' => array(
		array(
	        'key'		=> 'camp_end_date',
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
			    	<p><?php the_field('camp_summary'); ?></p>
			    	<a class="cts-button" href="<?php the_permalink(); ?>">More information</a>
			    </div>
			    <div class="large-4 medium-4 columns">
			    		<div class="camp-facts camp-single-facts">
							<h4>
								<span>Location:</span>
								<?php if( get_field('cts_camp_location') ):
									echo get_field('cts_camp_location');
								endif; ?>
							</h4>
							<h4 class="camp-single-date">
								<span>Date:</span>
								<?php
									$startdate = DateTime::createFromFormat('Ymd', get_field('camp_start_date'));
									$enddate = DateTime::createFromFormat('Ymd', get_field('camp_end_date'));
									echo $startdate->format('F d') . '-' . $enddate->format('d, Y'); 
								?>
							</h4>
							<h4 class="camp-single-type">Camp Type:</h4>
							<ul class="camp-types">
								<?php foreach (get_the_terms($post->ID, 'camps_type') as $cat) : ?>
								 <li>
								 	<a href="<?php echo get_term_link($cat->slug, 'camps_type'); ?>">
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