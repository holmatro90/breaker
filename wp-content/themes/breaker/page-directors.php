<?php /* Template Name: Directors Template */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">
					<?php

					$args = array(
						'taxonomy' => array( 'directors' ),
						'fields'   => 'all',
					);

					$directors_query = new WP_Term_Query( $args );

					if ( $directors_query->terms ) :?>
                        <ul class="list-of-directors">
							<?php foreach ( $directors_query->terms as $directors ) {
								?>
                                <li class="dretor-section row">
                                    <h3 class="col-sm-2"><?php echo $directors->name; ?></h3>
									<?php
									$args_video = array(
										'post_type'      => 'Videos',
										'posts_per_page' => 1,
										'directors'      => $directors->slug,
                                        'meta_key'       => 'Show',
									);
									$videoPosts = new WP_Query( $args_video );

									while ( $videoPosts->have_posts() ) : $videoPosts->the_post(); ?>
                                        <a data-fancybox class="col-sm-8"
                                           href="<?php echo get_post_meta(get_the_ID(),'Directors video', true ); ?>"><?php echo get_the_post_thumbnail(); ?></a>
									<?php endwhile;

									wp_reset_postdata();
									?>

                                    <a class="col-sm-2" href="<?php echo get_term_link( $directors ); ?>"><?php echo $directors->name; ?>
                                        Bio <span class="arrow">→</span></a>
                                </li>
							<?php } ?>
                        </ul>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
                </div>
            </div>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
