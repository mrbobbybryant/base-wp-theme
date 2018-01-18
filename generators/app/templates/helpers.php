<?php

namespace <%= projectName %>\Theme\Helpers;

function inline_svg( $name, $force = false ) {

	$stored_name = 'stored_svg_' . $name;

	$svg = get_transient( $stored_name );

	if ( false === $svg || true === $force ) {

		$svg_path = get_template_directory() . '/svg/' . $name . '.svg';

		if ( ! file_exists( $svg_path ) ) {
			return false;
		}

		$svg = file_get_contents( $svg_path );

		set_transient( $stored_name, $svg, HOUR_IN_SECONDS * 24 );
	}

	return $svg;
}