<?php
	/*
	Description: Plugin for deploying NetInsight analytics page tags
	Author: Lee Isensee (<a href="http://twitter.com/leeisensee">@leeisensee</a>)
	Version: 1.0.3
	Author URI: https://www.leeisensee.com
	Copyright: 2012 Lee Isensee
	*/

include('nianalimp_vars.php');

if ($disable == "true") {
	echo "<!-- NetInsight analytics plugin disabled -->";
} else {
	$retval = '';
	$retval .= '<script language="JavaScript" type="text/javascript">var NTPT_PGEXTRA = "'.$ntPGExtra .'"</script>';
	$retval .= '<script language="JavaScript" type="text/javascript" src="'.$plugin_url.'ntpagetag.js.php?rnd='. rand() .'"></script>';
	echo $retval;


	$nojsretval = '';
	$nojsretval .= '<noscript>';
	$nojsretval .= '<img src="'. $imgpath .'?ts='. time() . rand() .'&js=0&site='. $siteid .'&lc='. urlencode(currentPageURL()) . $ntPGExtra .'" height="1" width="1" border="0" hspace="0" vspace="0" alt="" />';
	$nojsretval .= '</noscript>';

	echo $nojsretval;
}
?>