<?php
define( 'MAGIC', true );
define('MAGIC_ROOT', get_template_directory_uri());
define('MAGIC_ROOT_DIR', get_template_directory());
define('MAGIC_VAR_PREFIX', 'magic_');
define('MAGIC_FRAMEWORK_ROOT', get_template_directory_uri().'/magic_framework');
define('MAGIC_FRAMEWORK_ROOT_DIR', get_template_directory().'/magic_framework');
define('MAGIC_FRAMEWORK_ADMIN_ASSETS_ROOT', get_template_directory_uri() . '/magic_framework/admin/assets' );
define('MAGIC_SHORTCODES_ROOT_DIR', get_template_directory().'/includes/shortcodes/shortcode-elements');
define('MAGIC_FRAMEWORK_MODULES_ROOT', get_template_directory_uri().'/magic_framework/modules');
define('MAGIC_FRAMEWORK_MODULES_ROOT_DIR', get_template_directory().'/magic_framework/modules');
define('MAGIC_INCLUDES_ROOT', MAGIC_ROOT . '/includes');
define('MAGIC_INCLUDES_ROOT_DIR', MAGIC_ROOT_DIR . '/includes');

include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-fallback-helper-functions.php' );
include_once( MAGIC_FRAMEWORK_ROOT_DIR . '/magic-framework.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-breadcrumbs.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-blog-helper-functions.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/nav_menu/magic-menu.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/sidebar/magic-custom-sidebar.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-plugin-helper-functions.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-custom-taxonomy-field.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-gradient-helper-functions.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-loading-spinners.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-related-posts.php' );
/* Include comment functionality */
include_once( MAGIC_INCLUDES_ROOT_DIR . '/comment/comment.php' );
/* Include sidebar functionality */
include_once( MAGIC_INCLUDES_ROOT_DIR . '/sidebar/sidebar.php' );
/* Include pagination functionality */
include_once( MAGIC_INCLUDES_ROOT_DIR . '/pagination/pagination.php' );
/* Include magic carousel select box for visual composer */
/* Include font awesome icons list */
include_once( MAGIC_INCLUDES_ROOT_DIR . '/font_awesome/font-awesome.php' );
/** Include the TGM_Plugin_Activation class. */
require_once( MAGIC_INCLUDES_ROOT_DIR . '/plugins/class-tgm-plugin-activation.php' );
/* Include plugins activation file */
include_once( MAGIC_INCLUDES_ROOT_DIR . '/plugins/plugins-activation.php' );
include_once( MAGIC_ROOT_DIR . '/css/custom-styles/general-custom-styles.php' );
include_once( MAGIC_INCLUDES_ROOT_DIR . '/magic-dynamic-helper-functions.php' );