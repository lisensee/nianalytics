<?php
	/*
	Description: Plugin for deploying NetInsight analytics page tags
	Author: Lee Isensee (<a href="http://twitter.com/leeisensee">@leeisensee</a>)
	Version: 1.0.1
	Author URI: https://www.leeisensee.com
	Copyright: 2011 Lee Isensee
	*/

Header("content-type: application/x-javascript");
if ( defined('ABSPATH') )
require_once(ABSPATH . 'wp-load.php');
else
require_once('../../../wp-load.php'); 
include('nianalimp_vars.php');
?>

var NTPT_IMGSRC = '<?php echo $imgpath ?>';
var NTPT_HTTPSIMGSRC = NTPT_IMGSRC;

var NTPT_FLDS = {};
NTPT_FLDS.lc = true; // Document location
NTPT_FLDS.rf = true; // Document referrer
NTPT_FLDS.rs = true; // User screen resolution
NTPT_FLDS.cd = true; // User color depth
NTPT_FLDS.ln = true; // Browser language
NTPT_FLDS.tz = true; // User timezone
NTPT_FLDS.jv = true; // Browser Java support
NTPT_FLDS.ck = true; // Cookies
NTPT_FLDS.iv = true; // Initial view

var NTPT_MAXTAGWAIT = <?php echo $tagwait ?>; // Max delay (secs) on link-tags and submit-tags

var NTPT_GLBLREFTOP = false;
var NTPT_SET_IDCOOKIE = <?php echo $percookie ?>;
var NTPT_IDCOOKIE_NAME = '<?php echo $percookiename ?>';
var NTPT_IDCOOKIE_DOMAIN = '<?php echo $percookiedom ?>';
var NTPT_IDCOOKIE_EXPIRE = '<?php echo $percookieexp ?>';
var NTPT_SET_SESSION_COOKIE = <?php echo $sesscookie ?>;
var NTPT_SESSION_COOKIE_NAME = '<?php echo $sesscookiename ?>';
var NTPT_SESSION_COOKIE_DOMAIN = '<?php echo $sesscookiedom ?>';

// Variables that need to be modified on a per-site basis
var NTPT_GLBLEXTRA = '<?php echo $glblvars ?>&site=<?php echo $siteid ?>';
var NTPT_GLBLCOOKIES = [ <?php echo stripslashes($glblcookie) ?> ];

var fileExt = [ <?php echo stripslashes($fileext) ?> ];

<?php
include('ntpagetag.js');
if ($autotag == "true") {
	include('ntpagetag.autotag.js');
}
?>