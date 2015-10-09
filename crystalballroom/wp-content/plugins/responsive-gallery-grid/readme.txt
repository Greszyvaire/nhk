=== Responsive Gallery Grid ===
Contributors: Jules Colle
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=j_colle%40hotmail%2ecom&lc=US&item_name=Jules%20Colle%20%2d%20WP%20plugins%20%2d%20Responsive%20Gallery%20Grid&item_number=rgg&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: HTML5, gallery, Google+, responsive, pop-out
Requires at least: 3.0
Tested up to: 3.9
Stable tag: 1.3.3
License: GPLv2 or later


Change the native Wordpress gallery to a gallery that nicely fits your images into a jigsaw-like grid. Much like the Google+ gallery.


== Description ==

If the plugin is activated, all of your Wordpress galleries will be styled like a Google+ gallery.

Main features include:

1. The gallery will fit in nicely in a responsive web design, as the grid is recalculated when scaling the window.
1. By default the images will pop out a whenever you move the cursor over them. The z-indexes are updating so that the pop-out images are always on top.
1. The animation speed, scaling, margins and max row height are customizable in the `[gallery]` shortcode.

A live example can be viewed at http://bdwm.be/rgg/demo/

Documentation available at http://bdwm.be/rgg/shortcode-parameters/

== Installation ==

1. Upload the plugin contents to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in Wordpress Admin
1. That's it! Your default WordPress Galleries should now all look titled and responsive!

= Finetuning =

If you want to finetune the options per gallery you can add some parameters to the gallery shortcode (from text editor).

Documentation available at http://bdwm.be/rgg/shortcode-parameters/

More options comming soon! Please start a support thread for any of your requests.

== Frequently Asked Questions ==

= How do I add a lightbox to the gallery? =

Any way you would add a lightbox to the native wordpress gallery will work for Responsive Gallery Grid.
One plugin I know that will work right out of the box is jQuery ColorBox. http://wordpress.org/extend/plugins/jquery-colorbox/

= The images to the left and right of the grid are cut of when I mouse over them. How do I solve this? =

This will happen if one of the grid containers have the CSS property <code>overflow:hidden</code>. If possible, you will
need to change this to <code>overflow:visible</code>. If not, you can
wrap the gallery inside a div, and assign some margins to it. If that's no option either, you should just disable scaling, or use negative scaling
by setting the <code>scale</code> property to a value between 0.5 and 1 in the schortcode.

= How can I further configure and modify the gallery to my needs? =

Please take a look here: http://bdwm.be/rgg/shortcode-parameters/

Need anything else? Please start a support thread?

= Will there be added more options? =

Sure. Please start a support thread for any of your requests.

== Upgrade Notice ==

1. RGG now uses native gallery features to retrieve the images, this means you can no longer add multiple instances of the same image to a single gallery. If you need this feature, please revert to version 1.3.

== Screenshots ==

1. Responsive Gallery Grid in action. By default the images will pop out on mouse-over. <a href="http://bdwm.be/rgg/demo" title="demo">Live example</a>.
2. The gallery shortcode can be extended with some options, from the text editor.
3. From the WYSIWYG view the gallery looks like an ordinary Wordpress gallery, so you can easily add and remove pictures the way you are used to.

== Changelog ==

= 1.3.3 (April 18, 2014) =
* Got rid of a bug caused by WP 3.9

= 1.3.2 (August 17, 2013) =
* Got rid of most bugs in version 1.3.1 (hopefully)

= 1.3.1 (May 29, 2013) =
* Changed character encoding for captions, to include special characters. With thanks to Niko.
* The last row of the gallery is now always equal to the height of the previous row. This will generate prettier results if you use images with the same dimensions, like logo's.
* New parameter, <a href="http://bdwm.be/rgg/shortcode-parameters/#orderby"><code>orderby</code></a>, allows you to order images by title, publish date, or even <a href="http://bdwm.be/rgg/somewhat-more-advanced-examples/#random">randomly</a>
* More new parameters added. <a href="http://bdwm.be/rgg/shortcode-parameters/#order"><code>order</code></a>, <a href="http://bdwm.be/rgg/shortcode-parameters/#id"><code>id</code></a>, <a href="http://bdwm.be/rgg/shortcode-parameters/#size"><code>size</code></a>, <a href="http://bdwm.be/rgg/shortcode-parameters/#include"><code>include</code></a>, <a href="http://bdwm.be/rgg/shortcode-parameters/#exclude"><code>exclude</code></a> 
* The <code>image_size</code> parameter is deprecated. It will still work, but it's better to use <a href="http://bdwm.be/rgg/shortcode-parameters/#size"><code>size</code></a> instead.
* Some bug fixes

= 1.3 (May 13, 2013) =
* Fixed so many bugs I can't remember which ones anymore.
* Rewritten the entire ordering algorithm, so things are less likey to break when adding borders and padding to the images.

= 1.2.4 (May 9, 2013) =
* Only load the javascript and CSS files if there actually are galleries on the page. Before, this could cause javascript warnings and errors on pages without a Responsive Gallery Grid on them.

= 1.2.3 (May 7, 2013) =
* Included padding and borders into the calculations, so the grid won't break if one of those are added to the images.

= 1.2.2 (May 6, 2013) =
* escaped the captions so double quotes can be added in the caption text.
* Added captions parameter to shortcode, so captions can be disabled.
* Some bug fixes

= 1.2.1 (May 6, 2013) =
* Added captions in the title attribute of the anchor tags.

= 1.2 (May 6, 2013) =
* changed the way the plugin hooks to the native gallery, so other plugins can use it too.

= 1.1 (May 2, 2013) =
* Added a bunch of paramaters to the shortcode
* updated plugin info page
* update plugin website http://bdwm.be/rgg

= 0.1.1 (April 27, 2013) =
* updated the Plugin Info page

= 0.1 (April 26, 2013) =
* First release