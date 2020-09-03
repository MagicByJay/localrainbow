<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
				busify_before_post_content();

				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					busify_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;

				busify_after_post_content();
				?>
            </main><!-- #main -->
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
