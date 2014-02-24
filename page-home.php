<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

	<!-- Main hero image slider -->
    <div class="home-hero">
      <ul class="cts-homeslider" data-orbit data-options="animation-speed:2500;pause-on-hover:true;bullets:false;">
        <li>
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/slider-temp1.jpg" alt="">
          <div class="orbit-caption">
            <h2 class="large">
              <span>New Brand. New Look.</span><br />
              Same Proven Results.
            </h2>
            <a class="cts-button">Our Story</a>
          </div>
        </li>
        <li>
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/slider-temp2.jpg" alt="">
          <div class="orbit-caption">
            <h2 class="large">
              <span>Turn the Corner.</span><br />
              Come to Our Camps.
            </h2>
            <a class="cts-button">Our Camps</a>
          </div>
        </li>
        <li>
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/slider-temp3.jpg" alt="">
          <div class="orbit-caption">
            <h2 class="large">
              <span>Bucket List item #244.</span><br />
              Checked Off.
            </h2>
            <a class="cts-button">Our Adventures</a>
          </div>
        </li>
        <li>
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/slider-temp4.jpg" alt="">
          <div class="orbit-caption">
            <h2 class="large">
              <span>World Class Coaches.</span><br />
              Your New Friends.
            </h2>
            <a class="cts-button">Our Coaches</a>
          </div>
        </li>
      </ul>
    </div>
    <!-- Infographics -->
    <div class="section-light infographics">
      <div class="row infographics-title">
        <div class="large-12 columns">
            <h2><?php the_field("cts_hm_sec1_title"); ?></h2>
            <h3><?php the_field("cts_hm_sec1_subtitle"); ?></h3>
        </div>
      </div>
      <div class="row infographics-data">
        <div class="large-3 columns">
          <?php echo get_image_with_alt('infographic1_image', get_the_ID() ); ?>
          <?php the_field("infographic1_text"); ?>
        </div>
        <div class="large-3 columns">
          <?php echo get_image_with_alt('infographic2_image', get_the_ID() ); ?>
          <?php the_field("infographic2_text"); ?>
        </div>
        <div class="large-3 columns">
          <?php echo get_image_with_alt('infographic3_image', get_the_ID() ); ?>
          <?php the_field("infographic3_text"); ?>
        </div>
        <div class="large-3 columns">
          <?php echo get_image_with_alt('infographic4_image', get_the_ID() ); ?>
          <?php the_field("infographic4_text"); ?>
        </div>
      </div>
    </div><!-- end infographics -->
    <!-- Call-to-action -->
    <div class="section-cta">
      <div class="row">
        <div class="large-12 columns">
          <?php the_field("infographic_cta"); ?>
        </div>
      </div>
    </div><!-- end call-to-action -->
    <?php get_template_part( 'partials/cts', 'flexible-content' ); ?>
    <!-- CTS Coaches -->
    <div class="section-light cts-coaches">
      <div class="row">
        <div class="large-12 columns">
          <h2><?php the_field('featured_coaches_title'); ?></h2>
          <p><?php the_field('featured_coaches_content'); ?></p>
        </div>
      </div>
      <div class="row featured-coaches">
          <div class="medium-12 columns">
            <?php get_template_part( 'partials/cts', 'home-coaches' ); ?>
          </div>
      </div>
    </div><!--  end CTS Coaches -->
    <div class="section-xtralight cts-coaches">
      <div class="row">
        <div class="large-12 columns">
          <h2><?php the_field('featured_athletes_title'); ?></h2>
          <p><?php the_field('featured_athletes_content'); ?></p>
        </div>
      </div>
      <div class="row featured-coaches">
          <div class="medium-12 columns">
            <?php get_template_part( 'partials/cts', 'home-athletes' ); ?>
          </div>
      </div>
    </div>
			
			<div id="content">
			
				<div id="inner-content" class="row clearfix">
			
				    <div id="main" class="large-12 medium-12 columns" role="main">
					
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'home' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/missing', 'content' ); ?>

					    <?php endif; ?>

    				</div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>