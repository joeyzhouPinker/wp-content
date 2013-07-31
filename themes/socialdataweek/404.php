<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage socialdataweek
 * @since socialdataweek 1.0
 */

get_header();

?>

<div class="block 404">
	<header class="entry-header">
		<a href="<?php echo site_url(); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/social-data-week-logo-colour.png" alt="Social Data Week Logo" /></a>
		<h1><?php _e('This page doesn\'t exist.', 'socialdataweek'); ?></h1>
		<p><?php _e('The page you\'re looking for has either moved or been removed.' , 'socialdataweek'); ?></p>
		<a class="button" href="<?php echo site_url(); ?>">Visit the homepage</a>
	</header>
</div>

<?php get_footer(); ?>