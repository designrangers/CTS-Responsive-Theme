
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				
    <section class="entry-content clearfix" itemprop="articleBody">
    	<!-- Intro -->
    	<?php if( get_field('cts_page_subnav') == 'no' ): ?>
			<div class="section-light secondary-title">
			      <div class="row infographics-title">
				    <div class="medium-12 columns">
				    	<h2><?php the_field('cts_pageintro_title'); ?></h2>
				    	<h3><?php the_field('cts_pageintro_subtitle'); ?></h3>
				    </div>
				</div>
			</div>
			<div class="section-light">
				<div class="row">
				    <div class="medium-12 columns">
						<?php the_field('cts_pageintro_content'); ?>
					</div>
				</div>
			</div>
		<?php elseif( get_field('cts_page_subnav') == 'yes' ): ?>
			<div class="section-light">
			    <div class="row infographics-title">
				    <div class="medium-4 columns">
				    	<div class="deep-nav-container">
				    		<?php if( get_field( 'cts_page_menu' ) ) : ?>
							        <?php the_field( 'cts_page_menu' ); ?>
							<?php endif; ?>
				    	</div>
				    </div>
				    <div class="medium-8 columns">
				    	<h2><?php the_field('cts_pageintro_title'); ?></h2>
				    	<h3><?php the_field('cts_pageintro_subtitle'); ?></h3>
						<?php the_field('cts_pageintro_content'); ?>
						
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php get_template_part( 'partials/cts', 'flexible-content' ); ?>

	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->
					
</article> <!-- end article -->
