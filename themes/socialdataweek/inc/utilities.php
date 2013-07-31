<?php

/* Utility function for use across the socialdataweek website */

// Checks to see if it's a localhost environment
function is_localhost() {
	return strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ? true : false;
}

/* Returns an object of Speakers */
function get_speakers() {
	// Returns query of speakers
	return $dataSourcesArgs = new WP_Query(array(
		'post_type'		=> 'speaker',
	));
}


/* Returns compiled HTML list of Data Sources */
function speakers() {

	$query = get_speakers();

	if ($query->have_posts()) :
		echo '<div class="row speakers">';
			while ($query->have_posts()) : $query->the_post();
				$image = get_field('profile_picture');
				$locations = implode(", ", get_field('speaking_locations'));
				echo '<div class="span two speaker">';
					//echo '<a class="img" href="' . get_permalink() . '">';
						echo '<img src="' . $image['sizes']['large'] . '" alt="' . $image['alt'] . '" />';
						echo '<div class="info">';
							echo '<span class="name">' . get_the_title() . '</span>';
							echo '<span class="title">' . get_field('title') . '</span>';
							echo '<span class="location">' . $locations . '</span>';
						echo '</div>';
					//echo '</a>';
				echo '</div>';
			endwhile;
		echo '</div>';
	endif;

	wp_reset_postdata();

}

/* Returns an object of Speakers */
function get_locations() {
	// Returns query of speakers
	return $dataSourcesArgs = new WP_Query(array(
		'post_type'		=> 'location',
	));
}


/* Returns compiled HTML list of Data Sources */
function locations() {

	$query = get_locations();

	if ($query->have_posts()) :
		echo '<div class="row locations">';
			while ($query->have_posts()) : $query->the_post();
				echo '<div class="span six">';
					echo '<div class="location">';			 
						echo '<span class="city"><i>&nbsp;</i>' . get_the_title() . '</span>';
						echo '<span class="date">' . get_field('date') . '</span>';
						echo '<a class="button" href="' . get_field('registration_url') . '">' . get_field('cta_text', 'option') . '</a>';
					echo '</div>';
				echo '</div>';
			endwhile;
		echo '</div>';
	endif;

	wp_reset_postdata();

}

function getHomeGrid() {

	$counter = 1;

	$html = '<div class="block home-grid">';
 		$html .= '<img class="non-desktop-logo hidden-desktop" src="' . get_stylesheet_directory_uri() . '/images/social-data-week-logo-colour.png" alt="' . bloginfo('name') . '" />';

		if (get_field('banner_grid', 'option')) {
 		 	
 		 	$html .= '<div class="row">';
				while (has_sub_field('banner_grid', 'option')) :
			 		
			 		// Logo
			 		if ($counter == 4) {
			 			$html .= '<div class="span one logo visible-desktop">';
			 				$html .= '<img src="' . get_stylesheet_directory_uri() . '/images/social-data-week-logo-colour.png" alt="' . bloginfo('name') . '" />';
			 			$html .= '</div>';
			 			$counter = $counter + 1;
			 		}

					$post = get_sub_field('grid_item');
		 			setup_postdata($post);

		 			$postType = get_post_type($post);

			 		$html .= '<div class="span one ' . $postType . '">';

			 			// Speakers
				 		if ($postType == "speaker") {
			 				//$locations = implode(", ", get_field('speaking_locations'));
			 				$profilePic = get_field('profile_picture');
			 				$profilePic = $profilePic['sizes']['large'];
			 				$profilePicAlt = $profilePic['alt'];
				 			
				 			$html .= '<img src="' . $profilePic . '" alt="' . $profilePicAlt . '" />';
							$html .= '<div class="info">';
								$html .= '<span class="name">' . the_title() . '</span>';
								$html .= '<span class="title">' . get_field('title') . '</span>';
								$html .= '<span class="city"></span>';
							$html .= '</div>';

						// Locations
				 		} else if ($postType == "location") {
				 			$profilePic = get_field('profile_picture');
				 			$profilePicAlt = $profilePic['alt'];
				 			$html .= '<img src="' . get_stylesheet_directory_uri() . '/images/background/location.gif" alt="' . $profilePicAlt . '" />';
							$html .= '<div class="info">';
								$html .= '<span class="city">' . the_title() . '</span>';
								$html .= '<span class="date">' . the_field('date') . '</span>';
								$html .= '<a class="button" href="' . the_field("registration_url") . '">Early Bird Registration</a>';
							$html .= '</div>';

						// Data Sources
				 		} else if ($postType == "data-source") {
				 			$sourceIcon = get_field('source_icon');
				 			$sourceIcon = $sourceIcon['sizes']['large'];
				 			$sourceIconAlt = $sourceIcon['alt'];

				 			$html .= '<img src="' . $sourceIcon . '" alt="' . $sourceIconAlt . '" />';
				 		}

					$html .= '</div>';

			 		wp_reset_postdata();

			 		if ($counter % 7 == 0) {
			 			$html .= '</div>';
			 			$html .= '<div class="row">';
			 		}
				 	$counter = $counter + 1;
					 
				endwhile;
		 	$html .= '</div>';
		}

	$html .= '</div>';

	return $html;

}

function homeGrid() {
	echo getHomeGrid();
}

function getTweets() {
	
	// Enter the credentials of your app here:
	$tweets = new FavoriteTweetsList(array(
	    'twitter_consumer_key'		=> 'Stegw3thi2UJxdvxWGSjig',
	    'twitter_consumer_secret'	=> 'KWUh3gf5PXr3uo5UUNEMjKTU0WfnpiooiEy2GgXYg8',
	    'twitter_access_token'		=> '1320037627-WQv2xEEANVM4aEKy25DgYxm96XRVnhyFt2UuuU2',
	    'twitter_token_secret'		=> 'HbJ1Zr9hCzHHk5hvF2Z2RGuRQqnqTDqMlyeczexJs0'
	));
	
	$tweets->generate(5);
	
}



/* Returns an object of Data Enrichments
function get_enrichments() {
	$dataEnrichmentArgs = array(
		'post_type'		=> 'data-enrichments',
	);
	return get_posts($dataEnrichmentArgs);
}
*/


?>