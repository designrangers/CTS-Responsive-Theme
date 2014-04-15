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
								<?php $bucketlist_image = get_field('bucketlist_hero_image');
									if($bucketlist_image) { ?>
			    							<img src="<?php echo $bucketlist_image[sizes]['cts-camp-hero-637']; ?>" alt="<?php echo $image['alt']; ?>" />
									<?php } ?>
								</div>
								<div class="camp-single-content">
									<dl class="tabs" data-tab>
									  <dd class="active"><a href="#bucketlist_description">Description</a></dd>
									  <dd><a href="#bucketlist_includes">Includes</a></dd>
									  <dd style="width: 30%;"><a href="#bucketlist_gallery">Videos &amp; Photos</a></dd>
									  <dd style="width: 20%;"><a href="#bucketlist_testimonials">Quotes</a></dd>
									</dl>
									<div class="tabs-content">
										<div id="bucketlist_description" class="content active">
											<h4>Event Description</h4>
											<?php if( get_field('bucketlist_description') ):
												the_field('bucketlist_description');
											endif; ?>
										</div>
										<div id="bucketlist_includes" class="content">
											<h4>Includes</h4>
											<?php if( get_field('bucketlist_includes') ):
												the_field('bucketlist_includes');
											endif; ?>
										</div>
										<div id="bucketlist_gallery" class="content">
											<h4>Videos &amp; Photos</h4>
											<?php if( get_field('bucketlist_videos') ):
												the_field('bucketlist_videos');
											endif; ?>
											<?php if( get_field('bucketlist_photo_gallery') ):
												the_field('bucketlist_photo_gallery');
											endif; ?>
										</div>
										<div id="bucketlist_testimonials" class="content">
											<h4>Testimonials</h4>
											<?php if( get_field('bucketlist_testimonials') ):
												the_field('bucketlist_testimonials');
											endif; ?>
										</div>
									</div>
									<a class="camp-more-details" href="#event-details">
										View event details
									</a>										
								</div>							
							</div>
							<div class="medium-4 columns">
								<div class="camp-single-facts">
									<h4>
										<span>Location:</span>
									</h4>
									<ul class="bucketlist-location">
										<?php foreach (get_the_terms($post->ID, 'bucketlist_location') as $cat) : ?>
										 <li>
										 	<?php echo $cat->name; ?>
										 </li>
										 <?php endforeach; ?>
									</ul>
									<h4 class="camp-single-date">
										<span>Date:</span>
										<?php
											$startdate = DateTime::createFromFormat('Ymd', get_field('bucketlist_start_date'));
											$enddate = DateTime::createFromFormat('Ymd', get_field('bucketlist_end_date'));
											echo $startdate->format('F d') . '-' . $enddate->format('d, Y'); 
										?>
									</h4>
									<h4>
										<span>Price:</span>
										<?php the_field('bucketlist_price') ?>
									</h4>
									<h4 class="camp-register">Registration:</h4>
									<a class="cts-button" href="<?php the_field('bucketlist_registration_link'); ?>">Apply Now</a>
									<div class="camp-insight">
										<h4><span>CTS Insight:</span></h4>
										<p><?php the_field('bucketlist_insight'); ?></p>
									</div>
								</div>


							</div>
						</div>
					</section><!-- end article section -->
					<section class="cts-cta section-dark">
						<div class="row">
							<div class="medium-12 columns">
								<?php if( get_field('bucketlist_call_to_action' , 'option') ):
									echo the_field('bucketlist_call_to_action', 'option');
								endif; ?>
							</div>
						</div>
					</section>
					<section class="cts-cta section-xtralight">
						<div class="row">
							<div class="medium-12 columns">
							<h2><a name="event-details">Event Details</a></h2>
								<h4>Registration</h4>
								<?php if( get_field('bucketlist_registration') ):
									the_field('bucketlist_registration');
								endif; ?>
								<h4>Add-ons</h4>
								<?php if( get_field('bucketlist_addons') ):
									the_field('bucketlist_addons');
								endif; ?>
								<h4>Cancellations</h4>
								<?php if( get_field('bucketlist_cancellations') ):
									the_field('bucketlist_cancellations');
								endif; ?>
							</div>
						</div>
					</section>
					<section class="cts-cta section-dark">
						<div class="row">
							<div class="medium-12 columns">
								<?php if( get_field('bucketlist_call_to_action' , 'option') ):
									echo the_field('bucketlist_call_to_action', 'option');
								endif; ?>
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