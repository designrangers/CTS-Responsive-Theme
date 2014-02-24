<?php 
 
$posts = get_field('cts_featured_athletes');
 
if( $posts ): ?>
    <ul class="small-block-grid-2 medium-block-grid-4">
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="#" class="coach-block top-block" data-reveal-id="<?php the_ID(); ?>">
            <div class="coach-image">
              <?php $athleteimage = get_field('athlete_image'); ?>
                <?php if($athleteimage) { ?>
                    <img src="<?php echo $athleteimage['url']?>" alt="<?php echo $athleteimage['alt']?>" />
                <?php } else { ?>
                  <img src="http://placehold.it/400x400&text=Athlete Image" />
                <?php 
                } ?>
              <div class="coach-name">
                <h3><?php the_title(); ?></h3>
                <p><?php the_field('athlete_residence'); ?></p>
              </div>
            </div>
          </a>
        </li>
        <div id="<?php the_ID(); ?>" class="reveal-modal" data-reveal>
          <div class="row">
            <div class="medium-12 columns">    
              <h2><?php the_title(); ?></h2>
              <p><?php the_field('athlete_accomplishments'); ?></p>
            </div>
          </div>
            <a class="close-reveal-modal">&#215;</a>
        </div>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>