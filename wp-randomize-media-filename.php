<?php
/**
 * Plugin Name: Randomize Media Filename
 * Plugin URI: https://github.com/UsabilityDynamics/wp-randomize-media-filename
 * Description: Randomizes the filename of newly uploaded media files.
 * Author: Usability Dynamics, Inc.
 * Author URI: https://www.usabilitydynamics.com/
 * Version: 1.0.0
 * GitHub Plugin URL: UsabilityDynamics/wp-cluster
 */

add_filter( 'sanitize_file_name', 'rmf_randomize_filename', 10 );
if( !function_exists( 'rmf_randomize_filename' ) ) {
	function rmf_randomize_filename( $filename ) {
	  $info = pathinfo( $filename );
	  $ext = empty( $info[ 'extension' ] ) ? '' : '.' . $info[ 'extension' ];
	  $rnd = rand( 0, 99 );
	  $name = basename( $filename, $ext );
	  return md5( $name ) . $rnd . $ext;
	}
}