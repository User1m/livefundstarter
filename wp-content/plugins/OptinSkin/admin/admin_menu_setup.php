<?php
add_action( 'admin_menu', 'ois_admin_actions' );

function ois_admin_actions() {
	// Create Option for General Settings
	$validated = get_option('ois_validation');
	if (trim($validated) != 'yes') {
		add_menu_page('Validation of Purchase', 'OptinSkin', 'manage_options', 'validate', 'ois_validation', WP_PLUGIN_URL . '/OptinSkin/admin/images/icon.png' );
	} else {
		// Create menu
		add_menu_page( 'General Settings', 'OptinSkin', 'manage_options', 'addskin', 'ois_add_new', WP_PLUGIN_URL . '/OptinSkin/admin/images/icon.png' );
		// Create Option for Creating New OptInSkins
		// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		add_submenu_page( 'addskin', 'Add New', 'Add New', 'manage_options', 'addskin', 'ois_add_new' );

		// Create Options for All Existing OptINSkins
		$existing_skins = get_option( 'ois_skins' );
		// If there are no existing skins, make a "Your First Skin"
		if ( !$existing_skins || empty( $existing_skins )) {
			$existing_skins = array (
				uniqid()  => array (
					'name' => 'Default Skin',
				),
			);
			//update_option('ois_skins', $existing_skins);
		}

		$stats_disable = get_option('stats_disable');
		$num_drafts = 0;
		$num_trash = 0;
		if (!empty($existing_skins)) {
			foreach ( $existing_skins as $skin_code => $skin ) {
				// Extract data about skin.
				$skin_name = $skin['title'];
				$skin_id = $skin['id'];
				// but only add a page if this is published.
				if ($skin['status'] == 1 ||
					$skin['status'] == 'publish') {
					// Create the option page for this specific existing skin.
					add_submenu_page( 'addskin', $skin_name, $skin_name, 'manage_options', 'ois-' . $skin_id, 'ois_setup_edit_skin' );
				} else if ($skin['status'] == 'draft') {
						$num_drafts++;
					} else if ($skin['status'] == 'trash') {
						$num_trash++;
					}
			}
		}
		if ($num_drafts > 0) {
			add_submenu_page( 'addskin', 'Drafts (' . $num_drafts . ')', 'Drafts (' . $num_drafts . ')', 'manage_options', 'ois-drafts', 'ois_view_drafts' );
		}
		if ($num_trash > 0) {
			add_submenu_page( 'addskin', 'Trash (' . $num_trash . ')', 'Trash (' . $num_trash . ')', 'manage_options', 'ois-trash', 'ois_view_trash' );
		}


		add_submenu_page( 'addskin', 'Create a Design', 'Create a Design', 'manage_options', 'create-design', 'ois_custom' );
		add_submenu_page( 'addskin', 'Manage Designs', 'Manage Designs', 'manage_options', 'ois-manage-designs', 'ois_manage_designs' );

		if ($stats_disable != 'yes') {
			add_submenu_page( 'addskin', 'Split-Testing', 'Split-Testing', 'manage_options', 'ois-split-testing', 'ois_statistics' );
		}

		add_submenu_page( 'addskin', 'General Settings', 'General Settings', 'manage_options', 'optinskin', 'ois_general_settings' );

		$error_cats = get_option('ois_error_log');
		$num_errors = 0;
		if (!empty($error_cats)) {
			foreach ($error_cats as $cat) {
				$num_errors += count($cat);
			}
		}
		if ($num_errors > 0) {
			add_submenu_page( 'addskin', 'Error Log (' . $num_errors . ')', 'Error Log (' . $num_errors . ')', 'manage_options', 'ois-error-log', 'ois_error_log' );
		}

	}

}

function ois_setup_edit_skin() {

	$page_token = explode('-', $_GET['page']);
	if (count($page_token) > 1) {
		$skin_id = $page_token[1];
		$skins = get_option('ois_skins');

		foreach ($skins as $some_skin) {
			if ($skin_id == $some_skin['id']) {
				$skin = $some_skin;
				break;
			}
		}
		include_once 'admin_edit_skin.php';
		ois_edit_skin($skin);
	} else {
		'<p>Sorry, no such skin exists.</p>';
	}
}

