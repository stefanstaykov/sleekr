<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 * @package Sleekr_Lite
 */
if ( ! is_active_sidebar( 'main' ) ) {
	return;
}
dynamic_sidebar( 'main' );
