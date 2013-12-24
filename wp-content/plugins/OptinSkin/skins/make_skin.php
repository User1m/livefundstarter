<?php

function ois_make_skin($skin, $design) {

	if (!empty($skin['id'])) {
		$skin_id = $skin['id'];
	} else {
		$skin_id = '';
	}
	if (!empty($skin['optin_service'])) {
		$service = $skin['optin_service'];
	} else {
		$service = '';
	}

	if (!empty($design['optin_settings'])) {
		if (!empty($design['optin_settings']['enable_name'])) {
			$enable_name = $design['optin_settings']['enable_name'];
		} else {
			$enable_name = '';
		}
		if (!empty($design['appearance']['text']['Name Placeholder'])) {
			$placeholder_name = stripslashes('%name-placeholder%');
		} else {
			if (!empty($design['optin_settings']['placeholders']['name'])) {
				$placeholder_name = $design['optin_settings']['placeholders']['name'];
			} else {
				$placeholder_name = '';
			}
		}
		if (!empty($design['appearance']['text']['Email Placeholder'])) {
			$placeholder_email = stripslashes('%email-placeholder%');
		} else {
			if (!empty($design['optin_settings']['placeholders']['email'])) {
				$placeholder_email = $design['optin_settings']['placeholders']['email'];
			} else {
				$placeholder_email = '';
			}
		}
		if (!empty($design['appearance']['text']['Name Width'])) {
			$name_width = stripslashes('%name-width%');
		} else {
			$name_width = '';
		}
		if (!empty($design['appearance']['text']['Email Width'])) {
			$email_width = stripslashes('%email-width%');
		} else {
			$email_width = '';
		}
		if (!empty($design['optin_settings']['labels']['name'])) {
			$label_name = $design['optin_settings']['labels']['name'];
		} else {
			$label_name = '';
		}
		if (!empty($design['optin_settings']['labels']['email'])) {
			$label_email = $design['optin_settings']['labels']['email'];
		} else {
			$label_email = '';
		}
		if (!empty($design['optin_settings']['force_break'])) {
			$force_break = $design['optin_settings']['force_break'];
		} else {
			$force_break = '';
		}

		if (!empty($design['appearance']['text']['Button Text'])) {
			$button_value = stripslashes('%button-text%');
		} else {
			$button_value = $design['optin_settings']['button_value'];
		}
	} else {
		$enable_name = '';
		$placeholder_name = '';
		$placeholder_email = '';
		$email_width = '';
		$name_width = '';
		$label_name = '';
		$label_email = '';
		$force_break = '';
		if (!empty($design['optin_settings']['button_value'])) {
			$button_value = $design['optin_settings']['button_value'];
		} else {
			$button_value = 'Subscribe';
		}
		
	}

	if (!empty($skin['redirect_url'])) {
		$redirect_url = $skin['redirect_url'];
	} else {
		$redirect_url = home_url();
	}
	$basic_attr = array (
		'skin_id' => $skin_id,
		'design_id' => $design['id'],
		'enable_name' => $enable_name,
		'placeholder_name' => $placeholder_name,
		'placeholder_email' => $placeholder_email,
		'name_width' => $name_width,
		'email_width' => $email_width,
		'label_name' => $label_name,
		'label_email' => $label_email,
		'button_text' => 'Subscribe',
		'redirect_url' => $redirect_url,
		'button_value' => $button_value,
		'force_break' => $force_break,
	);

	if ($service == 'aweber') {
			// Aweber
			$id = $skin['optin_settings']['aweber_id'];
			$form_attr = array (
				'id' => $id,
			);
			$form_attr = array_merge($form_attr, $basic_attr);
			$optin_form = ois_aweber_form($form_attr);
		} else if ($service == 'icontact') {
			// iContact
			$id = $skin['optin_settings']['icontact_id'];
			$client = $skin['optin_settings']['icontact_client'];
			$real = $skin['optin_settings']['icontact_real'];
			$double = $skin['optin_settings']['icontact_double'];
			$form = $skin['optin_settings']['icontact_form'];
			$form_attr = array (
				'id' => $id,
				'client' => $client,
				'form' => $form,
				'real' => $real,
				'double' => $double,
			);
			$form_attr = array_merge($form_attr, $basic_attr);
			$optin_form = ois_icontact_form($form_attr);
		} else if ($service == 'other') {
			$other_html = stripslashes(html_entity_decode($skin['optin_settings']['other_html']));
			$other_form = str_replace('type="email"', 'type="text"', $other_form);
			$optin_form = $other_html;
		} else if ($service == 'mailchimp') {
			if (!empty($skin['optin_settings']['mailchimp_action'])) {
				$mailchimp_action = $skin['optin_settings']['mailchimp_action'];
				$form_attr = array (
				'action' => $mailchimp_action,
				);
				$form_attr = array_merge($form_attr, $basic_attr);
				$optin_form = ois_mailchimp_form($form_attr);
			} else {
				$mailchimp_form = stripslashes(html_entity_decode($skin['optin_settings']['mailchimp_form']));
				$mailchimp_action = explode('<form action="', $mailchimp_form);
				if (!empty($mailchimp_action) && isset($mailchimp_action[1])) {
					$mailchimp_action = explode('"', $mailchimp_action[1]);
					if (!empty($mailchimp_action)) {
						$mailchimp_action = $mailchimp_action[0];
						$form_attr = array (
						'action' => $mailchimp_action,
						);
						$form_attr = array_merge($form_attr, $basic_attr);
						$optin_form = ois_mailchimp_form($form_attr);
					} else { // this is messy
						$mailchimp_form = stripslashes(html_entity_decode($skin['optin_settings']['mailchimp_form']));
						$mailchimp_form = str_replace('type="email"', 'type="text"', $mailchimp_form);
						$optin_form = $mailchimp_form; 
					}
				} else {
					$mailchimp_form = stripslashes(html_entity_decode($skin['optin_settings']['mailchimp_form']));
					$mailchimp_form = str_replace('type="email"', 'type="text"', $mailchimp_form);
					$optin_form = $mailchimp_form;
				}
			}
		} else if ($service == 'getResponse') {
			if (!empty($skin['optin_settings']['getResponse_id'])) {
				$id = $skin['optin_settings']['getResponse_id'];
			} else {
				$id = '';
			}
			$form_attr = array (
				'id' => $id,
			);
			$form_attr = array_merge($form_attr, $basic_attr);
			$optin_form = ois_getResponse_form($form_attr);
		} else if ($service == 'infusionSoft') {
			if (!empty($skin['optin_settings']['infusionSoft_action'])) {
				$action = $skin['optin_settings']['infusionSoft_action'];
			} else {
				$action = '';
			}
			if (!empty($skin['optin_settings']['infusionSoft_name'])) {
				$name = $skin['optin_settings']['infusionSoft_name'];
			} else {
				$name = '';
			}
			if (!empty($skin['optin_settings']['infusionSoft_id'])) {
				$id = $skin['optin_settings']['infusionSoft_id'];
			} else {
				$id = '';
			}
			
			$form_attr = array (
				'id' => $id,
				'name' => $name,
				'action' => $action,
			);
			$form_attr = array_merge($form_attr, $basic_attr);
			$optin_form = ois_infusionSoft_form($form_attr);
		} else {
		// Feedburner
		if (!empty($skin['optin_settings']['feedburner_id'])) {
			$id = $skin['optin_settings']['feedburner_id'];
		} else {
			$id = '';
		}
		$form_attr = array(
			'id' => $id,
		);
		$form_attr = array_merge($form_attr, $basic_attr);
		$optin_form = ois_feedburner_form($form_attr);
	}

	$content = html_entity_decode(stripslashes($design['html']));
	if (trim($design['css']) != '') {
		/* I debated for a while whether to add this inline, but I think this is more efficient than an alternative. */
		$content .= trim('<style type="text/css">' . trim(html_entity_decode(stripslashes($design['css']))) . '</style>');
	}
	$content = str_replace('%optin_form%', $optin_form, $content);
	$content = str_replace('%cur_url%', get_permalink(), $content);

	$replacements = array (
		'[b]' => '<b>',
		'[/b]' => '</b>',
		'[i]' => '<i>',
		'[/i]' => '</i>',
	);

	// Now we need to replace the appearance attributes
	if (!empty($skin['appearance'])) {
		$app_sections = $skin['appearance'];
	} else {
		$app_sections = null;
	}
	if (!empty($app_sections)) {
		foreach ($app_sections as $name=>$value) {
			$name = explode(';', $name);
			if (!empty($replacements)) {
				foreach ($replacements as $replace=>$with) {
					$value = str_replace($replace, $with, $value);
				}
			}
			$content = str_replace('%' . $name[0] . '%', stripslashes($value), $content);
		}
	}
	if (!empty($skin['aff_username'])) {
		$aff_username = $skin['aff_username'];
	} else {
		$aff_username = '';
	}
	if (!empty($skin['aff_enable'])) {
		$aff_enable = $skin['aff_enable'];
	} else {
		$aff_enable = '';
	}
	if (!empty($skin['margins'])) {
		$skin_margins = $skin['margins'];
	} else {
		$skin_margins = null;
	}
	if (!empty($skin['margin_type'])) {
		$margin_type = $skin['margin_type'];
	} else {
		$margin_type = 'margin';
	}
	$content = ois_wrapper($content, $skin_id, $skin_margins, $margin_type, $aff_username, $aff_enable);
	return $content;
}

