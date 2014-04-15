<?php
/*
Template Name: Coaching Login Template
*/
?>

<?php get_header(); ?>
			
			<div id="content">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'login' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/not', 'found' ); ?>

					    <?php endif; ?>
			    
			</div> <!-- end #content -->


<?php get_footer(); ?>