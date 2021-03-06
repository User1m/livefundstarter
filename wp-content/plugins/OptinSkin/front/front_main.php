<?php

add_action('init', 'ois_front_setup');

function ois_front_setup() {
	// Load the necessary scripts.
	add_action('wp_enqueue_scripts', 'ois_load_scripts' );
	add_action('wp_enqueue_scripts', 'ois_special_effects' );
	ois_load_styles();
	add_filter('the_content', 'ois_content_skin', 99);
}


function ois_special_effects() {
	$faders = array(); // which ones will fade
	$stickers = array(); // which ones will stick to top
	$all_skins = get_option( 'ois_skins' );
	$all_designs = get_option( 'ois_designs' );
	
	if (!empty($all_skins)) {
		foreach ( $all_skins as $skin_code => $skin ) {
			// Does it use fade?
			if (!empty($skin['special_fade']) && $skin['special_fade'] == 'yes') {
				if (!empty($skin['fade_sec'])) {
					$faders[trim('ois_' . $skin['id'])] = $skin['fade_sec'];
				} else {
					$faders[trim('ois_' . $skin['id'])] = '3';
				}
			}
			if (!empty($skin['special_stick']) && $skin['special_stick'] == 'yes') {
				$stickers['ois_' . $skin['id']] = 'sticker';
			}
			// Does it use social media buttons?
			if (!empty($skin['design'])) {
				if (!empty($all_designs[$skin['design']]['social_media'])) {
					foreach($all_designs[$skin['design']]['social_media'] as $val) {
						if ($val == 'facebook') {
							add_action( 'wp_head', 'ois_fb_script' );
						} else if ($val == 'twitter') {
							add_action( 'wp_head', 'ois_twitter_script' );
						} else if ($val == 'gplus') {
							add_action( 'wp_head', 'ois_gplus_script' );
						} else if ($val == 'stumbleupon') {
							add_action( 'wp_head', 'ois_stumbleupon_script' );
						} else if ($val == 'linkedin') {
							add_action( 'wp_head', 'ois_linkedin_script' );
						}
					}
				}
			}
			// Does it use a Google font?
			$regular_fonts = get_option('ois_regular_fonts');
			if (empty($regular_fonts)) {
				$regular_fonts = array (
					'Arial',
					'Verdana',
					'Serif',
					'Georgia',
					'Helvetica',
				);
			}
			if (!empty($skin['google_fonts'])) {
				foreach($skin['google_fonts'] as $val) {
					if (!in_array($val, $regular_fonts)) {
						$val_explode = explode(' ', $val);
						$fam = implode('+', $val_explode);
						$title = implode('_', $val_explode); 
						wp_register_style('google_font_' . $title, 
							'http://fonts.googleapis.com/css?family=' . $fam);
		            	wp_enqueue_style( 'google_font_' . $title );
	            	}
				}
            }
            
		}
	}
	if (count($faders) > 0) {
		ois_load_fade();
		wp_localize_script( 'ois_fade_load', 'ois_fade', $faders );
	}
	if (count($stickers) > 0) {
		ois_load_sticky();
		wp_localize_script( 'ois_sticky', 'ois_stick', $stickers );
	}
}

function ois_content_skin($content) {
	if (!is_feed()) {
		$all_skins = get_option( 'ois_skins' );
		//$include_fade = false; // the special effects fading option
		
		$optins_for_content = array(
			'floated_second' => array (),
			'post_bottom' => array(),
			'post_top' => array(),
			'below_first' => array(),
		);
		
		if (is_single()) {
			if (!empty($all_skins)) {
				foreach ( $all_skins as $skin_code => $skin ) {
					// Find out if this skin is active.
					if ($skin['status'] == 1 || $skin['status'] == 'publish') {
								
						// we need to do something with this skin.
						if (!empty($skin['position'])) {
							$position = $skin['position'];
						} else {
							//
						}
						$non_post_positions = array('custom');
						if (!in_array($position, $non_post_positions)) {
							if (isset($optins_for_content[$position]) && is_array($optins_for_content[$position])) {
								array_push($optins_for_content[$position], $skin);
							} else {
								$optins_for_content[$position] = array ($skin);
							}
						}			
					}
				}
			}
		}
		//print_r($optins_for_content['post_bottom']);
		$skins_to_go = array();
		if (!empty($optins_for_content)) {
			foreach($optins_for_content as $position=>$skins) {
				if (!empty($skins)) {
					$num_skins = count($skins);
					$split_testers = array();
					
					if ($num_skins > 1) {
						// May have opportunity for split-testing here.
						// We need to choose one of  these skins if split testing
						foreach ($skins as $skin) {
							if ($skin['split_testing'] == 'yes') {
								array_push($split_testers, $skin);
							} else {
								array_push($skins_to_go, $skin);
							}
						}
						// pick one from split_testers and put in skins_to_go
						if (count($split_testers) > 0) {
							$rand_key = array_rand($split_testers, 1);
							array_push($skins_to_go, $split_testers[$rand_key]); // random selection
						}
					} else {
						array_push($skins_to_go, $skins[0]);
					}
				}
			}
			if (!empty($skins_to_go)) {
				foreach ($skins_to_go as $skin) {
					if (!empty($skin)) {
						// find out design
						$position = $skin['position'];
						$design = $skin['design'];
						$all_designs = get_option('ois_designs');
						if ($position == 'post_bottom') {
							$content .= '<div style="clear:both;"></div>';
							if (isset($all_designs[$design])) {
								$this_design = $all_designs[$design];
							} else {
								$this_design = null;
							}
							$content .= ois_make_skin($skin, $this_design);
						} else if ($position == 'post_top') {
							$content .= '<div style="clear:both;"></div>';
							$content = ois_make_skin($skin, $all_designs[$design]) . $content;
						} else if ($position == 'below_first') {
							$paragraphs = explode('</p>', $content); // now we have the content from second para. on.
							$content = '';
							for ($i = 0; $i < count($paragraphs); $i++) {
								$content .= $paragraphs[$i] . '</p>';
								if ($i == 0) {
									$content .= '<div style="margin-bottom:10px;clear:both;">'. ois_make_skin($skin, $all_designs[$design]) . '</div>';
								}
							}
						} else if ($position == 'floated_second') {
							$paragraphs = explode('<p>', $content); // now we have the content from second para. on.
							$content = '';
							$target_par = 1;
							for ($i = 0; $i < count($paragraphs); $i++) {
								if (trim($paragraphs[$i]) != '') {
									$content .= '<p>';
									if ($i == $target_par) {
										$content .= '<div style="float:right">';
										$content .= ois_make_skin($skin, $all_designs[$design]);
										$content .= '</div>';
									}
									$content .= $paragraphs[$i];
								} else {
									$target_par++;
								}	
							}
						}
					}
				}
			}
		}
		return $content;
	} else {
		return $content;
	}
}

