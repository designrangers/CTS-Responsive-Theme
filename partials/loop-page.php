<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<?php get_template_part( 'partials/cts', 'secondary-hero' ); ?>
				
    <section class="entry-content clearfix" itemprop="articleBody">
    	
		<?php get_template_part( 'partials/cts', 'flexible-content' ); ?>

	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->
					
</article> <!-- end article -->
