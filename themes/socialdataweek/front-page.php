<?php
/**
 * The Front Page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage socialdataweek
 */

get_header();

if ($_GET["v"] !== "") {
	$class = ' class="' . $_GET["v"] . '"';
}

?>


<section id="body-content"<?php echo $class; ?>>

	<!-- Home Grid -->
	<?php get_template_part('content', 'social-grid'); ?>

	<!-- Home Content -->
	<div class="row home-content">
		<div class="block">
			<div class="span six">
				<h2 class="content-title"><?php bloginfo('description'); ?></h2>
				<?php the_field('home_content', 'option'); ?>
			</div>
			<div class="span six">
				<div class="loc-date">
					<h3>San Francisco - Monday, September 16, 2013</h3>
					<div class="cta cf">
						<a href="">Learn More</a> <a href="">Register Now</a>
					</div>
				</div>
				<div class="loc-date">
					<h3>New York - Friday, September 20, 2013</h3>
					<div class="cta cf">
						<a href="">Learn More</a> <a href="">Register Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Sponsors & Partners -->
	<div class="row sponsors">
		<div class="block">
			<div class="span six">
				<h4 class="sponsor-title">Sponsors</h4>
				<?php echo build_lshowcase('none','sponsors','inactive','normal','hcarousel','false','0','','0'); ?>
			</div>
			<div class="span six">
				<h4 class="sponsor-title">Media Partners</h4>
				<?php echo build_lshowcase('none','media-partners','inactive','normal','hcarousel','false','0','','0'); ?>
			</div>
		</div>
	</div>


	<!-- Page Actions -->
	<div class="actions">
		<div class="block">
			<div class="row">
				<div class="span four">
					<h3>Host a Local Event</h3>
					<a href="mailto:<?php the_field('info_email', 'option'); ?>">
						<i class="local-event">&nbsp;</i>
						<span>Register your interest in hosting a Social Data Week event &rsaquo;</span>
					</a>
				</div>
				<div class="span four">
					<h3>Become a Sponsor</h3>
					<a href="mailto:<?php the_field('sponsorship_email', 'option'); ?>">
						<i class="sdw-logo">&nbsp;</i>
						<span>Request Social Data Week sponsorship information &rsaquo;</span>
					</a>
				</div>
				<div class="span four">
					<h3>Ask a Question</h3>
					<a href="mailto:<?php the_field('info_email', 'option'); ?>">
						<i class="question">&nbsp;</i>
						<span>Email us your questions &rsaquo;</span>
					</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Connect with us -->
	<div class="connect">
		<div class="block">
			<span class="heading">Follow Social Data Week <a href="<?php the_field('twitter_url', 'option'); ?>"><?php the_field('twitter_handle', 'option'); ?></a></span>
			
			<?php getTweets(); ?>

			<a class="button follow" href="<?php the_field('twitter_url', 'option'); ?>"><i class="twitter">&nbsp;</i><span>Follow <?php the_field('twitter_handle', 'option'); ?></span></a>
		</div>
	</div>

</section>

<?php get_footer(); ?>