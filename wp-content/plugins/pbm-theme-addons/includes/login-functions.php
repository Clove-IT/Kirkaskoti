<?php


if( !function_exists('pbmit_theme_addons_html_to_rgb') ) {
function pbmit_theme_addons_html_to_rgb($htmlCode) {
	if($htmlCode[0] == '#'){
		$htmlCode = substr($htmlCode, 1);
	}
	if (strlen($htmlCode) == 3) {
		$htmlCode = $htmlCode[0] . $htmlCode[0] . $htmlCode[1] . $htmlCode[1] . $htmlCode[2] . $htmlCode[2];
	}
	$r = hexdec($htmlCode[0] . $htmlCode[1]);
	$g = hexdec($htmlCode[2] . $htmlCode[3]);
	$b = hexdec($htmlCode[4] . $htmlCode[5]);
	return $b + ($g << 0x8) + ($r << 0x10);
}
}

if( !function_exists('pbmit_theme_addons_rgb_to_hsl') ) {
function pbmit_theme_addons_rgb_to_hsl($RGB) {
	$r = 0xFF & ($RGB >> 0x10);
	$g = 0xFF & ($RGB >> 0x8);
	$b = 0xFF & $RGB;

	$r = ((float)$r) / 255.0;
	$g = ((float)$g) / 255.0;
	$b = ((float)$b) / 255.0;

	$maxC = max($r, $g, $b);
	$minC = min($r, $g, $b);

	$l = ($maxC + $minC) / 2.0;

	if($maxC == $minC) {
		$s = 0;
		$h = 0;
	} else {
		if($l < .5) {
			$s = ($maxC - $minC) / ($maxC + $minC);
		} else {
			$s = ($maxC - $minC) / (2.0 - $maxC - $minC);
		}
		if($r == $maxC){
			$h = ($g - $b) / ($maxC - $minC);
		}
		if($g == $maxC){
			$h = 2.0 + ($b - $r) / ($maxC - $minC);
		}
		if($b == $maxC){
			$h = 4.0 + ($r - $g) / ($maxC - $minC);
		}
		$h = $h / 6.0; 
	}
	$h = (int)round(255.0 * $h);
	$s = (int)round(255.0 * $s);
	$l = (int)round(255.0 * $l);
	return (object) Array('hue' => $h, 'saturation' => $s, 'lightness' => $l);
}
}


/**
 * Login Page CSS code
 */
