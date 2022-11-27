<?php
/**
 * Plugin Name: RN Client
 */
 if ( !defined( 'ABSPATH' ) ) {
	exit;
}
require_once 'class-remote-notification-client.php';

if ( function_exists( 'wpi_rdnc_add_notification' ) ) {
	wpi_rdnc_add_notification( 72, '30e3b659ed1aba30', 'https://wpinteractive.com' );
}