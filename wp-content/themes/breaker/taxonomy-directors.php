<?php
/**
 * The template for displaying taxonomy pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package control
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main container-fluid" role="main">
            <div class="row">
                    <h1 class="entry-title container">Directors</h1>
				<?php
				if ( have_posts() ) : ?>
                    <article class="about-director container">
                        <div class="row">

                            <div class="director-header">
                                <h3 class="col-sm-3 directors-title">
                                <span class="border">
                                    <?php
                                    $terms = get_the_terms( $post->ID, 'directors' );
                                    if( $terms ){
                                    $term = array_shift( $terms );

                                    echo $term->name;
                                    ?>
                                </span>
                                </h3>
                            </div>
                            <div class="entry-content col-sm-9">
								<?php echo $term->description; ?>
                            </div>

							<?php } ?>

                        </div>
                    </article>

					<?php
					/* Start the Loop */

				endif; ?>

            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();