<?php
/**
 * Main functions for the theme
 *
 * @package busify
 * @since 1.0.0
 * @author CodeManas 2019. All Rights reserved.
 */

define( 'CODEMANAS_THEME_VERSION', '1.0.0' );
// define( ''busify'', 'busify' );
define( 'CODEMANAS_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'CODEMANAS_THEME_URL', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'CODEMANAS_SITE_URL', 'https://codemanas.com' );

//Core
require_once CODEMANAS_THEME_DIR . 'inc/core/class-busify-enqueue-scripts.php';
require_once CODEMANAS_THEME_DIR . 'inc/core/class-busify-theme-options.php';
require_once CODEMANAS_THEME_DIR . 'inc/core/class-busify-theme-setup.php';
require_once CODEMANAS_THEME_DIR . 'inc/core/class-busify-admin-settings.php';
require_once CODEMANAS_THEME_DIR . 'inc/core/theme-hooks.php';
require_once CODEMANAS_THEME_DIR . 'inc/core/widgets.php';
require_once CODEMANAS_THEME_DIR . 'inc/helpers.php';
require_once CODEMANAS_THEME_DIR . 'inc/core/class-busify-comment-walker.php';

// Customizer Pro 
require_once CODEMANAS_THEME_DIR . 'inc/customizer/trt-customize-pro/class-customize.php';

/**
 * Template related functions
 */
require_once CODEMANAS_THEME_DIR . 'inc/class-busify-template-functions.php';
require_once CODEMANAS_THEME_DIR . 'inc/template-tags.php';

//Elementor Check
if ( ! function_exists( 'busify_elementor_active' ) ) {
	require_once CODEMANAS_THEME_DIR . 'inc/elementor-dependencies.php';
}

/**
 * Customizer
 */
require_once CODEMANAS_THEME_DIR . 'inc/customizer/class-busify-customizer.php';

//Render Elements
require_once CODEMANAS_THEME_DIR . 'inc/extras/headers.php';
require_once CODEMANAS_THEME_DIR . 'inc/extras/menus.php';
require_once CODEMANAS_THEME_DIR . 'inc/extras/posts-pages-sidebars.php';
require_once CODEMANAS_THEME_DIR . 'inc/extras/footers.php';
require_once CODEMANAS_THEME_DIR . 'inc/extras/paginations.php';

require_once CODEMANAS_THEME_DIR . 'inc/core/required-plugins.php';
