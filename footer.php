			<!-- Partners -->
		    <div class="section-dark cts-partners">
		      <div class="row">
		        <div class="large-12 columns">
					<?php
					if(get_field('cts_partner_title', 'option'))
					{
						echo '<h3>' . get_field('cts_partner_title', 'option') . '</h3>';
					} 
					?>
			          <?php
	 
						// check if the repeater field has rows of data
						if( have_rows('cts_partner_logos', 'option') ):
						 
						 	// loop through the rows of data
						    while ( have_rows('cts_partner_logos', 'option') ) : the_row();
						 
						        // display a sub field value
								$partnerlogo = get_sub_field('partner_logo_image');
								$partnerlink = get_sub_field('partner_logo_link'); ?>
								<?php if( $partnerlink ): ?>
									<a href="<?php the_sub_field('partner_logo_link')?>" target="_blank">
								<?php endif; ?>
	    						<img class="cts-partner-logos" src="<?php echo $partnerlogo['url']?>" alt="<?php echo $partnerlogo['alt']?>" />
								<?php if( $partnerlink ): ?>
									</a>
								<?php endif; ?>
						 
						    <?php endwhile;
						 
						else :
						 
						    // no rows found
						 
						endif;
						 
						?>
		        </div>
		      </div>
		    </div>
		    <!-- Footer -->
			<footer class="cts-footer">
				<div class="row">
					<div class="medium-8 columns cts-footer-menus">
						<div class="row">
							<div class="large-4 columns">
								<?php joints_footer_links_1(); ?>
							</div> 
							<div class="large-4 columns">
								<?php joints_footer_links_2(); ?>
							</div> 
							<div class="large-4 columns">
								<?php joints_footer_links_3(); ?>
							</div>
						</div>
					</div>
					<div class="medium-4 columns cts-footer-connect">
						<div class="footer-social">
							<?php if( get_field('cts_footer_social' , 'option') ):
								the_field('cts_footer_social' , 'option');
							endif; ?>
						</div>
						<div class="footer-newsletter">
							<?php if( get_field('cts_footer_newsletter' , 'option') ):
								the_field('cts_footer_newsletter' , 'option');
							endif; ?>
						</div>
						<div class="footer-cta">
							<?php if( get_field('cts_footer_cta' , 'option') ):
								the_field('cts_footer_cta' , 'option');
							endif; ?>
						</div>
					</div>
				</div>
			</footer>
		</div><!-- end inner-wrap -->
		</div><!-- end off-canvas-wrap -->
				
		<!-- all js scripts are loaded in library/joints.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page -->