<?php
	/*
	Description: Plugin for deploying NetInsight analytics page tags
	Author: Lee Isensee (<a href="http://twitter.com/leeisensee">@leeisensee</a>)
	Version: 1.0.3
	Author URI: https://www.leeisensee.com
	Copyright: 2012 Lee Isensee
	*/


    if($_POST['nianalimp_hidden'] == 'Y') {  
	//Check for disable
	$disable = $_POST['nianalimp_disable'];
		update_option('nianalimp_disable', $disable);

	//Form data sent	
//Tag Site Settings	
	$sitedom = $_POST['nianalimp_sitedom'];
		update_option('nianalimp_sitedom', $sitedom);

//Main Page Tag Settings
	$imgpath = $_POST['nianalimp_imgpath'];
        update_option('nianalimp_imgpath', $imgpath);
	$siteid = $_POST['nianalimp_siteid'];
        update_option('nianalimp_siteid', $siteid);

//Page Tag Custom Variables
	//Persistent
	$percookie = $_POST['nianalimp_percookie'];
        update_option('nianalimp_percookie', $percookie);
	$percookiename = $_POST['nianalimp_percookiename'];
        update_option('nianalimp_percookiename', $percookiename);
	$percookiedom = $_POST['nianalimp_percookiedom'];
        update_option('nianalimp_percookiedom', $percookiedom);
	$percookieexp = $_POST['nianalimp_percookieexp'];
        update_option('nianalimp_percookieexp', $percookieexp);
	//Session
	$sesscookie = $_POST['nianalimp_sesscookie'];
        update_option('nianalimp_sesscookie', $sesscookie);
	$sesscookiename = $_POST['nianalimp_sesscookiename'];
        update_option('nianalimp_sesscookiename', $sesscookiename);
	$sesscookiedom = $_POST['nianalimp_sesscookiedom'];
        update_option('nianalimp_sesscookiedom', $sesscookiedom);
	//Global
	$glblcookie = $_POST['nianalimp_glblcookie'];
        update_option('nianalimp_glblcookie', $glblcookie);
	$glblvars = $_POST['nianalimp_glblvars'];
	update_option('nianalimp_glblvars', $glblvars);

//Page Tag Custom Options
	$tagwait = $_POST['nianalimp_tagwait'];
        update_option('nianalimp_tagwait', $tagwait);
	$autotag = $_POST['nianalimp_autotag'];
        update_option('nianalimp_autotag', $autotag);
	$fileext = $_POST['nianalimp_fileext'];
        update_option('nianalimp_fileext', $fileext);
?>
	<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
	<?php
    } else {  
include('nianalimp_vars.php');
}  
?>


<div class="wrap">
	<?php echo "<h2>" . __( 'Analytics Implementation Options', 'nianalimp_trdom' ) . "</h2>"; ?>
	<form name="nianalimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="nianalimp_hidden" value="Y">
		<hr />
		<?php echo "<h4>" . __( 'Tag Site Settings', 'nianalimp_trdom' ) . "</h4>"; ?>
		<p><?php _e("Disable Tracking: " ); ?><input type="text" name="nianalimp_disable" value="<?php echo $disable; ?>" size="5"><?php _e(" ex: true or false" ); ?></p>
<br/>
		<hr />
		<?php echo "<h4>" . __( 'Main Page Tag Settings', 'nianalimp_trdom' ) . "</h4>"; ?>
		<p><?php _e("Full Site Domain: " ); ?><input type="text" name="nianalimp_sitedom" value="<?php echo $sitedom; ?>" size="30"><?php _e(" ex: www.site.com" ); ?></p>
		<p><?php _e("Image Path: " ); ?><input type="text" name="nianalimp_imgpath" value="<?php echo $imgpath; ?>" size="30"><?php _e(" ex: http://track.site.com/img/analytics.gif OR /img/ntpagetag.gif OR //track.site.com/img/ntpagetag.gif" ); ?></p>
		<p><?php _e("Site ID: " ); ?><input type="text" name="nianalimp_siteid" value="<?php echo $siteid; ?>" size="20"><?php _e(" ex: www or blog" ); ?></p>
