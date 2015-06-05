=== Comment Approved Notifier Extended ===
Contributors: ufukart
Donate link: http://www.ubilisim.com/comment-approved-notifier-extended-wordpress-plugin/
Tags: comment, comments, approve, notifier, posts, comment approved
Requires at least: 2.7
Tested up to: 4.1
Stable tag: 4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically send email notification to comment author after comment approval.

== Description ==

Comment Approved Notifier sends an e-mail to your commenters when you approve their comments. It is a very simple plugin. There are no settings, options. It starts to work when you activate it.
1. No Configuration
2. Activate and Forget
3. Full Compatible with SMTP Mail Sender Plugins

== Installation ==

1. Download the zip file and extract the contents.
2. Upload the 'comment-approved-notifier-extended' folder or 'comment-approved-notifier-extended.php' to your plugins directory (wp-content/plugins/).
3. Activate the plugin through the 'plugins' page in WordPress.
4. That is all.

== Frequently Asked Questions ==

= How can I set change from email address? =
You can change site email from Wordpress General Settings or change "$site_email = get_bloginfo('admin_email');" to "$site_email = 'yourmailadress@yourdomain.com';" from 14. row of comment-approved-notifier-extended.php.

== Changelog ==

= 4 =
* Added English Language
Comment Approved Notifier Extended now supported English and Turkish Language.

= 3.0 =
* sender e-mail address changed from noreply to admin_email
* Added site name to subject
* Changed text/plain to text/html
* Codes cleaned.

= 2.2 =
* Add site name to "From" section (by yakuphan)

= 2.1 =
* Compatible up to WP 2.8 (by yakuphan)

= 2.0 =
* Compatible up to WP 2.7 (by yakuphan)

= 1.1 =
* Fixed some bugs. Older version sends e-mail to trackback commenters so please update. (by yakuphan)

= 1.0 =
* Plugin released. (by yakuphan)