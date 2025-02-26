<?php
/**
 * This file contains all the deprecated functions.
 *
 * We could easily delete all these but they are kept for backwards-compatibility purposes.
 *
 * @package	 Kirki
 * @category	Core
 * @author	  Ari Stathopoulos (@aristath)
 * @copyright   Copyright (c) 2020, David Vongries
 * @license	 https://opensource.org/licenses/MIT
 * @since	   1.0
 */
// phpcs:ignoreFile
require_once wp_normalize_path( dirname( __FILE__ ) . '/functions.php' );
require_once wp_normalize_path( dirname( __FILE__ ) . '/classes.php' );
// Filters require PHP 5.3.
if ( version_compare( PHP_VERSION, '5.3.0' ) >= 0 ) {
	require_once wp_normalize_path( dirname( __FILE__ ) . '/filters.php' );
}
