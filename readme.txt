=== Simple Course Creator - Updates ===
Contributors: alexmangini
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=alex%40kolakube%2ecom&lc=US&item_name=Alex%20Mangini%2c%20Kolakube&no_note=0&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHostedGuest
Tags: series, course, lesson, taxonomy, updates, timeline, story,
Requires at least: 3.8
Tested up to: 3.9
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Use the SCC Updates addon to list the newest posts from your courses and stories in a timeline format.

== Description ==

The Simple Course Creator Updates addon (SCC Updates) is an extension for the Simple Course Creator plugin. With it, you can create a timeline of updates from your courses and display them anywhere on your WordPress site with a shortcode.

Templates and styling are handled out of the box, but SCC Updates is very simple to customize both with the shortcode and template files/stylesheets.

Follow Simple Course Creator Updates development on [Github](https://github.com/alexmangini/simple-course-creator-updates/)

== Installation ==

1. Upload `simple-course-creator-updates` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the `[scc_updates]` shortcode to output all courses by default, or `[scc_updates course="coursename"]` for single courses

== Frequently Asked Questions ==

= How can I change the headline and description text of the course? =

By default, the title of the course is the same name you give it when you create the course in Dashboard > Posts > Courses. You can set a custom title by filling in the Post Listing Title field on the course's edit screen.

The same process applies to the course description, except you'd fill in the Description text box on the course edit screen.

= How can I add my own styles? =

You can override the default styles the SCC Updates plugin outputs by following these simple steps:

NOTE: It is highly encouraged you only make these changes using a child theme. If you use a parent theme, and then update it, you will lose all customizations you made with this plugin. Read more about child themes: http://codex.wordpress.org/Child_Themes

* Via FTP, open the `simple-course-creator-updates` plugin file and browse to `includes/scc_templates` and open the `sccu.css` file
* Now, copy the entire file and go to your child theme root folder (the same folder `style.css` is in)
* Unless you've already created it, create a new folder called `scc_templates`
* Inside the `scc_templates` folder, create a `sccu.css` file.
* Paste in the CSS, and you can now freely make changes to the appearance of SCC Updates!

= How can I edit the template? =

You have complete customization control of not just the way SCC Updates looks, but also how it functions. Following a nearly identical process as above, editing the template file can be done by following these simple steps:

NOTE: It is highly encouraged you only make these changes using a child theme. If you use a parent theme, and then update it, you will lose all customizations you made with this plugin. Read more about child themes: http://codex.wordpress.org/Child_Themes

* Via FTP, open the `simple-course-creator-updates` plugin file and browse to `includes/scc_templates` and open the `sccu-output.php` file
* Now, copy the entire file and go to your child theme root folder (the same folder `style.css` is in)
* Unless you've already created it, create a new folder called `scc_templates`
* Inside the `scc_templates` folder, create a `sccu-output.php` file.
* Paste in the template code, and you can now freely make changes to the functionality of SCC Updates!

== Screenshots ==

1. What the timeline looks like with posts added to a course

== Changelog ==

= 1.0.0 =
* first stable version