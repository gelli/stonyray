<!-- Most Read Articles -->
<?php
$sectionCategory = get_theme_mod('lbb_custom_cat_1');
if ($sectionCategory) :

  $query = new WP_Query( array (
    'post_type' => 'post',
    'posts_per_page' => '4',
    'category_name' => lbb_get_category($sectionCategory)->slug
  ));

  if ( $query->have_posts() ) : ?>

    <div class="row sam-content">
      <div class="col-xs-12">
        <h2 id="featured-posts"><?php _e(lbb_get_category($sectionCategory)->description, 'littlebluebag' ); ?></h2>
      </div>
        <?php //// Start the Loop.
        while ( $query->have_posts() ) : $query->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" class="col-md-3 col-sm-3 col-xs-12 entry-card">
                <a class="img-wrap" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail("image-wall", array('class' => 'img-responsive lbb-feature-image')); ?>
                    <div><!-- <p><?php echo get_the_title(); ?> </p>--> </div>
                </a>
                <div class="entry-card-content">
                  <?php  printf( '<span class="small entry-date"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <time class="entry-date" datetime="%2$s">%3$s</time></span>',
                    esc_url( get_permalink() ),
                    esc_attr( get_the_date( 'c' ) ),
                    esc_html( get_the_date() ),
                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
                  ); ?>
                  <!-- <p> <?php the_excerpt(); ?></p> -->
                  <p><?php the_excerpt( __( 'weiterlesen <span class="meta-nav">&rarr;</span>', 'greyskull14'), true );?> </p>
                </div>
            </article>

        <?php endwhile; ?>
    </div>
  <?php endif; 
endif;