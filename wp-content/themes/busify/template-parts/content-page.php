<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package busify
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('busify-article-page'); ?>>

	<?php busify_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->