<?php
/*
Template Name: Athletes Template
*/
?>

<?php get_header(); ?>
			
			<div id="content">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'coaches' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/not', 'found' ); ?>

					    <?php endif; ?>
			    
			</div> <!-- end #content -->

<!--Athletes loop-->
<div class="section-xtralight">
	<div class="row">
		<div class="medium-12 columns">
			<ul class="small-block-grid-2 medium-block-grid-4 text-center">
				<?php
				$args = array(
					'post_type' => 'athletes',
					'posts_per_page' => -1
				);
				add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
				$athletes_query = new WP_Query($args);

				if ( $athletes_query->have_posts() ) {
					while ( $athletes_query->have_posts() ) {
						$athletes_query->the_post();
				?>
					
				        <li>
				            <a href="#" class="coach-block top-block" data-reveal-id="<?php the_ID(); ?>">
				            <div class="coach-image">
				              <?php $athleteheadshot = get_field('athlete_image'); ?>
				                <?php if($athleteheadshot) { ?>
				                    <img src="<?php echo $athleteheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $athleteheadshot['alt'];?>" />
				                <?php } else { ?>
				                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
				                <?php 
				                } ?>
				              <div class="coach-name">
				                <h3><?php the_title(); ?></h3>
				                <p><?php the_field('athlete_subtitle'); ?></p>
				                <span>Read Full Bio</span>

				              </div>
				            </div>
				          </a>
				        </li>
				        <div id="<?php the_ID(); ?>" class="reveal-modal" data-reveal>
				          <div class="row">
				            <div class="medium-4 columns">  
				              <?php $althleteheadshot = get_field('althlete_headshot'); ?>
				              <?php if($althleteheadshot) { ?>
				                  <img src="<?php echo $althleteheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $althleteheadshot['alt'];?>" />
				              <?php } else { ?>
				                <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
				              <?php 
				              } ?> 
				            </div>
					        <div class="medium-8 columns">
					        	<h2><?php the_title(); ?></h2>
					        	<div class="row reveal-athlete">
						            <div class="medium-6 columns"> 
						              <h4>Stats:</h4>
						              <?php the_field('athlete_bio'); ?>
						            </div>
									<div class="medium-6 columns">				            
						            	<h4>Accomplishments</h4>
						              	<?php the_field('athlete_accomplishments'); ?>
						            </div>
					          	</div>
					        </div>
					            <a class="close-reveal-modal">&#215;</a>
				           </div>
				        </div>
				    
				<?php	
					}
				} else {
					// no posts found
				}
				remove_filter( 'posts_orderby' , 'posts_orderby_lastname' );
				/* Restore original Post Data */
				wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</div>
<?php get_footer(); ?>