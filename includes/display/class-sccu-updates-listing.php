<?php

class SCCU_Updates_Listing {


	/**
	 * constructor for SCCU_Post_Listing class
	 */
	public function __construct() {

		// load the correct post listing stylesheet based on hierarchy
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_styles' ) );

		// register shortcode
		add_shortcode( 'sccu_updates', array( $this, 'shortcode' ) );
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
		if ( has_shortcode( $post->post_content, 'sccu_updates' ) )
			wp_enqueue_style( 'sccu-updates', $primary_style );
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
	public function shortcode() {
		ob_start();

		$this->get_template( 'sccu-output.php' );

		return ob_get_clean();
	}
}
new SCCU_Updates_Listing();











function sccu_relative_time( $from, $to = '', $limit = 1 ) {
	$units = apply_filters( 'time_units', array(
		31556926 => array( __( '%s year' ), __( '%s years' ) ),
		2629744  => array( __( '%s month' ), __( '%s months' ) ),
		604800   => array( __( '%s week' ), __( '%s weeks' ) ),
		86400    => array( __( '%s day' ), __( '%s days' ) ),
		3600     => array( __( '%s hour' ), __( '%s hours' ) ),
		60       => array( __( '%s min' ), __( '%s mins' )
	) ) );

	$from      = (int) $from;
	$to        = (int) $to;
	$diff      = (int) abs( $to - $from );
	$items     = 0;
	$output    = array();
	$seperator = _x( ', ', 'human_time_diff' );

	if ( empty( $to ) )
		$to = time();

	foreach ( $units as $unitsec => $unitnames ) {
		if ( $items >= $limit )
			break;

		if ( $diff < $unitsec )
			continue;

		$numthisunits = floor( $diff / $unitsec );
		$diff = $diff - ( $numthisunits * $unitsec );

		$items++;

		if ( $numthisunits > 0 )
			$output[] = sprintf( _n( $unitnames[0], $unitnames[1], $numthisunits ), $numthisunits );
	}

	if ( !empty( $output ) )
		return implode( $seperator, $output );
	else {
		$smallest = array_pop( $units );

		return sprintf( $smallest[0], 1 );
	}
}