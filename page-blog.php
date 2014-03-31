<?php
/*
Template Name: Blog Feed
*/
?>

<?php get_header(); ?>
	<header class="section-light secondary-title-only">
	      <div class="row infographics-title">
		    <div class="medium-12 columns">
		    	<h2>CTS Blog</h2>
		    	<h3>Articles and tips</h3>
		    </div>
		</div>
	</header>	
	<!--FEATURED POST-->
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	<section class="blog-featured-row">
		<div class="row">
			<?php 
				$sticky = get_option( 'sticky_posts' );
				$args = array(
					'post__in'  => $sticky,
					'ignore_sticky_posts' => 1,
					'orderby' => date,
					'posts_per_page' => 1					
				);
				$query1 = new WP_Query( $args );
				if ( $query1->have_posts() ) { while ( $query1->have_posts() ) { $query1->the_post(); ?>			
			<div class="large-8 medium-8 columns">
				<?php the_post_thumbnail('cts-camp-hero-637');?>
			</div>
			<div class="medium-4 columns">
				<div class="blog-featured-content">
					<h4><span>Featured Article:</span></h4>
					<h2><?php the_title();?></a></h2>
					<a class="cts-button" title="<?php the_title();?>" href="<?php the_permalink();?>">Read More</a>
				</div>
				<?php } } wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
</article>
	<div class="section-light">
		<div class="row blog-feed">
			<div class="large-8 columns">
						<!--Blog loop-->
						<?php 
						/* variable for alternating post styles */
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$sticky = get_option( 'sticky_posts' );
						$args = array (
							'post' => 'posts',
							'order' => 'DESC',
							'posts_per_page'=> 10,
							'paged' => $paged,
							'post__not_in' => $sticky
						);

						$wp_query = new WP_Query( $args );

						if ( $wp_query->have_posts() ) {
							while ( $wp_query->have_posts() ) {
								$wp_query->the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
							<section class="blog-posts">
							  		<h3><?php the_title(); ?></h3>
							    	<?php the_excerpt(); ?>
							    	<a class="cts-button" href="<?php the_permalink(); ?>">Read the full article</a>
							</section>
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
							</footer>									    	
						</article>

						<?php	
							}
						} else {
							// no posts found
						} ?>
						<?php if (function_exists('joints_page_navi')) { ?>
					        <?php joints_page_navi(); ?>
					    <?php } else { ?>
					    	<nav class="wp-prev-next">
					            <ul class="clearfix">
					    	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "jointstheme")) ?></li>
					    	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "jointstheme")) ?></li>
					            </ul>
					        </nav>
					    <?php } ?>
						<?php
						/* Restore original Post Data */
						wp_reset_postdata(); ?>
			</div><!-- end 8-columns -->
				<?php get_sidebar(); ?>
		</div><!-- end .blog-feed -->
	</div><!-- end .section-light -->

		    

		    
<?php get_footer(); ?>