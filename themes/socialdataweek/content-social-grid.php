<?php
/**
 * Code snippet for rendering the grid layout on the home page.
 *
 * @package WordPress
 * @subpackage socialdataweek
 * @since socialdataweek 1.0
 */

$counter = 1;

?>

<div id="home-grid" class="block home-grid">

	<img class="non-desktop-logo hidden-desktop" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social-data-week-logo-colour.png" alt="<?php bloginfo('name'); ?>" />

	<div class="row">
		<div class="span one logo visible-desktop">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/social-data-week-logo-colour.png" alt="<?php bloginfo('name'); ?>" />
		</div>
		<?php wp_nav_menu( array( 'navigation' => 'main-menu', 'container_class' => 'span menu-container' ) ); ?>
	</div>	
	<div class="site-description">
		<div>
			<div class="block">
				<p><?php the_field('site_description', 'option'); ?></p>
			</div>
		</div>
	</div>
	
	<?php if (get_field('banner_grid', 'option')): ?>
		 	
		 	<div class="row">
			<?php while (has_sub_field('banner_grid', 'option')): ?>
		 		
		 		

				<?php
					$post = get_sub_field('grid_item');
		 			setup_postdata($post);
		 			$postType = get_post_type($post);
		 		?>
		 		<div class="span one <?php echo $postType; ?>">
			 		<?php if ($postType == "speaker") { ?>
			 			<?php
			 				$locations = implode(", ", get_field('speaking_locations'));
			 				$profilePic = get_field('profile_picture');
			 				if (isset($profilePic)) {
				 				$profilePic = $profilePic['sizes']['thumbnail'];
				 				if (isset($profilePic['alt'])) {
				 					$profilePicAlt = $profilePic['alt'];
				 				}
				 			}
			 			?>
			 			<img src="<?php echo $profilePic; ?>" alt="<?php echo $profilePicAlt; ?>" />
						<div class="info">
							<span class="name"><?php the_title(); ?></span>
							<span class="title"><?php echo get_field('title'); ?></span>
							<span class="city"><?php echo $locations; ?></span>
						</div>
			 		<?php } else if ($postType == "location") { ?>
			 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/background/location.gif" alt="&nbsp;" />
						<div class="info">
							<span class="city"><?php the_title(); ?></span>
							<span class="date"><?php the_field('date'); ?></span>
							<a class="button" href="<?php the_field("registration_url"); ?>">Early Bird Registration</a>
						</div>
			 		<?php } else if ($postType == "data-source") { ?>
			 			<?php
			 				$sourceIcon = get_field('source_icon');
			 				if (isset($sourceIcon)) {
			 					$sourceIcon = $sourceIcon['sizes']['thumbnail'];
			 					if (isset($sourceIcon['alt'])) {
			 						$sourceIconAlt = $sourceIcon['alt'];
			 					}
			 				}
			 			?>

			 			<img src="<?php echo $sourceIcon; ?>" alt="<?php echo $sourceIconAlt; ?>" />
			 		<?php } ?>

				</div>

		 		<?php wp_reset_postdata(); ?>

		 		<?php if ($counter % 7 == 0) { ?>
		 			</div>
		 			<div class="row">
		 		<?php } ?>
			 	<?php $counter = $counter + 1;?>

			<?php endwhile; ?>
	 	</div>

	<?php endif; ?>

</div>
