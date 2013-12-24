<?php
include_once 'admin_functions.php';
function ois_designs_code() {
	$regular_fonts = array (
		'Arial',
		'Verdana',
		'Serif',
		'Georgia',
		'Helvetica',
	);
	$google_fonts = array (
		'Neuton',
		'Dancing Script',
		'Lobster',
		'Nobile',
		'Francois One',
		'Luckiest Guy',
		'PT Serif',
		'Open Sans',
		'Lora',
		'Ropa Sans',
		'Parisienne',
		'Asap',
		'Glegoo',
		'Droid Sans',
		'Ubuntu',
		'Arvo',
		'Coming Soon',
		'Lato',
		'The Girl Next Door',
		'Shadows Into Light',
		'Calligraffitti',
		'Crafty Girls',
		'Josefin Sans',
		'Marck Script',
		'Kaushan Script',
		'Condiment',
		'Kaushan Script',
		'Lilita One',
		'Kotta One',
		'Homenaje',
		'Cantarell',
		'Esteban',
		'Flamenco',
		'Cambo',
		'Fanwood Text',
		'Terminal Dosis',
		'Voces',
	);
	update_option('ois_google_fonts', $google_fonts);
	update_option('ois_regular_fonts', $regular_fonts);
	$social_buttons = new ois_social();
	$id = 1;
	$skin_1 = array(
		'title' => 'Simple Signup',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'html' => '
	<div class="ois_box_' . $id . '" style="' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . 'width: %box-width% !important; padding: %top-padding% 0 %bottom-padding% %left-padding% !important; border-radius: %border-radius% !important; -moz-border-radius: %-webkit-border-radius% !important; %border-radius% !important; border-color: %border-color% !important;">
		<div class="ois_title_' . $id . '" style="color: %title-font-color% !important; font-size: %title-font-size% !important; font-family: \'%title-font%\', Arial !important; padding-bottom: %title-padding-bottom% !important; text-align: %title-text-align% !important;">%title-text%</div>
		<div class="ois_subtitle_' . $id . '" style="color: %subtitle-font-color% !important;font-size: %subtitle-font-size% !important; font-family: \'%subtitle-font%\', Arial !important; padding-bottom: %subtitle-padding-bottom% !important;">%subtitle-text%</div>
		<div>
			%optin_form%
		</div>
	</div>
	<style type="text/css">
		.ois_button_1, .ois_box_1 input[type="submit"] {
			background-color: %button-bg%;
			border: 1px solid %button-border% !important;
			color: %button-text-color% !important;
		}
	</style>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_2.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				'name' => '',
				'email' => 'Your Email Address',
			),
			'labels' => array (
				//'name' => 'Your Name',
				//'email' => 'Your Email Address',
			),
			'button_value' => 'Get Updates',
			'force_break' => 'yes',
		),
		'enable_name' => 'yes',
		'appearance' => array (
			'text' => array (
				'Title Font Color' => array (
					'attr' => 'title-font-color',
					'default' => '#000',
					'type' => 'color',
				),
				'Subtitle Font Color' => array (
					'attr' => 'subtitle-font-color',
					'default' => '#868181',
					'type' => 'color',
				),
				'Background Top Gradient' => array (
					'attr' => 'background-top-gradient',
					'default' => '#fafafa',
					'type' => 'color',
				),
				'Background Bottom Gradient' => array (
					'attr' => 'background-bottom-gradient',
					'default' => '#e0e0e0',
					'type' => 'color',
				),
				'Border Color' => array (
					'attr' => 'border-color',
					'default' => '#D6D6D6',
					'type' => 'color',
				),
				'Button Background Color' => array (
					'attr' => 'button-bg',
					'default' => '#62ABD8',
					'type' => 'color',
				),
				'Button Border Color' => array (
					'attr' => 'button-border',
					'default' => '#10A0AE',
					'type' => 'color',
				),
				'Button Text Color' => array (
					'attr' => 'button-text-color',
					'default' => '#eee',
					'type' => 'color',
				),
				'Title Font' => array (
					'attr' => 'title-font',
					'default' => 'Glegoo',
					'type' => 'google_font',
				),
				'Subtitle Font' => array (
					'attr' => 'subtitle-font',
					'default' => 'Glegoo',
					'type' => 'google_font',
				),
				'Title Text' => ois_title_text('&quot;Get our updates, free!&quot;'),
				'Subtitle Text' => ois_subtitle_text('Never miss a blog post again'),
				'Title Font Size' => array (
					'attr' => 'title-font-size',
					'default' => '18px',
				),
				'Subtitle Font Size' => array (
					'attr' => 'subtitle-font-size',
					'default' => '14px',
				),
				'Top Inner Padding' => array (
					'attr' => 'top-padding',
					'default' => '15px',
				),
				'Left Inner Padding' => array (
					'attr' => 'left-padding',
					'default' => '15px',
				),
				'Bottom Inner Padding' => array (
					'attr' => 'bottom-padding',
					'default' => '15px',
				),
				'Padding Beneath Title' => array (
					'attr' => 'title-padding-bottom',
					'default' => '10px',
				),
				'Padding Beneath Subtitle' => array (
					'attr' => 'subtitle-padding-bottom',
					'default' => '10px',
				),
				'Button Text' => ois_button_text('Subscribe Now'),
				'Width' => ois_box_width('280px'),	
				'Title Text Align' => array (
					'attr' => 'title-text-align',
					'default' => 'center',
					'values' => array (
						'Left' => 'left',
						'Center' => 'center',
						'Right' => 'right',
					),
					'type' => 'dropdown',
				),
				'Rounded Corners (Border Radius)' => array (
					'attr' => 'border-radius',
					'default' => '4px',
				),
				'Email Placeholder' => ois_email_placeholder('Your Email Address'),
				'Email Width' => ois_email_width('220px'),
			),
		),
	);
	$id = 2;
	$skin_15 = array (
		'html' => '<div class="ois_box_' . $id . '" style="%background-style%">
			<div class="ois_title_' . $id . '">%title-text%</div>
			<div class="ois_subtext_' . $id . '">%subtext%</div>
			%optin_form%
		</div>',
		'title' => 'Prestyled',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_15.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				'name' => 'enter your name',
				'email' => 'enter your email',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'yes',
		),
		'enable_name' => 'yes',
		'appearance' => array (
			'text' => array (
				'Style' => array (
					'attr' => 'background-style',
					'default' => ois_vertical_gradient('rgb(102, 131, 179)', 'rgb(80, 110, 160)'),
					'values' => array (
						'Blue' => ois_vertical_gradient('rgb(102, 131, 179)', 'rgb(80, 110, 160)'),
						'Purple' => ois_vertical_gradient('rgb(118, 102, 179)', 'rgb(96, 80, 160)'),
						'Green' => ois_vertical_gradient('rgb(102, 179, 108)', '#50a056'),
						'Red' => ois_vertical_gradient('rgb(196, 114, 112)', 'rgb(178, 91, 89)'),
						'Pink' => ois_vertical_gradient('rgb(184, 105, 146)', 'rgb(165, 83, 126)'),
						'Orange' => ois_vertical_gradient('rgb(224, 138, 37)', 'rgb(224, 138, 37)'),
					),
					'type' => 'dropdown',
				),
				'Title Text' => ois_title_text('Sign up to my newsletter'),
				'Subtext Content' => array (
					'attr' => 'subtext',
					'default' => 'All that glitters is not gold; not all who wander are lost.',
					'type' => 'textarea',
					'height' => '50px',
					'width' => '350px',
				),
				'Button Text' => ois_button_text('Sign Up'),
				'Email Placeholder' => ois_email_placeholder('enter your email'),
				'Name Placeholder' => ois_name_placeholder('enter your name'),
				'Name Width' => ois_name_width('175px'),
				'Email Width' => ois_email_width('175px'),
			),
		),
	);
	$id = 3;
	$skin_3 = array(
		'title' => 'Elegant Signup Form 1',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				'name' => 'Your Name',
				'email' => 'Your Email',
			),
			'labels' => array (
			),
			'button_value' => 'Subscribe Now'
		),
		'force_break' => 'yes',
		'html' => '<div class="ois_inner_wrap_' . $id . '" style="' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . 'width: %box-width% !important;">
		<div class="ois_inner_' . $id . '">
    <h1 style="color:%title-color% !important; text-shadow: %title-text-shadow-color% 0 1px 0 !important;">%title-text%</h1>
    <h2 style="color:%subtitle-color% !important; text-shadow: %subtitle-text-shadow-color% 0 1px 0 !important;">%subtitle%</h2>
    %optin_form%
  </div>
 </div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_3.css',
		'appearance' => array (
			'text' => array (
				'Background Top Gradient' => array (
					'attr' => 'background-top-gradient',
					'default' => '#f8f8f8',
					'type' => 'color',
				),
				'Background Bottom Gradient' => array (
					'attr' => 'background-bottom-gradient',
					'default' => '#f8f8f8',
					'type' => 'color',
				),
				'Title Color' => array(
					'attr' => 'title-color',
					'default' => '#333',
					'type' => 'color',
				),
				'Subtitle Color' => array(
					'attr' => 'subtitle-color',
					'default' => '#ffc600',
					'type' => 'color',
				),
				'Title' => ois_title_text('Stay in touch'),
				'Subtitle' => array(
					'attr' => 'subtitle',
					'default' => 'Sign up for free updates',
					'text-width' => '250px',
				),
				'Title Text Shadow' => array(
					'attr' => 'title-text-shadow-color',
					'default' => '#fff',
					'type' => 'color',
				),
				'Subtitle Text Shadow' => array(
					'attr' => 'subtitle-text-shadow-color',
					'default' => '#fff',
					'type' => 'color',
				),
				'Width' => ois_box_width('312px'),
				'Button Text' => ois_button_text('Subscribe Now'),
				'Name Placeholder' => ois_name_placeholder('Your Name'),
				'Email Placeholder' => ois_email_placeholder('Your Email'),
				'Name Width' => ois_name_width('296px'),
				'Email Width' => ois_email_width('296px'),
			),
		),
	);
	$id = 4;
	$skin_4 = array(
		'title' => 'Elegant Signup Form 2',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				'name' => 'Your Name',
				'email' => 'Email Address',
			),
			'labels' => array (
			),
			'button_value' => 'Sign Up Now'
		),
		'force_break' => 'yes',
		'html' => '<div class="ois_inner_wrap_' . $id . '" style="' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . 'text-align:left !important; background-color:%background-color% !important; width: %box-width% !important;"><div class="ois_title_' . $id . '" style="line-height: %title-font-size% !important; font-size: %title-font-size% !important;color:%title-color% !important;font-family: \'%title-font%\', Lucida Grande, sans-serif !important;">%title%</div><div class="ois_subtitle_' . $id . '" style="line-height: %subtitle-font-size% !important;font-size: %subtitle-font-size% !important;font-family: \'%subtitle-font%\', Lucida Grande, sans-serif !important;color:%subtitle-color% !important;">%subtitle%</div>%optin_form%</div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_4.css',
		'appearance' => array (
			'text' => array (
				'Background Top Gradient' => array (
					'attr' => 'background-top-gradient',
					'default' => '#acc7df',
					'type' => 'color',
				),
				'Background Bottom Gradient' => array (
					'attr' => 'background-bottom-gradient',
					'default' => '#7e97ad',
					'type' => 'color',
				),
				'Title Color' => array(
					'attr' => 'title-color',
					'default' => '#fff',
					'type' => 'color',
				),
				'Subtitle Color' => array(
					'attr' => 'subtitle-color',
					'default' => '#f8e082',
					'type' => 'color',
				),
				'Title Font' => array (
					'attr' => 'title-font',
					'default' => 'Droid Sans',
					'type' => 'google_font'
				),
				'Subtitle Font' => array (
					'attr' => 'subtitle-font',
					'default' => 'Droid Sans',
					'type' => 'google_font'
				),
				'Title Font Size' => array (
					'attr' => 'title-font-size',
					'default' => '20px',
				),
				'Subtitle Font Size' => array (
					'attr' => 'subtitle-font-size',
					'default' => '16px',
				),
				'Title Text' => array(
					'attr' => 'title',
					'default' => 'Get Our Free eBook',
					'text-width' => '250px',
				),
				'Subtitle Text' => array(
					'attr' => 'subtitle',
					'default' => 'Easy Weight Loss in 7 Steps',
					'text-width' => '250px',
				),
				'Button Text' => ois_button_text('Sign Up Now'),
				'Width' => ois_box_width('300px'),
				'Name Placeholder' => ois_name_placeholder('Your Name'),
				'Email Placeholder' => ois_email_placeholder('Email Address'),
				'Name Width' => ois_name_width('250px'),
				'Email Width' => ois_email_width('250px'),
			),
		),
	);

	$id = 5;
	$skin_5 = array (
		'title' => 'Horizontal Social and Signup 1',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'button_value' => 'Sign Up Now'
		),
		'social_media' => array (
			'facebook', 'twitter', 'gplus', 'stumbleupon', 'linkedin', 'reddit',
		),
		'force_break' => 'yes',
		'css_url' => OptinSkin_URL . '/skins/css/design_5.css',
		'html' => '<div class="ois_box_' . $id . '" style="border: 1px solid %outer-border-color% !important;background-color: %background-color% !important;width:%box-width% !important;">
	<div class="ois_wrap_' . $id . '" >
	<table style="">
		<tr style="border: none !important;">
			<td style="border-right: 1px dashed %separator-color% !important; height: 160px !important; vertical-align:top !important; width: 280px !important;">
				<div class="ois_title_' . $id . '" style="font-size: %title-font-size% !important; color:%title-color% !important; font-family: \'%google-font%\', Arial !important; margin-bottom:10px !important;">%left-title%</div>
				<table>
					<tr>
						<td style="width:50%;">
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_fbLike() . '</div>
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_retweet() . '</div>
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_gplus() . '</div>
						</td>
						<td>
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_stumbleupon() . '</div>
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_linkedin() . '</div>
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_reddit() . '</div>
						</td>
					</tr>
				</table>
			</td>
			<td style="border-top: none !important; border-bottom:none !important; vertical-align:top !important; padding-left: 25px !important;">
				<div class="ois_title_' . $id . '" style="font-size: %title-font-size% !important; font-family: \'%google-font%\', Arial !important; color:%title-color% !important">%right-title%</div>
				%optin_form%
			</td>
		</tr>
	</table>
	</div>
