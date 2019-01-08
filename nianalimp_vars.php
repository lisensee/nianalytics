<?php
	/*
	Description: Plugin for deploying NetInsight analytics page tags
	Author: Lee Isensee (<a href="http://twitter.com/leeisensee">@leeisensee</a>)
	Version: 1.0.3
	Author URI: https://www.leeisensee.com
	Copyright: 2012 Lee Isensee
	*/

function wt_get_user_name() {
	global $userdata;
	get_currentuserinfo();
	return $userdata->user_login;
}

	$plugin_url = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$username = wt_get_user_name();
	$ntPGExtra = "";

function get_pageTitle() {
	if(is_home()) {
		$pageTitle .= "Home Page";
	} elseif (is_page()) {
		$pageTitle .= the_title('','',false);
	} elseif (is_single()) {
		$pageTitle .= the_title('','',false);
	} elseif (is_category()) {
		$pageTitle .= 'Category: ' . single_cat_title('', false);
	} elseif (is_404()) {
		$pageTitle .= '404: '.$_SERVER["REQUEST_URI"] . '&sc=404';
	}
	return $pageTitle;
}

function currentPageURL() {
$curpageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$curpageURL.= "s";}
    $curpageURL.= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
    $curpageURL.= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
    $curpageURL.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $curpageURL;
}

	if (is_user_logged_in()){ $ntPGExtra .= '&un='.$username; }
	$ntPGExtra .= '&pgtitle='. urlencode(get_pageTitle());


		$disable = get_option('nianalimp_disable');
        $sitedom = get_option('nianalimp_sitedom');
        $imgpath = get_option('nianalimp_imgpath');
        $siteid = get_option('nianalimp_siteid');
        $percookie = get_option('nianalimp_percookie');
        $percookiename = get_option('nianalimp_percookiename');
		$percookiedom = get_option('nianalimp_percookiedom');
        $percookieexp = get_option('nianalimp_percookieexp');
		$sesscookie = get_option('nianalimp_sesscookie');
        $sesscookiename = get_option('nianalimp_sesscookiename');
        $sesscookiedom = get_option('nianalimp_sesscookiedom');
		$glblcookie = get_option('nianalimp_glblcookie');
		$glblvars = get_option('nianalimp_glblvars');
        $tagwait = get_option('nianalimp_tagwait');
        $autotag = get_option('nianalimp_autotag');
		$fileext = get_option('nianalimp_fileext');
?>