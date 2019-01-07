	/*
	Description: Plugin for deploying NetInsight analytics page tags
	Author: Lee Isensee (<a href="http://twitter.com/leeisensee">@leeisensee</a>)
	Version: 1.0.1
	Author URI: https://www.leeisensee.com
	Copyright: 2011 Lee Isensee
	*/

var host = document.location.host.toString().toLowerCase();

function autotag() 
{
	for (var i=0; i<document.links.length; i++ )
	{
		iLink = document.links[i];
		if (iLink.href.toLowerCase().indexOf(host) == -1) 
		{
			if (iLink.target == "_blank" || popUp(iLink))
			{
				if(iLink.onclick == "" || iLink.onclick == null)
				{	
					iLink.onclick = function() {ntptEventTag('ev=externallink&link=' + encodeURIComponent(this.href));};
				}	
				else
				{
					if(window.attachEvent)
					{
						iLink.tmpclick = iLink.onclick;
						iLink.onclick = function() {ntptEventTag('ev=externallink&link=' + encodeURIComponent(this.href)); return this.tmpclick();};
					}
					else
						EV(iLink, "click", function() {ntptEventTag('ev=externallink&link=' + encodeURIComponent(this.href));});
				}
			}
			else
			{					
				if(iLink.onclick == "" || iLink.onclick == null)
					iLink.onclick = function() { ntptEventTag('ev=externallink&link=' + encodeURIComponent(this.href)); nipause(500); };
				else
				{
					if (window.attachEvent)
					{
						iLink.tmpclick = iLink.onclick;
						iLink.onclick = function() { ntptEventTag('ev=externallink&link=' + encodeURIComponent(this.href)); return this.tmpclick(); nipause(500); };
					}
					else
						EV(iLink, "click", function() { ntptEventTag('ev=externallink&link=' + encodeURIComponent(this.href)); nipause(500); });
				}	
			}
		}
		else
		{
			for (var j=0; j<fileExt.length; j++)
			{
				if (iLink.href.toLowerCase().indexOf(fileExt[j]) > -1)
				{
					//non-HTML link
					if (iLink.target == "_blank" || popUp(iLink))
					{
						if(iLink.onclick == "" || iLink.onclick == null)
						{	
							iLink.onclick = function() {ntptEventTag('lc=' + encodeURIComponent(this.href) + '&rf=' + encodeURIComponent(document.location));};
						}	
						else
						{
							if(window.attachEvent)
							{
								iLink.tmpclick = iLink.onclick;
								iLink.onclick = function() {ntptEventTag('lc=' + encodeURIComponent(this.href) + '&rf=' + encodeURIComponent(document.location)); return this.tmpclick(); };
							}
							else
								EV(iLink, "click", function() {ntptEventTag('lc=' + encodeURIComponent(this.href) + '&rf=' + encodeURIComponent(document.location));});
						}
					}
					else
					{		
						if(iLink.onclick == "" || iLink.onclick == null)
							iLink.onclick = function() { ntptEventTag('lc=' + encodeURIComponent(this.href) + '&rf=' + encodeURIComponent(document.location)); nipause(500); };
						else if (window.attachEvent)
					{
						iLink.tmpclick = iLink.onclick;
						iLink.onclick = function() { ntptEventTag('lc=' + encodeURIComponent(this.href) + '&rf=' + encodeURIComponent(document.location)); return this.tmpclick(); nipause(500)};
					}
					else
						EV(iLink, "click", function() { ntptEventTag('lc=' + encodeURIComponent(this.href) + '&rf=' + encodeURIComponent(document.location)); nipause(500); });
						}
					
				}
			}
		}
	};
}

function popUp(linkobj)
{
	if (linkobj.onclick != undefined)
		if (linkobj.onclick.toString().toLowerCase().indexOf("window.open") > -1) 
			return true; 
		else
			return false;
	else
		return false;
}

function EV(a,b,c,d)
{
    if(a.addEventListener)
    {
    	a.addEventListener(b,c,false)
    }
    else if(a.attachEvent)
    {
    	a.attachEvent(((d==1)?"":"on")+b,c)
    }
}

function nipause(ms){
  var date = new Date();
  var curDate = null;
   do {
      curDate = new Date();
      }
   while(curDate-date < ms);
}

EV(window,"load", autotag);

	var cookieName = "ntConversion";

        function getCookie(c_name) 
        {
            if (document.cookie.length>0)
            {
                c_start=document.cookie.indexOf(c_name + "=");
                if (c_start!=-1)
                {
                    c_start=c_start + c_name.length+1;
                    c_end=document.cookie.indexOf(";",c_start);
                    if (c_end==-1) c_end=document.cookie.length;
                    return unescape(document.cookie.substring(c_start,c_end));
                }
            }
            return "";
        }

        function setCookie(c_name,value) 
        {
            if(getCookie(c_name) != null && getCookie(c_name) != "")
            {
                document.cookie = c_name + "=;expires=-1;"; 
            }

            if(value != "") 
			{
            	var exdate = new Date(); 
            	exdate.setFullYear(exdate.getFullYear() + 2); 
            	document.cookie = c_name+ "=" +escape(value)+ ";expires=" + exdate.toGMTString()+ ";domain=" + NTPT_IDCOOKIE_DOMAIN +";path=/"; 
            }
        }

        var ntConversion = getCookie(cookieName); 
        if(ntConversion != null && ntConversion != "")
        { //cookie exists, check conversion, and update value
            var vals = ntConversion.split('&');
            var conv = vals[1].split("=");
            var visit = vals[0].split("=");
            var last = vals[2].split("=");
           	var since = vals[3].split("=");

			var today = new Date();

            if((today.getTime() - last[1])/1800000 > 1.0 ) 
            {
            	if( (conv[1] == "false") )
            	{ 
                	visit[1]++;
                }
	            else
	            { 
            		conv[1] = "past";
           			since[1]++;
            	}
            }

            setCookie(cookieName, visit.join("=") + "&" + conv.join("=") + "&last=" + today.getTime() + "&" + since.join("=") );

        }
        else
        { 
        	var today = new Date();
            setCookie(cookieName, "visit=1&conversion=false&last=" + today.getTime() + "&since=0" );
        }

        function convert() 
        {
			var ntConversion = getCookie(cookieName);
			if(ntConversion != null && ntConversion != "")
			{ //cookie exists, check conversion, and update value
				ntConversion = ntConversion.replace(/false/,"true");
				setCookie(cookieName, ntConversion);
			}
        }