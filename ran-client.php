<?php
/**
 * Plugin Name: RN Client
 */
 if ( !defined( 'ABSPATH' ) ) {
	exit;
}
require_once 'class-remote-notification-client.php';

if ( function_exists( 'wpi_rdnc_add_notification' ) ) {
	wpi_rdnc_add_notification( 31, '7cfcbdd88059b2ce', 'https://test.local' );
}