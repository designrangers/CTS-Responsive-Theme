<?php
/*
Template Name: Blog Feed
*/
?>

<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	<header class="section-light secondary-title-only">
	      <div class="row infographics-title">
		    <div class="medium-12 columns">
		    	<h2>CTS Blog</h2>
		    	<h3>Articles and tips</h3>
		    </div>
		</div>
	</header>	
	<!--FEATURED POST-->
	
	<section class="section-light">
		<div class="row">
			<div class="large-12 columns">
				<?php 
					$sticky = get_option( 'sticky_posts' );
					$args = array(
						'posts_per_page' => 1,
						'post__in'  => $sticky,
					);
					$query1 = new WP_Query( $args );
					if ( $query1->have_posts() ) { while ( $query1->have_posts() ) { $query1->the_post(); ?>
						<?php the_post_thumbnail();?>
						<div class="content">
							<h2><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h2>
							<p class="links"><a title="<?php the_title();?>" href="<?php the_permalink();?>">Read More</a></p>
						</div>
				<?php } } wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<div class="section-xtralight">
		<div class="row blog-feed">
			<div class="large-8 columns">
				<div class="row">
					<div class="large-12 columns">
						<!--Blog loop-->
						<?php 
						/* variable for alternating post styles */
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$sticky = get_option( 'sticky_posts' );
						$args = array (
							'post' => 'posts',
							'order' => 'DESC',
							'posts_per_page'=> 3,
							'paged' => $paged,
							'post__not_in' => $sticky
						);

						$wp_query = new WP_Query( $args );

						if ( $wp_query->have_posts() ) {
							while ( $wp_query->have_posts() ) {
								$wp_query->the_post();
						?>
							
							  	<div class="">
								  	<div class="row">
									  	<div class="large-12 medium-12 columns">
									  		<h3><?php the_title(); ?></h3>
									    	<p><?php the_excerpt(); ?></p>
									    	<a class="cts-button" href="<?php the_permalink(); ?>">Read the full article</a>
								    		<div class="blog-meta">
												<h4>
													<span>Posted:</span>
													<?php the_date( 'F j, Y'); ?> 
												</h4>
												<h4>
													<span>Author:</span>
													<?php the_author(); ?> 
												</h4>
												<h4>
													<span>Categories:</span>
													<?php the_category(''); ?> 
												</h4>																										
											</div>									    	
									    </div>
									</div>
								</div>

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



					</div>
				</div>
			</div>
				<?php get_sidebar(); ?>
		</div> <!-- end .blog-feed -->
	</div>
</article>

		    

		    
<?php get_footer(); ?>