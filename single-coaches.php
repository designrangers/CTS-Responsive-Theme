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
								          <?php the_title(); ?><br />
								          <span><?php the_field('coaches_residence'); ?></span>
								        </h2>
									</div>
								</div>
						    </header> <!-- end article header -->
  					<section class="section-light" itemprop="articleBody">
						<div class="row">
							<div class="medium-8 columns">
								<div class="camp-single-hero">
									<?php $campimage = get_field('camp_hero_image'); ?>
	    							<img src="<?php echo $campimage['url']?>" alt="<?php echo $image['alt']?>" />
								</div>
								<div class="camp-single-content">
									<?php the_field('coaches_about'); ?>
								</div>
							</div>
							<div class="medium-4 columns">
								<h3>Coach Stats:</h3>

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