function ois_mailchimp_form($attr) {
	$action = trim($attr['action']);
	$skin_id = $attr['skin_id'];
	if (!empty($attr['redirect_url'])) {
		$redirect_url = $attr['redirect_url'];
	} else {
		$redirect_url = home_url();
	}
	$enable_name = $attr['enable_name'];
	$placeholder_name = $attr['placeholder_name'];
	$placeholder_email = $attr['placeholder_email'];
	$name_width = $attr['name_width'];
	$email_width = $attr['email_width'];
	$force_break = $attr['force_break'];

	if (trim($attr['button_value']) == '') {
		$button_value = 'Subscribe';
	} else {
		$button_value = $attr['button_value'];
	}
	if (!empty($attr['form_style'])) {
		$form_style = $attr['form_style'];
	} else {
		$form_style = '';
	}
	$mailchimp_form = '<form id="' . $skin_id . '" service="mailchimp" class="ois_form ois_form_' . $attr['design_id'] . '" action="' . $action . '" method="post" style="display:inline;' . $form_style . '">';

	if (trim($enable_name) == 'yes') {
		$mailchimp_form .= '<div id="' . $skin_id . '_name_d" class="name_d_' . $attr['design_id'] . '">';
		if (trim($attr['label_name']) != '') {
			$mailchimp_form .= '<label for="' . $skin_id . '_name" >' . $attr['label_name'] . '</label> ';
		}
		$mailchimp_form .= '
			<input type="text" name="FNAME" id="' . $skin_id . '_name" placeholder="' . $placeholder_name . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_name_' . $attr['design_id'] . '"';
			if (!empty($name_width) && trim($name_width) != '') {
				$mailchimp_form .= ' style="width: ' . $name_width . ' !important;"';
			}
			$mailchimp_form .= '/></div>';
	}
	$mailchimp_form .= '
		<input type="text" name="EMAIL"  id="' . $skin_id . '_email" placeholder="' . $placeholder_email . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_email_' . $attr['design_id'] . '"';
		if (!empty($email_width) && trim($email_width) != '') {
			$mailchimp_form .= ' style="width: ' . $email_width . ' !important;"';
		}
		$mailchimp_form .= ' />';
	if ($force_break == 'yes') {
		$mailchimp_form .= '<br/>';
	}
	$mailchimp_form .= '<input	type="submit"   value="' . $button_value . '" class="ois_button_' . $attr['design_id'] . '" />' .
		'</form>';
	return $mailchimp_form;
}

