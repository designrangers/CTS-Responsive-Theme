<?php
/*
Template Name: Bucket List Overview Page
*/
?>

<?php get_header(); ?>
			
			<div id="content">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'page' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/not', 'found' ); ?>

					    <?php endif; ?>
			    
			</div> <!-- end #content -->

<!--Events loop-->
<div class="section-light secondary-title">
      <div class="row upcoming-camps-title">
        <div class="large-12 columns">
            <h2><?php the_field('upcoming_bucket_list_title'); ?></h2>
            <h3><?php the_field('upcoming_bucket_list_subtitle'); ?></h3>
        </div>
	</div>
</div>
<div class="section-bright-cta">
		<a href="/camp-calendar">See all bucket list events &raquo;</a>
</div>

<?php get_footer(); ?>