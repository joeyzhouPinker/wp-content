<?php

/**
 * Remove standard image sizes so that these sizes are not
 * created during the Media Upload process
 *
 * Tested with WP 3.2.1
 *
 * Hooked to intermediate_image_sizes_advanced filter
 * See wp_generate_attachment_metadata( $attachment_id, $file ) in wp-admin/includes/image.php
 *
 * @param $sizes, array of default and added image sizes
 * @return $sizes, modified array of image sizes
 * @author Ade Walker http://www.studiograsshopper.ch
 */


				/*
'not_found' - the not found text. Default is No posts found/No pages found
'not_found_in_trash' - the not found in trash text. Default is No posts found in Trash/No pages found in Trash
'parent_item_colon' - the parent text. This string isn't used on non-hierarchical types. In hierarchical ones the default is Parent Page


*/

function create_post_type() {
	register_post_type('speaker',
		array(
			'labels' => array(
				'name' => __('Speakers'),
				'singular_name' => __('Speaker'),
				'add_new_item' => __('Speaker'),
				'edit_item' => __('Speaker'),
				'new_item' => __('Speaker'),
				'view_item' => __('Speaker'),
				'search_items' => __('Speaker')
			),
		'public' => true,
		'has_archive' => true,
		//'taxonomies' => array('category'),
		'menu_position' => 4,
		)
	);
	register_post_type('location',
		array(
			'labels' => array(
				'name' => __('Locations'),
				'singular_name' => __('Location'),
				'add_new_item' => __('Location'),
				'edit_item' => __('Location'),
				'new_item' => __('Location'),
				'view_item' => __('Location'),
				'search_items' => __('Location')
			),
		'public' => true,
		'has_archive' => true,
		//'taxonomies' => array('category'),
		'menu_position' => 4,
		)
	);
	register_post_type('data-source',
		array(
			'labels' => array(
				'name' => __('Data Sources'),
				'singular_name' => __('Data Source'),
				'add_new_item' => __('Data Source'),
				'edit_item' => __('Data Source'),
				'new_item' => __('Data Source'),
				'view_item' => __('Data Source'),
				'search_items' => __('Data Source')
			),
		'public' => true,
		'has_archive' => true,
		//'taxonomies' => array('category'),
		'menu_position' => 4,
		)
	);
}
add_action('init', 'create_post_type');

/*
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Blog';
	$submenu['edit.php'][5][0] = 'Blog';
	$submenu['edit.php'][10][0] = 'Add Blog Post';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Blog';
	$labels->singular_name = 'Blog Post';
	$labels->add_new = 'Add Blog Post';
	$labels->add_new_item = 'Add Blog Post';
	$labels->edit_item = 'Edit Blog Post';
	$labels->new_item = 'Blog Post';
	$labels->view_item = 'View Blog Post';
	$labels->search_items = 'Search Blog';
	$labels->not_found = 'No Blog Posts found';
	$labels->not_found_in_trash = 'No Blog Posts found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
*/

/**
 * Display navigation to next/previous pages when applicable
 */
function socialdataweek_content_nav($nav_id) {
	global $wp_query;

	if ($wp_query->max_num_pages > 1) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'socialdataweek' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'socialdataweek' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'socialdataweek' ) ); ?></div>
		</nav>
	<?php endif;
}


/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own socialdataweek_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since socialdataweek 1.0
 */
if (!function_exists('socialdataweek_comment')) :
	function socialdataweek_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type) :
			case 'pingback' :
			case 'trackback' :
		?>
		<!-- Do nothing for pingbacks & trackbacks
		<li class="post pingback">
			<p>
				<?php _e('Pingback:', 'socialdataweek'); ?>
				<?php comment_author_link(); ?>
				<?php edit_comment_link( __('| Edit', 'socialdataweek'), '<span class="edit-link">', '</span>'); ?>
			</p>
		</li>
		-->
		<?php
				break;
			default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			
			<div class="comment-author vcard">
				<?php
					$avatar_size = 68;
					echo get_avatar($comment, $avatar_size);
				?>
				<div class="author-meta">
					<?php
						/* translators: 1: comment author, 2: date and time */
						printf(__('<span class="author">%1$s</span> <span class="posted">Posted %2$s</span>', get_comment_author_link()),
							sprintf(get_comment_author_url() != '' ? '<a href="%1$s" target="_new">%2$s</a>' : '%2$s', get_comment_author_url(), get_comment_author()),
							sprintf('<a class="date" href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url(get_comment_link($comment->comment_ID)),
								get_comment_time('c'),
								sprintf(__('%1$s<br />at %2$s', 'socialdataweek'), get_comment_date(), get_comment_time())
							)
						);
					?>
				</div>

			</div>

			<div class="comment-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'socialdataweek' ); ?></em>
				<?php endif; ?>
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'socialdataweek' ), '<span class="edit-link">', '</span>' ); ?>
				<?php comment_reply_link(array_merge($args,array(
					'reply_text' => __( 'Reply', 'socialdataweek' ),
					'depth' => $depth,
					'max_depth' => $args['max_depth']
				))); ?>
			</div>
			<div class="clear"></div>
		</li>
	<?php
		break;
	endswitch;
}
endif; // ends check for socialdataweek_comment()


/**
 * Returns a select box with a list of posts and pages
 *
 * @param object $post
 * @return string
 */
function get_posts_pages_select($post, $field) {

	$html = "<select name='attachments[{$post->ID}][$field]' id='attachments[{$post->ID}][$field]'>";
	$html .= '<option value="">Please select</option>';
	$posts = get_posts('posts_per_page=-1');
	$pages = get_pages();
	$_field = '_' . $field;
	$currentMetaValue = get_post_meta(get_the_ID(), $_field, true);

	// Add all posts into dropdown list
	$html .= '<optgroup label="Posts">';
	foreach($posts as $post) :
		setup_postdata($post);
		$selected = $currentMetaValue == get_permalink($post->ID) ? ' selected="selected"' : '';
		$html .= '<option' . $selected . ' value="' . get_permalink($post->ID) . '">' . $post->post_title . '</option>';
	endforeach;
	$html .= '</optgroup>';

	// Add all pages into dropdown list
	$html .= '<optgroup label="Pages">';

	foreach($pages as $page) {
		$isCurrent = $currentMetaValue == get_permalink($post->ID) ? ' selected="selected"' : '';
		$html .= '<option' . $isCurrent . ' value="' . get_page_link($page->ID) . '">' . $page->post_title . '</option>';
	}
	$html .= '</optgroup>';
	$html .= '</select>';

	return $html;
}


/**
 * Template for displaying a Posted On date
 *
 * @since socialdataweek 1.0
 */

if (!function_exists('socialdataweek_posted_on')) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 * Create your own socialdataweek_posted_on to override in a child theme
	 *
	 * @since socialdataweek 1.0
	 */
	function socialdataweek_posted_on() {
		printf( __('<a class="date" href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s" pubdate><span class="day"><em>%4$s</em>%5$s</span><span class="month">%6$s</span><span class="year">%7$s</span></time></a>'),
			esc_url(get_permalink()),
			esc_attr(get_the_time()),
			esc_attr(get_the_date('c')),
			esc_html(get_the_date('j')),
			esc_html(get_the_date('S')),
			esc_html(get_the_date('F')),
			esc_html(get_the_date('Y')),
			esc_url(get_author_posts_url( get_the_author_meta('ID'))),
			sprintf(esc_attr__('View all posts by %s', 'socialdataweek'), get_the_author()),
			esc_html(get_the_author())
		);
	}
};

?>