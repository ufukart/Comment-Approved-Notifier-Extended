<?php
/**
 * Plugin Name: Comment Approved Notifier Extended
 * Plugin URI: https://www.zumbo.net/comment-approved-notifier-extended-wordpress-plugin/
 * Description: Sends email notifications to comment authors when their comments are approved. Zero bloat, single purpose plugin.
 * Author: UfukArt
 * Version: 5.4
 * Domain Path: /lang
 * Text Domain: comment-approved-notifier-extended
 * Author URI: https://www.zumbo.net
 * License: GPLv2 or later
 */

// Security: Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Load plugin translations
 * Loaded on init to ensure proper WordPress environment
 */
function cane_load_textdomain() {
    load_plugin_textdomain(
        'comment-approved-notifier-extended',
        false,
        dirname( plugin_basename( __FILE__ ) ) . '/lang'
    );
}
add_action( 'init', 'cane_load_textdomain' );

/**
 * Plugin activation
 * Sets default email message template
 */
function cane_activation() {
    update_option(
        'cane_default_message_subject',
        __( 'Your comment has been approved!', 'comment-approved-notifier-extended' )
    );
    
    update_option(
        'cane_default_message_body',
        __(
            "Dear [commentauthor],\n\nYour comment has been approved for the following post:\n[commentedposttitle]\n\nYou can view your comment at the link below:\n[commentaddress]\n\nYour comment:\n[commentcontent]\n\nThank you for contributing to our discussion.\n\nBest regards,\n[blogname]\n[blogurl]\n\nIf you did not submit this comment, please disregard this email.",
            'comment-approved-notifier-extended'
        )
    );
}
register_activation_hook( __FILE__, 'cane_activation' );

/**
 * Plugin deactivation
 * Removes options from database
 */
function cane_deactivation() {
    delete_option( 'cane_default_message_subject' );
    delete_option( 'cane_default_message_body' );
}
register_deactivation_hook( __FILE__, 'cane_deactivation' );

/**
 * Add Settings link to plugin list page
 *
 * @param array $links Existing plugin action links
 * @return array Modified plugin action links
 */
function cane_settings_link( $links ) {
    $settings_link = sprintf(
        '<a href="%s">%s</a>',
        esc_url( admin_url( 'options-general.php?page=comment-approved-notifier-extended' ) ),
        esc_html__( 'Settings', 'comment-approved-notifier-extended' )
    );
    array_unshift( $links, $settings_link );
    return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'cane_settings_link' );

/**
 * Admin functionality
 */
