<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header class="section-light secondary-title">
						    <div class="row infographics-title">
							    <div class="medium-8 columns">
							    	<h2><?php the_title(); ?></h2>
							    </div>
							</div>
					    </header> <!-- end article header -->					    
  					<section class="section-light" itemprop="articleBody">
						<div class="row">
							<div class="medium-8 columns">
								<div class="coach-single-content">
									<?php $coachimage = get_field('coach_headshot');
									if($coachimage) { ?>
										<div class="coach-single-hero">
			    							<img src="<?php echo $coachimage[sizes]['joints-thumb-400']; ?>" alt="<?php echo $image['alt']; ?>" />
										</div>
									<?php } ?>
									<?php if ( get_field('coaches_about')) {
										echo '<h4>About Me</h4>' . get_field('coaches_about');
									} ?>
									<hr />
									<?php if ( get_field('coaches_services')) {
										echo '<h4>Services</h4>' . get_field('coaches_services');
									} ?>
									<hr />
									<?php if ( get_field('coaches_specialties')) {
										echo '<h4>Specialties</h4>' . get_field('coaches_specialties');
									} ?>
									<a class="camp-more-details" href="<?php echo home_url(); ?>/coaching/cts-coaches/">&laquo; Back to all coaches</a>									
								</div>
							</div>
							<div class="medium-4 columns">
								<div class="coach-single-facts">
									<h4>
										<span>Residence:</span>
										<?php if ( get_field('coaches_residence')) {
											the_field('coaches_residence');
										} ?>
									</h4>
									<h4>
										<span>Certifications:</span>
										<?php if ( get_field('coaches_license')) {
											the_field('coaches_license');
										} ?>
									</h4>									
									<h4>
										<span>Coaching Level:</span>
									</h4>
									<?php
										 $terms = get_the_terms( $post->ID , 'coaching_level');
										 $count = count($terms);
										 if ( $count > 0 ){
										     echo "<ul>";
										     foreach ( $terms as $term ) {
										       echo "<li>" . $term->name . "</li>";  
										     }
										     echo "</ul>";
										 } 
									?>
									<h4>
										<span>Sports Coached:</span>
									</h4>
									 <?php
										 $terms = get_the_terms( $post->ID , 'coaching_sports');
										 $count = count($terms);
										 if ( $count > 0 ){
										     echo "<ul>";
										     foreach ( $terms as $term ) {
										       echo "<li>" . $term->name . "</li>";  
										     }
										     echo "</ul>";
										 } 
									?>
									<h4>
										<span>Coaching Packages:</span>
									</h4>
									 <?php
										 $terms = get_the_terms( $post->ID , 'coaching_packages');
										 $count = count($terms);
										 if ( $count > 0 ){
										     echo "<ul>";
										     foreach ( $terms as $term ) {
										       echo "<li>" . $term->name . "</li>";  
										     }
										     echo "</ul>";
										 } 
									?>									
								</div>
							</div>
						</div>
					</section><!-- end article section -->


					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>			
					
					    <?php else : ?>
					
                <?php get_template_part( 'partials/missing', 'content' ); ?>
					
					    <?php endif; ?>
				    
    
			</div> <!-- end #content -->

<?php get_footer(); ?>