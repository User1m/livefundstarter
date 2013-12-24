<?php
function ois_add_new() {
	ois_add_new_load_scripts();

	if (isset($_GET['id'])) {
		// We are editing a draft skin.
		$skin_id = $_GET['id'];
		$skins = get_option('ois_skins');
		if (!empty($skins)) {
			foreach ($skins as $some_skin) {
				if ($skin_id == $some_skin['id']) {
					$this_skin = $some_skin;
					break;
				}
			}
		}
	} else {
		$this_skin = null;
	}
	$skin_designs = get_option('ois_designs');
	if (!$skin_designs) {
		ois_update_designs_code();
		$skin_designs = get_option('ois_designs');
	}
	$skin_designs = get_option('ois_designs');
	$created_skins = get_option('ois_skins');

	if (isset($_POST['newskin_design_section'])) {
		ois_handle_new_skin($_POST);
	}

	if (isset($_GET['update'])) {
		if ($_GET['update'] == 'trash') {
			ois_notification('Successfully Moved Your Skin to Trash! ', 'margin: 5px 0 0 0 ;', 'trash');
		} else if ($_GET['update'] == 'draft') {
				ois_notification('Successfully Moved Your Skin to Drafts!', 'margin-left: 15px;', 'drafts');
			}
	}

	if ($this_skin) {
		ois_section_title('Edit Skin', 'You are Currently Editing <em>' . $this_skin['title'], '</em>');
		$uri = explode('?', $_SERVER['REQUEST_URI']);
		$performance_url = $uri[0] . '?page=ois-' . $this_skin['id'];

		if ($this_skin['status'] == 'publish') {
?>
		<div>
			<h2 class="nav-tab-wrapper">
				<a href="<?php echo $performance_url; ?>" class="nav-tab">Skin Performance</a>
				<a href="<?php echo $_SERVER['REQUEST_URI']; ?>" class="nav-tab-active nav-tab">Edit Skin</a>
			</h2>
		</div>
		<?php
		} else {
?>
		<div>
			<h2 class="nav-tab-wrapper">
				<a href="<?php echo $_SERVER['REQUEST_URI']; ?>" class="nav-tab-active nav-tab">Edit Draft Skin</a>
			</h2>
		</div>
		<?php
		}
	} else if (!$created_skins || empty($created_skins)) {
			ois_section_title('Create a New Skin', 'Here you can design an OptinSkin&trade; to place anywhere in your Wordpress website.', '');
		} else {
		// user has created before, great!
		ois_section_title('Create a New Skin', 'Here you can design an OptinSkin&trade; to place anywhere in your Wordpress website.', '');
	}
	$optin_accounts = array (
		'feedburner-id' => get_option('ois_feedburner_id'),
		'mailchimp-form' => get_option('ois_mailchimp_form'),
		'aweber-id' => get_option('ois_aweber_id'),
		'icontact' => get_option('ois_icontact_id'),
		'other' => get_option('ois_other_html'),
		'getResponse-id' => get_option('ois_getResponse_id'),
		'getResponse-html' => get_option('ois_getResponse_html'),
		'infusionSoft-html' => get_option('ois_infusionSoft_html'),
	);


	ois_start_option_table('Initialize Your Skin', true, 'mantra/Comments.png');

	$data = array(
		'title' => 'Skin Name',
		'description' => 'The title used to identity this skin.',
		'alternative' => 'yes',
	);
	ois_option_label($data); ?>

	<input type="text" style="width:300px; padding: 8px 6px !important; font-size: 14px !important;" class="ois_textbox" id="ois_skin_name" name="newskin_name" placeholder="New Skin Name" value="<?php echo stripslashes($this_skin['title']); ?>" />
	<?php
	$random_messages = array( 'Great name!', 'That will do!', 'Excellent!', 'A splendid name!');
	$message = $random_messages[array_rand($random_messages)];
	ois_validate_message( array(
			'text' => $message,
			'value' => 'approve',
			'show' => false,
			'id' => 'ois_name_approve'));
	ois_validate_message( array(
			'text' => 'Please name your skin',
			'value' => 'disapprove',
			'show' => false,
			'id' => 'ois_name_disapprove'));
	ois_option_end();

	$data = array(
		'title' => 'Skin Purpose',
		'description' => 'Briefly describe your outcome for this skin.',
	);
	ois_option_label($data);
?>
	<input type="text" style=" width:550px; padding: 10px 6px !important;font-size: 14px !important;" class="ois_textbox" id="new_skin_description" name="newskin_description" placeholder="The reason I am creating this skin is" value="<?php echo stripslashes($this_skin['description']); ?>" /><br/>
	<?php
	ois_validate_message( array(
			'text' => 'Awesome. Having a description for your skin will keep you focused on its aim.',
			'value' => 'approve',
			'show' => false,
			'id' => 'ois_description_approve',
			'paragraph' => true));
	ois_option_end();
	ois_table_end();
?>
	<div id="ois_add_loader" style="height: 250px; padding: 15px; text-align:center;">
		<h3 style="padding-bottom:10px;">Loading All Designs...</h3>
		<img src="<?php echo WP_PLUGIN_URL; ?>/OptinSkin/admin/images/loader.gif" />
	</div>
	<?php
	ois_start_table('Customize Skin Design', 'mantra/Colours.png');
	$data = array (
		'title' => 'Skin Design',
		'description' => 'Select one of our pre-made (and tested) designs using the controllers.',
		'style' => 'text-align:center !important; padding: 10px !important;',
		'alternative' => 'yes',
	);
	ois_option_label($data);
	// Load the designs carousel.
	if (!empty($this_skin['design'])) {
		$design_to_use = $this_skin['design'];
	} else {
		$design_to_use = '';
	}
	if (!empty($this_skin['id'])) {
		$skin_to_use = $this_skin['id'];
	} else {
		$skin_to_use = '';
	}
	ois_create_carousel($design_to_use, $skin_to_use);
	ois_option_end();
	$data = array(
		'title' => 'Design Options for This Skin',
		'description' => 'Certain skins allow you to customize aspects of its design.'
	);
	ois_option_label($data);
	$num_vals = array();
	foreach ( $skin_designs as $number => $design ) {  ?>
			<table 	id="ois_appearance_list_<?php echo $number; ?>"
					class="ois_table_inner"
			<?php
		if (!empty($this_skin)) {
			if ($this_skin['design'] == $number) {
				// Show options for this design.
			} else {
				echo 'style="display:none;"';
			}
		} else if ($number != 1) {
				echo 'style="display:none;"';
			} ?> >
			<?php

		$num_vals[$design['id']] = 0;
		$cur_num = 0;
		$google_fonts = get_option('ois_google_fonts');
		$regular_fonts = get_option('ois_regular_fonts');
		// run through list and count how many values
		if (!empty($design['appearance'])) {
			foreach ($design['appearance'] as $section => $values) {
				foreach ($values as $placeholder => $value) {
					if (!empty($value)) {
						$num_vals[$number]++;
					}
				}
			}
			foreach ($design['appearance'] as $section => $values) {
				foreach ($values as $placeholder => $value) {
					if (!empty($value['attr'])) {
						$attr = $value['attr'];
					} else {
						$attr = '';
					}
					if (!empty($value['default'])) {
						$default = $value['default'];
					} else {
						$default = '';
					}
					if (!empty($value['hint'])) {
						$hint = $value['hint'];
					} else {
						$hint = '';
					}
					if (!empty($value['text-width'])) {
						$text_width = $value['text-width'];
					} else {
						$text_width = '';
					}
					if (!empty($value['type'])) {
						$type = $value['type'];
					} else {
						$type = '';
					}

					if ($this_skin['design'] == $number) {
						// Get the currently saved data for this field.
						if (!empty($this_skin['appearance'][$attr])
							&& trim($this_skin['appearance'][$attr]) != '') {
							$saved_data = stripslashes($this_skin['appearance'][$attr]);
						} else if (trim($default) != '') {
								$saved_data = stripslashes($default);
							}
					} else if (trim($default) != '') {
							$saved_data = $default;
						}
					if ($text_width && trim($text_width) != '') {
						$textbox_width = $text_width;
					} else {
						$textbox_width = '150px;';
					}

					if ($section == 'text') {
						// This is the text section
?>
					<tr>
						<td class="ois_label_inner" style="vertical-align:top !important; padding-top:15px;">
							<?php echo $placeholder;  ?>:
						</td>
						<td class="ois_field_inner">
						<?php
						if ($type == 'dropdown') {
?>
								<select	name="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
										id="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
										class="ois_add_appearance ois_app_<?php echo $number; ?>" >
								<?php
							$values = $value['values'];
							if (!empty($values)) {
								foreach ($values as $name=>$value) {
									echo '<option value="' . $value . '"';
									if ($default == $value) {
										echo ' selected="selected"';
									}
									echo '>' . $name . '</option>';
								}
							}
?>
								</select>
								<?php
						}
						else if ($type == 'google_font') {
?>
								<select	name="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
										id="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
										class="ois_add_appearance ois_app_<?php echo $number; ?>" >
								<?php
								foreach ($regular_fonts as $font) {
									echo '<option value="' . $font . '"';
									if ($font == $saved_data) {
										echo ' selected="selected" ';
									}
									echo '>' . $font . '</option>';
								}
								foreach ($google_fonts as $font) {
									echo '<option value="' . $font . '"';
									if ($font == $saved_data) {
										echo ' selected="selected" ';
									}
									echo '>' . $font . '</option>';
								}
?>
								</select>
								<?php
							} else if ($type == "textarea") {
?>
								<textarea	name="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
								id="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
								style="width:<?php echo $value['width']; ?>; height:<?php echo $value['height']; ?>; background-color: #fff !important;"
								class="ois_textbox ois_app_<?php echo $number; ?>"><?php
								echo $saved_data;
								?></textarea>
								<?php
							} else {
?>
						<input	name="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
								id="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
								type="<?php echo $section; ?>"
								style="width:<?php echo $textbox_width; ?>; background-color: #fff !important;"
								class="ois_textbox ois_add_appearance ois_app_<?php echo $number; ?>"
								placeholder="<?php echo $placeholder; ?>"
								value="<?php echo $saved_data; ?>"  />
						<?php }
						if ($type == 'color') { ?>
						<div	class="ois_color_picker"
								id="ois_colorpicker_<?php echo $number; ?>_<?php echo $attr; ?>"
								style="z-index: 100; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgb(238, 238, 238); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(204, 204, 204); border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); border-left-color: rgb(204, 204, 204); border-image: initial; position: absolute; display: none; background-position: initial initial; background-repeat: initial initial;">
						</div>
							<fieldset style="display:inline">
								<p style="padding-top: 5px;">
									<a	href="javascript:void();"
										class="ois_pickcolor"
										id="link-color_example_<?php echo $number; ?>_<?php echo $attr; ?>"
										style="background-color:
									<?php
							if (trim($saved_data) != '') {
								echo $saved_data;
							} else {
								echo '#fff';
							} ?>;min-height:14px; min-width:4px;-moz-border-radius: 4px;-webkit-border-radius: 4px;border-radius: 4px;border: 1px solid #DFDFDF;margin: 0 7px 0 3px;padding: 4px 14px;line-height: 20px;font-size: 12px;">
										&nbsp
									</a>
									<input	type="button"
											id="ois_picker_<?php
							echo $number; ?>_<?php
							echo $attr ?>"
											class="ois_picker_a pickcolor button"
											value="Select a Color"
											 />
								</p>
							</fieldset>



						<?php } ?>
							<!-- <div style="padding-top:5px;padding-left:5px;display:inline-block;" class="ois_appearance_done"><input type="checkbox" style="padding-left: 5px;" class="ois_appearance_done" /> Minimize</div> -->
						</td>
					</tr>
		<?php }
					else if ($section == 'checkbox') { ?>
			<tr>
				<td class="ois_field_inner">
				<input	name="newskin_appearance_<?php echo $number; ?>_<?php echo $attr ?>"
						type="<?php echo $section; ?>"
						<?php
							if ($saved_data == 'yes') {
								echo 'checked="checked"';
							}
?>
				/>
				<span style="font-size: 0.9em; padding-left: 5px;">
					<?php echo $hint; ?>
				</span><?php echo $placeholder; ?></td>
			</tr>
		<?php }
					else if ($section == 'file') { ?>
			<tr>
				<td class="ois_label_inner"><?php echo $placeholder; ?></td>
				<td class="ois_field_inner">
				<?php
							if ($this_skin) {
?>
					<p>
						<?php echo $this_skin['appearance'][$attr]; ?>
					</p>
					<input	type="hidden"
							name="newskin_appearance_<?php
								echo $number; ?>_<?php
								echo $val[0]; ?>_current"
							value="<?php echo $this_skin['appearance'][$attr]; ?>"
					/>
					<?php

							}
?>
				<input	name="newskin_appearance_<?php echo $number; ?>_<?php echo $attr; ?>"
						type="<?php echo $section; ?>"
				/>
				<span style="font-size: 0.9em; padding-left: 5px;">
					<?php echo $hint; ?>
				</span></td>
			</tr>

		<?php


						}
				}
				$number++;
			}
		}
	}?>
					</table>
		<?php
	ois_end_option_and_table();
	ois_start_table('Optin Form Settings', 'mantra/Mail.png');

	$data = array(
		'title' => 'Optin Information for This Skin',
		'description' =>
		'', //'To add subscribers to your mailing list, we need your list details.',
		'id' => 'ois_selection_' . $number,
		'inner_style' => '',
	);
	ois_option_label($data);

	$optin_services = array (
		'feedburner' => array (
			'ID' => 'feedburner-id',
		),
		'aweber' => array (
			'List Name (e.g. \'viperchill\')' => 'aweber-id',
		),
		'mailchimp' => array (
			'Naked Form HTML' => 'mailchimp-form',
		),
		'icontact' => array (
			'Client ID' => 'icontact-client',
			'List ID' => 'icontact-id',
			'Form ID' => 'icontact-form',
			'Real List ID' => 'icontact-real',
			'Double Opt' => 'icontact-double',
		),
		'getResponse' => array (
			'Webform ID' => 'getResponse-id',
			'Form HTML' => 'getResponse-html',
		),
		'infusionSoft' => array (
			'Form HTML' => 'infusionSoft-html',
		),
		'other' => array (
			'Form HTML' => 'other-html',
		),
	);
	ois_inner_label(array('title' => ''));
	echo '</td>';
	// Give the user the option to choose which accounts (feedburner,
	//    mailchimp, etc.) to use in their skin.
	foreach ($optin_services as $name=>$data) {  ?>
						<span style="padding: 0 8px 0 3px;">
						<input
							class="ois_optin_choice"
							type="radio"
							name="newskin_optin_choice"
						<?php
		if (!empty($this_skin['optin_service']) && trim($this_skin['optin_service']) == $name) {
			echo 'checked="checked"';
		} ?>
							value="<?php echo $name; ?>" />
							<img style="padding: 0 2px; margin-bottom: -3px; width: 16px !important;" src="<?php echo OptinSkin_URL . 'admin/images/' . $name . '.png'; ?>" />
							<?php
		if ($name != 'icontact') {
			echo ucwords($name);
		} else {
			echo 'iContact';
		}
?>
						</span>
				<?php } ?>
			</td>
					<td style="vertical-align: middle !important;">
						<span style="padding-right: 5px; height:20px !important;">
						<input
							class="ois_optin_choice"
							type="radio"
							name="newskin_optin_choice"
							value="none"
						<?php
	if (trim($this_skin['optin_service']) == '' ||
		trim($this_skin['optin_service']) == 'none') {
		echo 'checked="checked"';
	} ?>
						/> <div style="width:5px; height: 17px; display:inline-block;"></div>
						None
						</span>
					</td>
				</tr>
				</table>

				<table id="ois_account_list_<?php echo $number; ?>" class="ois_table_inner">
				<?php
	foreach ($optin_services as $name=>$data) {
		foreach ($data as $nice=>$item) { ?>
					<tr	class="ois_optin_account ois_optin_<?php echo $name; ?>"
					<?php
			if (trim($this_skin['optin_service']) != $name) {
				echo 'style="display:none;"';
			}
?>
					>
						<td class="ois_label_inner">
							<?php
			if ($name != 'icontact') {
				echo ucwords($name);
			} else {
				echo 'iContact';
			}
			echo ' ' . $nice; ?>
						</td>
						<td class="ois_field_inner">
						<?php 
						if ($name != 'other' && $name != 'mailchimp' && $nice != 'Form HTML') { ?>
							<input	type="text"
								style="width:200px;"
								class="ois_textbox ois_optin_account_input"
								name="newskin_<?php echo $item; ?>"
								account="<?php echo $name; ?>"
						
						<?php
			//print_r($this_skin['optin_settings'][str_replace('-', '_', $item)]);
			if (!empty($this_skin['optin_settings'][str_replace('-', '_', $item)])
				&& trim($this_skin['optin_settings'][str_replace('-', '_', $item)]) != '') {
				$potential_val = trim($this_skin['optin_settings'][str_replace('-', '_', $item)]);
			} else {
				$potential_val = '';
			}
			if ($potential_val != '') {
				echo 'value="' . $potential_val . '"';
			} else {
				if (!empty($optin_accounts[$item])) {
					$potential_val = $optin_accounts[$item];
				} else {
					$potential_val = '';
				}
				if (trim($potential_val) != '') {
					echo 'value="' . $potential_val . '"';
				}
			}
?>
							/>
				<?php } else if ($nice == 'Form HTML' || $name == 'other' || $name == 'mailchimp' || $name == 'getResponse') { 
				if ($name == 'getResponse') {
					echo '<p style="padding:10px 0;text-decoration:underline;font-weight:bold;">OR</p>';
				}
				?><textarea	type="text"
								style="width:500px; height: 200px;"
								class="ois_add_appearance ois_textbox ois_optin_account_input"
								name="newskin_<?php echo $item; ?>"
								account="<?php echo $name; ?>" ><?php
			if (!empty($this_skin['optin_settings'][str_replace('-', '_', $item)])) {
				$potential_val = trim($this_skin['optin_settings'][str_replace('-', '_', $item)]);
			} else {
				$potential_val = '';
			}
			if ($potential_val != '') {
				echo stripslashes($potential_val);
			} else {
				if (!empty($optin_accounts[$item])) {
					$potential_val = $optin_accounts[$item];
				} else {
					$potential_val = '';
				}
				if (trim($potential_val) != '') {
					echo stripslashes($potential_val);
				}
			}
?></textarea>
				
				
				<?php }
				
				
				}
	}
?>
							</td>
						</tr>
			 	</table>
	<?php
	ois_option_end();
	ois_option_label(array('title' => 'Redirect Option', 'description' => 'Where will users go after they have subscribed?<br/><br/>Leave blank for no redirect.'));
	ois_inner_label(array('title' => 'Full Redirect URL',
			'description' => ''));
?>
			<input type="text" class="ois_textbox" id="ois_redirect_url" name="newskin_redirect" style="width:420px;" <?php if (!empty($this_skin)) { echo 'value="' . $this_skin['redirect_url'] . '"'; } ?> />
			<select id="ois_select_page">
			<option>Select from all Pages</option>
			<?php
	$pages = get_pages();
	foreach ( $pages as $pagg ) {
		$option = '<option value="' . get_page_link( $pagg->ID ) . '">';
		$option .= $pagg->post_title;
		$option .= '</option>';
		echo $option;
	}
?>
			</select>

	<?php
	ois_end_option_and_table();
	ois_end_option_and_table();
	ois_start_table('Placement Options', 'mantra/Designs.png');
	ois_option_label(array('title' => 'Automatic Skin Placement',
			'description' =>
			'Use these setting to specify where you want this skin to appear on your website.'));
	ois_inner_label(array('title' => 'Place my Skin'));
	$positions = array (
		'post_bottom' => 'At the bottom of posts',
		'post_top' => 'At the top of posts',
		'below_first' => 'Below the first paragraph',
		'floated_second' => 'Floated right of second paragraph',
		'sidebar' => 'In a custom location, such as the sidebar using a widget, or post using a shortcode',
	);
	echo '<table>';
	$cur_position = $this_skin['position'];
	$i = 0;
	foreach ($positions as $position=>$description) {
		if ($i % 2 == 0) {
			echo '<tr>';
		}
		echo '<td style="width: 260px;">';
		echo '<input	type="radio"
								class="new_skin_post_type"
								name="newskin_post_position"
								value="' . $position . '"';
		if (trim($cur_position) == '') {
			if ($i == 0) {
				echo 'checked="checked"';
			}
		} else {
			if ($cur_position == $position) {
				echo 'checked="checked"';
			}
		}
		echo ' /> ';
		echo $description;
		echo '</td>';
		if ($i % 2 != 0) {
			echo '</tr>';
		}
		$i++;
	}
	echo '</tr>';
	ois_table_end(); // ends the positions table
	ois_end_option_and_table(); // ends the whole positions question
	echo '<p style="color: #666; padding-left: 5px; padding-top: 5px; width: 650px;">
				Once the skin is created, a widget with the skin will be available for sidebar use. You will also receive a shortcode to insert the skin wherever you like.
			</p>';
	ois_option_end();
	ois_option_label(array('title' => 'Spaces Around the Skin',
			'description' =>
			'Add margins above, below, left and right of your skin.',
			'image' => 'spacing.png'));
	$margins = array();
	if (!empty($this_skin['margins'])) {
		$margins = $this_skin['margins'];
	} else {
		$margins = array( // default margins
			'top' => '5px',
			'right' => '0px',
			'bottom' => '5px',
			'left' => '0px',
		);
	}
	ois_inner_label(array('title' => 'Above and Below'));
	echo '<div style="margin-left:5px;">
			<p>Extra Space Above Skin:
				<input type="text" class="ois_textbox" value="' . $margins['top'] . '" style="width:70px; margin-left:15px;" name="margin_top" />
			</p>';
	echo '<p>Extra Space Below Skin:
				<input type="text" class="ois_textbox" value="' . $margins['bottom'] . '" style="width:70px; margin-left:15px;" name="margin_bottom" /></p></div>';
	ois_table_end();
	ois_inner_label(array('title' => 'Left and Right'));
	echo '<div style="margin-left:5px;"><p>Extra Space to Left of Skin:
			<input type="text" class="ois_textbox" value="' . $margins['left'] . '" style="width:70px; margin-left:15px;" name="margin_left" /></p>';
	echo '<p>Extra Space to Right of Skin:
			<input type="text" class="ois_textbox" value="' . $margins['right'] . '" style="width:70px; margin-left:15px;" name="margin_right" /></p></div>';
	ois_table_end();
	ois_inner_label(array('title' => 'Margin Type'));
	if (!empty($this_skin['margin_type'])) {
		$margin_type = $this_skin['margin_type'];
	} else {
		$margin_type = 'margin';
	}
	echo '<p>
		<span><input type="radio" name="margin_type"';
		if (trim($margin_type) == 'margin') {
			echo ' checked="checked"';
		}
		echo ' value="margin" /> Margin</span>
		 
		<span style="margin-left: 15px;"><input type="radio" name="margin_type"';
		if (trim($margin_type) == 'padding') {
			echo ' checked="checked"';
		}
		echo ' value="padding" /> Padding</span>
		</p>';
	ois_table_end();
	ois_option_label(array('title' => 'Special Effects',
			'description' =>
			'Get more attention to your Optin-Form',
			'image' => 'fade.png'));
	ois_inner_label(array('title' => 'Fade In'));

	echo '<p><input type="checkbox" name="special_fade"';
	if ($this_skin['special_fade'] == 'yes') {
		echo ' checked="checked"';
	}
	if (trim($this_skin['fade_sec']) != '') {
		$fade_sec = $this_skin['fade_sec'];
	} else {
		$fade_sec = '3'; // default
	}


	echo ' value="yes" /> Enable <span style="margin-left: 10px;">Fade in after <input type="text" class="ois_textbox" name="fade_sec" style="width: 35px;" value="' . $fade_sec . '" /> seconds.</span></p>';
	echo '<p style="color: #666;">Fades into existence when the user gets to the specified position, drawing attention.</p>';
	ois_end_option_and_table();
	ois_inner_label(array('title' => 'Stick to Top'));
	echo '<p><input type="checkbox" name="special_stick"';
	if ($this_skin['special_stick'] == 'yes') {
		echo ' checked="checked"';
	}
	echo ' value="yes" /> Enable </p>';
	echo '<p style="color: #666;">Stays at the top of the screen once your user scrolls past.</p>';
	ois_end_option_and_table();
	ois_end_option_and_table(); // end positioning section.

	//echo '</table>'; // ends the positioning section.
	ois_start_table('Split-Testing', 'mantra/Clock.png');
	ois_option_label(array(
			'title' => 'Are you a perfectionist?',
			'description' => 'Find out which design or message speaks to your readers best by comparison.' ));
	ois_inner_label(array('title' => 'Split-Test This Skin'));
	echo '<p><input type="checkbox" name="newskin_split_testing" value="yes"';
	if (trim($this_skin['split_testing']) == 'yes') {
		echo 'checked="checked"';
	}
	echo '/> Enable Split-Testing</p>';
	echo '<p style="color: #666;">When you enable split-testing for two skins, and you assign them to the same position, only one will appear per pageview.<br/>You can compare their performances in the \'Statistical Comparison\' section.</p>';
	ois_end_option_and_table();
	ois_end_option_and_table();

	if (trim($this_skin['aff_username']) != '') {
		$aff_username = $this_skin['aff_username'];
	} else {
		$aff_username = get_option('ois_aff_user');
	}
	$aff_enable = $this_skin['aff_enable'];

	ois_start_table('Affiliate Options', 'mantra/ID.png');
	ois_option_label(array(
			'title' => 'Want to Make Money?',
			'description' => 'Use your skin to sell OptinSkin as an affiliate, and earn more money from your website.' ));
	echo '<img style="float:right;width: 140px; padding: 15px;" src="' . OptinSkin_URL . 'admin/images/clickbank.png" />';
	ois_inner_label(array('title' => 'Clickbank Username'));
	echo '<p><input	type="text"
					class="ois_textbox"
					name="aff_user"
					placeholder="Affliate Username"
					value="' . $aff_username . '" /></p>';
	ois_end_option_and_table();
	ois_inner_label(array('title' => 'Enable Affiliate Link for this Skin'));
	echo '<p><input	type="checkbox"
						name="aff_enable"
						value="yes"';
	if ($aff_enable == 'yes') {
		echo 'checked="checked"';
	}
	echo '/> Enable
			<p>Disabling this option will remove the link from your skin.</p></p>';
	ois_end_option_and_table();
	ois_end_option_and_table();

	ois_start_table('Finalize Your Skin', 'mantra/Upload.png');
	ois_option_label(array(
			'title' => 'Save Data',
			'description' => 'When you are finished creating your skin, hit \'Add this Skin\'.' ));
?>
					<input 	type="hidden"
							name="newskin_design_section"
							id="newskin_design_selection"
							<?php
	if (!empty($this_skin)) {
		echo 'value="' . $this_skin['design'] . '" />';
	} else {
		echo 'value="1" />';
	}
?>
					<input 	type="hidden"
							name="newskin_status"
							id="newskin_status"
							value="publish" />

				<?php  if (!empty($this_skin)) { ?>
					<input 	type="hidden"
							name="newskin_current_skin"
							id="newskin_current_skin"
							value="<?php echo $this_skin['id']; ?>" />
					<?php
	}
?>
					<div style="text-align:center; margin-right:300px;">
		<?php  if (!empty($this_skin)) {
		if ($this_skin['status'] == 'draft') {
			ois_super_button(array('value'=>'Publish this Skin', 'style' => '
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'rgb(104, 231, 127)\', endColorstr=\'#000000\');
background: -moz-linear-gradient(top,  rgb(104, 231, 127),  rgb(48, 166, 85));
background: -webkit-linear-gradient(top, rgb(104, 231, 127) 0px, rgb(48, 166, 85) 100%); !important; background-color: #30e77f !important; -webkit-box-shadow: rgba(255, 255, 255, 0.449219) 0px 1px 0px 0px inset !important; border: 1px solid #30a655 !important; color: #fff !important; text-shadow: transparent 0px 0px 0px, rgba(0, 0, 0, 0.449219) 0px 1px 0px !important;'));
			ois_secondary_button(array('value'=>'Update Skin', 'id'=>'ois_save_draft'));
		} else {
			ois_super_button(array('value'=>'Update Skin'));
		}
	} else {
		ois_super_button(array('value'=>'Create this Skin', 'style' => 'filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'rgb(104, 231, 127)\', endColorstr=\'#000000\') !important;
background: -moz-linear-gradient(top,  rgb(104, 231, 127),  rgb(48, 166, 85)) !important;
background: -webkit-gradient(linear, left top, left bottom, from(rgb(104, 231, 127)), to(rgb(48, 166, 85))) !important;background-color: #30e77f !important; -webkit-box-shadow: rgba(255, 255, 255, 0.449219) 0px 1px 0px 0px inset !important; border: 1px solid #30a655 !important; color: #fff !important; text-shadow: transparent 0px 0px 0px, rgba(0, 0, 0, 0.449219) 0px 1px 0px !important;'));
		ois_super_button(array(
				'value'=>'Save as a Draft',
				'id'=>'ois_save_draft',
				'style'=>'margin-left:20px;'));
	}
	wp_nonce_field('ois_add_field', 'save_data');
	ois_end_option_and_table();
?>
	</form>

<?php
	ois_section_end();
}

function ois_add_new_load_scripts() {
	// Scripts
	echo "<script type='text/javascript' src='" . admin_url() . "/js/farbtastic.js?ver=3.3.1'></script>";
	echo "<script type='text/javascript' src='" . WP_PLUGIN_URL . "/OptinSkin/admin/js/add_skin.js?ver=3.3.1'></script>";
	$scripts_location = OptinSkin_URL . 'admin/special_includes/anything_slider/js/';
	$scripts = array (
		'jquery.easing.1.2.js',
		'jquery.anythingslider.js',
		'jquery.anythingslider.fx.js',
	);
	foreach ($scripts as $script) {
		echo "<script type='text/javascript' src='" . $scripts_location . $script . "'></script>";
	}
	// Styles
	echo "<link rel='stylesheet' href='" . admin_url() . "/css/farbtastic.css?ver=3.3.1' type='text/css' media='all' />";
	$styles_location = OptinSkin_URL . 'admin/special_includes/anything_slider/css/';
	$styles = array (
		'anythingslider.css',
		'theme-polished.css',
		'theme-mini-dark.css'
	);
	foreach ($styles as $style) {
		echo "<link rel='stylesheet' href='" . $styles_location . $style . "' type='text/css' media='all' />";
	}

	ois_fb_script();
	ois_gplus_script();
	ois_twitter_script();
	ois_linkedin_script();
	ois_stumbleupon_script();
}

function ois_create_carousel($cur_design, $skin_id) { ?>
	<script type="text/javascript">
	jQuery(document).ready(function ($) {
	<?php
	if (isset($cur_design) && trim($cur_design) != '') {
		echo 'var cur_slide = "' . $cur_design . '";';
	} else {
		echo 'var cur_slide = 0;';
	}
?>
	$('#slider1').anythingSlider({
	  	width               :	800,
	  	height              :	400,
	  	expand				:	false,
	  	buildNavigation     :	false,
	  	hashTags 			:	false,
	   	toggleControls 		:	false,
	   	resizeContents 		:	false,
	   	theme          		:	'polished',
	  });
		if (cur_slide && cur_slide != 0) {
			$('#slider1').anythingSlider(cur_slide);
		}
		$('.anythingSlider .arrow').click(function () {
		  	var current = $('#slider1').data('AnythingSlider').currentPage;
		   	var target = $('#slider1').data('AnythingSlider').targetPage;
			$('#ois_account_list_' + current).hide();
			$('#ois_appearance_list_' + current).hide();
		  	$('#ois_appearance_list_' + target).show();
		  	$('#newskin_design_selection').val(target);
		  	ois_calc_completion(); // recalc.
		});
	});
	</script>
	<?php

	echo '<ul id="slider1">';
	$skin_designs = get_option('ois_designs');
	if (isset($skin_id) && trim($skin_id) != '') {
		$skins = get_option('ois_skins');
		foreach ($skins as $n=>$s) {
			if (!empty($s['id']) && $s['id']  == $skin_id) {
				$real_skin = $skins[$n];
				break;
			}
		}
	} else {
		$skin_id = 'none';
	}
	if (!empty($skin_designs)) {
		foreach ($skin_designs as $n=>$design) {
			$ex_skin = array ('optin-service' => 'feedburner');

			echo '<li style="min-height: 164px !important;" id="ois_design_' . $design['id'] . '">';
			echo '<div id="ois_original_design_' . $design['id'] . '" style="display:none;">';
			echo ois_make_skin($ex_skin, $design);
			echo '</div>';

			echo '<div id="ois_design_wrapper" style="width: 840px !important;">';
			echo '<div id="ois_actual_design_' . $design['id'] . '" style="padding: 5px 0 25px 0; min-height: 100px !important; width:660px !important; margin: auto auto !important;">';

			if (!empty($design['id']) && $design['id'] == $cur_design) {
				echo ois_make_skin($real_skin, $design);
			} else {
				$default_app = array();
				if (!empty($design['appearance'])) {
					foreach ($design['appearance'] as $section=>$items) {
						foreach ($items as $value) {
							$default_app[$value['attr']] = $value['default'];
						}
					}
				}
				$ex_skin = array_merge($ex_skin, array('appearance' => $default_app));

				echo ois_make_skin($ex_skin, $design);
			}
			echo '</div></div>';
			echo '</li>';
		}
	}

	echo '</ul>';

}

function ois_handle_new_skin($_POST) {
	if ( empty($_POST) || !check_admin_referer('ois_add_field', 'save_data') ) {
		print 'Sorry, your nonce did not verify.';
		exit;
	} else {
		// Get Skin Name.
		$skin_name = $_POST['newskin_name'];
		if (trim($skin_name) == '') {
			$skin_name = htmlentities('Untitled Skin');
		}
		// Get Skin Description.
		$skin_description = $_POST['newskin_description'];
		// Get Skin Status: publish or draft.
		$skin_status = $_POST['newskin_status'];
		// Get Skin Design
		$skin_design = $_POST['newskin_design_section'];
		$optin_choice = $_POST['newskin_optin_choice'];
		$categories = $_POST['categories'];
		$exclude_pages = $_POST['exclude_pages'];
		// Get the opint information.
		if ($optin_choice == 'feedburner') {
			// feedburner
			$feedburner_id = $_POST['newskin_feedburner-id'];
			update_option('ois_feedburner_id', $feedburner_id);

		} else if ($optin_choice == 'aweber') {
			// aweber
			$aweber_id = $_POST['newskin_aweber-id'];
			update_option('ois_aweber_id', $aweber_id);

		} else if ($optin_choice == 'mailchimp') {
			//mailchimp
			$mailchimp_form = $_POST['newskin_mailchimp-form'];
			$mailchimp_action = explode('<form action="', $mailchimp_form);
			if (!empty($mailchimp_action)) {
				$mailchimp_action = explode('"', $mailchimp_action[1]);
				$mailchimp_action = $mailchimp_action[0];
			} else {
				$mailchimp_action = '';
			}
			update_option('ois_mailchimp_form', $mailchimp_form);
		} else if ($optin_choice == 'icontact') {
			$icontact_id = $_POST['newskin_icontact-id'];
			$icontact_client = $_POST['newskin_icontact-client'];
			$icontact_real = $_POST['newskin_icontact-real'];
			$icontact_double = $_POST['newskin_icontact-double'];
			$icontact_form = $_POST['newskin_icontact-form'];
			update_option('ois_icontact_id', $icontact_id);
			update_option('ois_icontact_client', $icontact_client);
		
		} else if ($optin_choice == 'getResponse') {
			if (!empty($_POST['newskin_getResponse-html']) && trim ($_POST['newskin_getResponse-html']) != '') {
				$gr_form = stripslashes($_POST['newskin_getResponse-html']);
				update_option('ois_getResponse_html', $gr_form);
			} else {
				$gr_form = '';
			}
			if (!empty($_POST['newskin_getResponse-id']) && trim ($_POST['newskin_getResponse-id']) != '') {
				$gr_id = $_POST['newskin_getResponse-id'];
			} else if (!empty($gr_form) && trim($gr_form) != '') {
				$gr_bit = explode('<input type="hidden" name="webform_id" value="', $gr_form);
				if (!empty($gr_bit)) {
					$gr_bit = explode('"', $gr_bit[1]);
					if (!empty($gr_bit)) {
						$gr_id = $gr_bit[0];
					} else {
						$gr_id = '';
					}
				}
			} else {
				$gr_id = '';
			}
			update_option('ois_getResponse_id', $gr_id);
		} else if ($optin_choice == 'infusionSoft') {
			// Get all of the relevant InfusionSoft data
			if (!empty($_POST['newskin_infusionSoft-html']) && trim ($_POST['newskin_infusionSoft-html']) != '') {
				$is_form = stripslashes($_POST['newskin_infusionSoft-html']);
				update_option('ois_infusionSoft_html', $is_form);
			} else {
				$is_form = '';
			}
			$is_bit = explode('action="', $is_form);
			if (!empty($is_bit)) {
				$is_bit = explode('"', $is_bit[1]);
				if (!empty($is_bit)) {
					$is_action = $is_bit[0];
				}
			} else {
				$is_action = '';
			}
			$is_bit2 = explode('name="inf_form_xid" type="hidden" value="', $is_form);
			if (!empty($is_bit2)) {
				$is_bit2 = explode('"', $is_bit2[1]);
				if (!empty($is_bit2)) {
					$is_id = $is_bit2[0];
				}
			} else {
				$is_id = '';
			}
			$is_bit3 = explode('name="inf_form_name" type="hidden" value="', $is_form);
			if (!empty($is_bit)) {
				$is_bit3 = explode('"', $is_bit3[1]);
				if (!empty($is_bit3)) {
					$is_name = $is_bit3[0];
				}
			} else {
				$is_name = '';
			}
			update_option('ois_infusionSoft_id', $is_id);
			update_option('ois_infusionSoft_name', $is_action);
			update_option('ois_infusionSoft_action', $is_action);

		} else if ($optin_choice == 'other') {
			$other_html = $_POST['newskin_other-html'];
			update_option('ois_other_html', $other_html);
		}
		$redirect_url = $_POST['newskin_redirect'];
		$split_testing = $_POST['newskin_split_testing'];

		// Margins
		$m_above = $_POST['margin_top'];
		$m_below = $_POST['margin_bottom'];
		$m_left = $_POST['margin_left'];
		$m_right = $_POST['margin_right'];
		$margin_type = $_POST['margin_type'];

		$margins = array (
			'top' => $m_above,
			'right' => $m_right,
			'bottom' => $m_below,
			'left' => $m_left,
		);

		// get the design options
		$design_options = array();
		$fonts_to_add = array();
		foreach ($_POST as $post=>$val) {
			// get the data from apperance settings.
			if (substr($post, 0, strlen('newskin_appearance_'))
				== 'newskin_appearance_') {
				// extract data from post name.
				$len = strlen($post);
				$data =
					explode('_', substr($post, strlen('newskin_appearance_'), $len));
				// only get data for design we want
				if ($data[0] == $skin_design) {
					// attribute => value
					// e.g. background-color => #fff
					if (trim($val) == '') {
						$val = '\\';
					} else {
						$val = htmlspecialchars($val);
					}
					$google_fonts = get_option('ois_google_fonts');
					foreach ($google_fonts as $font) {
						if ($val == $font) {
							array_push($fonts_to_add, $font);
						}
					}
					$design_options += array($data[1] => $val);
				}
			}
		}
		$post_position = $_POST['newskin_post_position'];
		$special_fade = $_POST['special_fade'];
		$special_stick = $_POST['special_stick'];
		$fade_sec = $_POST['fade_sec'];
		if (trim($fade_sec) == '') {
			$fade_sec = '0';
		}

		$aff_enable = $_POST['aff_enable'];
		$aff_username = $_POST['aff_user'];
		$all_skins = get_option('ois_skins');
		$id = count($all_skins) + 1;
		$all_ids = array();
		if (!empty($all_skins)) {
			foreach ($all_skins as $skin) {
				array_push($all_ids, $skin['id']);
			}				
			while (in_array($id, $all_ids)) {
				$id++;
			}
		}

		$skin_data = array (
			'title' => $skin_name,
			'description' => $skin_description,
			'status' => $skin_status,
			'design' => $skin_design,
			'appearance' => $design_options,
			'optin_service' => $optin_choice,

			'optin_settings' => array (
				'feedburner_id' => $feedburner_id,
				'aweber_id' => $aweber_id,
				'mailchimp_form' => $mailchimp_form,
				'mailchimp_action' => $mailchimp_action,
				'icontact_id' => $icontact_id,
				'icontact_form' => $icontact_form,
				'icontact_client' => $icontact_client,
				'icontact_real' => $icontact_real,
				'icontact_double' => $icontact_double,
				'other_html' => $other_html,
				'getResponse_html' => $gr_form,
				'getResponse_id' => $gr_id,
				'infusionSoft_html' => $is_form,
				'infusionSoft_action' => $is_action,
				'infusionSoft_name' => $is_name,
				'infusionSoft_id' => $is_id,
			),
			'margins' => $margins,
			'margin_type' => $margin_type,
			'social' => '',
			'redirect_url' => $redirect_url,
			'special_fade' => $special_fade,
			'fade_sec' => $fade_sec,
			'special_stick' => $special_stick,
			'position' => $post_position,
			'categories' => $categories,
			'exclude_pages' => $exclude_pages,
			'date_added' => date('Y-m-d H:i:s'),
			'last_modified' => date('Y-m-d H:i:s'),
			'split_testing' => $split_testing,
			'aff_username' => $aff_username,
			'aff_enable' => $aff_enable,
			'google_fonts' => $fonts_to_add,
			'id' => $id,
		);
		$existing_skins = get_option('ois_skins');

		/* Now, if we're *editing* a skin, it's going to be a little different
			to creating a new skin. */
		if (isset($_POST['newskin_current_skin'])
			&& trim($_POST['newskin_current_skin']) != '') {
			$cur_id = $_POST['newskin_current_skin'];
			$skin_data['id'] = $cur_id;
			foreach ($existing_skins as $num=>$a_skin) {
				if ($a_skin['id'] == $cur_id) {
					$existing_skins[$num] = $skin_data;
					break;
				}
			}
			$updated_message = '&updated=true';
		} else {
			if ($existing_skins || !empty($existing_skins)) {
				array_push($existing_skins, $skin_data);
			} else {

				$existing_skins = array($skin_data);
			}
			$updated_message = '&created=true';
		}

		update_option('ois_aff_user', $aff_username);

		update_option('ois_skins', $existing_skins);
		if ($skin_status != 'draft') {
			$cur_location = explode("?", $_SERVER['REQUEST_URI']);
			$new_location =
				'http://' . $_SERVER["HTTP_HOST"] . $cur_location[0] . '?page=ois-' . $skin_data['id'];
			echo '<script type="text/javascript">
				window.location = "' . $new_location . $updated_message . '";
			</script>';
		} else {
			ois_notification('Your Draft Skin has Successfully Been Saved!', 'margin-left: 15px;', '');
		}
	}
}

?>