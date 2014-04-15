	<header class="secondary-hero">
		<!-- Intro -->
    	<?php if( get_field('cts_page_subnav') == 'no' ): ?>
			<div class="section-light secondary-title">
			      <div class="row infographics-title">
				    <div class="medium-12 columns">
				    	<h2><?php the_field('cts_pageintro_title'); ?></h2>
				    	<h3><?php the_field('cts_pageintro_subtitle'); ?></h3>
				    	<?php if( get_field('cts_pageintro_content') ) { ?>
					    	<div class="page-intro-content">
					    		<?php the_field('cts_pageintro_content'); ?>
					    	</div>
					    <?php } ?>
				    </div>
				</div>
			</div>
			<?php $fullwidth = get_field('full_width_hero'); ?>
			<?php if($fullwidth) { ?>
				<div class="full-width-image image-wrap">
					<img src="<?php echo $fullwidth['url']?>" alt="<?php echo $fullwidth['alt']?>" />
					<?php if( get_field('full_width_hero_caption') ) { ?>
						<div class="caption-container">
							<p class="caption">
								<?php the_field('full_width_hero_caption'); ?>
							</p>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		<?php elseif( get_field('cts_page_subnav') == 'yes' ): ?>
			<div class="section-light secondary-title">
			    <div class="row infographics-title">
				    <div class="medium-12 columns">
				    	<h2><?php the_field('cts_pageintro_title'); ?></h2>
				    	<h3><?php the_field('cts_pageintro_subtitle'); ?></h3>
				    	<?php if( get_field('cts_pageintro_content') ) { ?>
					    	<div class="page-intro-content">
					    		<?php the_field('cts_pageintro_content'); ?>
					    	</div>
					    <?php } ?>
					</div>
				</div>
			</div>
			<div class="section-dark deep-nav">
				<div class="row">
					<div class="medium-12 columns">
			    		<?php if( get_field( 'cts_page_menu' ) ) : ?>
						        <?php the_field( 'cts_page_menu' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>			
			<?php $fullwidth = get_field('full_width_hero'); ?>
			<?php if($fullwidth) { ?>
				<div class="full-width-image image-wrap">
					<img src="<?php echo $fullwidth['url']?>" alt="<?php echo $fullwidth['alt']?>" />
					<?php if( get_field('full_width_hero_caption') ) { ?>
						<div class="caption-container">
							<p class="caption">
								<?php the_field('full_width_hero_caption'); ?>
							</p>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		<?php endif; ?>

	</header> <!-- end article header -->