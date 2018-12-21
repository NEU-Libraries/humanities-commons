<?php
/**
 * Society Settings
 *
 * Register member types and group types for all societies
 *
 * @package    Humanities Commons
 * @subpackage Configuration
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function neu_get_societies() {
	return apply_filters( 'neu_get_societies', array(
		'phd' => array(
			'labels'        => array(
				'name'          => 'PHD',
				'singular_name' => 'PHD',
			),
			'has_directory' => 'phd'
		),
		'gse' => array(
			'labels'        => array(
				'name'          => 'GSE',
				'singular_name' => 'GSE',
			),
			'has_directory' => 'gse'
		),
		'next' => array(
			'labels'        => array(
				'name'          => 'NExT',
				'singular_name' => 'NExT',
			),
			'has_directory' => 'next'
		),
		'nc'               => array(
			'labels'        => array(
				'name'          => 'NC',
				'singular_name' => 'NC',
			),
			'has_directory' => 'nc'
		),
	) );
}

function hcommons_register_member_types() {

	foreach ( neu_get_societies() as $society_id => $settings ) {
		bp_register_member_type( $society_id, $settings );
	}

}
add_action( 'bp_register_member_types', 'hcommons_register_member_types' );

function hcommons_register_group_types() {

	foreach ( neu_get_societies() as $society_id => $settings ) {
		bp_groups_register_group_type( $society_id, $settings );
	}

}
add_action( 'bp_groups_register_group_types', 'hcommons_register_group_types' );

