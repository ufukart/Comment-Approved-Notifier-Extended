=== Comment Approved Notifier Extended ===
Contributors: ufukart
Donate link: https://www.paypal.com/donate/?business=53EHQKQ3T87J8&no_recurring=0&currency_code=USD
Tags: comment, approve, notifier, comment approved, notification
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 5.6
Stable tag: 5.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Comment Approved Notifier Extended plugin sends automatic email notifications to users when their comment is approved, with customizable content.

== Description ==

The Comment Approved Notifier Extended plugin for WordPress automatically sends an email notification to the comment author when their comment is approved on your website. This ensures that users are promptly informed about the approval of their comment, enhancing user engagement and improving communication.

== Key Features: ==
✅ Sends a customizable notification email when a comment is approved.
✅ Includes shortcodes to personalize the email content (e.g., comment author name, post title, comment link).
✅ Easy-to-use settings page for managing email content.
✅ Fully translatable with language files.

== Installation ==

= Download & Install: =
1. Go to Plugins > Add New in your WordPress dashboard.
1. Search for "Missed Scheduled Posts Publisher" or upload the plugin ZIP file manually.
1. Click Install Now, then Activate the plugin.
= Configure Settings: =
1. After activating the plugin, go to the Comment Approved Notifier menu under the Settings menu in the WordPress admin.
1. In the settings page, you can edit the subject and body of the email that will be sent to comment authors when their comment is approved.
1. Use the shortcodes provided on the settings page to personalize the email (e.g., [commentauthor], [commentedposttitle], etc.).

== Frequently Asked Questions ==

= How do I customize the email notification? =
You can customize the email subject and body by going to Settings > Comment Approved Notifier in your WordPress admin panel. Here, you can edit the email message with your preferred content and use the provided shortcodes to personalize the message.

= What shortcodes can I use in the email content? =
You can use the following shortcodes in the email subject or body:
[commentauthor] – The name of the comment author.
[commentedposttitle] – The title of the post where the comment was made.
[commentaddress] – The direct link to the comment.
[commentcontent] – The content of the comment.
[blogname] – The name of your blog.
[blogurl] – The URL of your blog.

= Can I use HTML in the email body? =
Yes, the email body supports HTML, so you can style your email with HTML tags for better formatting.

= Will the plugin send notifications for all comments? =
The plugin only sends notifications for approved comments. If a comment is pending or marked as spam, no notification will be sent.

= What happens if I deactivate the plugin? =
If you deactivate the plugin, it will stop sending notifications for new approved comments, but previously sent notifications will not be affected.

= Is the plugin compatible with all WordPress themes? =
Yes, the plugin should be compatible with any WordPress theme as it operates independently of the theme’s structure. However, it requires WordPress 4.0 or higher to function properly.

= Can I add more shortcodes? =
The plugin currently supports a set of predefined shortcodes. If you need additional customization, feel free to extend the plugin by editing the code or contacting the plugin author for further assistance.

== Changelog ==

= 5.3 =
Cross Site Scripting (XSS) vulnerability resolved

= 5.2 =
* Menu moved under the setting
* Added donate link
* Added mail template. Sent emails look better now
* Fully compatible with PHP 5.6 and above. Tested up to: PHP 8.2
* Few minor improvements

= 5.1 =
* Bug Fixed. (Email sending issue solved.)

= 5 =
* Refactored codes.
* Added Mail Subject and Title Editor.
* Added Shortcodes

= 4.4.2 =
* MultiLanguage

= 4.4.1 =
* Prepared for Wordpress Internationalization

= 4.4 =
* MultiLanguage

= 4.3 =
* Security Improvements

= 4.2 =
* Small Improvements

= 4.1 =
* Minor Optimizations

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