if ( is_admin() ) {

    /**
     * Enqueue admin scripts and styles
     * Only loads on plugin settings page
     *
     * @param string $hook Current admin page hook
     */
    function cane_admin_enqueue( $hook ) {
        // Only load on our settings page
        if ( 'settings_page_comment-approved-notifier-extended' !== $hook ) {
            return;
        }
        
        wp_enqueue_style(
            'cane-admin-style',
            plugin_dir_url( __FILE__ ) . 'assets/css/admin.css',
            array(),
            '1.0.1'
        );
        
        wp_enqueue_script(
            'cane-admin-script',
            plugin_dir_url( __FILE__ ) . 'assets/js/admin.js',
            array( 'jquery' ),
            '1.0.1',
            true
        );
    }
    add_action( 'admin_enqueue_scripts', 'cane_admin_enqueue' );

    /**
     * Register settings page
     */
    function cane_admin_menu() {
        add_options_page(
            __( 'Comment Approved Notifier', 'comment-approved-notifier-extended' ),
            __( 'Comment Approved Notifier', 'comment-approved-notifier-extended' ),
            'manage_options',
            'comment-approved-notifier-extended',
            'cane_admin_page'
        );
    }
    add_action( 'admin_menu', 'cane_admin_menu' );

    /**
     * Plugin settings page
     */
    function cane_admin_page() {
        // Check user permissions
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'Sorry, you do not have permission to access this page.', 'comment-approved-notifier-extended' ) );
        }

        // Handle form submission
        if ( isset( $_POST['action'] ) && 'update' === $_POST['action'] ) {
            // Verify nonce
            if ( ! isset( $_POST['comment_approved_notifier_extended_update'] ) ||
                 ! wp_verify_nonce( $_POST['comment_approved_notifier_extended_update'], 'comment_approved_notifier_extended_update' ) ) {
                wp_die( esc_html__( 'Sorry, your session has expired. Please try again.', 'comment-approved-notifier-extended' ) );
            }

            // Sanitize and save options
            $subject = sanitize_text_field( $_POST['cane_default_message_subject'] );
            $body = wp_kses_post( $_POST['cane_default_message_body'] );
            
            update_option( 'cane_default_message_subject', $subject );
            update_option( 'cane_default_message_body', $body );
            
            // Show success message
            add_settings_error(
                'cane_messages',
                'cane_message',
                __( 'Settings saved successfully!', 'comment-approved-notifier-extended' ),
                'success'
            );
        }

        // Get current options
        $subject = get_option( 'cane_default_message_subject', '' );
        $body = get_option( 'cane_default_message_body', '' );
        ?>
        <div class="wrap cane-wrap">
            <h1 style="display:none;"></h1>

            <?php settings_errors( 'cane_messages' ); ?>

            <!-- Header -->
            <div class="cane-header">
                <h2 style="color: #fff; margin: 0 0 10px 0; font-size: 28px; font-weight: 600;">
                    <span class="dashicons dashicons-email-alt" style="font-size: 32px; width: 32px; height: 32px;"></span>
                    <?php esc_html_e( 'Comment Approved Notifier', 'comment-approved-notifier-extended' ); ?>
                </h2>
                <p><?php esc_html_e( 'Configure email notifications for approved comments', 'comment-approved-notifier-extended' ); ?></p>
            </div>

            <div class="cane-container">
                <!-- Main Settings -->
                <div class="cane-main">
                    <div class="cane-card">
                        <div class="cane-card-header">
                            <h2>
                                <span class="dashicons dashicons-admin-settings"></span>
                                <?php esc_html_e( 'Email Template Settings', 'comment-approved-notifier-extended' ); ?>
                            </h2>
                        </div>
                        <div class="cane-card-body">
                            <form method="post" id="cane-settings-form">
                                <div class="cane-form-group">
                                    <label for="cane_default_message_subject">
                                        <span class="dashicons dashicons-format-aside"></span>
                                        <?php esc_html_e( 'Email Subject', 'comment-approved-notifier-extended' ); ?>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="cane_default_message_subject" 
                                        id="cane_default_message_subject" 
                                        value="<?php echo esc_attr( $subject ); ?>"
                                        placeholder="<?php echo esc_attr__( 'e.g., Your comment on [commentedposttitle] has been approved!', 'comment-approved-notifier-extended' ); ?>"
                                    />
                                    <small><?php esc_html_e( 'This will be the subject line of the notification email', 'comment-approved-notifier-extended' ); ?></small>
                                </div>

                                <div class="cane-form-group">
                                    <label for="cane_default_message_body">
                                        <span class="dashicons dashicons-email"></span>
                                        <?php esc_html_e( 'Email Body', 'comment-approved-notifier-extended' ); ?>
                                    </label>
                                    <textarea 
                                        name="cane_default_message_body" 
                                        id="cane_default_message_body"
                                        placeholder="<?php echo esc_attr__( 'Write your email message here...', 'comment-approved-notifier-extended' ); ?>"
                                    ><?php echo esc_textarea( $body ); ?></textarea>
                                    <small><?php esc_html_e( 'HTML tags are allowed. Use the shortcodes from the sidebar to personalize your message.', 'comment-approved-notifier-extended' ); ?></small>
                                </div>

                                <div class="cane-button-group">
                                    <button type="submit" class="button button-primary button-large">
                                        <span class="dashicons dashicons-yes"></span>
                                        <?php esc_html_e( 'Save Changes', 'comment-approved-notifier-extended' ); ?>
                                    </button>
                                    <button type="button" class="button button-large" onclick="document.getElementById('cane-settings-form').reset();">
                                        <span class="dashicons dashicons-undo"></span>
                                        <?php esc_html_e( 'Reset', 'comment-approved-notifier-extended' ); ?>
                                    </button>
                                </div>

                                <input type="hidden" name="action" value="update">
                                <?php wp_nonce_field( 'comment_approved_notifier_extended_update', 'comment_approved_notifier_extended_update' ); ?>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="cane-sidebar">
                    <!-- Shortcodes Card -->
                    <div class="cane-card">
                        <div class="cane-card-header">
                            <h2>
                                <span class="dashicons dashicons-shortcode"></span>
                                <?php esc_html_e( 'Available Shortcodes', 'comment-approved-notifier-extended' ); ?>
                            </h2>
                        </div>
                        <div class="cane-card-body">
                            <div class="cane-info-box">
                                <p><?php esc_html_e( 'Click on a shortcode to copy it to clipboard', 'comment-approved-notifier-extended' ); ?></p>
                            </div>
                            
                            <ul class="cane-shortcode-list">
                                <li class="cane-shortcode-item">
                                    <span class="cane-shortcode-label"><?php esc_html_e( 'Comment Author', 'comment-approved-notifier-extended' ); ?></span>
                                    <code class="cane-shortcode-code" onclick="copyShortcode(this)" data-code="[commentauthor]">[commentauthor]</code>
                                </li>
                                <li class="cane-shortcode-item">
                                    <span class="cane-shortcode-label"><?php esc_html_e( 'Post Title', 'comment-approved-notifier-extended' ); ?></span>
                                    <code class="cane-shortcode-code" onclick="copyShortcode(this)" data-code="[commentedposttitle]">[commentedposttitle]</code>
                                </li>
                                <li class="cane-shortcode-item">
                                    <span class="cane-shortcode-label"><?php esc_html_e( 'Comment Link', 'comment-approved-notifier-extended' ); ?></span>
                                    <code class="cane-shortcode-code" onclick="copyShortcode(this)" data-code="[commentaddress]">[commentaddress]</code>
                                </li>
                                <li class="cane-shortcode-item">
                                    <span class="cane-shortcode-label"><?php esc_html_e( 'Comment Content', 'comment-approved-notifier-extended' ); ?></span>
                                    <code class="cane-shortcode-code" onclick="copyShortcode(this)" data-code="[commentcontent]">[commentcontent]</code>
                                </li>
                                <li class="cane-shortcode-item">
                                    <span class="cane-shortcode-label"><?php esc_html_e( 'Blog Name', 'comment-approved-notifier-extended' ); ?></span>
                                    <code class="cane-shortcode-code" onclick="copyShortcode(this)" data-code="[blogname]">[blogname]</code>
                                </li>
                                <li class="cane-shortcode-item">
                                    <span class="cane-shortcode-label"><?php esc_html_e( 'Blog URL', 'comment-approved-notifier-extended' ); ?></span>
                                    <code class="cane-shortcode-code" onclick="copyShortcode(this)" data-code="[blogurl]">[blogurl]</code>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Help Card -->
                    <div class="cane-card" style="margin-top: 20px;">
                        <div class="cane-card-header">
                            <h2>
                                <span class="dashicons dashicons-sos"></span>
                                <?php esc_html_e( 'Need Help?', 'comment-approved-notifier-extended' ); ?>
                            </h2>
                        </div>
                        <div class="cane-card-body">
                            <p style="margin: 0 0 15px 0; font-size: 13px; line-height: 1.6;">
                                <?php esc_html_e( 'This plugin automatically sends email notifications to comment authors when their comments are approved.', 'comment-approved-notifier-extended' ); ?>
                            </p>
                            <p style="margin: 0; font-size: 13px; line-height: 1.6;">
                                <?php esc_html_e( 'Use the shortcodes above to personalize your email messages. They will be automatically replaced with actual content when the email is sent.', 'comment-approved-notifier-extended' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Send email notification when comment is approved
 * 
 * @param WP_Comment|object $comment Comment object
 */
function cane_send_email( $comment ) {
    // Only process actual comments (not trackbacks, pingbacks)
    if ( 'comment' !== $comment->comment_type ) {
        return;
    }

    // Check if email exists and is valid
    if ( empty( $comment->comment_author_email ) || ! is_email( $comment->comment_author_email ) ) {
        error_log( 'Comment Approved Notifier: Invalid or missing email address' );
        return;
    }

    // Get blog information
    $to = $comment->comment_author_email;
    $site_name = get_bloginfo( 'name' );
    $blog_description = get_bloginfo( 'description' );
    $blog_url = get_bloginfo( 'url' );
    $from_email = get_bloginfo( 'admin_email' );
    $charset = get_option( 'blog_charset' );

    // Get email template
    $mailbody = get_option( 'cane_default_message_body', '' );
    $subject = get_option( 'cane_default_message_subject', '' );

    // Convert line breaks to paragraphs
    $cane_default_message_body = wpautop( $mailbody );

    // Prepare shortcodes and replacements
    $shortcodes = array(
        '[commentauthor]',
        '[commentedposttitle]',
        '[commentaddress]',
        '[commentcontent]',
        '[blogurl]',
        '[blogname]'
    );

    $replaced = array(
        esc_html( $comment->comment_author ),
        esc_html( get_the_title( $comment->comment_post_ID ) ),
        esc_url( get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID ),
        wp_kses_post( $comment->comment_content ),
        esc_url( $blog_url ),
        esc_html( $site_name )
    );

    // Replace shortcodes in subject and body
    $cane_default_message_subject = str_ireplace( $shortcodes, $replaced, $subject );
    $cane_default_message_body = str_ireplace( $shortcodes, $replaced, $cane_default_message_body );

    // Prepare email headers
    $headers = array(
        sprintf( 'From: "%s" <%s>', $site_name, $from_email ),
        'MIME-Version: 1.0',
        sprintf( 'Content-Type: text/html; charset=%s', $charset ),
        sprintf( 'List-Unsubscribe: <mailto:%s?subject=unsubscribe>', $from_email )
    );

    // Load email template
    ob_start();
    $template = plugin_dir_path( __FILE__ ) . 'templates/email-template-1.php';
    
    if ( file_exists( $template ) ) {
        include $template;
    } else {
        // Fallback if template is missing
        error_log( 'Comment Approved Notifier: Template file not found - ' . $template );
        echo $cane_default_message_body;
    }
    
    $content = ob_get_clean();

    // Send email
    $mail_sent = wp_mail( $to, $cane_default_message_subject, $content, $headers );

    // Log if email fails
    if ( ! $mail_sent ) {
        error_log( 'Comment Approved Notifier: Failed to send email to ' . $to );
    }
}
add_action( 'comment_unapproved_to_approved', 'cane_send_email' );
