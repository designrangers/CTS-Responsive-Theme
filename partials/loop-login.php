
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<header class="section-light secondary-title">
	    <div class="row infographics-title">
		    <div class="medium-8 columns">
		    	<h2><?php the_title(); ?></h2>
		    	<?php 
		    		if( get_field('coaching_login_subtitle') ) { ?>
		    			<h3><?php the_field('coaching_login_subtitle'); ?></h3>
		    	<?php } ?>
		    </div>
		</div>
    </header> <!-- end article header -->
	<section class="section-light" itemprop="articleBody">
		<div class="row">
    		<div class="medium-8 columns">
				<div class="login-single-content">
						<?php the_field('coaching_login_form'); ?>
					<div class="coaching-login-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="medium-4 columns">
				<div class="camp-single-facts">
					<h4><span>CTS Athlete Specials:</span></h4>
					<?php

					/*
					 * WP_Query happy dance
					 */
					
					$args = array(
						'post_type' => 'specials',
						'orderby'   => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'specials_category',
								'field' => 'slug',
								'terms' => 'cts-athletes'
							)
						)
					);

					$specialsquery = new WP_Query( $args );

					if ( $specialsquery->have_posts() ) {
						while ( $specialsquery->have_posts() ) {		
							$specialsquery->the_post(); ?>
							
							<div class="cts-special-item">
								<h5><?php the_title(); ?></h5>
								<?php if ( get_field('cts_special_overview') ) {
									the_field('cts_special_overview'); 
								}
								else {
									the_content();
								}
								?>
								<?php if( get_field('cts_special_expiration') ) {
									$date = DateTime::createFromFormat('Ymd', get_field('cts_special_expiration'));
									echo '<span class="alert [round radius] label">Offer Expires: ' . $date->format('F d, Y') . '</span>';
									}
								?>
							</div>
				<?php	}
					} else {
						
						// aww, no posts... do other stuff
						
					}

					wp_reset_postdata(); ?>
					<a class="arrowlink" href="/specials">View all specials</a>
				</div>	
			</div>
		</div>
	</section> <!-- end article section -->				
</article> <!-- end article -->
