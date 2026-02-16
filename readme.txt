=== Comment Approved Notifier Extended ===
Contributors: ufukart
Donate link: https://www.paypal.com/donate/?business=53EHQKQ3T87J8&no_recurring=0&currency_code=USD
Tags: comment, notification, email, approve, approved comment
Requires at least: 5.0
Tested up to: 6.9.1
Requires PHP: 5.6
Stable tag: 5.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Zero bloat, single purpose plugin that automatically sends email notifications when comments are approved. Lightweight and focused.

== Description ==

**Comment Approved Notifier Extended** is a lightweight WordPress plugin with a single focus: automatically notify comment authors when their comments are approved.

= 🎯 Single Purpose, Zero Bloat =

This plugin does ONE thing and does it well:
* Sends customizable email notifications when comments are approved
* No unnecessary features, no performance overhead
* Clean, efficient code following WordPress best practices

= ✨ Key Features =

* **Automatic Email Notifications** - Instantly notifies users when their comment is approved
* **Customizable Templates** - Personalize email subject and body with shortcodes
* **Professional Email Design** - Beautiful, responsive HTML email template
* **Dark Mode Support** - Email template adapts to user preferences
* **Secure** - Built with WordPress security standards (nonce verification, data sanitization, validation)
* **Translation Ready** - Fully translatable with .pot file included
* **Lightweight** - Minimal database queries, no bloat
* **Developer Friendly** - Clean, well-documented code

= 🎨 Available Shortcodes =

Personalize your emails with these shortcodes:

* `[commentauthor]` - Comment author's name
* `[commentedposttitle]` - Title of the post
* `[commentaddress]` - Direct link to the comment
* `[commentcontent]` - The comment text
* `[blogname]` - Your site name
* `[blogurl]` - Your site URL

= 🔒 Security First =

* Email validation with `is_email()`
* Nonce verification for form submissions
* Data sanitization with `sanitize_text_field()` and `wp_kses_post()`
* Output escaping for security
* ABSPATH checks
* Error logging for debugging

= 💡 Use Cases =

* Improve user engagement by notifying commenters
* Build community by acknowledging contributions
* Increase return visits to your blog
* Professional communication with your audience

= 🌍 Translation Ready =

The plugin is fully translatable and includes:
* Text domain: `comment-approved-notifier-extended`
* .pot file for translations
* RTL support

== Installation ==

= Automatic Installation =

1. Go to **Plugins > Add New** in your WordPress admin
2. Search for "Comment Approved Notifier Extended"
3. Click **Install Now**, then **Activate**
4. Go to **Settings > Comment Approved Notifier** to customize your email template

= Manual Installation =

1. Download the plugin ZIP file
2. Go to **Plugins > Add New > Upload Plugin**
3. Choose the ZIP file and click **Install Now**
4. Activate the plugin
5. Configure settings at **Settings > Comment Approved Notifier**

= Configuration =

1. Navigate to **Settings > Comment Approved Notifier**
2. Customize the email **Subject** using shortcodes
3. Customize the email **Body** (HTML supported)
4. Click **Save Changes**
5. Test by approving a comment!

== Frequently Asked Questions ==

= Does this work with all comment types? =

No, it only sends notifications for actual comments. Trackbacks and pingbacks are excluded by design to prevent unnecessary emails.

= Can I customize the email design? =

Yes! The email body supports HTML, so you can add styling. The plugin includes a professional, responsive template by default. For advanced customization, you can modify the template file in `templates/email-template-1.php`.

= What shortcodes are available? =

You can use these shortcodes in both subject and body:
* `[commentauthor]` - Comment author's name
* `[commentedposttitle]` - Post title
* `[commentaddress]` - Direct link to comment
* `[commentcontent]` - Comment text
* `[blogname]` - Your blog name
* `[blogurl]` - Your blog URL

= Will this work with my email delivery service? =

Yes! The plugin uses WordPress's native `wp_mail()` function, which works with any SMTP plugin like WP Mail SMTP, Easy WP SMTP, or Post SMTP. For better deliverability, we recommend using an SMTP plugin.

= Does this send emails for pending comments? =

No, emails are only sent when a comment transitions from "unapproved" to "approved" status. Newly posted comments that are automatically approved will not trigger emails.

= Is the email template mobile-responsive? =

Yes! The default email template is fully responsive and includes dark mode support for better user experience.

= Can I translate the plugin? =

Absolutely! The plugin is translation-ready. Use the included `.pot` file with Loco Translate or Poedit to create translations.

= Does this work with custom comment types? =

The plugin is specifically designed for standard WordPress comments. Custom post type comments work as long as they're registered as the 'comment' type.

