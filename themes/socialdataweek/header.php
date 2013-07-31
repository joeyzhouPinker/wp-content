<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and the sites header and navigation menu
 *
 * @package WordPress
 * @subpackage socialdataweek
 * @since socialdataweek 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
	<html class="ie ie6 ltie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
	<html class="ie ie7 ltie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
	<html class="ie ie8 ltie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
	<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
	<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<?php get_template_part('content', 'google-experiments'); ?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="author" content="DataSift">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<!-- TypeKit -->
<script type="text/javascript" src="//use.typekit.net/mfr0rtv.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/images/favicon.ico">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); // Do not delete ?>

<?php get_template_part('content', 'head-scripts'); ?>

</head>

<body <?php body_class(); ?>>

<?php get_template_part('content', 'body-scripts'); ?>

<div class="skip-link">
	<a class="assistive-text" href="#content" title="<?php esc_attr_e('Skip to primary content', 'socialdataweek'); ?>">
		<?php _e('Skip to primary content', 'socialdataweek'); ?>
	</a>
</div>

<header>

	<div class="social-toolbar">
		<a class="twitter" href="<?php the_field('twitter_url', 'option'); ?>" target="_blank">Follow Social Data Week on Twitter</a>
		<hr />
		<a class="facebook" href="<?php the_field('facebook_url', 'option'); ?>" target="_blank">Join Social Data Week on Facebook</a>
	</div>

	<?php /*
	<nav class="nav" role="navigation">
		<div class="skip-link"><a class="assistive-text" href="#body-content" title="<?php esc_attr_e('Skip to main content', 'socialdataweek'); ?>"><?php _e('Skip to main content', 'socialdataweek'); ?></a></div>
		
		<?php wp_nav_menu(array(
			'theme_location'	=> 'navigation',
			'items_wrap'      	=> '<ul>%3$s</ul>',
			'container'			=> false
		)); ?>
	</nav>

	<a class="sign-up button" href="/">Sign Up</a>
	*/ ?>
</header>
