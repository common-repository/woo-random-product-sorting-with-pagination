=== WooCommerce Random Product Sorting with Pagination ===
Contributors: theseforumslookquitehelpful
Tags: woocommerce, random, sorting, random sorting, product sorting, pagination
Requires at least: 4.6
Tested up to: 5.7.2
Stable tag: 0.9.2
License: GPLv3 or later License
URI: http://www.gnu.org/licenses/gpl-3.0.html
WC requires at least: 2.6
WC tested up to: 5.4.1

Add a "Random" Product Sorting Order to WooCommerce with working pagination.

== Description ==

This plugin was built to add a "Random" Product Sorting Order to WooCommerce with working pagination.

Other solutions I found that added a "Random" Product Sorting Order did not preserve pagination.

This plugin will sort your WooCommerce Products in random order.  A random sort has a transient life of one hour.  (In version 0.9.1, the duration is not a settable option.  It is fixed at one hour.)  Every hour a new random sort is generated.  Pagination works as expected, meaning each WooCommerce Product will be diplayed once and no more than once.

**This plugin requires the WooCommerce plugin.**

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/paginated-random-products` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. You now have a "Random" option everywhere that your WooCommerce site allows you to set Product Sorting Order.

== Frequently Asked Questions ==

= Are there any settings for this plugin? =

No. There are no settings in v0.9.1 of the plugin.  Activate adds the option.  Deactivate removes it.

= I am a WP Engine user and my products are not being randomly sorted. What's wrong? =

By default, WP Engine disallows ORDER BY RAND() due to performance concerns about careless use.  This default setting causes the WooCommerce Random Product Sorting with Pagination plugin not to work.  You can manually enable ORDER BY RAND() from the admin area of your WP Engine WordPress site.  Go to WP Engine > General Settings > Advanced Configuration and set 'Allow ORDER BY RAND()' to 'Enabled.'  The plugin should now work.

= What can I do if I have problems or other questions? =

You can try emailing me at william@trainedlizard.com.  This is a free, use-at-your-own-risk plugin with no guarantee of support, but I am generally happy to answer questions or make tweaks if anyone needs that.

== Changelog ==

= 0.9.2 =
* Added support for language translation
* Added German translation file

= 0.9.1 =
* Tested completed on latest versions of WordPress & WooCommerce
* Fixed minor readme.txt typos

= 0.9.0 =
* Initial submitted version