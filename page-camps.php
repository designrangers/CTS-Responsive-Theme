<?php
/*
Template Name: Camps Overview Page
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
            <h2><?php the_field('upcoming_camps_title'); ?></h2>
            <h3><?php the_field('upcoming_camps_subtitle'); ?></h3>
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
<?php
/* variable for alternating post styles */
$oddpost = 'section-light';
$camps_query = new WP_Query('post_type=camps&posts_per_page=3');

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

<div class="camp-categories">
  <div class="row">
    <div class="large-12 columns">
		<a href="/camp-calendar">See all Upcoming Camps &raquo;</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>