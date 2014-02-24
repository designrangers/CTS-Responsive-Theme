<?php 
 
$posts = get_field('cts_featured_coaches');
 
if( $posts ): ?>
    <ul class="small-block-grid-2 medium-block-grid-4">
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="#" class="coach-block top-block" data-reveal-id="<?php the_ID(); ?>">
            <div class="coach-image">
              <?php $coachheadshot = get_field('coach_headshot'); ?>
                <?php if($coachheadshot) { ?>
                    <img src="<?php echo $coachheadshot['url']?>" alt="<?php echo $coachheadshot['alt']?>" />
                <?php } else { ?>
                  <img src="http://placehold.it/400x400&text=Coach Image" />
                <?php 
                } ?>
              <div class="coach-name">
                <h3><?php the_title(); ?></h3>
                <p><?php the_field('coaches_residence'); ?></p>
              </div>
            </div>
          </a>
        </li>
        <div id="<?php the_ID(); ?>" class="reveal-modal" data-reveal>
          <div class="row">
            <div class="medium-4 columns">
              <?php $coachimage = get_field('coach_and_athlete'); ?>
              <?php if($coachimage) { ?>
                  <img src="<?php echo $coachimage['url']?>" alt="<?php echo $coachimage['alt']?>" />
              <?php } else { ?>
                <img src="http://placehold.it/400x400&text=Coach Image" />
              <?php 
              } ?>
              <p class="text-center"><a href="<?php the_permalink(); ?>">Read Full Coach Bio</a></p>
            </div>
            <div class="medium-8 columns">    
              <h2><?php the_title(); ?></h2>
              <p><?php the_field('coaches_summary'); ?></p>
            </div>
          </div>
            <a class="close-reveal-modal">&#215;</a>
        </div>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>