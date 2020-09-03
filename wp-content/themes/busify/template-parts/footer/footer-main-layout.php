<?php
/**
 * Footer main execute template
 *
 * @since 1.0.0
 * @author CodeManas
 * @copyright 2019 CodeManas. All RIghts Reserved !
 */
?>
<footer class="site-main-footer">
    <div class="busify-footer-wrap">
		<?php
		//Before Main footer
		busify_before_main_footer();

		//Main Footer
		busify_main_footer();

		//After Main footer
		busify_after_main_footer();

		//Before super footer
		busify_before_super_footer();

		//Main Super Footer
		busify_super_footer();

		//After super footer
		busify_after_super_footer();
		?>
    </div>
</footer>