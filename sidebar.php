<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sleekr_Lite
 */
if ( ! is_active_sidebar( 'main' ) ) {
	return;
}
dynamic_sidebar( 'main' ); ?>

