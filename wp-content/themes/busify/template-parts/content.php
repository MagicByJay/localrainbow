<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busify
 * @since 1.0.0
 * @author Copyright 2019 CodeManas. All Rights Reserved.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'busify-article-post' ); ?>>
    <div class="busify-post-content-wrap">
        <?php busify_main_content(); ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