function ois_feedburner_form($attr) {
	if (!empty($attr['id'])) {
		$id = trim($attr['id']);
	} else {
		$id = '';
	}
	if (!empty($skin['id'])) {
		$skin_id = $attr['skin_id'];
	} else {
		$skin_id = '';
	}

	$enable_name = $attr['enable_name'];
	$placeholder_name = $attr['placeholder_name'];
	$placeholder_email = $attr['placeholder_email'];
	$name_width = $attr['name_width'];
	$email_width = $attr['email_width'];
	$force_break = $attr['force_break'];

	if (trim($attr['button_value']) == '') {
		$button_value = 'Subscribe';
	} else {
		$button_value = $attr['button_value'];
	}

	$form = '
	<form id="' . $skin_id . '" service="feedburner" class="ois_form ois_form_' . $attr['design_id'] . '"';
	if (!empty($attr['form_style']) && trim($attr['form_style']) != '') {
		$form .= ' style="' . $attr['form_style'] . '" ';
	}

	$form .= ' action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit = "window.open(\'http://feedburner.google.com/fb/a/mailverify?uri=' . $id . '\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true">';

	if (trim($enable_name) == 'yes') {
		$form .= '<div id="' . $skin_id . '_name_d" class="name_d_' . $attr['design_id'] . '">';
		if (trim($attr['label_name']) != '') {
			$form .= '<label for="' . $skin_id . '_name" >' . $attr['label_name'] . '</label> ';
		}
		$form .= '<input type="text" name="fname" placeholder="' . $placeholder_name . '" class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_name_' . $attr['design_id'] . '" id="' . $skin_id . '_name"';
		if (!empty($name_width) && trim($name_width) != '') {
			$form .= ' style="width: ' . $name_width . ' !important;"';
		}
		$form .= '></div>';
	}
	if (trim($attr['label_email']) != '') {
		$form .= '<label for="' . $skin_id . '_email" >' . $attr['label_email'] . '</label> ';
	}
	$form .= '<input type="text" placeholder="' . $placeholder_email . '" name="email" id="' . $skin_id . '_email" class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_email_' . $attr['design_id'] . '"';
		if (!empty($email_width) && trim($email_width) != '') {
			$form .= ' style="width: ' . $email_width . ' !important;"';
		}
		$form .= ' />';
	if ($force_break == 'yes') {
		$form .= '<br />';
	}
	$form .= '<input type="hidden" value="' . $id . '" name="uri"/>
			<input type="hidden" name="loc" value="en_US"/>';
	$form .= '<input type="submit" value="' . $button_value . '" class="ois_button_' . $attr['design_id'] . '" /></form>';
	return $form;

}

