<?php
	/*
	Plugin Name: NetInsight Analytics Implementation
	Plugin URI: https://github.com/lisensee/nianalytics
	Description: Plugin for deploying NetInsight analytics page tags
	Author: Lee Isensee (Twitter: @leeisensee)
	Version: 1.0.3
	Author URI: https://www.leeisensee.com

	Copyright: 2012 Lee Isensee
	*/
define('nianalimp', '1.0.3', true);

function nianalimp_admin() { include('nianalimp_admin.php'); }
function nianalimp_admin_menu() { add_options_page('NetInsight Analytics Imp. Options', 'NetInsight Analytics Implementation', 'manage_options', 'analytics-imp', "nianalimp_admin"); }
add_action('admin_menu', 'nianalimp_admin_menu');

function nianalimp_out() { include('nianalimp_out.php'); }
add_action('wp_footer', 'nianalimp_out');
?>