if( !function_exists('pbm_addons_login_page_css') ){
function pbm_addons_login_page_css(){
	if( !empty( PBM_ADDON_THEME_BY_PBM ) ){
	
		// Login Logo
		$main_logo			= pbmit_get_base_option('logo');
		$show_custom_logo	= pbmit_get_base_option('custom-login-logo');
		if( $show_custom_logo == '1' ){
			$login_logo = pbmit_get_base_option('login-logo');
			$main_logo  = (!empty($login_logo)) ? $login_logo : $main_logo ;
		}

		// Login background
		$bg_css = '';
		$bg = pbmit_get_base_option( 'login-page-background' );
		if( is_array($bg) && count($bg)>0 ){
			foreach( $bg as $key=>$val ){
				if( $key=='background-image' ){ $val = 'url('.$val.')'; }
				$bg_css .= $key.':'.$val.';'."\n";
			}
		}
		// Global colors
		$global_color = pbmit_get_base_option( 'global-color' );
		if( !empty($global_color) ){
			$rgb = pbmit_theme_addons_html_to_rgb($global_color);
			$hsl = pbmit_theme_addons_rgb_to_hsl($rgb);
			if( (!empty($hsl->lightness)) && $hsl->lightness > 190) {
				$global_color = pbmit_color_luminance( $global_color, -0.4 );
			}
		}
		?>
		<style type="text/css">
			<?php if( !empty($main_logo) ){ ?>
			#login h1 a, .login h1 a {
				background-image: url(<?php echo esc_url($main_logo); ?>);
				background-size: contain;
				background-position: center center;
				background-repeat: no-repeat;
				height: 100px;
				width: 214px;
			}
			<?php } ?>
			.clear,
			.clr,
			.clearfix{
				clear: both;
			}
			body.login{
				<?php echo $bg_css; ?>
				height: auto;
			}
			body.login a,
			body.login #backtoblog a,
			body.login #nav a{
				color: #000;
				transition: all 0.4s, all 0.4s;
			}
			body.login a:hover,
			body.login #backtoblog a:hover,
			body.login #nav a:hover{
				color: <?php echo $global_color; ?>;
			}
			body.login #backtoblog a:focus,
			body.login #nav a:focus,
			body.login h1 a:focus,
			body.login.wp-core-ui .button-primary.focus,
			body.login.wp-core-ui .button-primary:focus{
				box-shadow: none;
			}
			body.login #wp-submit{
				background-color: <?php echo $global_color; ?>;
				border-color: <?php echo $global_color; ?>;
				transition: all 0.4s, all 0.4s;
			}
			body.login #wp-submit:hover{
				background-color:#000;
				border-color:#000;
			}
			body.login #login{
				background: #fff;
				padding: 40px;
				margin-top: 60px;
				box-shadow: 0 0 20px 0px rgb(0 0 0 / 26%);
			}
			body.login #login form{
				background-color: transparent;
				border: none;
				border-radius: 0;
				box-shadow: none;
				padding: 0;
			}
			body.login form .input {
				border: 1px solid #ccc;
				border-radius: 0;
				transition: all 0.4s, all 0.4s;
				box-shadow: none;
				outline: none;
			}
			body.login form .input:focus {
				border: 1px solid <?php echo $global_color; ?>;
				box-shadow: none;
				
			}
			body.login #login form label{
				font-weight: bold;
			}
			body.login #backtoblog,
			body.login #nav {
				padding: 0;
			}
			body.login .pbmit-login-bottom-links{
				padding-top: 35px;
			}
			body.login .pbmit-login-bottom-links #nav{
				float: left;
				margin-top: 0;
				font-weight: bold;
			}
			body.login .pbmit-login-bottom-links #backtoblog{
				float: right;
				margin-top: 0;
				font-weight: bold;
			}
			body.login #login_error,
			body.login .message, .login .success{
				box-shadow: 1px 1px 3px 0px rgb(0 0 0 / 22%);
			}
			body.login .button.wp-hide-pw{
				color: <?php echo $global_color; ?>;
			}
			body.login .button.wp-hide-pw:focus{
				border: none;
				box-shadow: none;
			}
			body.login input[type=checkbox],
			body.login input[type=checkbox]:focus{
				border-radius: inherit;
				box-shadow: none;
			}
		</style>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#nav").insertAfter("p.submit");
				jQuery("#backtoblog").insertAfter("#nav");
				jQuery( "#nav, #backtoblog" ).wrapAll( '<div class="pbmit-login-bottom-links"></div>' );
				jQuery('<div class="clear clr clearfix"></div>').insertAfter("p.submit");
				jQuery('<div class="clear clr clearfix"></div>').insertAfter("#backtoblog");
			});
		</script>

	<?php
	}
}
}
add_action( 'login_footer', 'pbm_addons_login_page_css' );

if( !function_exists('pbm_addons_login_scripts') ){
function pbm_addons_login_scripts() {
	wp_enqueue_script( 'jquery' );
}
}
add_action( 'login_enqueue_scripts', 'pbm_addons_login_scripts' );

if( !function_exists('pbm_addons_login_logo_url') ){
function pbm_addons_login_logo_url() {
	return home_url( '/' );
}
}
add_filter( 'login_headerurl', 'pbm_addons_login_logo_url');

if( !function_exists('pbm_addons_login_logo_title') ){
function pbm_addons_login_logo_title() {
	return get_bloginfo( 'title', 'display' );
}
}
add_filter( 'login_headertext', 'pbm_addons_login_logo_title');
