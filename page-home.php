<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
  <!-- Main hero image slider -->
    <div class="home-hero">
        <ul class="cts-homeslider" data-orbit data-options="animation-speed:2500;pause-on-hover:true;bullets:false;slide_number:false;timer:false;">
        <?php if( have_rows('cts_home_slideshow') ):
          while ( have_rows('cts_home_slideshow') ) : the_row(); ?>
          <li>
            <?php $image = get_sub_field('cts_slide_image'); ?>
              <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>" />
              <?php if( get_sub_field('cts_slide_text_alignment') == 'text-on-left' ): ?>   
                <div class="orbit-caption description heroleft">
                <?php the_sub_field('cts_slide_text'); ?>
              </div>
            <?php elseif( get_sub_field('cts_slide_text_alignment') == 'text-on-right' ): ?>
               <div class="orbit-caption description heroright">
                <?php the_sub_field('cts_slide_text'); ?>
              </div>
            <?php elseif( get_sub_field('cts_slide_text_alignment') == 'text-in-center' ): ?>
               <div class="orbit-caption description herocenter">
                <?php the_sub_field('cts_slide_text'); ?>
              </div>
              <?php endif; 
            endwhile;
          else :
            // no rows found  
          endif; ?>
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
    <div class="section-twitterfeed">
      <div class="row">
        <div class="large-12 columns cts-hometweets">
          <h3>Updates and Accomplishments</h3>
          <div class="tweet">
          </div>
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
      <script class="source" type="text/javascript">
         $('.cts-hometweets .tweet').twittie({
          username: 'trainright',
          dateFormat: '%b. %d, %Y',
          template: '<strong class="date">{{date}}</strong><br />{{tweet}}',
          apiPath: '/wp-content/themes/cts/library/js/Tweetie-2.1.1/api/tweet.php',
          count: 10
      });

      setInterval(function() {
          var item = $('.cts-hometweets .tweet ul').find('li:first');

          item.animate( {marginLeft: '-480px', 'opacity': '0'}, 500, function() {
              $(this).detach().appendTo('.cts-hometweets .tweet ul').removeAttr('style');
          });
      }, 8000);
      </script>

<?php get_footer(); ?>