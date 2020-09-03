<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					busify_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
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
