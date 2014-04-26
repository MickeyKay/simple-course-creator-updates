<?php

if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly


/**
 * show relative post date
 */
function sccu_relative_date( $from, $to = '', $limit = 1 ) {
	$units = apply_filters( 'time_units', array(
		31556926 => array( __( '%s year', 'sccu' ), __( '%s years', 'sccu' ) ),
		2629744  => array( __( '%s month', 'sccu' ), __( '%s months', 'sccu' ) ),
		604800   => array( __( '%s week', 'sccu' ), __( '%s weeks', 'sccu' ) ),
		86400    => array( __( '%s day', 'sccu' ), __( '%s days', 'sccu' ) ),
		3600     => array( __( '%s hour', 'sccu' ), __( '%s hours', 'sccu' ) ),
		60       => array( __( '%s min', 'sccu' ), __( '%s mins', 'sccu' )
	) ) );

	$from      = (int) $from;
	$to        = (int) $to;
	$diff      = (int) abs( $to - $from );
	$items     = 0;
	$output    = array();
	$seperator = _x( ', ', 'human_time_diff' );

	if ( empty( $to ) ) {
		$to = time();
	}

	foreach ( $units as $unitsec => $unitnames ) {
		if ( $items >= $limit ) {
			break;
		}

		if ( $diff < $unitsec ) {
			continue;
		}

		$numthisunits = floor( $diff / $unitsec );
		$diff = $diff - ( $numthisunits * $unitsec );

		$items++;

		if ( $numthisunits > 0 ) {
			$output[] = sprintf( _n( $unitnames[0], $unitnames[1], $numthisunits ), $numthisunits );
		}
	}

	if ( !empty( $output ) ) {
		return implode( $seperator, $output );
	} else {
		$smallest = array_pop( $units );

		return sprintf( $smallest[0], 1 );
	}
}