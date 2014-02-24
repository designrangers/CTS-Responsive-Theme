<?php
/*
Template Name: Bucket List Overview Page
*/
?>

<?php get_header(); ?>
			
			<div id="content">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'page' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/not', 'found' ); ?>

					    <?php endif; ?>
			    
			</div> <!-- end #content -->

<!--Events loop-->
<div class="section-light secondary-title">
      <div class="row upcoming-camps-title">
        <div class="large-12 columns">
            <h2><?php the_field('upcoming_bucket_list_title'); ?></h2>
            <h3><?php the_field('upcoming_bucket_list_subtitle'); ?></h3>
        </div>
	</div>
</div>
<!-- Category Filters -->
<div class="camp-categories">
  <div class="row">
    <div class="large-12 columns">
		<div class="cat">
			<ul class="inline-list">
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
<?php
/* variable for alternating post styles */
$oddpost = 'section-light';
$bucketlist_query = new WP_Query('post_type=bucketlist&posts_per_page=3');

if ( $bucketlist_query->have_posts() ) {
	while ( $bucketlist_query->have_posts() ) {
		$bucketlist_query->the_post();
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

<div class="camp-categories">
  <div class="row">
    <div class="large-12 columns">
		<a href="<?php echo home_url(); ?>/bucket-list-events">See all Upcoming Events &raquo;</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>