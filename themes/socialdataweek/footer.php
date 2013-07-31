<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage socialdataweek
 * @since socialdataweek 1.0
 */

?>

<footer>
	<section class="block">
		<!-- Footer Navigation 
		<nav class="navigation" role="secondary navigation">
			<?php /* Our footer navigation menu. */ ?>
			<?php wp_nav_menu(array(
				'theme_location'	=> 'navigation-footer',
				'items_wrap'      	=> '<ul>%3$s</ul>',
				'container'			=> false
			)); ?>
		</nav>
		-->

		<div class="founded">
			<a class="founder" href="http://datasift.com">
				<img src="<?php echo get_bloginfo('template_url'); ?>/images/datasift-logo.png" alt="Social Data Seek - Sponsored by DataSift" width="94" />
			</a>
			<span>Social Data Week - Founded by <a href="http://datasift.com">DataSift</a></span>
		</div>

		<div class="logo">
			<img src="<?php echo get_bloginfo('template_url'); ?>/images/social-data-week-logo-grey.png" alt="Social Data Seek - Sponsored by DataSift" width="127" />
		</div>
		
		<div class="social-icons">
			<a class="twitter" href="<?php the_field('twitter_url', 'option'); ?>" target="_blank">Follow Social Data Week on Twitter</a>
			<a class="facebook" href="<?php the_field('facebook_url', 'option'); ?>" target="_blank">Join Social Data Week on Facebook</a>
		</div>
	</section>
</footer>
<div class="md-overlay"> </div><!-- the overlay element -->
<?php wp_footer(); ?>

</body>
</html>