function ois_aweber_form($attr) {
	$id = trim($attr['id']);
	$skin_id = $attr['skin_id'];
	if (!empty($attr['redirect_url'])) {
		$redirect_url = $attr['redirect_url'];
	} else {
		$redirect_url = home_url();
	}
	$enable_name = $attr['enable_name'];
	$placeholder_name = $attr['placeholder_name'];
	$placeholder_email = $attr['placeholder_email'];
	$name_width = $attr['name_width'];
	$email_width = $attr['email_width'];
	$force_break = $attr['force_break'];

	if (trim($attr['button_value']) == '') {
		$button_value = 'Subscribe';
	} else {
		$button_value = $attr['button_value'];
	}
	if (!empty($attr['form_style'])) {
		$form_style = $attr['form_style'];
	} else {
		$form_style = '';
	}

	$aweber_form = '<form id="' . $skin_id . '" service="aweber" class="ois_form ois_form_' . $attr['design_id'] . '" action="http://www.aweber.com/scripts/addlead.pl" method="post" style="display:inline;' . $form_style . '">';

	if (trim($enable_name) == 'yes') {
		$aweber_form .= '<div id="' . $skin_id . '_name_d" class="name_d_' . $attr['design_id'] . '">';
		if (trim($attr['label_name']) != '') {
			$aweber_form .= '<label for="' . $skin_id . '_name" >' . $attr['label_name'] . '</label> ';
		}
		$aweber_form .= '
			<input type="text" name="name" id="' . $skin_id . '_name" placeholder="' . $placeholder_name . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_name_' . $attr['design_id'] . '"';
		if (!empty($name_width) && trim($name_width) != '') {
			$aweber_form .= ' style="width: ' . $name_width . ' !important;"';
		}
		$aweber_form .= '/></div>';
	}
	$aweber_form .= '
		<input type="text" name="email"  id="' . $skin_id . '_email" placeholder="' . $placeholder_email . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_email_' . $attr['design_id'] . '"';
		if (!empty($email_width) && trim($email_width) != '') {
			$aweber_form .= ' style="width: ' . $email_width . ' !important;"';
		}
		$aweber_form .= ' />' .
		'<input type="hidden" name="listname" value="' . $id . '" />' .
		'<input type="hidden" name="meta_message"  value="1" />' .
		'<input type="hidden" name="redirect"  value="' . $redirect_url . '" />';
	if ($force_break == 'yes') {
		$aweber_form .= '<br/>';
	}
	$aweber_form .= '<input	type="submit"   value="' . $button_value . '" class="ois_button_' . $attr['design_id'] . '" />' .
		'</form>';
	return $aweber_form;
}

