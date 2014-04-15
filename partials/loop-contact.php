
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
<?php get_template_part( 'partials/cts', 'secondary-hero' ); ?>			
    <section class="entry-content clearfix" itemprop="articleBody">
		  <!-- Main Page Content and Sidebar -->

	  	<div class="section-light">
	      <div class="row infographics-title">
		    <div class="medium-4 columns">
		    	<div class="contact-map-container">
		    		<?php if( get_field('contact_map')) { 
		    			the_field('contact_map');
		    		}
		    		?>	
				</div>
			</div>
		        <div class="large-8 columns">
		            <?php if( get_field('contact_form')) { 
		    			the_field('contact_form');
		    		}
		    		?>	
		        </div>
			</div>
		</div>
	</section> <!-- end article section -->
	<!-- End Main Content and Sidebar -->

  <div class="section-xtralight">
	<div class="row">
		<div class="medium-8 columns">
            <?php if( get_field('contact_content')) { 
    			the_field('contact_content');
    		}
    		?>	
		</div>
		<div class="medium-4 columns" style="border-left: 1px solid rgba(0,0,0,0.2);">
            <?php if( get_field('contact_locations')) { 
    			the_field('contact_locations');
    		}
    		?>	
		</div>
	</div>
</div>

<div class="section-cta">
	<div class="row">
		<div class="medium-12 columns">
			<?php if( get_field('contact_cta')) { 
    			the_field('contact_cta');
    		}
    		?>	
		</div>
	</div>
</div>
					
</article> <!-- end article -->