</div>',
		'css' => '',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				'name' => 'Your Name',
				'email' => 'Email Address',
			),
			'labels' => array (
			),
			'button_value' => 'Sign Up Now',
			'force_break' => 'yes',
		),
		'appearance' => array (
			'text' => array (
				'Left Title Text' => array(
					'attr' => 'left-title',
					'default' => 'Share the Love',
					'text-width' => '250px',
				),
				'Right Title Text' => array(
					'attr' => 'right-title',
					'default' => 'Get Free Updates',
					'text-width' => '250px',
				),
				'Button Text' => ois_button_text('Sign Up Now'),
				'Width' => ois_box_width('580px'),
				'Background Color' => array(
					'attr' => 'background-color',
					'default' => '#f3f3f3',
					'type' => 'color',
				),
				'Title Color' => array(
					'attr' => 'title-color',
					'default' => '#0e4a66',
					'type' => 'color',
				),
				'Title Font' => array (
					'attr' => 'google-font',
					'default' => 'PT Serif',
					'type' => 'google_font',
				),
				'Title Font-Size' => array (
					'attr' => 'title-font-size',
					'default' => '23px',
				),
				'Separator Color' => array(
					'attr' => 'separator-color',
					'default' => '#ccc',
					'type' => 'color',
				),
				'Outer-Border Color' => array(
					'attr' => 'outer-border-color',
					'default' => '#e7e7e7',
					'type' => 'color',
				),
				'Name Placeholder' => ois_name_placeholder('Your Name'),
				'Email Placeholder' => ois_email_placeholder('Email Address'),
				'Name Width' => ois_name_width('200px'),
				'Email Width' => ois_email_width('200px'),
			),
		),
	);

	$id = 6;
	$skin_6 = array(
		'title' => 'Horizontal Social and Signup 2',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'button_value' => 'Sign Up Now'
		),
		'css' => '',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				'name' => 'Your Name',
				'email' => 'Email Address',
			),
			'labels' => array (
			),
			'button_value' => 'Sign Up Now',
			'force_break' => 'yes',
		),
		'social_media' => array (
			'facebook', 'twitter', 'gplus', 'stumbleupon',
		),
		'css_url' => OptinSkin_URL . '/skins/css/design_6.css',
		'appearance' => array (
			'text' => array (
				'Left Title Text' => array(
					'attr' => 'title-left',
					'default' => 'Share the Love',
					'text-width' => '250px',
				),
				'Right Title Text' => array(
					'attr' => 'title-right',
					'default' => 'Get Free Updates',
					'text-width' => '250px',
				),
				'Background Gradient Top Color' => array(
					'attr' => 'background-top-gradient',
					'default' => '#545554',
					'type' => 'color'
				),
				'Background Gradient Bottom Color' => array(
					'attr' => 'background-bottom-gradient',
					'default' => '#000',
					'type' => 'color'
				),
				'Title Color' => array(
					'attr' => 'title-color',
					'default' => '#ffd21f',
					'type' => 'color'
				),
				'Title Font' => array (
					'attr' => 'google-font',
					'default' => 'Lobster',
					'type' => 'google_font',
				),
				'Title Font-Size' => array (
					'attr' => 'title-font-size',
					'default' => '23px',
				),
				'Button Text' => ois_button_text('Sign Up Now'),
				'Width' => ois_box_width('520px'),
				'Border Radius (rounded corners)' => array (
					'attr' => 'border-radius',
					'default' => '3px',
				),
				'Space Above Underscore' => array (
					'attr' => 'underscore-margin-top',
					'default' => '0px',
				),
				'Underscore Image (url or blank)' => array(
					'attr' => 'underscore-image',
					'default' =>  OptinSkin_URL . '/front/images/underscore.png',
					'text-width' => '380px',
				),
				'Email Placeholder' => ois_email_placeholder('Email Address'),
				'Name Placeholder' => ois_name_placeholder('Your Name'),
				'Name Width' => ois_name_width('180px'),
				'Email Width' => ois_email_width('180px'),
			),
		),
		'html' => '<div class="ois_box_' . $id . '" style="border-radius: %border-radius% !important; -moz-border-radius:%border-radius% !important; -webkit-border-radius: %border-radius% !important; width: %box-width% !important;' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . '">
<table style="width: 100%; height: 100%:" class="ois_table_' . $id . '">
	<tr>
		<td style="width: 50%; text-align:center;" class="ois_outer_column_' . $id . '">
		<div>
			<div class="ois_title_' . $id . '" style="font-size: %title-font-size% !important; color:%title-color% !important; font-family: \'%google-font%\', Arial !important;">%title-left%</div>
			<div class="ois_underscore" style="margin-top: %underscore-margin-top% !important;">
				<img src="%underscore-image%" />
			</div></div></td>
		<td style="text-align:center;" class="ois_outer_column_' . $id . '">
			<div>
			<div class="ois_title_' . $id . '" style="font-size: %title-font-size% !important; color:%title-color% !important; font-family: \'%google-font%\', Arial !important;">%title-right%</div>
			<div class="ois_underscore" style="margin-top: %underscore-margin-top% !important;">
				<img src="%underscore-image%" />
			</div></div></td>
	</tr>
	<tr>
		<td class="ois_inner_column_' . $id . '" style="vertical-align:middle !important;">
			<table class="ois_sm_button_wrapper_' . $id . '" >
				<tr>
				<td class="ois_sm_button_' . $id . '">' . $social_buttons->ois_fb_box() . '</td>
				<td class="ois_sm_button_' . $id . '">' . $social_buttons->ois_gplus_box() . '</td>
				<td class="ois_sm_button_' . $id . '">' . $social_buttons->ois_twitter_box() . '</td>
				<td class="ois_sm_button_' . $id . '">' . $social_buttons->ois_stumbleupon_box() . '</td>
				</tr>
			</table>
		</td><td class="ois_inner_column_' . $id . '" style="vertical-align:top !important; padding-top: 5px;">%optin_form%</td></tr>