function ois_wrapper($ois, $skin_id, $margins, $margin_type, $aff_username, $aff_enable) {

	if (!empty($margins)) {
		//
	} else {
		$margins = array (
			'top' => '0px',
			'right' => '0px',
			'bottom' => '0px',
			'left' => '0px',
		);
	}
	if (is_home()) {
		$post_id = 'homepage';
	} else {
		$post_id = get_the_ID();
	}
	$wrapper = '<!-- OptinSkin -->
	<div class="ois_wrapper" data="' . $skin_id . '" ';
	
	if (!empty($margins)) {
		$wrapper .= 'style="';
	
		foreach ($margins as $pos=>$margin) {
			$margin = trim($margin);
			if ($margin != '' && $margin != '0' && $margin != '0px') {
				$wrapper .= $margin_type . '-' . $pos . ':' . $margin . ';';
			}
		}
		$wrapper .= '" ';
	}
	$wrapper .= 'id="ois_' . $skin_id . '" rel="' . $post_id . '">';
	$wrapper .= $ois;

	// Affiliate Options
	if ($aff_enable) {
		if (trim($aff_username) != '') {
			if (!is_admin()) {
				$wrapper .= '<div style="float:right;padding-right:5px;padding-top:7px;"><a href="http://'  . $aff_username . '.optinskin.hop.clickbank.net" style="border:none;"><img style="border:none;" src="' . WP_PLUGIN_URL . '/OptinSkin/front/images/poweredby.png" /></a></div>';
			}
		}
	}

	$wrapper .= '</div>
		<!-- End OptinSkin -->';
	return $wrapper;

}

