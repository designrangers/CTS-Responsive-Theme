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
  					<section class="section-light" itemprop="articleBody">
						<div class="row">
							<div class="medium-8 columns">
								<div class="coach-single-content">
									<header class="article-header">
										<h2>
								          <?php the_title(); ?>
								        </h2>
							        </header> <!-- end article header -->
									<div class="coach-single-hero">
										<?php $coachimage = get_field('coach_headshot'); ?>
		    							<img src="<?php echo $coachimage[sizes]['joints-thumb-400']; ?>" alt="<?php echo $image['alt']; ?>" />
									</div>
									<?php if ( get_field('coaches_about')) {
										echo '<h3>About Me</h3>' . get_field('coaches_about');
									} ?>
									<?php if ( get_field('coaches_services')) {
										echo '<h3>Services</h3>' . get_field('coaches_services');
									} ?>
									<?php if ( get_field('coaches_specialties')) {
										echo '<h3>Specialties</h3>' . get_field('coaches_specialties');
									} ?>
									<a class="coachlist" href="<?php echo home_url(); ?>/coaching/cts-coaches/">&laquo; Back to all coaches</a>									
								</div>
							</div>
							<div class="medium-4 columns">
								<h3>Coach Stats:</h3>
								<h5>Residence:</h5>
									<?php if ( get_field('coaches_residence')) {
										the_field('coaches_residence');
									} ?>
									<h5>Certifications:</h5>
									<?php if ( get_field('coaches_license')) {
										the_field('coaches_license');
									} ?>
									<h5>Coaching Level:</h5>
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
									<h5>Sports Coached:</h5>
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
									<h5>Coaching Packages:</h5>
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
					</section><!-- end article section -->


					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>			
					
					    <?php else : ?>
					
                <?php get_template_part( 'partials/missing', 'content' ); ?>
					
					    <?php endif; ?>
				    
    
			</div> <!-- end #content -->

<?php get_footer(); ?>