<?php
/**
 * OD Customizer.
 *
 * Use this class to fields to Customizer.
 * Here you can find some field types examples. Expand accordingly. External fields may be used.
 * If not needed please remove, don't forget to update
 * functions.php accordingly.
 *
 * WARNING: This file is part of the OD Base theme. DO NOT edit this file
 * under any circumstances, as the changes will be lost in the case of a theme update.
 * Please do all modifications in the form of a child theme.
 *
 * @since   1.0.0
 * @package OD\Theme\Base
 * @author  OlivasDigital
 * @license GPL-2.0+
 * @link    https://olivas.digital/
 */

namespace OD\Theme;

/**
 * Theme customizer options.
 *
 * @since  1.0.0
 * @author OlivasDigital
 */
class Customizer {


	/**
	 * Panel ID.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string
	 */
	private $panel_id = 'od_options';

	/**
	 * Base URL for public assets.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	private $base_uri;

	/**
	 * Setup hooks.
	 *
	 * @since 1.0.0
	 */
	public function ready() {
		add_action( 'admin_head', array( $this, 'admin_reset_stylesheet' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'css_custom_login' ) );
		add_filter( 'login_headerurl', array( $this, 'custom_loginlogo_url' ) );
	}

	/**
	 * Determine if we are using a 12h or a 24h format.
	 *
	 * @since  1.0.0
	 * @return bool If true, will use the 12h format. False, for the 24h format.
	 */
	public static function use_am_pm() {
		return (bool) preg_match( '/g|h/', get_option( 'time_format' ) );
	}

	/**
	 * Get section ID.
	 *
	 * @since  1.0.0
	 * @access private
	 * @param  string $key Section key.
	 * @return string      Section ID.
	 */
	private function get_section_id( $key ) {
		return sprintf( 'od_section_%s', $key );
	}

	/**
	 * Get field ID.
	 *
	 * @since  1.0.0
	 * @access private
	 * @param  string $key Field key.
	 * @return string      Field ID.
	 */
	private function get_field_id( $key ) {
		return sprintf( 'od_%s', $key );
	}

	/**
	 * ADMIN page styles
	 */
	public function admin_reset_stylesheet() { ?>
		<style type="text/css">
			@media (min-width: 782px) {
				.php-error #adminmenuback, 
				.php-error #adminmenuwrap {
					margin-top: 0;
				}
				body.wp-admin.is-fullscreen-mode #adminmenumain, 
				body.wp-admin.is-fullscreen-mode #wpadminbar{
					display: block !important;
				}
				body.wp-admin.is-fullscreen-mode #adminmenu{
					margin: 44px 0 12px !important;
				}
				body.wp-admin.is-fullscreen-mode div.edit-post-layout{
					top: 30px !important;
					left: 160px !important;
				}
				body.wp-admin.is-fullscreen-mode div.edit-post-layout .editor-post-publish-panel{
					top: 32px !important;
				}
			}
		</style> 
		<?php
	}

	/**
	 * FORM LOGIN to admin
	 */
	function css_custom_login() {
		?>
		<style type="text/css">
			/* background */
			body.login {
				display: flex;
				flex-direction: column;
				flex-wrap: wrap;
				justify-content: center;
				align-items: center;
				background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/screenshot_login.jpg');
				background-repeat: no-repeat;
				background-position: center center;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-ms-background-size: cover;
				background-size: cover;
			}

			body.login div#login {
				padding-top: 0;
				padding-bottom: 0;
			}

			/* logo */
			body.login div#login{
				padding: 20px 20px 5px;
				background: rgba(0, 0, 0, .9);
				border-radius: 20px;
			}
			body.login div#login h1 {
				display: none !important;
			}

			body.login div#login #login-message{
				border-left: 4px solid #FFFFFF;
			}

			/* form login */
			body.login div#login form#loginform {
				background: none;
				box-shadow: none;
				padding: 0;
				border: none;
				border-radius: 0;
			}
			body.login div#login form#loginform p {}
			body.login div#login form#loginform p label,
			body.login div#login form#loginform label[for=user_pass] {
				font-size: 12px;
				font-weight: bold;
				color: #FFFFFF;
				text-transform: uppercase;
				letter-spacing: 1px;
			}
			body.login div#login #login_error,
			body.login div#login form#loginform input#user_login,
			body.login div#login form#loginform input#user_pass,
			body.login div#login form#loginform p.submit input#wp-submit,
			body.login div#login form#loginform p.forgetmenot input#rememberme[type=checkbox]{
				border-radius: 8px;
			}
			body.login div#login form#loginform input {
				background: rgba(255, 255, 255, .8);
				box-shadow:none;
				border-radius: 0;
				border: none;
				padding: 5px 10px;
				font-size: 20px;
				font-weight: 400;
				color: #012036;
				transition: all .2s ease-in-out;
			}

			body.login div#login form#loginform input:not([type=submit]){
				background: rgba(255, 255, 255, .8) !important;
			}
			body.login div#login form#loginform input:not([type=submit]):hover,
			body.login div#login form#loginform input:not([type=submit]):focus{
				background: rgba(255, 255, 255, 1) !important;
			}

			/* checkbox remember */
			body.login div#login form#loginform p.forgetmenot { margin-bottom: 15px; }
			body.login div#login form#loginform p.forgetmenot input#rememberme[type=checkbox] {
				background-color: #2B3990 !important;
			}
			body.login div#login form#loginform p.forgetmenot input#rememberme[type=checkbox]:checked:before {
				color: #2B3990 !important;
			}

			/* button submit */
			body.login div#login form#loginform .user-pass-wrap .wp-pwd button{
				color: #012036;
			}
			body.login div#login form#loginform p.submit input#wp-submit {
				width: 100%;
				height: 40px;
				padding: 0 20px;
				display: inline-block;
				background-color: #2B3990;
				border: none;
				font-weight: 700;
				font-size: 14px;
				text-transform: uppercase;
				color: #FFFFFF;
				text-shadow: none;
				transition: all .2s ease-in-out;
			}
			body.login div#login form#loginform p.submit input#wp-submit:hover {
				background: white !important;
				color: #2B3990;
			}

			body.login div#login span.dashicons{
				color: #2B3990;
			}

			body.login div#login form#loginform p.forgetmenot input#rememberme[type=checkbox]:checked:before {
				content: '✔';
				display: inline-flex;
				justify-content: center;
				align-items: center;
				color: #FFFFFF !important;
				font-size: 16px;
				margin: -2px -2px;
			}

			body.login div#login p#nav a,
			body.login div#login p#backtoblog a {
				color: #FFFFFF;
				transition: all .2s ease-in-out;
			}
			body.login div#login p#nav a:hover,
			body.login div#login p#backtoblog a:hover { color: #CCCCCC; }
			body.login #language-switcher span.dashicons{
				color: #CCCCCC !important;
			}
			body.login div#login p#backtoblog{
				padding-bottom: 0 !important;
			}
		</style>
		<?php
	}

	/**
	 * Replace Login Page logo link.
	 *
	 * @since 1.0.0
	 */
	public function custom_loginlogo_url() {
		return get_home_url();
	}
}