function ois_icontact_form($attr) {
	
	$id = trim($attr['id']);
	$client = trim($attr['client']);
	$skin_id = $attr['skin_id'];
	$double = $attr['double'];
	$real =  $attr['real'];
	$form = $attr['form'];
	
	if (!empty($attr['form_style'])) {
		$style = $attr['form_style'];
	} else {
		$style = '';
	}
	
	if (!empty($attr['redirect_url'])) {
		$redirect_url = $attr['redirect_url'];
	} else {
		$redirect_url = home_url();
	}
	$enable_name = $attr['enable_name'];
	$placeholder_name = $attr['placeholder_name'];
	$placeholder_email = $attr['placeholder_email'];
	$name_width = $attr['name_width'];
	$email_width = $attr['email_width'];
	$force_break = $attr['force_break'];

	if (trim($attr['button_value']) == '') {
		$button_value = 'Subscribe';
	} else {
		$button_value = $attr['button_value'];
	}

	$icontact_form = '<form id="' . $skin_id . '" service="icontact" class="ois_form ois_form_' . $attr['design_id'] . '" action="http://app.icontact.com/icp/signup.php" method="post" style="display:inline;' . $style . '">';

	if (trim($enable_name) == 'yes') {
		$icontact_form .= '<div id="' . $skin_id . '_name_d" class="name_d_' . $attr['design_id'] . '">';
		if (trim($attr['label_name']) != '') {
			$icontact_form .= '<label for="' . $skin_id . '_name" >' . $attr['label_name'] . '</label> ';
		}
		$icontact_form .= '
			<input type="text" name="fields_fname" id="' . $skin_id . '_name" placeholder="' . $placeholder_name . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_name_' . $attr['design_id'] . '"';
		if (!empty($name_width) && trim($name_width) != '') {
			$icontact_form .= ' style="width: ' . $name_width . ' !important;"';
		}
		$icontact_form .= '/></div>';
	}
	$icontact_form .= '
		<input type="text" name="fields_email"  id="' . $skin_id . '_email" placeholder="' . $placeholder_email . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_email_' . $attr['design_id'] . '" />' .
		'<input type="hidden" name="listid" value="' . $id . '" />' .
		'<input type="hidden" name="redirect" value="' . $redirect_url . '"/>' .
		'<input type="hidden" name="clientid" value="' . $client . '" />' .
		'<input type="hidden" name="formid" value="' . $form . '" />' .
		'<input type="hidden" name="reallistid" value="' . $real . '"/>' .
		'<input type="hidden" name="doubleopt" value="' . $double . '" />';
	if ($force_break == 'yes') {
		$icontact_form .= '<br/>';
	}
	$icontact_form .= '<input type="submit" value="' . $button_value . '" class="ois_button_' . $attr['design_id'] . '"';
		if (!empty($email_width) && trim($email_width) != '') {
			$icontact_form .= ' style="width: ' . $email_width . ' !important;"';
		}
		$icontact_form .= ' />' .
		'</form>';
	return $icontact_form;
}

function ois_getResponse_form($attr) {
	$id = trim($attr['id']);
	$gr_action = 'https://app.getresponse.com/add_contact_webform.html';
	$gr_name = 'name';
	$gr_email = 'email';
	$skin_id = $attr['skin_id'];
	if (!empty($attr['redirect_url'])) {
		$redirect_url = $attr['redirect_url'];
	} else {
		$redirect_url = home_url();
	}
	$enable_name = $attr['enable_name'];
	$placeholder_name = $attr['placeholder_name'];
	$placeholder_email = $attr['placeholder_email'];
	$name_width = $attr['name_width'];
	$email_width = $attr['email_width'];
	$force_break = $attr['force_break'];

	if (trim($attr['button_value']) == '') {
		$button_value = 'Subscribe';
	} else {
		$button_value = $attr['button_value'];
	}
	if (!empty($attr['form_style'])) {
		$form_style = $attr['form_style'];
	} else {
		$form_style = '';
	}

	$getResponse_form = '<form id="' . $skin_id . '" service="getResponse" class="ois_form ois_form_' . $attr['design_id'] . '" action="' . $gr_action . '" method="post" style="display:inline;' . $form_style . '">';

	if (trim($enable_name) == 'yes') {
		$getResponse_form .= '<div id="' . $skin_id . '_name_d" class="name_d_' . $attr['design_id'] . '">';
		if (trim($attr['label_name']) != '') {
			$getResponse_form .= '<label for="' . $skin_id . '_name" >' . $attr['label_name'] . '</label> ';
		}
		$getResponse_form .= '
			<input type="text" name="' . $gr_name . '" id="' . $skin_id . '_name" placeholder="' . $placeholder_name . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_name_' . $attr['design_id'] . '"';
		if (!empty($name_width) && trim($name_width) != '') {
			$getResponse_form .= ' style="width: ' . $name_width . ' !important;"';
		}
		$getResponse_form .= '/></div>';
	}
	$getResponse_form .= '
		<input type="text" name="' . $gr_email . '"  id="' . $skin_id . '_email" placeholder="' . $placeholder_email . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_email_' . $attr['design_id'] . '"';
		if (!empty($email_width) && trim($email_width) != '') {
			$getResponse_form .= ' style="width: ' . $email_width . ' !important;"';
		}
		$getResponse_form .= ' />' .
		'<input type="hidden" name="webform_id" value="' . $id . '" />';
	if ($force_break == 'yes') {
		$getResponse_form .= '<br/>';
	}
	$getResponse_form .= '<input	type="submit"   value="' . $button_value . '" class="ois_button_' . $attr['design_id'] . '" />' .
		'</form>';
	return $getResponse_form;
}