</table>
</div>',
	);
	$id = 7;
	$skin_7 = array(
		'title' => 'Longer Subtext Signup',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'html' => '<div class="ois_box_' . $id . '" style="background-color: %background-color% !important; border: 1px solid %border-color% !important;
		width: %box-width% !important;">
	    	<div class="ois_title_' . $id . '" style="font-size: %title-font-size% !important; color: %title-color% !important;font-family: \'%title-font%\', Lucida Grande, sans-serif !important;">%title-text%</div>
	    	<div class="ois_subtitle_' . $id . '" style="font-size: %subtitle-font-size% !important; color: %subtitle-color% !important; font-family: \'%subtitle-font%\', Lucida Grande, sans-serif !important;">%subtitle-text%</div>
		    <div class="ois_fieldset_' . $id . '">
			    %optin_form%
			</div>
			<div class="ois_subtext_' . $id . '" style="font-size: %subtext-font-size% !important;color: %subtext-color% !important;font-family: \'%subtext-font%\', Lucida Grande, sans-serif !important;">%subtext-text%</div>
	    </div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_7.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				'name' => 'Your Name',
				'email' => 'Your Email',
			),
			'labels' => array (
			),
			'button_value' => 'Subscribe Now',
			'force_break' => 'yes',
		),
		'enable_name' => 'yes',
		'appearance' => array (
			'text' => array (
				'Background Color' => array (
					'attr' => 'background-color',
					'default' => '#fbfafa',
					'type' => 'color',
				),
				'Border Color' => array (
					'attr' => 'border-color',
					'default' => '#e0e0e0',
					'type' => 'color',
				),
				'Title Color' => array (
					'attr' => 'title-color',
					'default' => '#0c7904',
					'type' => 'color',
				),
				'Subtitle Color' => array (
					'attr' => 'subtitle-color',
					'default' => '#666',
					'type' => 'color',
				),
				'Subtext Color Color' => array (
					'attr' => 'subtext-color',
					'default' => '#666',
					'type' => 'color',
				),
				'Title Font' => array (
					'attr' => 'title-font',
					'default' => 'Homenaje',
					'type' => 'google_font',
				),
				'Title Font Size' => array (
					'attr' => 'title-font-size',
					'default' => '26px',
				),
				'Subtitle Font' => array (
					'attr' => 'subtitle-font',
					'default' => 'Homenaje',
					'type' => 'google_font',
				),
				'Subtitle Font Size' => array (
					'attr' => 'subtitle-font-size',
					'default' => '14px',
				),
				'Subtext Font' => array (
					'attr' => 'subtext-font',
					'default' => 'Open Sans',
					'type' => 'google_font',
				),
				'Subtext Font Size' => array (
					'attr' => 'subtext-font-size',
					'default' => '13px',
				),
				'Title Text' => ois_title_text('Get our Free "Golf" eBook'),
				'Subtitle Text' => ois_subtitle_text('Enter your details below for instant download'),
				'Subtext Content' => array (
					'attr' => 'subtext-text',
					'default' => 'You\'ll receive no more than two emails per week, and we hate spam just as much as you',
					'type' => 'textarea',
					'height' => '50px',
					'width' => '350px',
				),
				'Width' => ois_box_width('250px'),
				'Email Placeholder' => ois_email_placeholder('Email Address'),
				'Name Placeholder' => ois_name_placeholder('Your Name'),
				'Name Width' => ois_name_width('180px'),
				'Email Width' => ois_email_width('180px'),
			),
		),
	);
	$id = 8;
	$skin_8 = array(
		'title' => 'Horizontal Share',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'social_media' => array (
			'facebook', 'twitter', 'gplus', 'stumbleupon', 'linkedin', 'reddit',
		),
		'html' => '<div class="ois_box_' . $id . '" style="width: %box-width% !important; padding-top: %top-padding% !important; padding-left: %left-padding% !important; background-color: %background-color% !important; border-radius: %border-radius% !important; -moz-border-radius: %border-radius% !important; -webkit-border-radius: %border-radius% !important; border-width: %border-width% !important; border-style: %border-style% !important; border-color: %border-color% !important;">
		<table>
			<tr>
				<td>
					<div class="ois_title_' . $id . '" style="text-shadow: %text-shadow-color% 0px 1px 0px !important; font-size: %title-font-size% !important; font-family: \'%google-font%\', Arial !important; color:%title-color% !important">%left-title-text%</div>
					<table style="width:350px !important;">
						<tr>
							<td>
								<div class="ois_sb_' . $id . '">' . $social_buttons->ois_fbLike() . '</div>
							</td>
							<td>
								<div class="ois_sb_' . $id . '">' . $social_buttons->ois_retweet() . '</div>
							</td>
							<td>
								<div class="ois_sb_' . $id . '">' . $social_buttons->ois_gplus() . '</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="ois_sb_' . $id . '">' . $social_buttons->ois_stumbleupon() . '</div>
							</td>
							<td>
								<div class="ois_sb_' . $id . '">' . $social_buttons->ois_linkedin() . '</div>
							</td>
							<td>
								<div class="ois_sb_' . $id . '" style="width: 120px !important;">' . $social_buttons->ois_reddit() . '</div>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<div class="ois_title_' . $id . '" style="text-shadow: %text-shadow-color% 0px 1px 0px !important; font-size: %title-font-size% !important; font-family: \'%google-font%\', Arial !important; color:%title-color% !important">%right-title-text%</div>
					<div style="padding-left: 15px;">
						%optin_form%
					</div>
				</td>
			</tr>
			</table>
		</div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_8.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				'email' => 'Your Email',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => 'Subscribe Now',
			'force_break' => 'yes',
		),
		'enable_name' => 'yes',
		'appearance' => array (
			'text' => array (
				'Background Color' => array (
					'attr' => 'background-color',
					'default' => '#fff',
					'type' => 'color',
				),
				'Border Color' => array (
					'attr' => 'border-color',
					'default' => '#e5e5e5',
					'type' => 'color',
				),
				'Border Width' => array (
					'attr' => 'border-width',
					'default' => '2px',
				),
				'Border Style' => array (
					'attr' => 'border-style',
					'default' => 'dashed',
					'values' => array (
						'Solid' => 'solid',
						'Dashed' => 'dashed',
						'Dotted' => 'dotted',
						'No Border' => 'none',
					),
					'type' => 'dropdown',
				),
				'Title Color' => array(
					'attr' => 'title-color',
					'default' => '#9f1e1e',
					'type' => 'color',
				),
				'Title Font' => array (
					'attr' => 'google-font',
					'default' => 'Cambo',
					'type' => 'google_font',
				),
				'Title Font-Size' => array (
					'attr' => 'title-font-size',
					'default' => '23px',
				),
				'Border Radius' => array (
					'attr' => 'border-radius',
					'default' => '3px',
				),
				'Text-Shadow Color' => array(
					'attr' => 'text-shadow-color',
					'default' => '#e5e1e1',
					'type' => 'color',
				),
				'Left Title Text' => array (
					'attr' => 'left-title-text',
					'default' => 'Share This Content',
					'text-width' => '250px',
				),
				'Right Title Text' => array (
					'attr' => 'right-title-text',
					'default' => 'Subscribe to Updates',
					'text-width' => '250px',
				),
				'Width' => ois_box_width('600px'),
				'Top Inner Padding' => array (
					'attr' => 'top-padding',
					'default' => '5px',
				),
				'Left Inner Padding' => array (
					'attr' => 'left-padding',
					'default' => '15px',
				),
				'Button Text' => ois_button_text('Sign Up Now'),
				'Email Placeholder' => ois_email_placeholder('Your Email Address'),
				'Email Width' => ois_email_width('180px'),
			),
		),
	);
	$id = 9;
	$skin_9 = array (
		'title' => 'Banner 200',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'html' => '<div class="ois_box_' . $id . '" style="background-image: url(\'' . OptinSkin_URL . '/front/images/banner_200_bg.png\') !important;">
			<div class="ois_title_' . $id . '" style="padding-top: %title-padding-top% !important; text-transform: uppercase !important; color: #fff !important; font-size: %title-font-size% !important; font-family: \'%title-font%\', Arial !important;">%title-text%</div>
			<div style="padding-top: 25px !important; text-align: center !important;">
				%optin_form%
			</div>
			</div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_9.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				'name' => 'Your Name',
				'email' => 'Email Address',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => 'Subscribe Now',
			'force_break' => 'yes',
		),
		'enable_name' => 'yes',
		'appearance' => array (
			'text' => array (
				'Button Text' => ois_button_text('Get Updates'),
				'Title Font' => array (
					'attr' => 'title-font',
					'default' => 'Ubuntu',
					'type' => 'google_font'
				),
				'Title Font Size' => array (
					'attr' => 'title-font-size',
					'default' => '24px',
				),
				'Space Above Title' => array (
					'attr' => 'title-padding-top',
					'default' => '20px',
				),
				'Title Text' => ois_title_text('Subscribe'),
				'Name Placeholder' => ois_name_placeholder('Your Name'),
				'Email Placeholder' => ois_email_placeholder('Email Address'),
				'Name Width' => ois_name_width('120px'),
				'Email Width' => ois_email_width('120px'),
			),
		),
	);

	$id = 10;
	$skin_10 = array (
		'title' => 'Like What You See?',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'html' => '<div class="ois_box_' . $id . '" style="background-color: %background-color% !important;background-image: url(\'' . OptinSkin_URL . '/front/images/like_what_you_see.png\') !important; height: 400px !important; width:200px !important;">
				<div>
				%optin_form%
				</div>
			</div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_10.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				//'name' => 'Your Name',
				//'email' => 'Email Address',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'yes',
		),
		'enable_name' => 'yes',
		'appearance' => array (
			'text' => array (
				'Background Color' => array (
					'attr' => 'background-color',
					'default' => '#efece8',
					'type' => 'color',
				),
				'Email Placeholder' => ois_email_placeholder('Email Address'),
				'Name Placeholder' => ois_name_placeholder('Your Name'),
				'Name Width' => ois_name_width('145px'),
				'Email Width' => ois_email_width('145px'),
			),
		),
	);
	$id = 11;
	$skin_11 = array (
		'title' => 'Subscribe to this blog',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'html' => '<div class="ois_box_' . $id . '" style="width:%box-width% !important;">
	<div class="ois_title_' . $id . '" style="font-family: \'%title-font%\', Arial !important; background-color:transparent !important;color:%title-font-color% !important;font-size: %title-font-size% !important; line-height:%title-font-size% !important;margin-bottom:%title-margin-bottom% !important;margin-top:10px;">%title-text%</div>
	<div class="ois_inner_' . $id . '" style="margin: 0 auto !important; border-radius: %border-radius% !important; -webkit-border-radius: %border-radius% !important; -moz-border-radius: %border-radius% !important; width: 95% !important;height:%box-height% !important;background-color: %inner-background-color% !important; text-align: center !important;">
		<div class="ois_subtitle_' . $id . '" style="font-family: \'%subtitle-font%\', Arial !important;padding-top:15px !important;color:%subtitle-font-color% !important;font-size: %subtitle-font-size% !important;">%subtitle-text%</div>
		<table style="width:500px !important;">
			<tr>
				<td><img src="%arrow-url%" class="ois_arrow_' . $id . '" style="padding: %form-padding% %arrow-padding% 0 20px !important;" /></td>
				<td style="vertical-align:top !important;">
					<div style="padding: %form-padding% 0 0 30px !important;">
						%optin_form%
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_11.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				//'name' => 'Your Name',
				'email' => 'Your Email Address',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'no',
		),
		'appearance' => array (
			'text' => array (
				'Title Font' => array (
					'attr' => 'title-font',
					'default' => 'Luckiest Guy',
					'type' => 'google_font'
				),
				'Subtitle Font' => array (
					'attr' => 'subtitle-font',
					'default' => 'Dancing Script',
					'type' => 'google_font'
				),
				'Inner Box Background Color' => array (
					'attr' => 'inner-background-color',
					'default' => '#fffad2',
					'type' => 'color',
				),
				'Title Font Color' => array(
					'attr' => 'title-font-color',
					'default' => '#525251',
					'type' => 'color',
				),
				'Subtitle Font Color' => array(
					'attr' => 'subtitle-font-color',
					'default' => '#83837d',
					'type' => 'color',
				),
				'Space Below Title' => array (
					'attr' => 'title-margin-bottom',
					'default' => '-10px',
				),
				'Title Font Size' => array (
					'attr' => 'title-font-size',
					'default' => '38px',
				),
				'Subtitle Font Size' => array (
					'attr' => 'subtitle-font-size',
					'default' => '19px',
				),
				'Arrow Type' => array (
					'attr' => 'arrow-url',
					'default' => OptinSkin_URL . '/front/images/arrows/arrow_3.png',
					'values' => array (
						'Arrow 1' => OptinSkin_URL . '/front/images/arrows/arrow_1.png',
						'Arrow 2' => OptinSkin_URL . '/front/images/arrows/arrow_2.png',
						'Arrow 3' => OptinSkin_URL . '/front/images/arrows/arrow_3.png',
						'Arrow 4' => OptinSkin_URL . '/front/images/arrows/arrow_4.png',
						'Arrow 5' => OptinSkin_URL . '/front/images/arrows/arrow_5.png',
					),
					'type' => 'dropdown',
				),
				'Extra Space Between Arrow and Textbox' => array (
					'attr' => 'arrow-padding',
					'default' => '20px',
				),
				'Title Text' => ois_title_text('&quot;Subscribe to the blog&quot;'),
				'Subtitle Text' => ois_subtitle_text('Receive an update straight to your inbox every time I publish a new article. Your email address will never be shared'),
				'Width' => ois_box_width('600px'),
				'Height' => array(
					'attr' => 'box-height',
					'default' => '115px',
				),
				'Extra Space Above Arrow and Textbox' => array (
					'attr' => 'form-padding',
					'default' => '20px',
				),
				'Border radius (rounded corners' => array (
					'attr' => 'border-radius',
					'default' => '2px'
				),
				'Button Text' => ois_button_text('Subscribe'),
				'Email Placeholder' => ois_email_placeholder('Your Name'),
				'Email Width' => ois_email_width('225px'),
			),
		),
	);
	$id = 12;
	$skin_12 = array (
		'title' => 'Simple Spread the Word',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'social_media' => array (
			'facebook', 'twitter', 'gplus', 'stumbleupon', 'linkedin',
		),
		'html' => '<div style="width: %box-width% !important;"><div class="ois_title_' . $id . '" style="color: %title-font-color% !important; font-size: %title-font-size% !important; line-height: %title-font-size% !important; font-family: \'%title-font%\', Arial !important;margin: 0 0 %title-margin% 0 !important; text-align: %title-align% !important;">%title-text%</div>
<div class="ois_box_' . $id . '" style="width:100% !important;background-color: %background-color% !important; height: 40px; border: 1px solid %border-color% !important; -webkit-box-shadow: rgba(0, 0, 0, 0.199219) 1px 2px 2px 1px; box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 2px 1px;">
<table style="width:100% !important; margin-top: 20px;">
	<tr>
		<td>
			<div class="ois_sb_' . $id . '" style="padding-left:10px !important;">' . $social_buttons->ois_fbLike() . '</div>
		</td>
		<td>
			<div class="ois_sb_' . $id . '">' . $social_buttons->ois_retweet() . '</div>
		</td>
		<td>
			<div class="ois_sb_' . $id . '">' . $social_buttons->ois_gplus() . '</div>
		</td>
		<td>
			<div class="ois_sb_' . $id . '">' . $social_buttons->ois_stumbleupon() . '</div>
		</td>
		<td>
			<div class="ois_sb_' . $id . '">' . $social_buttons->ois_linkedin() . '</div>
		</td>
	</tr>
</table>
</div></div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_12.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				//'name' => 'Your Name',
				'email' => 'Your Email Address',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'no',
		),
		'appearance' => array (
			'text' => array (
				'Title Font' => array (
					'attr' => 'title-font',
					'default' => 'Cambo',
					'type' => 'google_font'
				),
				'Title Font Size' => array (
					'attr' => 'title-font-size',
					'default' => '24px',
				),
				'Title Font Color' => array(
					'attr' => 'title-font-color',
					'default' => '#a9a9a9',
					'type' => 'color',
				),
				'Background Color' => array (
					'attr' => 'background-color',
					'default' => '#f7f7f7',
					'type' => 'color',
				),
				'Border Color' => array (
					'attr' => 'border-color',
					'default' => '#fff',
					'type' => 'color',
				),
				'Title Text' => ois_title_text('Enjoy this post? Please share the love...'),
				'Space Below Title' => array (
					'attr' => 'title-margin',
					'default' => '5px'
				),
				'Title Align' => array (
					'attr' => 'title-align',
					'default' => 'center',
					'values' => array (
						'Left' => 'left',
						'Center' => 'center',
						'Right' => 'right',
					),
					'type' => 'dropdown',
				),
				'Width' => ois_box_width('600px'),
			),
		),
	);
	$id = 13;
	$skin_13 = array (
		'title' => 'Like What You See?',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'social_media' => array (
			'facebook', 'twitter', 'gplus',
		),
		'html' => '
		<div class="ois_box_' . $id . '" style="width:%box-width% !important;">
			<div class="ois_main_title_' . $id . '" style="line-height: %main-title-size% !important;font-family: \'%main-title-font%\', Arial !important; text-align:center !important; margin-bottom: %space-below-main% !important; font-size: %main-title-size% !important; color: %title-color% !important;">%main-title-text%</div>
			<div class="ois_inner_' . $id . '" style="background-color: %background-color% !important; padding-top: %space-above-subtitles% !important;padding-bottom: %space-below% !important;">
				<table class="ois_outer_table_13" style="max-width: 100% !important; margin: 0 auto !important; ">
					<tr>
						<td class="ois_share_td_13" style="vertical-align:top !important;padding-right: 15px !important;">
							<div class="ois_title_' . $id . '" style="color: %subtitle-color% !important;font-family: \'%subtitle-font%\', Arial !important;padding-bottom: %space-below-subtitles% !important; font-size: %subtitle-size% !important;line-height: %subtitle-size% !important;">%left-subtitle-text%</div>
							<table>
								<tr>
									<td class="ois_sm_button_' . $id . '">' . $social_buttons->ois_fb_box() . '</td>
									<td class="ois_sm_button_' . $id . '">' . $social_buttons->ois_twitter_box() . '</td>
									<td class="ois_sm_button_' . $id . '">' . $social_buttons->ois_gplus_box() . '</td>
								</tr>
							</table>
						</td>
						<td class="ois_sign_td_13" style="padding-left:60px !important;vertical-align:top !important;">
							<div class="ois_title_' . $id . '" style="color: %subtitle-color% !important;font-family: \'%subtitle-font%\', Arial !important;padding-bottom: %space-below-subtitles% !important; font-size: %subtitle-size% !important;">%right-subtitle-text%</div>
							%optin_form%
						</td>
					</tr>
				</table>
			</div>
		</div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_13.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				//'name' => 'Your Name',
				'email' => 'Your Email Address',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'yes',
		),
		'enable_name' => 'yes',
		'appearance' => array (
			'text' => array (
				'Background Color' => array (
					'attr' => 'background-color',
					'default' => '#e4d2c9',
					'type' => 'color',
				),
				'Main Title Font Color' => array (
					'attr' => 'title-color',
					'default' => '#552d01',
					'type' => 'color',
				),
				'Subtitle Font Color' => array (
					'attr' => 'subtitle-color',
					'default' => '#943c08',
					'type' => 'color',
				),
				'Main Title Font' => array (
					'attr' => 'main-title-font',
					'default' => 'PT Serif',
					'type' => 'google_font'
				),
				'Subtitle Font' => array (
					'attr' => 'subtitle-font',
					'default' => 'Kaushan Script',
					'type' => 'google_font'
				),
				'Main Title Font Size' => array(
					'attr' => 'main-title-size',
					'default' => '26px',
				),
				'Subtitle Font Size' => array(
					'attr' => 'subtitle-size',
					'default' => '20px',
				),
				'Space Below Main Title Size' => array(
					'attr' => 'space-below-main',
					'default' => '0px',
				),
				'Space Above Subtitles' => array (
					'attr' => 'space-above-subtitles',
					'default' => '10px',
				),
				'Space Below Subtitles' => array (
					'attr' => 'space-below-subtitles',
					'default' => '10px',
				),
				'Main Title Text' => array (
					'attr' => 'main-title-text',
					'default' => 'Did you enjoy this article?',
					'text-width' => '300px',
				),
				'Left Subtitle Text' => array (
					'attr' => 'left-subtitle-text',
					'default' => 'Share the love',
					'text-width' => '300px',
				),
				'Right Subtitle Text' => array (
					'attr' => 'right-subtitle-text',
					'default' => 'Get free updates',
					'text-width' => '275px',
				),
				'Button Text' => ois_button_text('Subscribe'),
				'Width' => ois_box_width('600px'),
				'Extra Space at Bottom' => array (
					'attr' => 'space-below',
					'default' => '15px',
				),
				'Email Placeholder' => ois_email_placeholder('Your Email Address'),
				'Email Width' => ois_email_width('175px'),
			),
		),
	);
	$id = 14;
	$skin_14 = array (
		'title' => 'eBook',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_14.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				//'name' => 'Your Name',
				'email' => 'enter your email',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'yes',
		),
		'enable_name' => 'yes',
		'html' => '<div class="ois_box_' . $id . '" style="width: %box-width% !important;">
