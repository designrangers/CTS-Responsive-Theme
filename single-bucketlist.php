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
						    <header class="article-header">
							    <div class="secondary-hero camp-hero">
									<div class="description">
										 <h2 class="large">
										 	<span><?php the_field('bucketlist_location'); ?></span><br />
								          <?php the_title(); ?>
								        </h2>
									</div>
								</div>
						    </header> <!-- end article header -->
  					<section class="section-light" itemprop="articleBody">
						<div class="row">
							<div class="medium-8 columns">
								<div class="camp-single-hero">
									<?php $bucketlist_image = get_field('bucketlist_hero_image'); ?>
	    							<img src="<?php echo $bucketlist_image['url']?>" alt="<?php echo $bucketlist_image['alt']?>" />
								</div>
								<div class="camp-single-content">
									<dl class="tabs" data-tab>
									  <dd class="active"><a href="#bucketlist_description">Description</a></dd>
									  <dd><a href="#bucketlist_includes">Includes</a></dd>
									  <dd><a href="#bucketlist_gallery">Videos &amp; Photos</a></dd>
									  <dd><a href="#bucketlist_testimonials">Quotes</a></dd>
									</dl>
									<div class="tabs-content">
										<div id="bucketlist_description" class="content active">
											<?php if( get_field('bucketlist_description') ):
												the_field('bucketlist_description');
											endif; ?>
										</div>
										<div id="bucketlist_includes" class="content">
											<?php if( get_field('bucketlist_includes') ):
												the_field('bucketlist_includes');
											endif; ?>
										</div>
										<div id="bucketlist_gallery" class="content">
											<h4>Videos &amp; Photos</h4>
											<?php if( get_field('bucketlist_videos') ):
												the_field('bucketlist_videos');
											endif; ?>
											<?php 
 
												$image_ids = get_field('bucketlist_gallery', false, false);
												 
												$shortcode = '
												 
												[gallery ids="' . implode(',', $image_ids) . '"]
												';
												 
												echo do_shortcode( $shortcode );
												 
											?>
										</div>
										<div id="bucketlist_testimonials" class="content active">
											<?php if( get_field('bucketlist_testimonials') ):
												the_field('bucketlist_testimonials');
											endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="medium-4 columns">
								<h3>Event Details</h3>
								<h4>
									<?php
										$startdate = DateTime::createFromFormat('Ymd', get_field('bucketlist_start_date'));
										$enddate = DateTime::createFromFormat('Ymd', get_field('bucketlist_end_date'));
										echo $startdate->format('F d') . '-' . $enddate->format('d, Y'); 
									?>
								</h4>
								<h4>Price: <?php the_field('bucketlist_price') ?></h4>
								<a class="cts-button" style="margin-top: 24px;" href="<?php the_field('bucketlist_registration_link'); ?>">Sign up now</a>
								<h4>CTS Insight:</h4>
								<p><?php the_field('bucketlist_insight'); ?></p>


							</div>
						</div>
					</section><!-- end article section -->
					<section class="cts-cta section-xtralight">
						<div class="row">
							<div class="medium-12 columns">
								<h2>Registration</h2>
								<?php if( get_field('bucketlist_registration') ):
									the_field('bucketlist_registration');
								endif; ?>
							</div>
						</div>
					</section>
					<section class="cts-cta section-light">
						<div class="row">
							<div class="medium-12 columns">
								<h2>Add-ons</h2>
								<?php if( get_field('bucketlist_addons') ):
									the_field('bucketlist_addons');
								endif; ?>
							</div>
						</div>
					</section>
					<section class="cts-cta section-xtralight">
						<div class="row">
							<div class="medium-12 columns">
								<h2>Cancellations</h2>
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