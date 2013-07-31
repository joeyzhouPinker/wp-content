<?php
/**
 * The Template for displaying all single POSTS.
 *
 * @package WordPress
 * @subpackage socialdataweek
 * @since socialdataweek 1.0
 */

get_header();

?>

<!-- Content -->
<?php get_template_part('content'); ?>

<!-- Comments -->
<?php comments_template('', true); ?>

<!-- Comments Form -->
<?php get_template_part('content', 'comments-form'); ?>

<?php get_footer(); ?>