<div class="ois_title_' . $id . '" style="font-family: \'%main-title-font%\', Helvetica, Arial, sans-serif !important; color: %title-color% !important;text-align:center !important;font-size: %main-title-size% !important;line-height: %main-title-size% !important;margin-bottom: %below-main-title% !important;">%title-text%</div>
<div class="ois_inner_' . $id . '" style="padding-bottom: 10px !important; border-radius: %border-radius% !important; -moz-border-radius: %border-radius% !important; -webkit-border-radius: %border-radius% !important; overflow: visible !important;' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . '">
	<table style="width: 100%;overflow: visible !important;">
		<tr>
			<td style="vertical-align: top !important; width: 55%;">
				<table>
					<tr>
						<td><div class="ois_subtitle_' . $id . '" style="font-family: \'%subtitle-font%\', Helvetica, Arial, sans-serif !important;color: %subtitle-color% !important;padding: 15px 0 5px 5px; text-align:center !important;font-size: %subtitle-size% !important;line-height: %subtitle-size% !important;">%subtitle-text%</div></td>
					</tr>
					<tr>
						<td style="overflow: visible !important; vertical-align:top !important;"><div class="ois_subtext_' . $id . '" style="font-family: \'%subtext-font%\', Helvetica, Arial, sans-serif !important;color: %subtext-color% !important;padding: %above-subtext% 15px 0 15px !important; font-size: %subtext-size% !important;line-height:normal !important;text-align:%subtext-align% !important;">%subtext-content%</div></td>
						<td><img src="%arrow-url%" class="ois_arrow_' . $id . '" style="padding-top:25px;" /></td>
					</tr>
				</table>
			</td>
			<td style="text-align:center !important;overflow: visible !important;padding-left:15px !important;">
				<div style="text-align:center !important;"><img src="%product-image%" style="height: %product-image-height% !important; margin-top: -20px !important;z-index:200 !important;"/></div>
				%optin_form%
			</td>
		</tr>
	</table>
