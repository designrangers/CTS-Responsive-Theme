<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="secondary-hero">
		<img src="/wp-content/uploads/2014/02/hero-gray.jpg" alt="">
		<div class="description heroright">
			<h2 class="large"><span>CTS</span><br>
	Bucket List</h2>
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
				<li><a href="<?php echo home_url(); ?>/bucket-list-events">All</a>
				<?php
					$terms = get_terms('bucketlist_type');
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
$oddpost = 'section-light';
$today = date('Ymd');
$args = array (
	'post_type' => 'bucketlist',
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
			    	<div class="camp-facts">
			    		<h4>
							<?php
								$startdate = DateTime::createFromFormat('Ymd', get_field('bucketlist_start_date'));
								$enddate = DateTime::createFromFormat('Ymd', get_field('bucketlist_end_date'));
								echo $startdate->format('F d') . '-' . $enddate->format('d, Y'); 
							?>
						</h4>
			    		<h4><?php the_field('bucketlist_location'); ?></h4>


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