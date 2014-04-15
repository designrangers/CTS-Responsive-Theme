<?php 
 
$posts = get_field('cts_featured_athletes');
 
if( $posts ): ?>
    <ul class="small-block-grid-2 medium-block-grid-4">
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="#" class="coach-block top-block" data-reveal-id="<?php the_ID(); ?>">
            <div class="coach-image">
                <?php $athleteheadshot = get_field('athlete_image'); ?>
                  <?php if($athleteheadshot) { ?>
                      <img src="<?php echo $athleteheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $athleteheadshot['alt'];?>" />
                  <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
                  <?php 
                  } ?>
              <div class="coach-name">
                <h3><?php the_title(); ?></h3>
                <p><?php the_field('athlete_subtitle'); ?></p>
                <span>Read Athlete Bio</span>
              </div>
            </div>
          </a>
        </li>
        <div id="<?php the_ID(); ?>" class="reveal-modal" data-reveal>
          <div class="row">
            <div class="medium-4 columns">  
              <?php $athleteheadshot = get_field('athlete_image'); ?>
                <?php if($athleteheadshot) { ?>
                    <img src="<?php echo $athleteheadshot[sizes]['joints-thumb-400'];?>" alt="<?php echo $athleteheadshot['alt'];?>" />
                <?php } else { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/cts-placeholder-400.jpg" alt="CTS Coach" />
                <?php 
                } ?>
            </div>
          <div class="medium-8 columns">
            <h2><?php the_title(); ?></h2>
            <div class="row reveal-athlete">
                <div class="medium-6 columns"> 
                  <h4>Stats:</h4>
                  <?php the_field('athlete_bio'); ?>
                </div>
          <div class="medium-6 columns">                    
                  <h4>Accomplishments</h4>
                    <?php the_field('athlete_accomplishments'); ?>
                </div>
              </div>
          </div>
              <a class="close-reveal-modal">&#215;</a>
           </div>
        </div>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>