<br/>
		<hr />
		<?php echo "<h4>" . __( 'Page Tag Cookie Options', 'nianalimp_trdom' ) . "</h4>"; ?>
				<?php echo "<h5>" . __( 'Persistent', 'nianalimp_trdom' ) . "</h5>"; ?>
		<p><?php _e("Set Cookie: " ); ?><input type="text" name="nianalimp_percookie" value="<?php echo $percookie; ?>" size="5"><?php _e(" ex: true or false only" ); ?></p>
		<p><?php _e("Cookie Name: " ); ?><input type="text" name="nianalimp_percookiename" value="<?php echo $percookiename; ?>" size="20"><?php _e(" ex: UnicaID" ); ?></p>
		<p><?php _e("Cookie Domain: " ); ?><input type="text" name="nianalimp_percookiedom" value="<?php echo $percookiedom; ?>" size="20"><?php _e(" ex: .site.com (lead with period)" ); ?></p>
		<p><?php _e("Cookie Expire (in seconds): " ); ?><input type="text" name="nianalimp_percookieexp" value="<?php echo $percookieexp; ?>" size="20"><?php _e(" ex: 15778463" ); ?></p>
<br/>
				<?php echo "<h5>" . __( 'Session', 'nianalimp_trdom' ) . "</h5>"; ?>
		<p><?php _e("Set Cookie: " ); ?><input type="text" name="nianalimp_sesscookie" value="<?php echo $sesscookie; ?>" size="5"><?php _e(" ex: true or false only" ); ?></p>
		<p><?php _e("Cookie Name: " ); ?><input type="text" name="nianalimp_sesscookiename" value="<?php echo $sesscookiename; ?>" size="20"><?php _e(" ex: NetInsightSessionID" ); ?></p>
		<p><?php _e("Cookie Domain: " ); ?><input type="text" name="nianalimp_sesscookiedom" value="<?php echo $sesscookiedom; ?>" size="20"><?php _e(" ex: .site.com (lead with period)" ); ?></p>
<br/>
				<?php echo "<h5>" . __( 'Global', 'nianalimp_trdom' ) . "</h5>"; ?>
		<p><?php _e("Other Cookies: " ); ?><input type="text" name="nianalimp_glblcookie" value="<?php echo $glblcookie; ?>" size="20"><?php _e(" ex: 'Cookie1', 'Cookie2'" ); ?></p>
<br/>
		<hr />
		<?php echo "<h4>" . __( 'Page Tag Custom Options', 'nianalimp_trdom' ) . "</h4>"; ?>
		<p><?php _e("Global Name-Value Pairs: " ); ?><input type="text" name="nianalimp_glblvars" value="<?php echo $glblvars; ?>" size="20"><?php _e(" ex: &foo=bar&test=1" ); ?></p>
		<p><?php _e("Tag Wait (seconds): " ); ?><input type="text" name="nianalimp_tagwait" value="<?php echo $tagwait; ?>" size="20"><?php _e(" ex: 1.0" ); ?></p>
<br/>
		<hr />
		<?php echo "<h4>" . __( 'Auto Tagging', 'nianalimp_trdom' ) . "</h4>"; ?>
		<p><?php _e("Auto Tag: " ); ?><input type="text" name="nianalimp_autotag" value="<?php echo $autotag; ?>" size="5"><?php _e(" ex: true or false only" ); ?></p>
		<p><?php _e("File Extensions: " ); ?><input type="text" name="nianalimp_fileext" value="<?php echo stripslashes($fileext); ?>" size="30"><?php _e(" ex: '.csv','.doc','.docx'" ); ?></p>
		<hr/>
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'nianalimp_trdom' ) ?>" />
		</p>
	</form>
</div>