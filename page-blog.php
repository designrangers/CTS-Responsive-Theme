<?php
/*
Template Name: Blog Feed
*/
?>

<?php get_header(); ?>

	<header class="secondary-hero">
		<?php $image = get_field('cts_hero_image_only'); ?>
	    <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>" />
	   	<?php if( get_field('cts_hero_alignment_only') == 'text-on-left' ): ?>		
		    <div class="description heroleft">
				<?php the_field('cts_hero_text_only'); ?>
			</div>
		<?php elseif( get_field('cts_hero_alignment_only') == 'text-on-right' ): ?>
			 <div class="description heroright">
				<?php the_field('cts_hero_text_only'); ?>
			</div>
		<?php elseif( get_field('cts_hero_alignment_only') == 'text-in-center' ): ?>
			 <div class="description herocenter">
				<?php the_field('cts_hero_text_only'); ?>
			</div>
		<?php endif; ?>
	</header> <!-- end article header -->
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
						<?php
							$sticky = get_option( 'sticky_posts' );
							$args = array(
								'posts_per_page'=> 10,
								'post__not_in' => $sticky,
							);
							$query3 = new WP_Query( $args );
							?>
							<?php while ($query3->have_posts()) : $query3->the_post(); ?>
								<?php get_template_part( 'partials/loop', 'blog' ); ?>
							<?php endwhile; 
							wp_reset_postdata(); ?>
								
						
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
					</div>
				</div>
			</div>
				<?php get_sidebar(); ?>
		</div> <!-- end .blog-feed -->
	</div>

		    

		    
<?php get_footer(); ?>