function ois_validation() {
	ois_section_title('Validation of Purchase', 'Thank you for buying OptinSkin&trade;. Please validate your purchase before using the plugin.', '');
	if (isset($_POST['ois_validation_input'])) {
		// $ch = curl_init('http://localhost/index.php');
		$secret = 'Grinderz.org';
		// $encoded = urlencode('secret').'='.urlencode($secret);
		// curl_setopt($ch, CURLOPT_POSTFIELDS,  $encoded);
		// curl_setopt($ch, CURLOPT_HEADER, 0);
		// curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$val = $secret;
		// curl_close($ch);
		$cor_code = $val;
		
		if (check_admin_referer('ois_validation', 'validate')) {
			if ($_POST['ois_validation_input'] == $cor_code) {
				update_option('ois_validation', 'yes');

				$cur_location = explode("?", $_SERVER['REQUEST_URI']);
				$new_location =
					'http://' . $_SERVER["HTTP_HOST"] . $cur_location[0] . '?page=addskin';
				echo '<script type="text/javascript">
						window.location = "' . $new_location . $updated_message . '";
					</script>';
			} else {
?>
				<div id="ois_validation_error_wrap" style="margin: 5px 0 10px 0;">
					<div id="ois_validation_info">That appears to be the incorrect key for your instance of OptinSkin. Please contact your supplier if you need assistance.</div>
				</div>
				<?php
			}
		}
	}
?>

	<style type="text/css">
	#ois_validation_form {
		-webkit-border-horizontal-spacing: 0px;
		-webkit-border-vertical-spacing: 0px;
		background-attachment: scroll;
		background-clip: border-box;
		background-color: transparent;
		background-image: -webkit-linear-gradient(top, rgb(255, 255, 255), rgb(224, 224, 224));
		background-image: -moz-linear-gradient(top,  rgb(255, 255, 255), rgb(224, 224, 224)) !important;
		background-origin: padding-box;
		background-repeat: repeat;
		border-radius: 2px;
		-webkit-border-radius:2px;
		-moz-border-radius:2px;
		border: 1px solid #CCC;
		color: #333;
		display: block;
		font-family: arial, sans-serif;
		font-size: 12px;
		font-style: normal;
		font-variant: normal;
		font-weight: normal;
		line-height: normal;
		margin: 9px 0 0 0;
		padding: 20px 30px;
		position: relative;
		width: 840px;
		zoom: 1;
	}
	#ois_validation_error_wrap {
		background-attachment: scroll;
		background-clip: border-box;
		background-color: #6683B3;
		background-image: -webkit-linear-gradient(top, #c47270 0px, #b25b59 100%);
 		background-image: -moz-linear-gradient(top,  #c47270, #b25b59) !important;
		background-origin: padding-box;
		background-repeat: repeat;
		border: none;
		-webkit-box-shadow: rgba(0, 0, 0, 0.496094) 0px 1px 1px 0px;
		box-shadow: rgba(0, 0, 0, 0.496094) 0px 1px 1px 0px;
		color: #333;
		display: block;
		font-family: arial, sans-serif;
		font-size: 12px;
		font-style: normal;
		font-variant: normal;
		font-weight: normal;
		padding: 9px;
		line-height: normal;
		margin: 0;
		padding: 0;
		text-align: left;
		width: 900px;
		border-radius:3px;
	}
	#ois_validation_info_wrap {
		background-attachment: scroll;
		background-clip: border-box;
		background-color: #6683B3;
		background-image: -webkit-linear-gradient(top, #6683b3 0px, #506ea0 100%);
 		background-image: -moz-linear-gradient(top,  #6683b3, #506ea0) !important;
		background-origin: padding-box;
		background-repeat: repeat;
		border: none;
		-webkit-box-shadow: rgba(0, 0, 0, 0.496094) 0px 1px 1px 0px;
		box-shadow: rgba(0, 0, 0, 0.496094) 0px 1px 1px 0px;
		color: #333;
		display: block;
		font-family: arial, sans-serif;
		font-size: 12px;
		font-style: normal;
		font-variant: normal;
		font-weight: normal;
		padding: 9px;
		line-height: normal;
		margin: 0;
		padding: 0;
		text-align: left;
		width: 900px;
		border-radius:3px;
	}
	#ois_validation_info {
		background-attachment: scroll;
		background-clip: border-box;
		background-color: transparent;
		background-image: none;
		background-origin: padding-box;
		background-repeat: repeat;
		border: none;
		color: white;
		display: block;
		font-family: arial, sans-serif;
		font-size: 13px;
		font-style: normal;
		font-variant: normal;
		font-weight: bold;
		line-height: normal;
		margin-bottom: 0px;
		margin-left: 0px;
		margin-right: 0px;
		margin-top: 0px;
		overflow-x: hidden;
		overflow-y: hidden;
		padding: 9px 40px;
		text-align: left;
		text-shadow: transparent 0px 0px 0px, rgba(0, 0, 0, 0.296875) 0px 0px 1px;
	}
	.ois_validation_input {
		-webkit-box-shadow: rgb(255, 255, 255) 0px 1px 0px 0px, rgba(0, 0, 0, 0.199219) 0px 1px 1px 0px inset;
		background-color: #F4F4F4;
		border: 1px solid #AAA;
		border-radius: 2px;
		box-shadow: rgb(255, 255, 255) 0px 1px 0px 0px, rgba(0, 0, 0, 0.199219) 0px 1px 1px 0px inset;
		color: #555;
		font-family: arial, sans-serif;
		font-size: 13px;
		font-style: normal;
		font-variant: normal;
		font-weight: normal;
		letter-spacing: normal;
		line-height: normal;
		margin: 0;
		padding: 6px 31px 6px 9px;
		text-indent: 0px;
		width: 236px;
	}
	.ois_validation_label {
		color: #333;
		font-family: arial, sans-serif;
		font-size: 13px;
		font-style: normal;
		font-variant: normal;
		font-weight: normal;
		line-height: normal;
		margin: 0 0 5px 0;
		text-align: left;
	}
	.ois_validation_title {
		color: #333;
		display: block;
		font-family: arial, sans-serif;
		font-size: 16px;
		font-style: normal;
		font-variant: normal;
		font-weight: bold;
		line-height: normal;
		margin: 0 0 20px 0;
	}
	.ois_validation_button {
		background: -moz-linear-gradient(top,  rgb(104, 231, 127),  rgb(48, 166, 85)) !important;
		background: -webkit-gradient(linear, left top, left bottom, from(rgb(104, 231, 127)), to(rgb(48, 166, 85))) !important;
		background-color: #30e77f !important; -webkit-box-shadow: rgba(255, 255, 255, 0.449219) 0px 1px 0px 0px inset !important;
		border: 1px solid #30a655 !important;
		color: #fff !important;
		text-shadow: transparent 0px 0px 0px, rgba(0, 0, 0, 0.449219) 0px 1px 0px !important;
		padding: 6px 8px;
		font-weight: bold;
		font-size: 12px;
	}
	.ois_validation_section {
		vertical-align: middle;
		padding-right: 10px;
	}
	</style>
	<div id="ois_validation_info_wrap">
		<div id="ois_validation_info">
			<div>Please complete and submit the form below to activate this plugin. This is to ensure that you have the latest version of OptinSkin.</div>
		</div>
	</div>
	<div id="ois_validation_form">
		<div class="ois_validation_title">Plugin Validation</div>
		<form method="post">
			<table>
				<tr>
					<td class="ois_validation_section">
						<span class="ois_validation_label">Your License Key:</span></td>
					<td class="ois_validation_section">
						<input type="text" name="ois_validation_input" class="ois_validation_input" /></td>
					<td class="ois_validation_section">
						<?php wp_nonce_field('ois_validation', 'validate'); ?>
						<input type="submit" value="Verify Your Plugin" class="ois_validation_button" /></td>
				</tr>
			</table>

		</form>
	</div>
	<?php
}
?>