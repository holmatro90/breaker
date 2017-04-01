<?php /* Template Name: Home Template */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="row">
                    <div class="text-widget col-xs-12">
					<?php if (!dynamic_sidebar('main-1')) : ?>
					<?php endif; // end widget area ?>
                    </div>
					<h2 class="page-title"><?php echo get_the_title(); ?></h2>
                    <div class="video-section">
                    <ul class="row new-video">
						<?php
						$args = array(
							'post_type' => 'Videos',
							'posts_per_page' => 6,
						);
						$videoPosts = new WP_Query($args);
						if ($videoPosts->have_posts()) :
							while ($videoPosts->have_posts()) : $videoPosts->the_post();
								?>
                                <li class="col-xs-12 col-sm-4 ">
                                    <a data-fancybox href="<?php echo get_post_meta(get_the_ID(), 'Directors video', true); ?>"><?php echo get_the_post_thumbnail(); ?>
	                                    <?php echo get_the_title(); ?>
                                    </a>
                                </li>
							<?php endwhile; ?>

						<?php endif;
						wp_reset_postdata();
						?>
                    </ul>
                    </div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
