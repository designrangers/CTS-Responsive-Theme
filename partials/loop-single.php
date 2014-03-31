<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix cts-blog-single'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header">	
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>	
    </header> <!-- end article header -->
					
    <section class="entry-content clearfix" itemprop="articleBody">
		<?php the_post_thumbnail('full'); ?>
		<?php the_content(); ?>
	</section> <!-- end article section -->
	<footer class="article-footer blog-meta">								  		
			<h4>
				<span>Posted: <?php the_date( 'F j, Y'); ?></span>
			</h4>
			<h4>
				<span>Author: <?php the_author(); ?></span>
				
			</h4>
			<h4 class="categories">
				<span>Categories: <?php the_category(', '); ?></span>
				 
			</h4>																										
	</footer> <!-- end article footer -->
									
	<?php comments_template(); ?>	
													
</article> <!-- end article -->