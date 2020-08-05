<?php

/**
 * This filter allows you to set the data type of a custom `date` field used to sort the column.
 * Not setting the correct date format can result in incorrect sorting results.
 */

/**
 * Usage of the hook
 *
 * @param string                $date_type 'string', 'numeric', 'date' or 'datetime'. Default is 'datetime'.
 * @param AC\Column\CustomField $column
 *
 * @return string
 */
function acp_sorting_custom_field_date_type( $date_type, AC\Column\CustomField $column ) {

	// Change the custom field type
	// $data_type = 'datetime';

	return $date_type;
}

add_filter( 'acp/sorting/custom_field/date_type', 'acp_sorting_custom_field_date_type', 10, 2 );

/**
 * Change date format for a specific meta key from the default `datetime` to a `date` or `numeric` type.
 *
 * @param string                $date_type
 * @param AC\Column\CustomField $column
 *
 * @return string
 */
function acp_set_sorting_date_type_for_a_specific_meta_key( $date_type, AC\Column\CustomField $column ) {

	// This is the default settings for a custom field date type
	if ( 'my_datetime_field' === $column->get_meta_key() ) {
		$date_type = ACP\Sorting\Type\DataType::DATETIME; // 'datetime'
	}

	// Change to numeric when working with UNIX Timestamps
	if ( 'my_timestamp_field' === $column->get_meta_key() ) {
		$date_type = ACP\Sorting\Type\DataType::NUMERIC; // 'numeric'
	}

	// Change to date when working with dates without time notations
	if ( 'my_date_field' === $column->get_meta_key() ) {
		$date_type = ACP\Sorting\Type\DataType::DATE; // 'date'
	}

	return $date_type;
}

add_filter( 'acp/sorting/custom_field/date_type', 'acp_set_sorting_date_type_for_a_specific_meta_key', 10, 2 );