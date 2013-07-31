<?php
/**
 * The template for determining what layout to use for hierarchical pages, defaulting to a standard post layout.
 *
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage socialdataweek
 * @since socialdataweek 1.0
 */
 
 /* Template Name: Speakers Page */

get_header();

?>

<?php // ID required for screen readers link ?>
<section id="body-content" class="block">
	<img class="non-desktop-logo hidden-desktop" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social-data-week-logo-colour.png" alt="<?php bloginfo('name'); ?>" />

	<div class="row">
		<div class="span one logo visible-desktop">
			<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/social-data-week-logo-colour.png" alt="<?php bloginfo('name'); ?>" /></a>
		</div>
		<?php wp_nav_menu( array( 'navigation' => 'main-menu', 'container_class' => 'span menu-container' ) ); ?>
	</div>
	
	

	<?php while (have_posts()) : the_post(); ?>

		<?php if ($featureImageObj) { ?>
			<img class="feature-image" src="<?php echo $featureImageObj['sizes']['rectangle-xl']; ?>" alt="<?php echo $featureImageObj['alt']; ?>" />
		<?php } ?>
		
		<article class="block">

			<!-- Edit Post Link -->
			<?php edit_post_link( __('Edit', 'socialdataweek')); ?>

			

			
			<!-- The Content -->
			<?php the_content(); ?>


			<?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __( 'Pages:', 'socialdataweek' ) . '</span>', 'after' => '</div>')); ?>

			<?php if (get_the_author_meta('description') && is_multi_author()) { // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
				<div id="author-info">
					<div id="author-avatar">
						<?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('socialdataweek_author_bio_avatar_size', 68)); ?>
					</div>
					<div id="author-description">
						<h2><?php printf( esc_attr__( 'About %s', 'socialdataweek' ), get_the_author() ); ?></h2>
						<?php the_author_meta( 'description' ); ?>
						<div id="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'socialdataweek' ), get_the_author() ); ?>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
			
		</article>

	<?php endwhile; ?>
	<?php get_template_part('content', 'speakers-grid'); ?>
	</section>
	<!-- Home Content -->
	<div class="row home-content">
		<div class="block">
			<div class="span twelve">
				<h2 class="content-title"><?php bloginfo('description'); ?></h2>
				
			</div>
			<div class="">
				<div class="loc-date span six">
					<h3>San Francisco - Monday, September 16, 2013</h3>
					<div class="cta cf">
						<a href="">Learn More</a> <a href="">Register Now</a>
					</div>
				</div>
				<div class="loc-date span six">
					<h3>New York - Friday, September 20, 2013</h3>
					<div class="cta cf">
						<a href="">Learn More</a> <a href="">Register Now</a>
					</div>
				</div>
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
	



		
		
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '<?php echo get_stylesheet_directory_uri(); ?>/js/';
			
			
			
		</script>
		
<?php get_footer(); ?>