function ois_infusionSoft_form($attr) {
	$is_id = trim($attr['id']);
	$is_action = trim($attr['action']);
	$is_name = 'inf_field_FirstName';
	$is_email = 'inf_field_Email';
	$skin_id = $attr['skin_id'];
	if (!empty($attr['redirect_url'])) {
		$redirect_url = $attr['redirect_url'];
	} else {
		$redirect_url = home_url();
	}
	$enable_name = $attr['enable_name'];
	$placeholder_name = $attr['placeholder_name'];
	$placeholder_email = $attr['placeholder_email'];
	$name_width = $attr['name_width'];
	$email_width = $attr['email_width'];
	$force_break = $attr['force_break'];

	if (trim($attr['button_value']) == '') {
		$button_value = 'Subscribe';
	} else {
		$button_value = $attr['button_value'];
	}
	if (!empty($attr['form_style'])) {
		$form_style = $attr['form_style'];
	} else {
		$form_style = '';
	}

	$infusionSoft_form = '<form id="' . $skin_id . '" service="infusionSoft" class="ois_form ois_form_' . $attr['design_id'] . '" action="' . $is_action . '" method="post" style="display:inline;' . $form_style . '">';

	if (trim($enable_name) == 'yes') {
		$infusionSoft_form .= '<div id="' . $skin_id . '_name_d" class="name_d_' . $attr['design_id'] . '">';
		if (trim($attr['label_name']) != '') {
			$infusionSoft_form .= '<label for="' . $skin_id . '_name" >' . $attr['label_name'] . '</label> ';
		}
		$infusionSoft_form .= '
			<input type="text" name="' . $is_name . '" id="' . $skin_id . '_name" placeholder="' . $placeholder_name . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_name_' . $attr['design_id'] . '"';
		if (!empty($name_width) && trim($name_width) != '') {
			$infusionSoft_form .= ' style="width: ' . $name_width . ' !important;"';
		}
		$infusionSoft_form .= '/></div>';
	}
	$infusionSoft_form .= '
		<input type="text" name="' . $is_email . '"  id="' . $skin_id . '_email" placeholder="' . $placeholder_email . '"  class="ois_textbox_' . $attr['design_id'] . ' ois_textbox_email_' . $attr['design_id'] . '"';
		if (!empty($email_width) && trim($email_width) != '') {
			$infusionSoft_form .= ' style="width: ' . $email_width . ' !important;"';
		}
		$infusionSoft_form .= ' />' .
		'<input name="inf_form_xid" type="hidden" value="' . $is_id . '" /><input name="inf_form_name" type="hidden" value="' . $is_name . '" /><input name="infusionsoft_version" type="hidden" value="1.22.10.32">';
	if ($force_break == 'yes') {
		$infusionSoft_form .= '<br/>';
	}
	$infusionSoft_form .= '<input	type="submit"   value="' . $button_value . '" class="ois_button_' . $attr['design_id'] . '" />' .
		'</form>';
	return $infusionSoft_form;
}

?>