<?php
/*
Plugin Name: Comment Approved Notifier Extended
Plugin URI: http://www.ubilisim.com/comment-approved-notifier-extended-wordpress-plugin/
Description: Send notification to user when comment approved. Comment Approved Notifier Extended is based on original wordpress plugin "Comment Approved Notifier" wich is writen by yakuphan (https://wordpress.org/plugins/comment-approved-notifier/)
Author: UfukArt
Version: 4
Author URI: http://www.ubilisim.com/
*/
function ub__send_email($comment) {
	// Load plugin translations
	load_plugin_textdomain('comment-approved-notifier-extended', false, dirname(plugin_basename(__FILE__)) . '/lang');
if (($comment->comment_type == '') && ($comment->comment_author_email != '')) {
	$to = $comment->comment_author_email;
	$site_name = get_bloginfo('name');
	$site_url = get_bloginfo('url');
	$site_email = get_bloginfo('admin_email');
	$subject = __('Your Comment is Approved!', 'comment-approved-notifier-extended');
	$charset = get_settings('blog_charset');
	$servername = strtolower( $_SERVER['SERVER_NAME'] );
if ( substr( $servername, 0, 4 ) == 'www.' ) {
	$servername = substr( $servername, 4 );
	}
	$from_email = $site_email;
	$message = "<p>";
	$message .= __('Dear ', 'comment-approved-notifier-extended');
	$message .= $comment->comment_author.",<br>";
	$message .= __('Your comment is approved to this post', 'comment-approved-notifier-extended');
	$message .= ";\"";
	$message .= get_the_title($comment->comment_post_ID);
	$message .= "\"";
	$message .= "<br>";
	$message .= __('You can see your comment from following address', 'comment-approved-notifier-extended');
	$message .= ";<br>";
	$message .= get_permalink($comment->comment_post_ID). "#comment-";
	$message .= $comment->comment_ID."<br><br>";
	$message .= __('Your Comment', 'comment-approved-notifier-extended');
	$message .= ";<br><blockquote>";
	$message .= $comment->comment_content."</blockquote><br>";
	$message .= __('Thank you for your comment.', 'comment-approved-notifier-extended');
	$message .= "<br>";
	$message .= $site_name."<br>";
	$message .= $site_url."<br>";
	$message .= __('(If you didn\'t send this comment, we apologize for this e-mail)', 'comment-approved-notifier-extended');
	$message .= "</p>";
	$headers = "From: $site_name <$from_email>\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=\"{$charset}\"\n";
	@wp_mail( $to, $subject, $message, $headers);
	}
return false;
}
//comment_unapproved_to_approved action is defined in function  wp_transition_comment_status
add_action('comment_unapproved_to_approved', 'ub__send_email');
?>