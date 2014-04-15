<?php
/*
Template Name: Coaches Template
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
			<!-- Category Filters -->
			<div class="camp-categories">
			  <div class="row">
			    <div class="large-12 columns">
					<div class="cat">
						<ul class="inline-list coach-filters">
							<li><a href="#premier">Premier</a></li>
							<li><a href="#pro">Pro</a></li>
							<li><a href="#senior">Senior</a></li>
							<li><a href="#expert">Expert</a></li>
						</ul>
					</div>
			    </div>
			  </div>
			</div>

<!--Coaches loop-->
<div class="section-light" id="premier">
	<div class="row">
		<div class="medium-12 columns">
			<ul class="small-block-grid-2 medium-block-grid-4 text-center">
				<?php
				//Premier Coaches
				$args = array(
					'post_type' => 'coaches',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'coaching_level',
							'field' => 'slug',
							'terms' => 'premier'
						)
					)
				);
				add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
				$premier_query = new WP_Query($args);
				echo '<a name="premier"><h2>Coaching Level: Premier</h2></a>';

				if ( $premier_query->have_posts() ) {
					while ( $premier_query->have_posts() ) {
						$premier_query->the_post();
				?>
					
				        <li>
				            <a href="<?php the_permalink(); ?>" class="coach-block top-block">
				            <div class="coach-image">
				              <?php $coachheadshot = get_field('coach_headshot'); ?>
				                <?php if($coachheadshot) { ?>
				                    <img src="<?php echo $coachheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $coachheadshot['alt'];?>" />
				                <?php } else { ?>
				                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
				                <?php 
				                } ?>
				              <div class="coach-name">
				                <h3><?php the_title(); ?></h3>
				                <p><?php the_field('coaches_residence'); ?></p>
				                <span>Read Full Bio</span>
				              </div>
				            </div>
				          </a>
				        </li>
				    
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
<div class="section-xtralight">
	<div class="row">
		<div class="medium-12 columns">
			<ul class="small-block-grid-2 medium-block-grid-4 text-center">
				<?php
				//Pro Coaches
				$args = array(
					'post_type' => 'coaches',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'coaching_level',
							'field' => 'slug',
							'terms' => 'pro'
						)
					)
				);
				add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
				$coaches_query = new WP_Query($args);
				echo '<a name="pro"><h2>Coaching Level: Pro</h2></a>';

				if ( $coaches_query->have_posts() ) {
					while ( $coaches_query->have_posts() ) {
						$coaches_query->the_post();
				?>
					
				        <li>
				            <a href="<?php the_permalink(); ?>" class="coach-block top-block">
				            <div class="coach-image">
				              <?php $coachheadshot = get_field('coach_headshot'); ?>
				                <?php if($coachheadshot) { ?>
				                    <img src="<?php echo $coachheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $coachheadshot['alt'];?>" />
				                <?php } else { ?>
				                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
				                <?php 
				                } ?>
				              <div class="coach-name">
				                <h3><?php the_title(); ?></h3>
				                <p><?php the_field('coaches_residence'); ?></p>
				                <span>Read Full Bio</span>

				              </div>
				            </div>
				          </a>
				        </li>
				    
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
<div class="section-light">
	<div class="row">
		<div class="medium-12 columns">
			<ul class="small-block-grid-2 medium-block-grid-4 text-center">
				<?php
				//Senior Coaches
				$args = array(
					'post_type' => 'coaches',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'coaching_level',
							'field' => 'slug',
							'terms' => 'senior'
						)
					)
				);
				add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
				$senior_query = new WP_Query($args);
				echo '<a name="senior"><h2>Coaching Level: Senior</h2></a>';

				if ( $senior_query->have_posts() ) {
					while ( $senior_query->have_posts() ) {
						$senior_query->the_post();
				?>
					
				        <li>
				            <a href="<?php the_permalink(); ?>" class="coach-block top-block">
				            <div class="coach-image">
				              <?php $coachheadshot = get_field('coach_headshot'); ?>
				                <?php if($coachheadshot) { ?>
				                    <img src="<?php echo $coachheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $coachheadshot['alt'];?>" />
				                <?php } else { ?>
				                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
				                <?php 
				                } ?>
				              <div class="coach-name">
				                <h3><?php the_title(); ?></h3>
				                <p><?php the_field('coaches_residence'); ?></p>
				                <span>Read Full Bio</span>

				              </div>
				            </div>
				          </a>
				        </li>
				    
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
<div class="section-xtralight">
	<div class="row">
		<div class="medium-12 columns">
			<ul class="small-block-grid-2 medium-block-grid-4 text-center">
				<?php
				//Expert Coaches
				$args = array(
					'post_type' => 'coaches',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'coaching_level',
							'field' => 'slug',
							'terms' => 'expert'
						)
					)
				);
				add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
				$senior_query = new WP_Query($args);
				echo '<a name="expert"><h2>Coaching Level: Expert</h2></a>';

				if ( $senior_query->have_posts() ) {
					while ( $senior_query->have_posts() ) {
						$senior_query->the_post();
				?>
					
				        <li>
				            <a href="<?php the_permalink(); ?>" class="coach-block top-block">
				            <div class="coach-image">
				              <?php $coachheadshot = get_field('coach_headshot'); ?>
				                <?php if($coachheadshot) { ?>
				                    <img src="<?php echo $coachheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $coachheadshot['alt'];?>" />
				                <?php } else { ?>
				                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
				                <?php 
				                } ?>
				              <div class="coach-name">
				                <h3><?php the_title(); ?></h3>
				                <p><?php the_field('coaches_residence'); ?></p>
				                <span>Read Full Bio</span>
				              </div>
				            </div>
				          </a>
				        </li>
				    
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

<?php 
 
$posts = get_field('cts_featured_coaches');
 
if( $posts ): ?>
    <ul class="small-block-grid-2 medium-block-grid-4">
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="#" class="coach-block top-block" data-reveal-id="<?php the_ID(); ?>">
            <div class="coach-image">
              <?php $coachheadshot = get_field('coach_headshot'); ?>
                <?php if($coachheadshot) { ?>
                    <img src="<?php echo $coachheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $coachheadshot['alt'];?>" />
                <?php } else { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
                <?php 
                } ?>
              <div class="coach-name">
                <h3><?php the_title(); ?></h3>
                <p><?php the_field('coaches_residence'); ?></p>
              </div>
            </div>
          </a>
        </li>
        <div id="<?php the_ID(); ?>" class="reveal-modal" data-reveal>
          <div class="row">
            <div class="medium-4 columns">
              <?php $coachimage = get_field('coach_and_athlete'); ?>
              <?php if($coachimage) { ?>
                  <img src="<?php echo $coachimage[sizes]['joints-thumb-400'];?>" alt="<?php echo $coachimage['alt'];?>" />
              <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
              <?php 
              } ?>
              <p class="text-center"><a href="<?php the_permalink(); ?>">Read Full Coach Bio</a></p>
            </div>
            <div class="medium-8 columns">    
              <h2><?php the_title(); ?></h2>
              <p><?php the_field('coaches_summary'); ?></p>
            </div>
          </div>
            <a class="close-reveal-modal">&#215;</a>
        </div>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

<?php get_footer(); ?>