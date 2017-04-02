<?php /* Template Name: Contacts Template */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">
                    <h2 class="page-title"><?php echo get_the_title(); ?></h2>
                    <div class="contacts">
                        <ul class="contact-section row">
	                        <?php
	                        $args = array(
		                        'post_type' => 'Contacts',
		                        'posts_per_page' => 3,
	                        );
	                        $contactPosts = new WP_Query($args);
	                        if ($contactPosts->have_posts()) :
		                        while ($contactPosts->have_posts()) : $contactPosts->the_post();
			                        ?>
                                    <li class=" col-sm-4 ">
                                        <?php echo get_the_content() ?>
                                        <h4><?php echo get_the_title()?></h4>
                                        <address>
	                                        <h6><?php echo get_post_meta(get_the_ID(), 'Name of contact', true); ?></h6>
	                                        <p><?php echo get_post_meta(get_the_ID(), 'Adress of contact', true); ?></p>
                                            <p>O <a href="callto:<?php echo get_post_meta(get_the_ID(), 'Phone of contact', true); ?>"><?php echo get_post_meta(get_the_ID(), 'Phone of contact', true); ?></a></p>
                                            <p>F <a href="callto:<?php echo get_post_meta(get_the_ID(), 'Fax of contact', true); ?>"><?php echo get_post_meta(get_the_ID(), 'Fax of contact', true); ?></a></p>
                                            <p><a href="mailto:<?php echo get_post_meta(get_the_ID(), 'Email', true); ?>"><?php echo get_post_meta(get_the_ID(), 'Email', true); ?></a></p>
                                        </address>
                                    </li>
		                        <?php endwhile; ?>

	                        <?php endif;

	                        ?>
                        </ul>
                    </div>
                </div>
            </div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
