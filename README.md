# nianalytics
NetInsight Analytics Implementation Wordpress Plugin

# NetInsight Analytics Implementation Plugin
Contributors: lisensee  
Tags: netinsight, web analytics, unica  
Requires at least: 3.0  
Tested up to: 3.3  
Stable tag: 1.0.3

Simple plugin to include the NetInsight web analytics page tag

# Description
This plugin provides a compact method to deploy a NetInsight page tag on your Wordpress site. With this plugin a JavaScript call is appended to the footer of each page.

As with most 1.0.x releases, this plugin is not heavily tested but I know it works well on my site


# Frequently Asked Questions
> What version of the NetInsight page tag code is used?
- The core NetInsight page tag code is based version 2.3.0

> What if I have already customized my ntpagetag.js file?
- This plug-in contains the core NetInsight tagging code & has an auto-tag add-on JS file (optional). Any extension customizations that you have created can be appended to the ntpagetag.autotag.js file or by adding an additional include call in the ntpagetag.js.php file (bottom)

# Changelog
1.0.3
* restored function that filled the noscript url lc= value

1.0.2
* modified the auto-tagging script to not fire external link events when an href is a direct javascript call.

1.0.1
* cleaned up some EOF empty lines (thanks @boborama)

1.0
* Initial public release

