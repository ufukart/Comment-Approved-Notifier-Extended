<?php
/*
Plugin Name: Comment Approved Notifier Extended
Plugin URI: http://www.ubilisim.com/comment-approved-notifier-extended-wordpress-plugin/
Description: Send notification to user when comment approved. Comment Approved Notifier Extended is based on original wordpress plugin "Comment Approved Notifier" wich is writen by yakuphan (https://wordpress.org/plugins/comment-approved-notifier/)
Author: UfukArt
Version: 3.0
Author URI: http://www.ubilisim.com/
*/
function ub__send_email($comment) {
	if (($comment->comment_type == '') && ($comment->comment_author_email != '')) {
		$to = $comment->comment_author_email;
		$site_name = get_bloginfo('name');
		$site_email = get_bloginfo('admin_email');
		$subject = 'Yorumunuz ' . $site_name . 'de yayınlandı.';
		$charset = get_settings('blog_charset');
		$servername = strtolower( $_SERVER['SERVER_NAME'] );
	if ( substr( $servername, 0, 4 ) == 'www.' ) {
		$servername = substr( $servername, 4 );
		}
		$from_email = $site_email;
		$message = "Merhaba ".$comment->comment_author.",\n\n";
		$message .= "\"".get_the_title($comment->comment_post_ID)."\" başlıklı yazı için yaptığınız\n";
		$message .= get_permalink($comment->comment_post_ID). "#comment-" . $comment->comment_ID." adresindeki aşağıdaki yorumunuz yayınlandı:\n\n";
		$message .= "---------------------------------------------------------\n";  
		$message .= "Yorumunuz: \n";
		$message .= $comment->comment_content."\n";
		$message .= "---------------------------------------------------------\n\n";
		$message .= "Yorumunuz İçin Teşekkür Ederiz!!!\n\n";
		$message .= $site_name."\n\n";
		$message .= "(Bu yorumu siz yazmadıysanız, bu e-posta için özür dileriz)";
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