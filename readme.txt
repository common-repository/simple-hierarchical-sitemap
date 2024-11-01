=== Simple Hierarchical Sitemap ===
Contributors: LordPretender
Donate link: https://www.paypal.me/LordPretender
Tags: html sitemap, seo, sitemap, pages, pages list, posts, posts list, shortcode, hierarchical
Requires at least: 3.6.1
Tested up to: 3.6.1
Stable tag: 1.2

Simple Hierarchical Sitemap is the simple way to add an HTML sitemap to your wordpress blog...

== Description ==

By using a shortcode or PHP function, this plugin generates and HTML Code which is displayed in your page or anywhere you want.
It displays pages and posts sorted hierarchically in their categories.

The generated page will give an easy navigation for your users and is SEO user frendly.

== Installation ==

= Manual installation =

1. Upload folder into to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use your 'Presentation'/'Sidebar Widgets' settings to drag and configure

= Automatic installation =

1. Login to the admin interface.
1. Click Plugins in the left hand menu navigation.
1. Click on "Add New" next to the Plugins header in the main content area.
1. Enter "Simple Hierarchical Sitemap" (without quotes) in the textbox and click the "Search Plugins" button.
1. In the list of relevant plugins click the "Install" link for "WP Realtime Sitemap" on the right hand side of the page.
1. Click the "Install Now" button on the popup page.
1. Click "Activate Plugin" to finish installation.

= Display the sitemap =

1. Make sure the plugin is installed.
1. Click Pages in the left hand menu navigation.
1. Click on "Add New" in the left hand menu navigation or click on "Add New" next to the Pages header in the main content area.
1. Give your page a title I suggest Sitemap, and put `[simple_hierarchial_sitemap]` into the wysiwyg box.
1. Now save or update the page and click on the View page link at the top to see your new sitemap.

== Configuration ==

The shortcode `[simple_hierarchial_sitemap]` has optional parameters :

*   exclude : with this one, you can list posts (or pages) ID you don't want to be displayed (example : [simple_hierarchial_sitemap exclude=445,446]).

Parameters can be used together.

== Screenshots ==

1. **An example of a sitemap.**

== Changelog ==

= 1.2 =
*   Support link added.

= 1.1 =
*   There was a minor issue when retrieving categories list. In some cases, posts were all sorted in the same category without name.

= 1.0 =
*   The first version of the plugin.
