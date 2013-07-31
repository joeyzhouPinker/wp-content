<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to socialdataweek_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage socialdataweek
 * @since socialdataweek 1.0
 */
?>

<div class="row comments">
	<div class="span2">&nbsp;</div>
	<div class="span9">
		<h2>Comments</h2>
		<?php if (!have_comments()) { // No comments or comments disabled ?>
			<p class="nocomments"><?php _e('There are currently no comments. Be the first to post a comment below.', 'socialdataweek'); ?></p>
		<?php } elseif (have_comments()) { ?>
			<?php if (post_password_required()) { ?>
				<p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'socialdataweek'); // Comments are password protected ?></p>
			<?php } else { ?>

				<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
					<nav id="comment-nav-above">
						<h1 class="assistive-text"><?php _e( 'Comment navigation', 'socialdataweek' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'socialdataweek' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'socialdataweek' ) ); ?></div>
					</nav>
				<?php endif; // check for comment navigation ?>

				<ol class="commentlist">
					<?php
						/* Loop through and list the comments. Tell wp_list_comments()
						 * to use socialdataweek_comment() to format the comments.
						 * If you want to overload this in a child theme then you can
						 * define socialdataweek_comment() and that will be used instead.
						 * See socialdataweek_comment() in socialdataweek/functions.php for more.
						 */
						wp_list_comments(array('callback' => 'socialdataweek_comment'));
					?>
				</ol>

				<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { // Are there comments to navigate through ?>
					<nav id="comment-nav-below">
						<h1 class="assistive-text"><?php _e( 'Comment navigation', 'socialdataweek' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'socialdataweek' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'socialdataweek' ) ); ?></div>
					</nav>
				<?php } ?>
			<?php } ?>
		<?php } ?>
		<hr />
	</div>
	<div class="span1">&nbsp;</div>
</div>
