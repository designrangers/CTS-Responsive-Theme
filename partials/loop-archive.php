<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
	<header class="article-header">
		<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>			
	</header> <!-- end article header -->
					
	<section class="entry-content clearfix blog-posts" itemprop="articleBody">
    	<?php the_excerpt(); ?>
    	<a class="cts-button" href="<?php the_permalink(); ?>">Read the full article</a>			
	</section> <!-- end article section -->
						
	<footer class="article-footer">

	</footer> <!-- end article footer -->
						    
		<?php // comments_template(); // uncomment if you want to use them ?>
					
</article> <!-- end article -->