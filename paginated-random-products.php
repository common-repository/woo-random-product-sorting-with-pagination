<?php
/*
 Plugin Name: WooCommerce Random Product Sorting with Pagination
 Description: Add a random product sorting method to WooCommerce with working pagination
 Author: William Crowley
 Version: 0.9.2
 Text Domain: paginated-random-products
 Domain Path: /languages
 */
?>
<?php
if (!defined('ABSPATH')) {
	exit; //Exit if accessed directly.
}
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
	if (!function_exists('do2_addRandomProductOrderSetting') && !function_exists('do2_randomizeProductWhenSet') && !function_exists('do2_loadTextDomain')) {

		//add "Random" setting to product sorting menu
		function do2_addRandomProductOrderSetting($sortby)
		{
			$sortby['random_order'] = esc_html__('Random', 'paginated-random-products');
			return $sortby;
		}
		add_filter('woocommerce_default_catalog_orderby_options', 'do2_addRandomProductOrderSetting');
		add_filter('woocommerce_catalog_orderby', 'do2_addRandomProductOrderSetting');

		//randomize products when setting is used
		function do2_randomizeProductWhenSet($args)
		{
			$orderbySetting = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
			if ('random_order' == $orderbySetting) {
				if (false === ($seed = get_transient('do2_randSeed'))) {
					$seed = rand();
					set_transient('do2_randSeed', $seed, 3600);
				}
				$args['orderby'] = 'RAND(' . $seed . ')';
				$args['order'] = '';
				$args['meta_key'] = '';
			}
			return $args;
		}
		add_filter('woocommerce_get_catalog_ordering_args', 'do2_randomizeProductWhenSet');

		function do2_loadTextDomain()
		{
			load_plugin_textdomain('paginated-random-products', FALSE, basename(dirname(__FILE__)) . '/languages/');
		}
		add_action('plugins_loaded', 'do2_loadTextDomain');
	}
} else {
	if (!function_exists('do2_WooCommerceAdminNotice')) {
		//warn on missing WooCommerce
		function do2_WooCommerceAdminNotice()
		{
?>
			<div class="notice error is-dismissible">
				<p><?php _e('Your site must be running WooCommerce to benefit from the WooCommerce Random Product Sorting with Pagination plugin.'); ?></p>
			</div>
<?php
		}
		add_action('admin_notices', 'do2_WooCommerceAdminNotice');
	}
}
