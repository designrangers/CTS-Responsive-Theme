<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<header class="secondary-hero camp-hero">
		<div class="description">
				 <h2 class="large">
				 	<span>Upcoming Camps</span><br>
		          <?php single_cat_title(); ?></h2>
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
				<li><a href="<?php echo home_url(); ?>/camps">All</a>
				<?php
					$terms = get_terms('camps_type');
					$count = count($terms);
	                if($count > 0) {
	                    foreach ($terms as $term) {
	                    	echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
	                    }
	                }
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
	'post_type' => 'camps',
	'camps_type'=> $term->slug,
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
			    	<div class="camp-facts">
			    		<h4>
							<?php
								$startdate = DateTime::createFromFormat('Ymd', get_field('camp_start_date'));
								$enddate = DateTime::createFromFormat('Ymd', get_field('camp_end_date'));
								echo $startdate->format('F d') . '-' . $enddate->format('d, Y'); 
							?>
						</h4>
			    		<h4><?php the_field('cts_camp_location'); ?></h4>
						<h5>Camp Type:</h5>
						<p>
							<img style="margin-bottom: 15px;" src="<?php echo get_template_directory_uri(); ?>/library/images/icon-climbing.png"><br />
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/icon-spring.png">
						</p>


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