<?php

if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly


/**
 * outputs and loads all required resources for the
 * updates listing.
 *
 * @since 1.0.0
 */
class SCCU_Updates_Listing {


	/**
	 * constructor for SCCU_Post_Listing class
	 */
	public function __construct() {

		// load the correct post listing stylesheet based on hierarchy
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_styles' ) );

		// register shortcode
		add_shortcode( 'scc_updates', array( $this, 'shortcode' ) );
	}


	/**
	 * setup stylesheet and script for post listing 
	 * 
	 * @credits stylesheet hierarchy approach by Easy Digital Downloads
	 */
	public function frontend_styles() {

		global $post;

		// if the active theme has a properly named CSS file in the correct
		// location within the theme, store it in a variable
		$child_theme_sccu_style = trailingslashit( get_stylesheet_directory() ) . 'scc_templates/sccu.css';
		$parent_theme_sccu_style = trailingslashit( get_template_directory() ) . 'scc_templates/sccu.css';
		
		// check to see if the above variables actually had files
		// if so, store those variables in a new variable
		// $primary_style will only hold one value based on which files exist
		if ( file_exists( $child_theme_sccu_style ) ) {
			$primary_style = trailingslashit( get_stylesheet_directory_uri() ) . 'scc_templates/sccu.css';
		} elseif ( file_exists( $parent_theme_sccu_style ) ) {
			$primary_style = trailingslashit( get_template_directory_uri() ) . 'scc_templates/sccu.css';
		} else {
			$primary_style = SCCU_URL . 'includes/scc_templates/sccu.css';
		}

		// register and enqueue the appropriate assets based on above checks
		if ( has_shortcode( $post->post_content, 'scc_updates' ) ) {
			wp_enqueue_style( 'sccu-updates', $primary_style );
			wp_enqueue_style( 'sccu-updates-icons', SCCU_URL . 'assets/css/icons.css' );
		}
	}


	/**
	 * get and include template files
	 *
	 * @uses locate_template()
	 */
	public function get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
		if ( $args && is_array($args) ) {
			extract( $args );
		}
		include( $this->locate_template( $template_name, $template_path, $default_path ) );
	}
	

	/**
	 * locate a template and return the path for inclusion
	 *
	 * @used_by get_template()
	 */
	public function locate_template( $template_name, $template_path = '', $default_path = '' ) {
		if ( ! $template_path ) {
			$template_path = 'scc_templates';
		}
		if ( ! $default_path ) {
			$default_path  = SCCU_DIR . 'includes/scc_templates/';
		}

		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				trailingslashit( $template_path ) . $template_name,
				$template_name
			)
		);

		// Get default template
		if ( ! $template ) {
			$template = $default_path . $template_name;
		}
		return $template;
	}


	/**
	 * register shortcode used to output updates template
	 */
	public function shortcode( $atts ) {
		extract( shortcode_atts( array(
			'course'     => '',
			'hide_empty' => true,
			'intro'      => true
		), $atts ) );

		ob_start();

		$this->get_template( 'sccu-output.php', array( 'atts' => $atts ) );

		return ob_get_clean();
	}
}
new SCCU_Updates_Listing();