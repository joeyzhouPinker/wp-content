<?php
/**
 * Code snippet for rendering the grid layout on the speakers page.
 *
 * @package WordPress
 * @subpackage socialdataweek
 * @since socialdataweek 1.0
 */



?>
<?php if (get_field('ny_speakers', '')): ?>
		 	
		 	<div class="row grid">
		 	<?php if (is_page(93)) :
		 	echo '<h3 class="span twelve">New York</h3>';
		 	endif;
		 	?>
			<?php while (has_sub_field('ny_speakers', 'options')): ?>
		 		
		 		

				<?php
					$post = get_sub_field('speaker_item');
		 			setup_postdata($post);
		 			$postType = get_post_type($post);
		 			$location = get_field('speaking_locations')
		 		?>
		 		<div class="span one <?php echo $postType; ?> md-trigger" data-modal="modal-<?php the_ID(); ?>">
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
			 			<div class="md-modal md-effect-8" id="modal-<?php the_ID(); ?>">
				 			<div class="md-content">
					 			<h3><?php the_title(); ?></h3>
					 			<div>
						 			<?php echo get_field('speaker_bio'); ?>
							 		<button class="md-close">Close</button>
							 	</div>
							 </div>
						</div>
			 			
			 		<?php } ?>
			 			

				</div>

		 		<?php wp_reset_postdata(); ?>

		 		

			<?php endwhile; ?>
	 	</div>

	<?php endif; ?>
	<?php if (get_field('sf_speakers', 'options')): ?>
		 	
		 	<div class="row grid">
		 	<?php if (is_page(93)) :
		 	echo '<h3 class="span twelve">San Francisco</h3>';
		 	endif;
		 	?>
			<?php while (has_sub_field('sf_speakers', '')): ?>
		 		
		 		

				<?php
					$post = get_sub_field('speaker_item');
		 			setup_postdata($post);
		 			$postType = get_post_type($post);
		 			$location = get_field('speaking_locations')
		 		?>
		 		<div class="span one <?php echo $postType; ?> md-trigger" data-modal="modal-<?php the_ID(); ?>">
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
			 			<div class="md-modal md-effect-8" id="modal-<?php the_ID(); ?>">
				 			<div class="md-content">
					 			<h3><?php the_title(); ?></h3>
					 			<div>
						 			<?php echo get_field('speaker_bio'); ?>
							 		<button class="md-close">Close</button>
							 	</div>
							 </div>
						</div>
			 			
			 		<?php } ?>
			 			

				</div>

		 		<?php wp_reset_postdata(); ?>

		 		

			<?php endwhile; ?>
	 	</div>

	<?php endif; ?>