= Will this slow down my site? =

No. The plugin is extremely lightweight with zero bloat. It only loads on the admin settings page and when a comment is approved. No frontend resources are loaded.

= What happens if email sending fails? =

The plugin logs errors to your WordPress debug log when email sending fails. Enable `WP_DEBUG_LOG` in wp-config.php to view error messages.

= Can I add custom fields to the email? =

The current version supports the predefined shortcodes. For custom fields, you can modify the plugin code or request a feature on the support forum.

= Is this GDPR compliant? =

The plugin only uses email addresses already stored in WordPress comments. It doesn't collect any additional personal data. However, please review with your legal counsel for your specific use case.

= Does this work with Gutenberg/block editor? =

Yes! The plugin works regardless of your editor choice as it operates on the comment approval process, not the content creation process.

= Can I disable notifications for specific posts? =

Currently, notifications are sent for all approved comments site-wide. This keeps the plugin simple and focused. If you need post-specific control, consider requesting this feature in the support forum.

== Screenshots ==

1. Clean, modern admin interface
2. Email template settings with shortcode sidebar
3. Professional email template preview
4. Email received by comment author

== Changelog ==

= 5.4 =
* Enhanced: Improved code documentation with PHPDoc blocks
* Enhanced: Better error handling and logging
* Enhanced: Consistent use of escape functions (esc_html_e vs echo __)
* Enhanced: More descriptive error messages
* Enhanced: Load text domain on 'init' hook for better compatibility
* Security: Added capability check in admin page
* Security: Improved nonce error messages
* Code Quality: Better code formatting and WordPress Coding Standards compliance
* Code Quality: More efficient array declarations
* Code Quality: Removed redundant code comments
* Fixed: Cross Site Scripting (XSS) vulnerability resolved with proper sanitization
* Added: Email validation using is_email() function
* Added: Error logging for debugging failed emails
* Added: Settings link in plugin list page
* Improved: Modern, card-based admin interface design
* Improved: Better template file handling with fallback
* Improved: Email headers now use array format
* Enhanced: Better HTML support in email body with wp_kses_post()
* Enhanced: Proper use of wpautop() for email formatting
* Updated: Admin CSS and JavaScript to separate files
* Updated: Template path structure (templates/email-template-1.php)

= 5.3 =
* Fixed: Cross Site Scripting (XSS) vulnerability

= 5.2 =
* Moved: Menu relocated under Settings
* Added: Donate link
* Added: Professional HTML email template
* Improved: PHP 5.6+ compatibility, tested up to PHP 8.2
* Minor improvements and bug fixes

= 5.1 =
* Fixed: Email sending issue resolved

= 5.0 =
* Refactored: Complete code restructure
* Added: Mail subject and title editor
* Added: Shortcode system for email customization
* Improved: Better code organization

= 4.4.2 =
* Added: Multi-language support

= 4.4.1 =
* Prepared: WordPress internationalization

= 4.4 =
* Added: Multi-language support

= 4.3 =
* Improved: Security enhancements

= 4.2 =
* Minor improvements

= 4.1 =
* Code optimizations

= 4.0 =
* Added: English language support (previously Turkish only)

= 3.0 =
* Changed: Sender email from noreply to admin_email
* Added: Site name to subject line
* Changed: Email format from text/plain to text/html
* Cleaned: Code improvements

= 2.2 =
* Added: Site name to "From" section

= 2.1 =
* Compatible: WordPress 2.8

= 2.0 =
* Compatible: WordPress 2.7

= 1.1 =
* Fixed: Removed email sending to trackback commenters

= 1.0 =
* Initial release

== Upgrade Notice ==

= 5.5 =
Recommended update with improved code quality, better error handling, and enhanced security measures. No breaking changes.

= 5.4 =
Important security update fixing XSS vulnerability. Includes new email validation and modern admin interface. Update immediately.

= 5.3 =
Critical security update. All users should update immediately.

= 5.2 =
Major update with beautiful email template and improved compatibility. Recommended for all users.

== Privacy Policy ==

This plugin does not collect, store, or transmit any personal data beyond what WordPress already stores for comments. It uses existing comment author email addresses to send notifications.

== Support ==

For support, feature requests, or bug reports:
* Visit the [WordPress.org support forum](https://wordpress.org/support/plugin/comment-approved-notifier-extended/)
* Check the [plugin website](https://www.zumbo.net/comment-approved-notifier-extended-wordpress-plugin/)

== Credits ==

* Original author: yakuphan
* Current maintainer: UfukArt
* Email template design: Responsive HTML email best practices

== License ==

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
