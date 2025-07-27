# Comment Approved Notifier Extended

**Contributors:** [ufukart](https://github.com/ufukart)  
**Donate link:** [Donate via PayPal](https://www.paypal.com/donate/?business=53EHQKQ3T87J8&no_recurring=0&currency_code=USD)  
**Tags:** comment, approve, notifier, comment approved, notification  
**Requires at least:** WordPress 5.0  
**Tested up to:** WordPress 6.8  
**Requires PHP:** 5.6  
**Stable tag:** 5.3  
**License:** GPLv2 or later  
**License URI:** [http://www.gnu.org/licenses/gpl-2.0.html](http://www.gnu.org/licenses/gpl-2.0.html)

A WordPress plugin that sends automatic email notifications to users when their comment is approved, with customizable content.

---

## Description

**Comment Approved Notifier Extended** automatically notifies comment authors via email once their comment is approved on your website. This plugin improves engagement by informing users when their input goes live.

## Features

- ✅ Sends a customizable notification email when a comment is approved.
- ✅ Includes shortcodes to personalize the email content (e.g., comment author name, post title, comment link).
- ✅ Easy-to-use settings page for managing email content.
- ✅ Fully translatable with language files.

---

## Installation

1. Go to **Plugins > Add New** in your WordPress dashboard.
2. Search for **Comment Approved Notifier Extended** or upload the plugin `.zip` file.
3. Click **Install Now**, then **Activate** the plugin.

### Configure Settings

1. After activation, navigate to **Settings > Comment Approved Notifier**.
2. Edit the email subject and message body.
3. Use shortcodes to personalize the message:
    - `[commentauthor]`: Name of the comment author
    - `[commentedposttitle]`: Title of the post
    - `[commentaddress]`: Direct link to the comment
    - `[commentcontent]`: Comment content
    - `[blogname]`: Your site name
    - `[blogurl]`: Your site URL

---

## FAQ

### How do I customize the email notification?
Go to **Settings > Comment Approved Notifier** and edit the subject and body. Shortcodes are available for dynamic content.

### What shortcodes can I use?
- `[commentauthor]`
- `[commentedposttitle]`
- `[commentaddress]`
- `[commentcontent]`
- `[blogname]`
- `[blogurl]`

### Can I use HTML in the email body?
Yes, HTML is supported in the email body for better formatting.

### Will the plugin notify for all comments?
Only approved comments trigger the email. Pending or spam comments are ignored.

### What happens if I deactivate the plugin?
Notifications will no longer be sent, but previously sent messages remain unaffected.

### Is it compatible with all themes?
Yes, it works independently of the theme. Requires WordPress 4.0+.

### Can I add more shortcodes?
Currently, only predefined shortcodes are supported. Advanced users can extend the plugin.

---

## Changelog

### 5.3
- Resolved Cross Site Scripting (XSS) vulnerability

### 5.2
- Moved menu under Settings
- Added donation link
- Introduced email template for better design
- Full PHP 5.6+ compatibility, tested up to PHP 8.2
- Minor improvements

### 5.1
- Fixed email sending bug

### 5.0
- Major code refactoring
- Added subject & title editor
- Introduced shortcodes

### 4.4.2
- Multilanguage support

### 4.4.1
- Prepared for internationalization

### 4.3
- Security improvements

### 4.2
- Minor enhancements

### 4.1
- Optimizations

### 4.0
- Added English language support
- Now supports both English and Turkish

### 3.0
- Changed sender from `noreply` to `admin_email`
- Added site name to subject
- Switched from plain text to HTML emails
- Code cleanup

### 2.2
- Added site name in "From" address (by yakuphan)

### 2.1
- Compatible with WordPress 2.8 (by yakuphan)

### 2.0
- Compatible with WordPress 2.7 (by yakuphan)

### 1.1
- Fixed bug where emails were sent to trackbacks (by yakuphan)

### 1.0
- Initial release (by yakuphan)

---

## License

This plugin is licensed under the [GPLv2 or later](http://www.gnu.org/licenses/gpl-2.0.html).
