# Comment Approved Notifier Extended

![WordPress Plugin Version](https://img.shields.io/badge/version-5.5-blue.svg)
![WordPress Compatibility](https://img.shields.io/badge/wordpress-5.0%2B-brightgreen.svg)
![PHP Version](https://img.shields.io/badge/php-5.6%2B-purple.svg)
![License](https://img.shields.io/badge/license-GPLv2-red.svg)

> 🎯 **Zero bloat, single purpose plugin** - Automatically send beautiful email notifications when WordPress comments are approved.

## 📖 Description

**Comment Approved Notifier Extended** is a lightweight WordPress plugin designed with a single focus: notify comment authors instantly when their comments are approved. No bloat, no unnecessary features—just one thing done exceptionally well.

### ✨ Why Choose This Plugin?

- **🎯 Single Purpose** - Does ONE thing perfectly: sends approval notifications
- **🪶 Zero Bloat** - No unnecessary features or performance overhead
- **🔒 Security First** - Built following WordPress security best practices
- **📱 Responsive Emails** - Beautiful HTML templates with dark mode support
- **🌍 Translation Ready** - Fully internationalized with .pot file
- **⚡ Lightning Fast** - Minimal database queries, optimized code
- **👨‍💻 Developer Friendly** - Clean, well-documented code

## 🚀 Features

### Email Notifications
- Automatic notifications when comments are approved
- Customizable subject and body with shortcodes
- Professional, responsive HTML email template
- Dark mode support for better user experience

### Security
- Email validation with `is_email()`
- Nonce verification for all form submissions
- Data sanitization (`sanitize_text_field()`, `wp_kses_post()`)
- Output escaping for XSS prevention
- ABSPATH security checks
- Error logging for debugging

### Customization
- 6 available shortcodes for personalization
- HTML support in email body
- Easy-to-use admin interface
- Click-to-copy shortcode sidebar

### Performance
- Loads admin assets only on settings page
- No frontend resources loaded
- Minimal database queries
- Efficient hook usage

## 📦 Installation

### Via WordPress Admin

1. Go to **Plugins > Add New**
2. Search for "Comment Approved Notifier Extended"
3. Click **Install Now**, then **Activate**
4. Navigate to **Settings > Comment Approved Notifier**
5. Customize your email template
6. Save and test!

### Manual Installation

```bash
# Download and extract
cd wp-content/plugins/
wget https://downloads.wordpress.org/plugin/comment-approved-notifier-extended.zip
unzip comment-approved-notifier-extended.zip
rm comment-approved-notifier-extended.zip

# Or clone from GitHub
git clone https://github.com/yourusername/comment-approved-notifier-extended.git
```

Then activate via WordPress admin.

## 🎨 Available Shortcodes

Use these shortcodes in your email subject and body:

| Shortcode | Description | Example Output |
|-----------|-------------|----------------|
| `[commentauthor]` | Comment author's name | John Doe |
| `[commentedposttitle]` | Post title | "10 Best WordPress Plugins" |
| `[commentaddress]` | Direct link to comment | https://yoursite.com/post#comment-123 |
| `[commentcontent]` | Comment text | "Great article! Thanks for sharing..." |
| `[blogname]` | Your site name | My Awesome Blog |
| `[blogurl]` | Your site URL | https://yoursite.com |

### Example Email Template

**Subject:**
```
Your comment on [commentedposttitle] has been approved!
```

**Body:**
```
Dear [commentauthor],

Your comment has been approved for the following post:
[commentedposttitle]

You can view your comment at:
[commentaddress]

Your comment:
[commentcontent]

Thank you for contributing to our discussion!

Best regards,
[blogname]
[blogurl]
```

## ⚙️ Configuration

### Basic Setup

1. Navigate to **Settings > Comment Approved Notifier**
2. Customize the **Email Subject** using shortcodes
3. Customize the **Email Body** (HTML supported)
4. Click **Save Changes**
5. Approve a test comment to verify!

### SMTP Configuration (Recommended)

For better email deliverability, use an SMTP plugin:

- [WP Mail SMTP](https://wordpress.org/plugins/wp-mail-smtp/)
- [Easy WP SMTP](https://wordpress.org/plugins/easy-wp-smtp/)
- [Post SMTP](https://wordpress.org/plugins/post-smtp/)

### Debugging

Enable WordPress debug logging to see error messages:

```php
// In wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Check logs at: `wp-content/debug.log`

## 🔧 Technical Details

### Requirements

- **WordPress:** 5.0 or higher
- **PHP:** 5.6 or higher (tested up to PHP 8.5)
- **MySQL:** 5.6 or higher

### Hooks Used

```php
// When comment status changes from unapproved to approved
add_action('comment_unapproved_to_approved', 'cane_send_email');
```

### File Structure

```
comment-approved-notifier-extended/
├── comment-approved-notifier-extended.php  # Main plugin file
├── readme.txt                              # WordPress.org readme
├── README.md                               # GitHub readme
├── assets/
│   ├── css/
│   │   └── admin.css                       # Admin styles
│   └── js/
│       └── admin.js                        # Admin scripts
├── templates/
│   └── email-template-1.php                # Email HTML template
└── lang/
    └── comment-approved-notifier-extended.pot  # Translation template
```

### WordPress Coding Standards

This plugin follows [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/):

- ✅ Proper sanitization and validation
- ✅ Nonce verification
- ✅ Data escaping
- ✅ Internationalization
- ✅ Security best practices
- ✅ PHPDoc documentation

## 🌍 Translation

The plugin is fully translatable:

1. Use the `.pot` file in `/lang/` directory
2. Create translations with [Poedit](https://poedit.net/) or [Loco Translate](https://wordpress.org/plugins/loco-translate/)
3. Save as `comment-approved-notifier-extended-{locale}.po`

**Text Domain:** `comment-approved-notifier-extended`

## 🤝 Contributing

Contributions are welcome! Here's how you can help:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Setup

```bash
# Clone repository
git clone https://github.com/yourusername/comment-approved-notifier-extended.git
cd comment-approved-notifier-extended

# Install WordPress Coding Standards
composer install

# Check code standards
phpcs --standard=WordPress comment-approved-notifier-extended.php

# Fix code standards automatically
phpcbf --standard=WordPress comment-approved-notifier-extended.php
```

## 📝 Changelog

### Version 5.4
- ✨ Enhanced code documentation with PHPDoc blocks
- ✨ Better error handling and logging
- ✨ Consistent escape function usage
- 🔒 Added capability checks in admin page
- 🔒 Improved nonce error messages
- 🎨 Better code formatting and WordPress standards compliance
- ⚡ More efficient array declarations
- 🔒 Fixed XSS vulnerability
- ✨ Added email validation
- ✨ Added error logging
- ✨ Settings link in plugin list
- 🎨 Modern card-based admin UI
- ⚡ Better template handling

### Version 5.3
- 🔒 Fixed XSS vulnerability

[View full changelog](https://wordpress.org/plugins/comment-approved-notifier-extended/#developers)

## ❓ FAQ

<details>
<summary><strong>Does this work with all comment types?</strong></summary>

No, it only sends notifications for actual comments. Trackbacks and pingbacks are excluded to prevent unnecessary emails.
</details>

<details>
<summary><strong>Can I customize the email design?</strong></summary>

Yes! The email body supports HTML. For advanced customization, modify `templates/email-template-1.php`.
</details>

<details>
<summary><strong>Will this work with my SMTP plugin?</strong></summary>

Absolutely! This plugin uses WordPress's native `wp_mail()` function, compatible with all SMTP plugins.
</details>

<details>
<summary><strong>Does this slow down my site?</strong></summary>

No. The plugin is extremely lightweight with zero bloat. It only loads when needed.
</details>

<details>
<summary><strong>Is this GDPR compliant?</strong></summary>

The plugin only uses email addresses already stored in WordPress comments. No additional data is collected.
</details>

## 📄 License

This project is licensed under the GPL v2 or later - see the [LICENSE](LICENSE) file for details.

```
Copyright (C) 2024 UfukArt

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

## 🙏 Credits

- **Original Author:** yakuphan
- **Current Maintainer:** [UfukArt](https://www.zumbo.net)
- **Email Template:** Based on responsive HTML email best practices

## 📞 Support

Need help? Have a feature request?

- 💬 [WordPress.org Support Forum](https://wordpress.org/support/plugin/comment-approved-notifier-extended/)
- 🌐 [Plugin Website](https://www.zumbo.net/comment-approved-notifier-extended-wordpress-plugin/)
- 📧 [Contact Developer](https://www.zumbo.net/contact/)

## ☕ Donate

If you find this plugin useful, consider supporting development:

[![Donate](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://www.paypal.com/donate/?business=53EHQKQ3T87J8&no_recurring=0&currency_code=USD)

---

<p align="center">
Made with ❤️ by <a href="https://www.zumbo.net">UfukArt</a>
</p>

<p align="center">
<strong>⭐ If you find this plugin useful, please give it a star on GitHub! ⭐</strong>
</p>
