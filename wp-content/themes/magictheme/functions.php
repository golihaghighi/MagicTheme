<?php
include_once get_template_directory() . '/theme-includes.php';

/**
 * Magic theme.
 *
 * @version   1.0.0
 *
 * @package magic
 */


defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'magic_get_page_id' ) ) {

	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 * @return int
	 * @version 1.0
	 * 
	 * @see magic_is_woocommerce_installed()
	 * @see magic_is_woocommerce_shop()
	 */
	function magic_get_page_id() {
		if ( bridge_qode_is_woocommerce_installed() && ( bridge_qode_is_woocommerce_shop() || is_singular( 'product' ) ) ) {
			return bridge_qode_get_woo_shop_page_id();
		}

		if ( is_archive() || is_search() || is_404() || ( is_home() && is_front_page() ) ) {
			return - 1;
		}

		return get_queried_object_id();
	}
}

if ( ! function_exists( 'magic_is_woocommerce_installed' ) ) {

	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function magic_is_woocommerce_installed() {
		return function_exists( 'is_woocommerce' );
	}
}
if ( ! function_exists( 'magic_is_woocommerce_shop' ) ) {

	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function magic_is_woocommerce_shop() {
		return function_exists( 'is_shop' ) && is_shop();
	}
}
if ( ! function_exists( 'magic_get_woo_shop_page_id' ) ) {

	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function magic_get_woo_shop_page_id() {
		if ( magic_is_woocommerce_installed() ) {
			return get_option( 'woocommerce_shop_page_id' );
		}
	}
}
?>
