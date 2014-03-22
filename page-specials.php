<?php
/*
Template Name: Specials Template
*/
?>

<?php get_header(); ?>
			
			<div id="content">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'specials' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/not', 'found' ); ?>

					    <?php endif; ?>
			    
			</div> <!-- end #content -->

<!--Specials loop-->
<div class="section-xtralight specials-list">
	<div class="row">
		<div class="medium-12 columns">
			<?php
				$tax = 'specials_category';
				$tax_terms = get_terms($tax);
				if ($tax_terms) {
      			foreach ($tax_terms as $tax_term) {

						$args = array(
							'post_type' => 'specials',
							"$tax" => $tax_term->slug,
							'orderby'   => 'menu_order',
							'posts_per_page' => -1
						);

						$specials_query = new WP_Query($args);

						if ( $specials_query->have_posts() ) {
							echo '<h2>' . $tax_term->name . '</h2>';
							while ( $specials_query->have_posts() ) {
								$specials_query->the_post();
						?>
							<div class="cts-special-detail">
								<?php $specialsimage = get_field('cts_special_image'); ?>
	    						<img class="specials-image" src="<?php echo $specialsimage[sizes]['joints-thumb-300']; ?>" alt="<?php echo $image['alt']?>" />
								
								<h5><?php the_title(); ?></h5>
								<?php the_content(); ?>
								<?php if( get_field('cts_special_expiration') ) {
									$date = DateTime::createFromFormat('Ymd', get_field('cts_special_expiration'));
									echo '<span class="alert [round radius] label">Offer Expires: ' . $date->format('F d, Y') . '</span>';
									}
								?>
							</div>
					<?php 
						}
					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					}
				}
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>