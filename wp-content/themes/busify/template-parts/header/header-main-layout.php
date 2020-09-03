<?php
/**
 * Header main layout template
 *
 * @since 1.0.0
 * @author CodeManas
 * @copyright 2019 CodeManas. All RIghts Reserved !
 */
?>

<header id="masthead" class="site-header <?php echo esc_attr( busify_transparent_header() ); ?>">
	<?php busify_before_masthead_content(); ?>
    <div class="container">
        <div class="site-header-container">
			<?php busify_masthead_content(); ?>
        </div>
    </div>
	<?php busify_after_masthead_content(); ?>
</header>