</div>
</div>
<style type="text/css">
.ois_button_' . $id . ' {
		' . ois_vertical_gradient('%button-top-gradient%', '%button-bottom-gradient%') . '
		border: none !important;
		color: %button-text-color% !important;
		padding-right: 10px!important;
		padding-left: 10px!important;
	}
</style>',
		'appearance' => array (
			'text' => array (
				'Background Top Gradient' => array (
					'attr' => 'background-top-gradient',
					'default' => '#fffdda',
					'type' => 'color',
				),
				'Background Bottom Gradient' => array (
					'attr' => 'background-bottom-gradient',
					'default' => '#fdf69b',
					'type' => 'color',
				),
				'Button Top Gradient' => array (
					'attr' => 'button-top-gradient',
					'default' => '#33a6ef',
					'type' => 'color',
				),
				'Button Bottom Gradient' => array (
					'attr' => 'button-bottom-gradient',
					'default' => '#176fb9',
					'type' => 'color',
				),
				'Button Text Color' => array (
					'attr' => 'button-text-color',
					'default' => '#ffe557',
					'type' => 'color',
				),
				'Main Title Font' => array (
					'attr' => 'main-title-font',
					'default' => 'Lobster',
					'type' => 'google_font'
				),
				'Subtitle Font' => array (
					'attr' => 'subtitle-font',
					'default' => 'Lobster',
					'type' => 'google_font'
				),
				'Subtext Font' => array (
					'attr' => 'subtext-font',
					'default' => 'Lora',
					'type' => 'google_font'
				),
				'Main Title Font Size' => array(
					'attr' => 'main-title-size',
					'default' => '36px',
				),
				'Subtitle Font Size' => array(
					'attr' => 'subtitle-size',
					'default' => '23px',
				),
				'Subtext Font Size' => array(
					'attr' => 'subtext-size',
					'default' => '13px',
				),
				'Main Title Color' => array (
					'attr' => 'title-color',
					'default' => '#717171',
					'type' => 'color',
				),
				'Subtitle Color' => array (
					'attr' => 'subtitle-color',
					'default' => '#a09d9d',
					'type' => 'color',
				),
				'Subtext Color' => array (
					'attr' => 'subtext-color',
					'default' => '#a09d9d',
					'type' => 'color',
				),
				'Title Text' => ois_title_text('Did you enjoy this article?'),
				'Subtitle Text' => ois_subtitle_text('&quot;Get my free profitable niche ideas eBook&quot;'),
				'Subtext Content' => array (
					'attr' => 'subtext-content',
					'default' => 'Add more text here to describe what your giveaway is about, while reminding people you won\'t spam or sell their email address',
					'type' => 'textarea',
					'height' => '50px',
					'width' => '350px',
				),
				'Subtext Alignment' => array (
					'attr' => 'subtext-align',
					'default' => 'left',
					'values' => array (
						'Left' => 'left',
						'Center' => 'center',
						'Right' => 'right',
					),
					'type' => 'dropdown',
				),
				'Space Above Subtext' => array (
					'attr' => 'above-subtext',
					'default' => '20px',
				),
				'Space Below Main Title' => array (
					'attr' => 'below-main-title',
					'default' => '20px',
				),
				'Product/Ebook Image' => array (
					'attr' => 'product-image',
					'default' => OptinSkin_URL . '/front/images/ebook.png',
					'text-width' => '350px',
				),
				'Product/Ebook Image Height' => array (
					'attr' => 'product-image-height',
					'default' => '90px'
				),
				'Arrow Type' => array (
					'attr' => 'arrow-url',
					'default' => OptinSkin_URL . '/front/images/arrows/arrow_3.png',
					'values' => array (
						'Arrow 1' => OptinSkin_URL . '/front/images/arrows/arrow_1.png',
						'Arrow 2' => OptinSkin_URL . '/front/images/arrows/arrow_2.png',
						'Arrow 3' => OptinSkin_URL . '/front/images/arrows/arrow_3.png',
						'Arrow 4' => OptinSkin_URL . '/front/images/arrows/arrow_4.png',
						'Arrow 5' => OptinSkin_URL . '/front/images/arrows/arrow_5.png',
					),
					'type' => 'dropdown',
				),
				'Button Text' => ois_button_text('FREE INSTANT ACCESS'),
				'Rounded Corners (border-radius)' => array (
					'attr' => 'border-radius',
					'default' => '2px',
				),
				'Width' => ois_box_width('600px'),
				'Email Placeholder' => ois_email_placeholder('Email Address'),
				'Email Width' => ois_email_width('175px'),
			),
		),
	);

	$id = 15;
	$skin_2 = array (
		'title' => 'Horizontal Bar Signup',
		'description' => 'Very simple sign up, should integrate easily into the your design.',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'html' => '<div style="border-radius: %border-radius% !important; -moz-border-radius: %-webkit-border-radius% !important;width:%width% !important; ' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . ' border: 2px %border-style% %border-color% !important; padding: %inner-padding% !important; font-family: \'%text-font%\', Helvetica, Arial, sans-serif !important;">
						<div style="text-align:center;">
							<span style="font-size: %font-size% !important; padding-right:10px; color:%text-color% !important;">%pre-form%</span>
							%optin_form%
							<span style="font-size: %font-size% !important; padding-left:10px;  color:%text-color% !important;">%post-form%</span>
						</div>
					</div>',
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_1.css',
		'id' => $id,
		'custom' => 'no',
		'appearance' => array (
			'text' => array (
				'Background Top Gradient' => array (
					'attr' => 'background-top-gradient',
					'default' => '#F9F3D9',
					'type' => 'color',
				),
				'Background Bottom Gradient' => array (
					'attr' => 'background-bottom-gradient',
					'default' => '#F9F3D9',
					'type' => 'color',
				),
				'Text Color' => array(
					'attr' => 'text-color',
					'default' => '#000',
					'type' => 'color',
				),
				'Text Font' => array (
					'attr' => 'text-font',
					'default' => 'Lora',
					'type' => 'google_font',
				),
				'Font Size' => array (
					'attr' => 'font-size',
					'default' => '13px',
				),
				'Border Style' => array (
					'attr' => 'border-style',
					'default' => 'dashed',
					'values' => array (
						'Solid' => 'solid',
						'Dashed' => 'dashed',
						'Dotted' => 'dotted',
						'No Border' => 'none',
					),
					'type' => 'dropdown',
				),
				'Border Color' => array(
					'attr' => 'border-color',
					'default' => '#FFCC02',
					'type' => 'color',
				),
				'Rounded Corners (border radius)' => array (
					'attr' => 'border-radius',
					'default' => '0px',
				),
				'Inner Padding' => array(
					'attr'=>'inner-padding',
					'default' => '5px',
				),
				'Width' => array(
					'attr'=>'width',
					'default' => '100%',
				),
				'Text before form' => array(
					'attr' => 'pre-form',
					'default' => 'Sign up for free updates',
					'text-width' => '250px',
				),
				'Text after form' => array(
					'attr' => 'post-form',
					'default' => 'No Spam Guarantee',
					'text-width' => '250px',
				),
				'Button Text' => ois_button_text('Subscribe Now'),
				'Email Placeholder' => ois_email_placeholder('Your Email Address'),
				'Email Width' => ois_email_width('175px'),
			),
		),
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				'name' => '',
				'email' => 'Your Email Address',
			),
			'labels' => array (
				'name' => '',
				'email' => '',
			),
			'button_value' => 'Subscribe Now'
		),
	);
	$id = 16;
	$skin_16 = array (
		'title' => 'Ribbon Banner',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_17.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'yes',
			'placeholders' => array (
				'name' => 'enter your name',
				'email' => 'enter your email',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'no',
			'maintain_line' => 'yes',
		),
		'html' => '<div class="ois_outer_' . $id . '" style="width:%box-width% !important;height:215px !important;">
	<div class="ois_border_' . $id . '" style="border:1px solid #b1b1b1 !important;">
	<div class="ois_inner_wrap_' . $id . '">
	<div class="ois_inner_' . $id . '">
		<div style="text-align:center !important;">
			<table style="width:100% !important;">
				<tr>
					<td style="text-align:center;vertical-align:top;">
						<div class="ois_title_' . $id . '" style="font-family: \'%title-font%\', Arial !important; color: %title-color% !important;font-size:%title-size%;padding: %title-pos-top% 0 %beneath-title% %title-pos-left%;">
							%title-text%
						</div>
						<div class="ois_subtext_' . $id . '" style="font-family: \'%subtext-font%\', Arial !important; color: %subtext-color% !important;font-size:%subtext-size%;padding-left:%subtext-pos-left%;">
							%subtext-content%
						</div>
					</td>
					<td>
						<img class="ois_ebook_' . $id . '" src="%product-url%" style="height:%product-height% !important;" />
					</td>
				</tr>
			</table>
		</div>
		<div class="ois_banner_wrap_' . $id . '">
		<div class="ois_form_wrap_' . $id . '" style="left:%form-position% !important;">
		%optin_form%
	</div>
	<img src="%ribbon-url%" style="width:100% !important;height:53px !important;position:absolute !important; z-index:2 !important;margin-left:3px !important;"/>
	</div>

	</div>
	<div style="margin-top:-36px !important;">
		<table style="margin: 0 auto !important;" class="ois_protected_' . $id . '">
			<tr>
				<td style="vertical-align:top !important;">
					<img src="' . OptinSkin_URL . '/front/images/lock.png" style="padding:0 15px 0 0;"/>
				</td>
				<td style="vertical-align:middle !important;">
					<div style="color:#6e6e6e !important;">We hate spam just as much as you</div>
				</td>
			</tr>
		</table>
		</div>
	</div>
	</div>
	</div>',
		'appearance' => array (
			'text' => array (
				'Title Font' => array (
					'attr' => 'title-font',
					'default' => 'Lora',
					'type' => 'google_font',
				),
				'Subtext Font' => array (
					'attr' => 'subtext-font',
					'default' => 'Ropa Sans',
					'type' => 'google_font',
				),
				'Title Color' => array (
					'attr' => 'title-color',
					'default' => '#2a6ab0',
					'type' => 'color',
				),
				'Subtext Color' => array (
					'attr' => 'subtext-color',
					'default' => '#4f5050',
					'type' => 'color',
				),
				'Ribbon Color' => array (
					'attr' => 'ribbon-url',
					'default' => OptinSkin_URL . '/front/images/ribbon_blue.png',
					'values' => array (
						'Blue' => OptinSkin_URL . '/front/images/ribbon_blue.png',
						'Red' => OptinSkin_URL . '/front/images/ribbon_red.png',
						'Black' => OptinSkin_URL . '/front/images/ribbon_black.png',
						'Green' => OptinSkin_URL . '/front/images/ribbon_green.png',
					),
					'type' => 'dropdown',
				),
				'Title Text' => ois_title_text('Learning about marketing?'),
				'Subtext Content' => array(
					'attr' => 'subtext-content',
					'default' => 'Your may be interested in my compelling eBook all about how to make sales fast',
					'type' => 'textarea',
					'height' => '50px',
					'width' => '350px',
				),
				'Title Size' => array (
					'attr' => 'title-size',
					'default' => '20px',
				),
				'Subtext Size' => array (
					'attr' => 'subtext-size',
					'default' => '17px',
				),
				'Title Position Left' => array(
					'attr' => 'title-pos-left',
					'default' => '35px',
				),
				'Title Position Top' => array(
					'attr' => 'title-pos-top',
					'default' => '20px',
				),
				'Space Beneath Title' => array (
					'attr' => 'beneath-title',
					'default' => '18px',
				),
				'Subtext Position Left' => array(
					'attr' => 'subtext-pos-left',
					'default' => '35px',
				),
				'Product Image URL' => array (
					'attr' => 'product-url',
					'default' => OptinSkin_URL . '/front/images/ribbon_book.png',
					'text-width' => '350px',
				),
				'Product Image Height' => array (
					'attr' => 'product-height',
					'default' => '139px',
				),
				'Width' => ois_box_width('620px'),
				'Form Position' => array(
					'attr' => 'form-position',
					'default' => '65px',
				),
				'Button Text' => ois_button_text('INSTANT ACCESS'),
				'Name Placeholder' => ois_name_placeholder('enter your name'),
				'Email Placeholder' => ois_email_placeholder('enter your email'),
				'Name Width' => ois_name_width('175px'),
				'Email Width' => ois_email_width('175px'),
			),
		),
	);
	$id = 17;
	$skin_17 = array (
		'title' => 'Clean Share and Optin',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_18.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				//'name' => 'enter your name',
				'email' => 'enter your email',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'no',
			'maintain_line' => 'yes',
		),
		'social_media' => array (
			'facebook', 'twitter', 'gplus',
		),
		'html' => '<div style="display:%browser-bar% !important; -webkit-box-shadow: 0px 2px 0px 0px rgba(0, 0, 0, 0.4);