function ois_load_scripts() {
	// JQuery.
	wp_enqueue_script('jquery');
	//ois_load_geolocation();
	$script_url = WP_PLUGIN_URL . '/OptinSkin/front/js/optin.js';
	$script_file = WP_PLUGIN_DIR . '/OptinSkin/front/js/optin.js';
	if ( file_exists($script_file) ) {
		wp_register_script( 'ois_optin', $script_url, array('jquery') );
		wp_enqueue_script( 'ois_optin' );
	}
	
	// Localize data
	// Create an array with the basic data for localization.
	$stats_submissions_disable = get_option('stats_submissions_disable');
	$stats_impressions_disable = get_option('stats_impressions_disable');
	if (empty($stats_submissions_disable) || $stats_submissions_disable != 'yes') {
		$stats_submissions_disable = 'no';
	}
	if (empty($stats_impressions_disable) || $stats_impressions_disable != 'yes') {
		$stats_impressions_disable = 'no';
	}
	$ois_data = array( 	
		'ajaxurl' => admin_url( 'admin-ajax.php' ), 
		'ois_submission_nonce' => wp_create_nonce ('ois-submit-nonce'),
		'disable_submissions_stats' => $stats_submissions_disable,
		'disable_impressions_stats' => $stats_impressions_disable,
	);
	// Localize data for this script.
	wp_localize_script( 'ois_optin', 'ois', $ois_data );
}

function ois_load_sticky() {
	// A script to handle the lazy loading functions.
	$script_url = WP_PLUGIN_URL . '/OptinSkin/front/js/sticky.js';
	$script_file = WP_PLUGIN_DIR . '/OptinSkin/front/js/sticky.js';
	if ( file_exists($script_file) ) {
		wp_register_script( 'ois_sticky', $script_url, array('jquery') );
		wp_enqueue_script( 'ois_sticky' );
	}
}

function ois_load_fade() {
	
	// A script to handle the lazy loading functions.
	$script_url = WP_PLUGIN_URL . '/OptinSkin/front/js/fade_load.js';
	$script_file = WP_PLUGIN_DIR . '/OptinSkin/front/js/fade_load.js';
	if ( file_exists($script_file) ) {
		wp_register_script( 'ois_fade_load', $script_url, array('jquery') );
		wp_enqueue_script( 'ois_fade_load' );
	}
}	

// ENQUEUE THE RELEVENT STYLES
function ois_load_styles() {

	$all_skins = get_option( 'ois_skins' );
	if (!empty($all_skins)) {
		// RESET FOR DESIGNS
		$style_file = WP_PLUGIN_DIR . '/OptinSkin/skins/css/ois_reset.css';
		$style_url = WP_PLUGIN_URL . '/OptinSkin/skins/css/ois_reset.css';
		if (file_exists($style_file)) {
			wp_register_style( 'ois_reset', $style_url );
			wp_enqueue_style( 'ois_reset' );
		}
		
		foreach ( $all_skins as $skin_code => $skin ) {
			if ($skin['status'] == 'publish') {
				if (!empty($skin['design'])) {
					$design = $skin['design'];
					$all_designs = get_option('ois_designs');
					if (!empty($all_designs[$design])) {
						$design = $all_designs[$design];
						if ($design['custom'] == 'no'
							&& trim($design['css_url']) != '') {
							$css_url = $design['css_url'];
							$style_id = 'ois_design_' . $design['id'];
							wp_register_style( $style_id , $css_url );
							wp_enqueue_style( $style_id );
						}
					}
				}
			}
		}
	}
}

?>