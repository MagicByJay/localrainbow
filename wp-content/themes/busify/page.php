<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package busify
 * @since 1.0.0
 * @author CodeManas 2020. All Rights reserved.
 */

get_header();
?>

    <div id="primary" class="content-area">
        <div <?php echo busify_page_post_class_row_class(); ?>>
			<?php
			if ( busify_get_sidebar_layout() === "left-sidebar" ) {
				get_sidebar();
			}

			busify_before_main_content();
			?>
            <main id="main" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
            </main>
			<?php
			busify_after_main_content();

			if ( busify_get_sidebar_layout() === "right-sidebar" ) {
				get_sidebar();
			}
			?>
        </div>
    </div><!-- #primary -->
<?php
get_footer();