-moz-box-shadow: 0px 2px 0px 0px rgba(0, 0, 0, 0.4);
box-shadow: 0px 2px 0px 0px rgba(0, 0, 0, 0.4);padding-left:%padding-left% !important;width:%box-width% !important;height:18px !important;display:block;' . ois_vertical_gradient('#eee', '#d6d6d6') . ' border:1px solid #b3b3b3 !important;border-top-right-radius:3px;border-top-left-radius:3px;border-bottom:none !important;"></div>
<div style="width:%box-width% !important;border-radius: %border-radius% !important; -moz-border-radius: %-webkit-border-radius% !important; %border-radius% !important;' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . ' border: 1px %border-style% %border-color% !important; padding: %padding-top% 0 %padding-top% %padding-left% !important;">
	<table>
		<tr>
			<td style="vertical-align:middle;">
				<table>
					<tr>
						<td class="ois_td_number_'.$id.'">
							<div style="position:relative;height:59px;width:81px;text-align:center;background-image:url(\'%circle%\') !important;background-repeat:no-repeat !important;">
							<span style="font-family: \'%number-font%\', Arial !important; font-size:%number-size% !important;!important;top:%number-top% !important;left:%number-left% !important;color: %number-color% !important;line-height:%number-size% !important;" class="ois_number_' . $id . '">1</span>
				</div>
						</td>
						<td style="vertical-align:middle !important;">
							<div style="font-size:%text-size% !important;font-family:%text-font% !important;line-height:normal !important;color: %heading-color% !important;padding-left: %heading-space-left% !important;">Share the Love</div>
						</td>
					</tr>
				</table>
			</td>
			<td style="vertical-align:middle !important;padding-left:5px;">
				<table>
					<tr>
						<td>
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_fbLike() . '</div>
						</td>
						<td>
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_retweet() . '</div>
						</td>
						<td>
							<div class="ois_sb_' . $id . '">' . $social_buttons->ois_gplus() . '</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td class="ois_td_number_' .$id. '">
							<div style="position:relative;height:59px;width:81px;text-align:center;background-image:url(\'%circle%\') !important;background-repeat:no-repeat !important;">
							<span style="font-family: \'%number-font%\', Arial !important; font-size:%number-size% !important;position:absolute !important;top:%number-top% !important;left:%number-left% !important;color: %number-color% !important;line-height:%number-size% !important;">2</span>
				</div>
						</td>
						<td style="vertical-align:middle !important;">
							<div style="font-size:%text-size% !important;font-family:%text-font% !important;line-height:normal !important;color: %heading-color% !important;padding-left: %heading-space-left% !important;">Get Free Updates</div>
						</td>
					</tr>
				</table>
			</td>
			<td style="vertical-align:middle;padding-left:25px;">
				%optin_form%
			</td>
		</tr>
	</table>
