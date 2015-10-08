=== 360 Product Rototation ===
Contributors: YoFLA
Tags: 360, 360 product view, 360 product rotation, 360 product viewer, 3d product viewer, 360 view software,
product rotation, objectvr, object vr, 3D product rotation, 3D, product spin, 360 product spin
Requires at least: 3.3.0
Tested up to: 3.9.1.
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: 1.0.5

Insert 360 degree product views created with the free 3DRT Setup Utility Desktop application into your WordPress site.

== Description ==
####Demo####
An example is worth 1000s words: [View Online Demo](http://www.yofla.com/3d-rotate/wordpress-integration-demo/)

####Features####
* Full 360° view
* Multiple levels
* Responsive design
* Works on mobile devices
* Zooming
* Hotspots


####How it works####
You use the free [3DRT Setup Utility](http://www.yofla.com/3d-rotate/) to generate your 360° prodct view. Then upload the files usign FTP to your site and use a shortcode to insert the 360° product view to your site.


== Installation ==
* Install 360 Product Rotation Plugin by installing from your Wordpress Admin area
* Activate the module via the Plugins page in your Wordpress Admin area
* Upload the folder the 3DRT Setup Utility generates to your Wordpress site under *the wp-content/uploads* folder
* Use this shortcode to embed:

[360 width="100%" height="375px" src="weddingring"]

* **src** is the product folder name under *wp-content/uploads*. Nesting is supported, e.g. *src="3d-products/client1/product01"*
* **width** is your desired width in px or % (optional parameter, defaults to 500px)
* **height** is your desired height in px or % (optional parameter, defaults to 375px)

== Changelog ==
#####1.0.5#####
* typo in 1.0.4 fixed

#####1.0.4#####
* temporary disabled ssl connection for cloud based rotatetool.js (problem with renewing ssl certficate on side of my hosting provider)

#####1.0.3#####
* iframe embed mode is now turned on by default (for better fullscreen support)
* added option to set default iframe styles in Settings page

#####1.0.2#####
* added error message when user wants to embed one object in one page twice or more (what is not currently possible)
* added support for popup embed mode
* fixed bug when using px values
#####1.0.1#####
* added support for embedding flash based 360 product rotations created with 3DRT Setup Utility 1.3.8 and older
#####1.0.0#####
* initial release
