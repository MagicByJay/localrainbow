<?php

/**
 * Normalization traits.
 *
 * @package    \Optml\Inc\Traits
 * @author     Optimole <friends@optimole.com>
 */
trait Optml_Normalizer {

	/**
	 * Normalize value to boolean.
	 *
	 * @param mixed $value Value to process.
	 *
	 * @return bool
	 */
	public function to_boolean( $value ) {
		if ( in_array( $value, array( 'yes', 'enabled', 'true', '1' ) ) ) {
			return true;
		}

		if ( in_array( $value, array( 'no', 'disabled', 'false', '0' ) ) ) {
			return false;
		}

		return boolval( $value );
	}

	/**
	 * Normalize value to an integer within bounds.
	 *
	 * @param mixed   $value Value to process.
	 * @param integer $min Lower bound.
	 * @param integer $max Upper bound.
	 *
	 * @return integer
	 */
	public function to_bound_integer( $value, $min, $max ) {
		$integer = absint( $value );
		if ( $integer < $min ) {
			$integer = $min;
		}
		if ( $integer > $max ) {
			$integer = $max;
		}

		return $integer;
	}

	/**
	 * Normalize value to positive integer.
	 *
	 * @param mixed $value Value to process.
	 *
	 * @return integer
	 */
	public function to_positive_integer( $value ) {
		$integer = (int) $value;

		return ( $integer > 0 ) ? $integer : 0;
	}

	/**
	 * Normalize value to map.
	 *
	 * @param mixed $value Value to process.
	 * @param array $map Associative list from witch to return.
	 * @param mixed $default Default.
	 *
	 * @return mixed
	 */
	public function to_map_values( $value, $map, $default ) {
		if ( in_array( $value, $map ) ) {
			return $value;
		}

		return $default;
	}

	/**
	 * Normalize value to an accepted quality.
	 *
	 * @param mixed $value Value to process.
	 *
	 * @return mixed
	 */
	public function to_accepted_quality( $value ) {
		if ( is_numeric( $value ) ) {
			return intval( $value );
		}
		$value = trim( $value );

		$accepted_qualities = array(
			'eco'      => 'eco',
			'auto'     => 'auto',
			'high_c'   => 55,
			'medium_c' => 75,
			'low_c'    => 90,
		);

		if ( array_key_exists( $value, $accepted_qualities ) ) {
			return $accepted_qualities[ $value ];
		}

		// Legacy values.
		return 60;
	}

	/**
	 * Normalize arguments for crop.
	 *
	 * @param array $crop_args Crop arguments.
	 *
	 * @return array
	 */
	public function to_optml_crop( $crop_args = array() ) {

		$enlarge = false;
		if ( isset( $crop_args['enlarge'] ) ) {
			$crop_args = $crop_args['crop'];
			$enlarge = $crop_args['enlarge'];
		}
		if ( $crop_args === true ) {
			return array(
				'type'    => Optml_Resize::RESIZE_FILL,
				'enlarge' => $enlarge,
				'gravity' => Optml_Resize::GRAVITY_CENTER,
			);
		}
		if ( $crop_args === false || ! is_array( $crop_args ) || count( $crop_args ) != 2 ) {
			return array();
		}

		$allowed_x         = [
			'left'   => true,
			'center' => true,
			'right'  => true,
		];
		$allowed_y         = [
			'top'    => true,
			'center' => true,
			'bottom' => true,
		];
		$allowed_gravities = array(
			'left'         => Optml_Resize::GRAVITY_WEST,
			'right'        => Optml_Resize::GRAVITY_EAST,
			'top'          => Optml_Resize::GRAVITY_NORTH,
			'bottom'       => Optml_Resize::GRAVITY_SOUTH,
			'lefttop'      => Optml_Resize::GRAVITY_NORTH_WEST,
			'leftbottom'   => Optml_Resize::GRAVITY_SOUTH_WEST,
			'righttop'     => Optml_Resize::GRAVITY_NORTH_EAST,
			'rightbottom'  => Optml_Resize::GRAVITY_SOUTH_EAST,
			'centertop'    => array( 0.5, 0 ),
			'centerbottom' => array( 0.5, 1 ),
			'leftcenter'   => array( 0, 0.5 ),
			'rightcenter'  => array( 1, 0.5 ),
		);

		$gravity    = Optml_Resize::GRAVITY_CENTER;
		$key_search = ( $crop_args[0] === true ? '' :
				( isset( $allowed_x[ $crop_args[0] ] ) ? $crop_args[0] : '' ) ) .
					  ( $crop_args[1] === true ? '' :
						  ( isset( $allowed_y[ $crop_args[1] ] ) ? $crop_args[1] : '' ) );

		if ( array_key_exists( $key_search, $allowed_gravities ) ) {
			$gravity = $allowed_gravities[ $key_search ];
		}

		return array(
			'type'    => Optml_Resize::RESIZE_FILL,
			'enlarge' => $enlarge,
			'gravity' => $gravity,
		);
	}

	/**
	 * Normalize arguments for watermark.
	 *
	 * @param array $watermark_args Watermark arguments.
	 *
	 * @return array
	 */
	public function to_optml_watermark( $watermark_args = array() ) {
		$allowed_gravities = array(
			'left'         => Optml_Resize::GRAVITY_WEST,
			'right'        => Optml_Resize::GRAVITY_EAST,
			'top'          => Optml_Resize::GRAVITY_NORTH,
			'bottom'       => Optml_Resize::GRAVITY_SOUTH,
			'left_top'     => Optml_Resize::GRAVITY_NORTH_WEST,
			'left_bottom'  => Optml_Resize::GRAVITY_SOUTH_WEST,
			'right_top'    => Optml_Resize::GRAVITY_NORTH_EAST,
			'right_bottom' => Optml_Resize::GRAVITY_SOUTH_EAST,
		);
		$gravity           = Optml_Resize::GRAVITY_CENTER;
		if ( isset( $watermark_args['position'] ) && array_key_exists( $watermark_args['position'], $allowed_gravities ) ) {
			$gravity = $allowed_gravities[ $watermark_args['position'] ];
		}

		return array(
			'opacity'  => 1,
			'position' => $gravity,
		);
	}
}