</div>',
		'appearance' => array (
			'text' => array (
				'Background Top Gradient' => array (
					'attr' => 'background-top-gradient',
					'default' => '#fff',
					'type' => 'color',
				),
				'Background Bottom Gradient' => array (
					'attr' => 'background-bottom-gradient',
					'default' => '#fff',
					'type' => 'color',
				),
				'Border Color' => array(
					'attr' => 'border-color',
					'default' => '#b3b3b3',
					'type' => 'color',
				),
				'Heading Color' => array (
					'attr' => 'heading-color',
					'default' => '#777',
					'type' => 'color',
				),
				'Numbers Color' => array (
					'attr' => 'number-color',
					'default' => '#777',
					'type' => 'color',
				),
				'Border Style' => array (
					'attr' => 'border-style',
					'default' => 'solid',
					'values' => array (
						'Solid' => 'solid',
						'Dashed' => 'dashed',
						'Dotted' => 'dotted',
						'No Border' => 'none',
					),
					'type' => 'dropdown',
				),
				'Browser Bar at Top' => array (
					'attr' => 'browser-bar',
					'default' => 'block',
					'values' => array (
						'Show' => 'block',
						'Hide' => 'none',
					),
					'type' => 'dropdown',
				),
				'Bullet Circle Style' => array (
					'attr' => 'circle',
					'default' => OptinSkin_URL . '/front/images/circle_1.png',
					'values' => array (
						'Simple Circle' => OptinSkin_URL . '/front/images/circle_1.png',
						'Emphasized Cirlce' => OptinSkin_URL . '/front/images/circle_2.png',
						'No Circle' => '',
					),
					'type' => 'dropdown',
				),
				'Heading Font Type' => array (
					'attr' => 'text-font',
					'default' => 'Dancing Script',
					'type' => 'google_font',
				),
				'Heading Size' => array (
					'attr' => 'text-size',
					'default' => '28px',
				),
				'Number Font Type' => array (
					'attr' => 'number-font',
					'default' => 'Lora',
					'type' => 'google_font',
				),
				'Number Font Size' => array (
					'attr' => 'number-size',
					'default' => '28px',
				),
				'Number Position from Top' => array (
					'attr' => 'number-top',
					'default' => '20px'
				),
				'Number Position from Left' => array (
					'attr' => 'number-left',
					'default' => '25px'
				),
				'Extra Space Left of Headings' => array (
					'attr' => 'heading-space-left',
					'default' => '15px',
				),
				'Button Text' => ois_button_text('Submit'),
				'Extra Space Above and Below' => array (
					'attr' => 'padding-top',
					'default' => '5px',
				),
				'Extra Space on Left' => array (
					'attr' => 'padding-left',
					'default' => '8px',
				),
				'Border Radius (rounded corners)' => array (
					'attr' => 'border-radius',
					'default' => '0px',
				),
				'Width' => ois_box_width('640px'),
				'Email Placeholder' => ois_email_placeholder('enter your email'),
				'Email Width' => ois_email_width('180px'),
			),
		),
	);

	$id = 18;
	$skin_18 = array (
		'title' => 'Clean Download Optin',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_19.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				//'name' => 'enter your name',
				'email' => 'Email Address',
			),
			'labels' => array (
				//'email' => 'Your Email',
			),
			'button_value' => '\'',
			'force_break' => 'no',
			'maintain_line' => 'yes',
		),

		'html' => '<div class="ois_outer_18" style="border:1px solid %border-color% !important;width:%box-width%!important;' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . '">
		<div class="ois_title_18" style="color:%title-color% !important;font-size: %title-size% !important;font-family: \'%title-font%\', Arial !important;">%title-text%</div>
		<div class="ois_subtext_18" style="color:%subtext-color% !important;font-size: %subtext-size% !important;font-family: \'%subtext-font%\', Arial !important;">%subtext%</div>

		%optin_form%
	</div>
	<style type="text/css">
		.ois_button_18 {
			%button-style%
		}
		.ois_textbox_18 {
			width: %textbox-width% !important;
		}
	</style>',
		'appearance' => array (
			'text' => array (
				'Background Top Gradient' => array (
					'attr' => 'background-top-gradient',
					'default' => '#fff',
					'type' => 'color',
				),
				'Background Bottom Gradient' => array (
					'attr' => 'background-bottom-gradient',
					'default' => '#fff',
					'type' => 'color',
				),
				'Border Color' => array (
					'attr' => 'border-color',
					'default' => '#bbb',
					'type' => 'color',
				),
				'Title Font' => array (
					'attr' => 'title-font',
					'default' => 'Lora',
					'type' => 'google_font',
				),
				'Subtext Font' => array (
					'attr' => 'subtext-font',
					'default' => 'Lora',
					'type' => 'google_font',
				),
				'Title Color' => array (
					'attr' => 'title-color',
					'default' => '#000',
					'type' => 'color',
				),
				'Subtext Color' => array (
					'attr' => 'subtext-color',
					'default' => '#555',
					'type' => 'color',
				),
				'Title Size' => array (
					'attr' => 'title-size',
					'default' => '16px',
				),
				'Subtext Size' => array (
					'attr' => 'subtext-size',
					'default' => '13px',
				),
				'Button Style' => array (
					'attr' => 'button-style',
					'default' => 'background: rgb(255,215,114) !important; background: -moz-linear-gradient(top, rgba(255,215,114,1) 0%, rgba(255,187,76,1) 100%) !important; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,215,114,1)), color-stop(100%,rgba(255,187,76,1))) !important; background: -webkit-linear-gradient(top, rgba(255,215,114,1) 0%,rgba(255,187,76,1) 100%) !important; background: -o-linear-gradient(top, rgba(255,215,114,1) 0%,rgba(255,187,76,1) 100%) !important; background: -ms-linear-gradient(top, rgba(255,215,114,1) 0%,rgba(255,187,76,1) 100%) !important; background: linear-gradient(top, rgba(255,215,114,1) 0%,rgba(255,187,76,1) 100%) !important; filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffd772\',endColorstr=\'#ffbb4c\',GradientType=0 ) !important; color: #a26533 !important; border: 1px solid #e5a53e !important;',
					'values' => array (
						'Orange' => 'background: rgb(255,215,114) !important; background: -moz-linear-gradient(top, rgba(255,215,114,1) 0%, rgba(255,187,76,1) 100%) !important; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,215,114,1)), color-stop(100%,rgba(255,187,76,1))) !important; background: -webkit-linear-gradient(top, rgba(255,215,114,1) 0%,rgba(255,187,76,1) 100%) !important; background: -o-linear-gradient(top, rgba(255,215,114,1) 0%,rgba(255,187,76,1) 100%) !important; background: -ms-linear-gradient(top, rgba(255,215,114,1) 0%,rgba(255,187,76,1) 100%) !important; background: linear-gradient(top, rgba(255,215,114,1) 0%,rgba(255,187,76,1) 100%) !important; filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffd772\',endColorstr=\'#ffbb4c\',GradientType=0 ) !important; color: #a26533 !important; border: 1px solid #e5a53e !important;',
						'Deep Red' => 'background: rgb(169,3,41) !important; background: -moz-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%) !important; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(169,3,41,1)), color-stop(44%,rgba(143,2,34,1)), color-stop(100%,rgba(109,0,25,1))) !important; background: -webkit-linear-gradient(top, rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%) !important; background: -o-linear-gradient(top, rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%) !important; background: -ms-linear-gradient(top, rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%) !important; background: linear-gradient(top, rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%) !important;filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#a90329\', endColorstr=\'#6d0019\',GradientType=0 ) !important; color: #f9f5f6 !important; border: 1px solid #6d0019 !important;',
						'Sky Blue' => 'background: rgb(254,255,255) !important; background: -moz-linear-gradient(top, rgba(254,255,255,1) 0%, rgba(221,241,249,1) 35%, rgba(160,216,239,1) 100%) !important; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(254,255,255,1)), color-stop(35%,rgba(221,241,249,1)), color-stop(100%,rgba(160,216,239,1))) !important; background: -webkit-linear-gradient(top, rgba(254,255,255,1) 0%,rgba(221,241,249,1) 35%,rgba(160,216,239,1) 100%) !important; background: -o-linear-gradient(top, rgba(254,255,255,1) 0%,rgba(221,241,249,1) 35%,rgba(160,216,239,1) 100%) !important; background: -ms-linear-gradient(top, rgba(254,255,255,1) 0%,rgba(221,241,249,1) 35%,rgba(160,216,239,1) 100%) !important; background: linear-gradient(top, rgba(254,255,255,1) 0%,rgba(221,241,249,1) 35%,rgba(160,216,239,1) 100%) !important; filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#feffff\', endColorstr=\'#a0d8ef\',GradientType=0 ) !important; color: #444 !important; border: 1px solid #c3e6f5 !important;',
						'Silver' => 'background: rgb(246,248,249) !important; background: -moz-linear-gradient(top, rgba(246,248,249,1) 0%, rgba(229,235,238,1) 50%, rgba(215,222,227,1) 51%, rgba(245,247,249,1) 100%) !important; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(246,248,249,1)), color-stop(50%,rgba(229,235,238,1)), color-stop(51%,rgba(215,222,227,1)), color-stop(100%,rgba(245,247,249,1))) !important; background: -webkit-linear-gradient(top, rgba(246,248,249,1) 0%,rgba(229,235,238,1) 50%,rgba(215,222,227,1) 51%,rgba(245,247,249,1) 100%) !important; background: -o-linear-gradient(top, rgba(246,248,249,1) 0%,rgba(229,235,238,1) 50%,rgba(215,222,227,1) 51%,rgba(245,247,249,1) 100%) !important; background: -ms-linear-gradient(top, rgba(246,248,249,1) 0%,rgba(229,235,238,1) 50%,rgba(215,222,227,1) 51%,rgba(245,247,249,1) 100%) !important; background: linear-gradient(top, rgba(246,248,249,1) 0%,rgba(229,235,238,1) 50%,rgba(215,222,227,1) 51%,rgba(245,247,249,1) 100%) !important; filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#f6f8f9\', endColorstr=\'#f5f7f9\',GradientType=0 ) !important; color: #444 !important; border: 1px solid #f5f7f9 !important;',
						'Pink' => 'background: rgb(252,236,252) !important; background: -moz-linear-gradient(top, rgba(252,236,252,1) 0%, rgba(251,166,225,1) 50%, rgba(253,137,215,1) 51%, rgba(255,124,216,1) 100%) !important; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,236,252,1)), color-stop(50%,rgba(251,166,225,1)), color-stop(51%,rgba(253,137,215,1)), color-stop(100%,rgba(255,124,216,1))) !important; background: -webkit-linear-gradient(top, rgba(252,236,252,1) 0%,rgba(251,166,225,1) 50%,rgba(253,137,215,1) 51%,rgba(255,124,216,1) 100%) !important; background: -o-linear-gradient(top, rgba(252,236,252,1) 0%,rgba(251,166,225,1) 50%,rgba(253,137,215,1) 51%,rgba(255,124,216,1) 100%) !important; background: -ms-linear-gradient(top, rgba(252,236,252,1) 0%,rgba(251,166,225,1) 50%,rgba(253,137,215,1) 51%,rgba(255,124,216,1) 100%) !important; background: linear-gradient(top, rgba(252,236,252,1) 0%,rgba(251,166,225,1) 50%,rgba(253,137,215,1) 51%,rgba(255,124,216,1) 100%) !important; filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#fcecfc\', endColorstr=\'#ff7cd8\',GradientType=0 ) !important; color: #9b086f !important; border: 1px solid #ffb9ea !important;',
						'Beige' => 'background: -moz-linear-gradient(top, rgba(252,255,244,1) 0%, rgba(233,233,206,1) 100%) !important; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,255,244,1)), color-stop(100%,rgba(233,233,206,1))) !important; background: -webkit-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(233,233,206,1) 100%) !important; background: -o-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(233,233,206,1) 100%) !important; background: -ms-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(233,233,206,1) 100%) !important; background: linear-gradient(top, rgba(252,255,244,1) 0%,rgba(233,233,206,1) 100%) !important; filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#fcfff4\', endColorstr=\'#e9e9ce\',GradientType=0 ) !important; color: #754f4f !important; border: 1px solid #e9e9ce !important;',
						'Yellow' => 'background: rgb(254,252,234) !important; background: -moz-linear-gradient(top, rgba(254,252,234,1) 0%, rgba(241,218,54,1) 100%) !important; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(254,252,234,1)), color-stop(100%,rgba(241,218,54,1))) !important; background: -webkit-linear-gradient(top, rgba(254,252,234,1) 0%,rgba(241,218,54,1) 100%) !important; background: -o-linear-gradient(top, rgba(254,252,234,1) 0%,rgba(241,218,54,1) 100%) !important; background: -ms-linear-gradient(top, rgba(254,252,234,1) 0%,rgba(241,218,54,1) 100%) !important; background: linear-gradient(top, rgba(254,252,234,1) 0%,rgba(241,218,54,1) 100%) !important; filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#fefcea\', endColorstr=\'#f1da36\',GradientType=0 ) !important; color: #a59100 !important; border: 1px solid #f1da36 !important;',
					),
					'type' => 'dropdown',
				),
				'Title Text' => ois_title_text('Want our free eBook? Keep reading...'),
				'Subtext Content' => array (
					'attr' => 'subtext',
					'default' => 'We\'ve written an amazing eBook about knitting that we think you\'ll love. Enter your email address below for instant access',
					'type' => 'textarea',
					'height' => '50px',
					'width' => '350px',
				),
				'Button Text' => ois_button_text('Download'),
				'Textbox Width' => array (
					'attr' => 'textbox-width',
					'default' => '300px',
				),
				'Width' => ois_box_width('480px'),
				'Email Placeholder' => ois_email_placeholder('Email Address'),
				'Email Width' => ois_email_width('300px'),
			),
		),
	);
	
	$id = 19;
	$skin_19 = array (
		'title' => 'Sidebar Optin with Product Image',
		'description' => '',
		'date_added' => date('Y-m-d H:i:s'),
		'last_modified' => date('Y-m-d H:i:s'),
		'css' => '',
		'css_url' => OptinSkin_URL . '/skins/css/design_20.css',
		'id' => $id,
		'custom' => 'no',
		'optin_settings' => array (
			'enable_name' => 'no',
			'placeholders' => array (
				//'name' => 'enter your name',
				'email' => 'Email Address',
			),
			'labels' => array (
			),
			'button_value' => '\'',
			'force_break' => 'no',
			'maintain_line' => 'no',
		),
		'html' => '<div class="ois_box_19" style="' . ois_vertical_gradient('%background-top-gradient%', '%background-bottom-gradient%') . 'border: 1px solid %border-color% !important;">
            	<table>
            		<tr>
            			<td style="vertical-align:middle!important;">
            				<img src="%product-url%" class="ois_product_19" />
            				<div class="ois_title_19" style="line-height: %title-height% !important;font-size: %title-size% !important;color:%title-color% !important; text-shadow: %title-text-shadow-color% 0 1px 0!important;font-family:\'%title-font%\',serif!important;">%title-text%</div>
            			</td>
            		</tr>
            	</table>
            	<div class="ois_inner_19">
            		%optin_form%
            	</div>
            	<div class="ois_outer_text_19" style="font-family:\'%subtext-font%\',serif!important;color:%subtext-color%!important;">%subtext-content%</div>
            </div>
            <style type="text/css">
            	.ois_button_19, .ois_box_19 input[type="submit"] {
            		background-color: %button-background-color% !important;
					border: 1px solid %button-border-color% !important;
					-webkit-box-shadow: 0px 1px 1px 0px %button-shadow-color% !important;
					-moz-box-shadow: 0px 1px 1px 0px %button-shadow-color% !important;
					box-shadow: 0px 1px 1px 0px %button-shadow-color% !important;
					color: %button-text-color% !important;
            	}
            	.ois_textbox_19, .ois_box_19 input[type="text"] {
            		border: 1px solid %title-text-shadow-color%  !important;
					background-color: #FAFAFA  !important;
	background-image: url(\'' . OptinSkin_URL . '/front/images/email 2.png\')  !important;
					-webkit-box-shadow: none !important;
					-moz-box-shadow: none !important;
					box-shadow: none !important;
            	}
            	.ois_textbox_19, .ois_box_19 input[type="text"]:focus {
            		border: 1px solid %title-text-shadow-color%  !important;
					-webkit-box-shadow: 1px 1px 1px 0px %title-text-shadow-color%,inset 0px 1px 1px 0px rgba(0, 0, 0, 0.0976562)  !important;
					-moz-box-shadow: 1px 1px 1px 0px %title-text-shadow-color%,inset 0px 1px 1px 0px rgba(0, 0, 0, 0.0976562)  !important;
					box-shadow: 1px 1px 1px 0px %title-text-shadow-color%,inset 0px 1px 1px 0px rgba(0, 0, 0, 0.0976562)  !important;
					-webkit-box-shadow: 1px 1px 1px 0px %textbox-shadow-color%,inset 0px 1px 1px 0px rgba(0, 0, 0, 0.0976562)  !important;
					-moz-box-shadow: 1px 1px 1px 0px %textbox-shadow-color%,inset 0px 1px 1px 0px rgba(0, 0, 0, 0.0976562)  !important;
					box-shadow: 1px 1px 1px 0px %textbox-shadow-color%,inset 0px 1px 1px 0px rgba(0, 0, 0, 0.0976562)  !important;

				}
            </style>
            ',
            'appearance' => array (
				'text' => array (
					'Background Top Gradient' => array (
						'attr' => 'background-top-gradient',
						'default' => '#93ccf1',
						'type' => 'color',
					),
					'Background Bottom Gradient' => array (
						'attr' => 'background-bottom-gradient',
						'default' => '#0e79be',
						'type' => 'color',
					),
					'Title Font' => array(
						'attr' => 'title-font',
						'default' => 'Lobster',
						'type' => 'google_font',
					),
					'Subtext Font' => array(
						'attr' => 'subtext-font',
						'default' => 'Voces',
						'type' => 'google_font',
					),
					'Title Font Size' => array (
						'attr' => 'title-size',
						'default' => '24px',
					),
					'Title Line Height' => array (
						'attr' => 'title-height',
						'default' => '28px',
					),
					'Title Color' => array(
						'attr' => 'title-color',
						'default' => '#fff',
						'type' => 'color',
					),
					'Title Text Shadow' => array(
						'attr' => 'title-text-shadow-color',
						'default' => '#0e79be',
						'type' => 'color',
					),
					'Subtext Color' => array(
						'attr' => 'subtext-color',
						'default' => '#ffffff',
						'type' => 'color',
					),
					'Button Background Color' => array(
						'attr' => 'button-background-color',
						'default' => '#f9f6e8',
						'type' => 'color',
					),
					'Button Text Color' => array(
						'attr' => 'button-text-color',
						'default' => '#333',
						'type' => 'color',
					),
					'Button Border Color' => array(
						'attr' => 'button-border-color',
						'default' => '#fff',
						'type' => 'color',
					),
					'Button Shadow Color' => array(
						'attr' => 'button-shadow-color',
						'default' => '#e1d7a8',
						'type' => 'color',
					),
					'Textbox Shadow Color' => array(
						'attr' => 'title-text-shadow-color',
						'default' => '#85b4de',
						'type' => 'color',
					),
					'Border Color' => array (
						'attr' => 'border-color',
						'default' => '#0e79be',
						'type' => 'color',
					),
					'Product Image Url (Height: 80px)' => array (
						'attr' => 'product-url',
						'default' => OptinSkin_URL . '/front/images/ebook_2.png',
						'text-width' => '375px',
					),
					'Title Text' => ois_title_text('Get Free Profitable Niche Ideas'),
					'Button Text' => ois_button_text('Free Instant Access'),
					'Subtext Content' => array (
						'attr' => 'subtext-content',
						'default' => 'No Spam. We Promise.',
						'text-width' => '350px',
					),
					'Email Placeholder' => ois_email_placeholder('Email Address'),
					'Email Width' => ois_email_width('215px'),
				),
			),
		);

	$designs = array( '1' => $skin_1, '2' => $skin_15, '3' => $skin_3, '4' => $skin_4, '5' => $skin_5, '6' => $skin_6, '7' => $skin_7, '8' => $skin_8, '9' => $skin_9, '10' => $skin_10, '11' => $skin_11, '12' => $skin_12, '13' => $skin_13, '14' => $skin_14, '15' => $skin_2, '16' => $skin_16, '17' => $skin_17, '18' => $skin_18, '19' => $skin_19 );

	return $designs;

}
function ois_update_designs_code() {
	update_option('ois_designs', ois_designs_code());
}
function ois_box_width($default) {
	return array ( 'attr' => 'box-width', 'default' => $default );
}
function ois_title_text($default) {
	return array ( 'attr' => 'title-text', 'default' => $default, 'text-width' => '275px');
}
function ois_subtitle_text($default) {
	return array ( 'attr' => 'subtitle-text', 'default' => $default, 'text-width' => '320px');
}
function ois_button_text($default) {
	return array ( 'attr' => 'button-text', 'default' => $default);
}
function ois_email_placeholder($default) {
	return array ( 'attr' => 'email-placeholder', 'default' => $default, 'text-width' => '250px',);
}
function ois_name_placeholder($default) {
	return array ( 'attr' => 'name-placeholder', 'default' => $default, 'text-width' => '250px',);
}
function ois_name_width($default) {
	return array ( 'attr' => 'name-width', 'default' => $default, );
}
function ois_email_width($default) {
	return array ( 'attr' => 'email-width', 'default' => $default, );
}
?>