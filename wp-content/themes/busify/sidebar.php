<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package busify
 * @since 1.0.0
 * @author CodeManas 2019. All Rights reserved.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$sidebar = apply_filters( 'busify_get_sidebar', 'sidebar' );
?>

<?php busify_before_sidebar(); ?>

    <div class="col-md-3">
        <aside id="secondary" class="widget-area busify-sidebar">

			<?php if ( is_active_sidebar( $sidebar ) ) : ?>

				<?php dynamic_sidebar( $sidebar ); ?>

			<?php endif; ?>

        </aside><!-- .sidebar-main -->
    </div>

<?php busify_after_sidebar(); ?>