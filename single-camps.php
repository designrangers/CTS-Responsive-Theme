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
							<header class="section-light secondary-title camp-hero">
							    <div class="row infographics-title">
								    <div class="medium-8 columns">
								    	<h2><?php the_title(); ?></h2>
								    </div>
								</div>
						    </header> <!-- end article header -->
  					<section class="section-light" itemprop="articleBody">
						<div class="row camp-single-container">
							<div class="medium-8 columns">
								<div class="camp-single-hero">
									<?php $campimage = get_field('camp_hero_image'); ?>
	    							<img src="<?php echo $campimage['url']?>" alt="<?php echo $image['alt']?>" />
								</div>
								<div class="camp-single-content">
									<dl class="tabs" data-tab>
									  <dd class="active"><a href="#camp_description">Description</a></dd>
									  <dd><a href="#camp_location">Location</a></dd>
									  <dd><a href="#camp_itinerary">Itinerary</a></dd>
									  <dd><a href="#camp_includes">Includes</a></dd>
									</dl>
									<div class="tabs-content">
										<div id="camp_description" class="content active">
											<h4>Camp Description</h4>
											<?php if( get_field('camp_description') ):
												the_field('camp_description');
											endif; ?>
										</div>
										<div id="camp_location" class="content">
											<?php if( get_field('cts_camp_location') ):
												echo '<h4>' . get_field('cts_camp_location') . '</h4>';
											endif; ?>
											<?php if( get_field('camp_location_details') ):
												the_field('camp_location_details');
											endif; ?>
										</div>
										<div id="camp_itinerary" class="content">
											<h4>Itinerary</h4>
											<?php if( get_field('camp_itinerary') ):
												the_field('camp_itinerary');
											endif; ?>
										</div>
										<div id="camp_includes" class="content">
											<h4>Includes</h4>
											<?php if( get_field('camp_includes') ):
												the_field('camp_includes');
											endif; ?>
										</div>
									</div>
									<a class="camp-more-details" href="#camp-details">
										View camp details
									</a>
								</div>
							</div>
							<div class="medium-4 columns">
								<div class="camp-single-facts">
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
									<h4 class="camp-single-price">
										<span>Price:</span>
										<?php the_field('camp_price') ?></h4>
									<!-- Call-to-action -->
									<h4 class="camp-register">Registration:</h4>	
									<a class="cts-button" href="<?php the_field('camp_registration_link'); ?>">Book your spot</a>
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
									<?php 
									/*
									// Camp Intensity
									<h4>
										<span>Intensity Level:</span>
									</h4>
									<?php if( get_field('camp_intensity') == 'Extra-Light' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-1.png" alt="Extra-Light" />
									<?php elseif( get_field('camp_intensity') == 'Light' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-2.png" alt="Light" />
									<?php elseif( get_field('camp_intensity') == 'Medium' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-3.png" alt="Medium" />
									<?php elseif( get_field('camp_intensity') == 'Hard' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-4.png" alt="Hard" />
									<?php elseif( get_field('camp_intensity') == 'Intense' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-5.png" alt="Intense" />	
									<? endif ?>
									*/
									?>
									<h4>
										<span>Mileage:</span>
									</h4>
									<?php if( get_field('camp_mileage') == 'Extra-Short' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-1.png" alt="Extra-Short" />
									<?php elseif( get_field('camp_mileage') == 'Short' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-2.png" alt="Short" />
									<?php elseif( get_field('camp_mileage') == 'Medium' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-3.png" alt="Medium" />
									<?php elseif( get_field('camp_mileage') == 'Long' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-4.png" alt="Long" />
									<?php elseif( get_field('camp_mileage') == 'Endurance' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-5.png" alt="Endurance" />	
									<? endif ?>
									</h4>
									<h4>
										<span>Amount of Instruction:</span>
									</h4>
									<?php if( get_field('camp_instruction') == 'Low' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-1.png" alt="Low" />
									<?php elseif( get_field('camp_instruction') == 'Medium' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-3.png" alt="Medium" />
									<?php elseif( get_field('camp_instruction') == 'High' ): ?>
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/level-5.png" alt="High" />	
									<? endif ?>
									<div class="camp-insight">
										<h4><span>CTS Insight:</span></h4>
										<p><?php the_field('camp_insight'); ?></p>
									</div>
									<div class="camp-specials">
										<h4><span>Current Specials:</span></h4>
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
													'terms' => 'camps'
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
									</div>																
								</div>
							</div>
						</div>
					</section><!-- end article section -->
					<section class="cts-cta section-dark">
						<div class="row">
							<div class="medium-12 columns">
								<?php if( get_field('camps_call_to_action' , 'option') ):
									echo the_field('camps_call_to_action', 'option');
								endif; ?>
							</div>
						</div>
					</section>
					<section class="camp-secondary-info section-light">
						<div class="row">
							<div class="medium-12 columns">
								<h2><a name="camp-details">Camp Details</a></h2>
									<div class="camp-single-content">
										<dl class="tabs camp-detail-tabs" data-tab>
										  <dd class="active"><a href="#camp_registration">Registration &amp;<br>Cancellation</a></dd>
										  <dd><a href="#camp_arrival">Arrival &amp;<br>Departure</a></dd>
										  <dd><a href="#camp_biketransport">Bike <br>Transport</a></dd>
										  <dd><a href="#camp_lodging">Local <br>Lodging</a></dd>
										  <dd><a href="#camp_airport">Local <br>Airports</a></dd>
										  <dd><a href="#camps_what_to_bring">What <br>to Bring</a></dd>
										</dl>
										<div class="tabs-content">
											<div id="camp_registration" class="content active">
												<h4>Registration/Cancellations</h4>
												<p>
													<?php if( get_field('camp_registration') ):
													the_field('camp_registration');
													endif; ?>
												</p>
												<strong>Cancellation:</strong>
												<p><a href="/camp-overview/cancellation-policy">Click to view Cancellation Policy</a></p>
											</div>
											<div id="camp_arrival" class="content">
												<h4>Arrival/Departure</h4>
												<p>We recommend you arrive by
												<?php $date = DateTime::createFromFormat('Ymd', get_field('camp_arrival_date'));
												echo $date->format('l, F d, Y'); ?>
												. Camp registration will be from 
												<?php the_field('camp_registration_time'); ?>
												<?php $date = DateTime::createFromFormat('Ymd', get_field('camp_registration_date'));
												echo $date->format('l, F d, Y'); ?> 
												. You must provide your own transportation. The conclusion of the camp will be
												<?php $date = DateTime::createFromFormat('Ymd', get_field('camp_conclusion_date'));
												echo $date->format('l, F d, Y'); ?>.
											</p>
											</div>
											<div id="camp_biketransport" class="content">
												<h4>Bike Transport and Assembly</h4>
												<p>If you are shipping your bike, please make sure it arrives at CTS or your hotel by
												<?php $date = DateTime::createFromFormat('Ymd', get_field('bike_arrival_date'));
												echo $date->format('l, F d, Y'); ?>.
												</p>
												<?php the_field('camp_bike_transport_custom'); ?>
											</div>
											<div id="camp_lodging" class="content">
												<h4>Lodging</h4>
												<div class="row">
													<?php $terms = get_the_terms( $post->ID , 'camps_lodging' );
														if($terms) {
															foreach( $terms as $term ) {
																echo '<div class="medium-4 columns">' . $term->description . '</div>';
															}
														}
													?>
												</div>
											</div>
											<div id="camp_airport" class="content">
												<h4>Airport</h4>
												<p>
													<?php if( get_field('camp_airport') ):
													the_field('camp_airport');
												endif; ?>
												</p>
											</div>
											<div id="camps_what_to_bring" class="content">
												<h4>What to Bring</h4>
												<?php if( get_field('camps_what_to_bring', 'option') ):
													the_field('camps_what_to_bring', 'option');
												endif; ?>
											</div>
										</div>
										<a class="camp-more-details" href="<?php the_field('camp_registration_link'); ?>">
											Register for this camp &raquo;
										</a>
									</div>
								</div>
							</div>
					</section>


					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>			
					
					    <?php else : ?>
					
                <?php get_template_part( 'partials/missing', 'content' ); ?>
					
					    <?php endif; ?>
				    
    
			</div> <!-- end #content -->

<?php get_footer(); ?>