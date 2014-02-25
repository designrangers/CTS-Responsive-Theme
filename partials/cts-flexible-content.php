<?php
			// check if the flexible content field has rows of data
			if( have_rows('cts_page_sections') ):
			 
			     // loop through the rows of data
			    while ( have_rows('cts_page_sections') ) : the_row();
			 
			        if( get_row_layout() == 'cts_light_row' ): ?>
	        			<?php if( get_sub_field('cts_lightrow_cols') == 'single-column' ): ?>
	        			<!--light row-->
	        			<div class="section-light">
	        				<div class="row">
		        					<div class="medium-12 columns">
		        						<?php the_sub_field('cts_lightrow_content'); ?>
		        					</div>
	        				</div>
	        			</div><!--end light row-->	
						<?php elseif( get_sub_field('cts_lightrow_cols') == 'two-columns' ): ?>
						<!--light row-->
	        			<div class="section-light">
	        				<div class="row">
									<div class="medium-6 columns">
										<?php the_sub_field('cts_lightrow1_content'); ?>
									</div>
									<div class="medium-6 columns">
										<?php the_sub_field('cts_lightrow2_content'); ?>
									</div>
							</div>
	        			</div><!--end light row-->	
			        			<?php endif;

			        elseif( get_row_layout() == 'cts_dark_row' ): ?>

	        			<?php if( get_sub_field('cts_darkrow_cols') == 'single-column' ): ?>
	        			<!--dark row-->
	        			<div class="section-dark">
	        				<div class="row">
		        					<div class="medium-12 columns">
		        						<?php the_sub_field('cts_darkrow_content'); ?>
		        					</div>
	        				</div>
	        			</div><!--end dark row-->	
						<?php elseif( get_sub_field('cts_darkrow_cols') == 'two-columns' ): ?>
						<div class="section-dark">
	        				<div class="row">
									<div class="medium-6 columns col-1">
										<?php the_sub_field('cts_darkrow1_content'); ?>
									</div>
									<div class="medium-6 columns col-2">
										<?php the_sub_field('cts_darkrow2_content'); ?>
									</div>
							</div>
	        			</div><!--end dark row-->
								<?php endif;

			        elseif( get_row_layout() == 'cts_extralight_row' ): ?>
	        			<?php if( get_sub_field('cts_extralightrow_cols') == 'single-column' ): ?>
	        			<!--extralight row-->
	        			<div class="section-xtralight">
	        				<div class="row">
		        					<div class="medium-12 columns">
		        						<?php the_sub_field('cts_extralightrow_content'); ?>
		        					</div>
	        				</div>
	        			</div><!--end extralight row-->	
						<?php elseif( get_sub_field('cts_extralightrow_cols') == 'two-columns' ): ?>
						<!--extralight row-->
	        			<div class="section-xtralight">
	        				<div class="row">
									<div class="medium-6 columns">
										<?php the_sub_field('cts_extralightrow1_content'); ?>
									</div>
									<div class="medium-6 columns">
										<?php the_sub_field('cts_extralightrow2_content'); ?>
									</div>
							</div>
	        			</div><!--end extralight row-->	
									<?php endif;

			        elseif( get_row_layout() == 'cts_threecol_row' ): ?>
			        	<!--3-column row-->
	        			<div class="section-light">
	        				<div class="row">
	        					<?php if(get_sub_field('cts_col1_content')): ?>
		        					<div class="medium-4 columns">
		        						<?php the_sub_field('cts_col1_image'); ?>
		        						<?php the_sub_field('cts_col1_content'); ?>
		        					</div>
		        					<div class="medium-4 columns">
		        						<?php the_sub_field('cts_col2_image'); ?>
		        						<?php the_sub_field('cts_col2_content'); ?>
		        					</div>
		        					<div class="medium-4 columns">
		        						<?php the_sub_field('cts_col3_image'); ?>
		        						<?php the_sub_field('cts_col3_content'); ?>
		        					</div>
	        				</div>
	        			</div><!--end 3-column row-->	
									<?php endif;
					elseif( get_row_layout() == 'cts_fullwidth_row' ): ?>
							<?php if(get_sub_field('cts_fullwidth_image')): ?>
								<div class="full-width-image">
									<?php $fullwidth = get_sub_field('cts_fullwidth_image'); ?>
									<img src="<?php echo $fullwidth['url']?>" alt="<?php echo $fullwidth['alt']?>" />
									<div class="caption-container">
										<p class="caption">
											<?php the_sub_field('cts_fullwidth_caption'); ?>
										</p>
									</div>
								</div>
			 				<?php endif;
			        endif;
			 
			    endwhile;
			 
			else :
			 
			    // no layouts found
			 
			endif;
			 
			?>