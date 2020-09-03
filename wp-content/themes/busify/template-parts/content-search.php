<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package busify
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'busify-article-post' ); ?>>
    <div class="busify-post-content-wrap">
        <div class="busify-post-content-section busify-post-content-title">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </div>
        <div class="busify-post-content-section busify-post-content-meta">
			<?php if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
					<?php
					busify_post_posted_on();
					busify_post_posted_by();
					busify_post_category_links();
					busify_post_leave_comment();
					?>
                </div><!-- .entry-meta -->
			<?php endif; ?>
        </div>
        <div class="busify-post-content-section busify-post-entry-content">
			<?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
