Simple Course Creator - Updates
=====================

The Simple Course Creator Updates addon (SCC Updates) is an extension for the Simple Course Creator plugin for WordPress. With it, you can create a timeline of updates from your courses and display them anywhere on your WordPress site with a shortcode.

Templates and styling are handled out of the box, but SCC Updates is very simple to customize both with the shortcode and template files/stylesheets.

#### Requirements
---

1. The latest version of WordPress is recommended, with a minimum of WordPress 3.8
2. The latest version of [Simple Course Creator](https://github.com/sdavis2702/simple-course-creator)

#### How It Works
---

The SCC Updates plugin pulls your course entries from Simple Course Creator and lists them in a timeline format, showing newest to oldest.

SCC Updates is a versatile plugin and can have many uses to keep your audience engaged with your course:

* News sites can easily post updates to stories broken apart into multiples posts
* Course creators can use it to tease previews of their full course
* Theme/plugin developers can use it to document the progress of their work on their blog
* Storytellers can break their stories down into parts, and keep their readers updated as new parts are released

![Simple Course Creator - Updates](http://kolakube.com/wp-content/uploads/2014/04/scc-updates1.png)

### Usage
---

To display all timelines for your courses, place the `[scc_updates]` shortcode anywhere that accepts shortcodes in WordPress.

You can display individual timelines by setting the `course` attribute to either the courses slug or name:

`[scc_updates course="Course Name"]`

There are also other attributes you can use to customize the timeline:

* *intro* - Show/hide the title and description text of the Course. True by default (to show), set as *false* to hide.
* *hide_empty* - Hides all courses that have no updates. True by default, set as *false* to show an empty updates timeline with a message.

### Frequently Asked Questions
---

##### How can I change the headline and description text of the course?
---

By default, the title of the course is the same name you give it when you create the course in Dashboard > Posts > Courses. You can set a custom title by filling in the Post Listing Title field on the course's edit screen.

The same process applies to the course description, except you'd fill in the Description text box on the course edit screen.

###### How can I add my own styles?
---

You can override the default styles the SCC Updates plugin outputs by following these simple steps:

NOTE: It is highly encouraged you only make these changes using a child theme. If you use a parent theme, and then update it, you will lose all customizations you made with this plugin. Read more about child themes: http://codex.wordpress.org/Child_Themes

1. Via FTP, open the `simple-course-creator-updates` plugin file and browse to `includes/scc_templates` and open the `sccu.css` file
2. Now, copy the entire file and go to your CHILD THEME root folder (the same folder `style.css` is in)
3. Unless you've already created it, create a new folder called `scc_templates`
4. Inside the `scc_templates` folder, create a `sccu.css` file.
5. Paste in the CSS, and you can now freely make changes to the appearance of SCC Updates!

###### How can I edit the template?
---

You have complete customization control of not just the way SCC Updates looks, but also how it functions. Following a nearly identical process as above, editing the template file can be done by following these simple steps:

NOTE: It is highly encouraged you only make these changes using a child theme. If you use a parent theme, and then update it, you will lose all customizations you made with this plugin. Read more about child themes: http://codex.wordpress.org/Child_Themes

1. Via FTP, open the `simple-course-creator-updates` plugin file and browse to `includes/scc_templates` and open the `sccu-output.php` file
2. Now, copy the entire file and go to your CHILD THEME root folder (the same folder `style.css` is in)
3. Unless you've already created it, create a new folder called `scc_templates`
4. Inside the `scc_templates` folder, create a `sccu-output.php` file.
5. Paste in the template code, and you can now freely make changes to the functionality of SCC Updates!

### About the Author
---
I'm Alex, and I'm the guy behind [Kolakube](http://kolakube.com/). I've been creating WordPress themes and since I was 15, and started a couple of businesses along the way. [You should follow me on Twitter](http://twitter.com/afrais/).

SCC Updates is my first free WordPress plugin, and I've love to know what you think! Feel free to [shoot me an email about it](http://kolakube.com/contact/), and even [donate](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=alex%40kolakube%2ecom&lc=US&item_name=Alex%20Mangini%2c%20Kolakube&no_note=0&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHostedGuest) if you like it that much!