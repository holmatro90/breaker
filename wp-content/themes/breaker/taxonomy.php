<?php
/**
 * The template for displaying taxonomy
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package breaked
 */

get_header();; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <h2 class="page-title">
		            <?php
		            $term  = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		            $tax   = get_taxonomy( get_queried_object()->taxonomy );
		            $title = $tax->labels->singular_name;
		            echo $title; ?>
                </h2>
                <div class="row">


            <div class="block">
                    <div class="row">
                        <div class="col-sm-3 directed-name">

                            <h3> <?php echo $term->name; ?> </h3>
                        </div>
                        <div class="col-sm-9 about-directed">
                            <p><?php echo $term->description; ?></p>
							<?php
							$args_video = array(
								'post_type'      => 'Videos',
								'posts_per_page' => 3,
								'meta_key'       => 'Directors video',
							);
							$videoPosts = new WP_Query( $args_video ); ?>
                            <p class="directed-work">Work:
								<?php

								while ( $videoPosts->have_posts() ) : $videoPosts->the_post(); ?>
                                    <a data-fancybox
                                       href="<?php echo get_post_meta( get_the_ID(), 'Directors video', true ); ?>"><?php echo get_the_title(); ?></a> /
								<?php endwhile; ?>
                            </p>

                        </div>

                </div>
            </div>

                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->


<?php
get_footer();
