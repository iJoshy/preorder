
function SwitchMenu(masterdiv,topobj,obj){
	if(document.getElementById){
		var el = document.getElementById(obj);
		var topMenuClick = document.getElementById(topobj);
		var topMenuList = document.getElementById(masterdiv).getElementsByTagName("div"); 
		var ar = document.getElementById(masterdiv).getElementsByTagName("span"); 
		if(el.style.display != "block"){ 
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") ar[i].style.display = "none";
				topMenuList[i].className="menutitleClosed";
			}
			el.style.display = "block";
			topMenuClick.className="menutitleOpened";
		}else{
			el.style.display = "none";
			topMenuClick.className="menutitleClosed";
		}
	}
}

function SwitchMenu2(masterdiv,topobj,obj){
	if(document.getElementById){
		var el = document.getElementById(obj);
		var topMenuClick = document.getElementById(topobj);
		var topMenuList = document.getElementById(masterdiv).getElementsByTagName("div"); 
		var ar = document.getElementById(masterdiv).getElementsByTagName("span"); 
		if(el.style.display != "block"){ 
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") ar[i].style.display = "none";
				topMenuList[i].className="menuGreenClosed";
			}
			el.style.display = "block";
			topMenuClick.className="menuGreenOpened";
		}else{
			el.style.display = "none";
			topMenuClick.className="menuGreenClosed";
		}
	}
}

function get_cookie(Name) { 
	var search = Name + "="
	var returnvalue = "";
	if (document.cookie.length > 0) {
		offset = document.cookie.indexOf(search)
		if (offset != -1) { 
			offset += search.length
			end = document.cookie.indexOf(";", offset);
			if (end == -1) end = document.cookie.length;
			returnvalue=unescape(document.cookie.substring(offset, end))
		}
	}
	return returnvalue;
}

function onloadfunction(){
	if (persistmenu=="yes"){
		var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
		var cookievalue=get_cookie(cookiename)
		if (cookievalue!="") document.getElementById(cookievalue).style.display="block"
	}
}

function savemenustate(){
	var inc=1, blockid=""
	while (document.getElementById("sub"+inc)){
		if (document.getElementById("sub"+inc).style.display=="block"){
			blockid="sub"+inc
			break
		}
		inc++
	}
	var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
	var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
	document.cookie=cookiename+"="+cookievalue
}


function getCookieVal (offset) {
  var endstr = document.cookie.indexOf (";", offset);
  if (endstr == -1)
    endstr = document.cookie.length;
  return unescape(document.cookie.substring(offset, endstr));
}
function GetCookie (name) {
  var arg = name + "=";
  var alen = arg.length;
  var clen = document.cookie.length;
  var i = 0;
  while (i < clen) {
    var j = i + alen;
    if (document.cookie.substring(i, j) == arg)
      return getCookieVal (j);
    i = document.cookie.indexOf(" ", i) + 1;
    if (i == 0) break; 
  }
  return null;
}
function SetCookie (name,value,expires,path,domain,secure) {
  document.cookie = name + "=" + escape (value) +
    ((expires) ? "; expires=" + expires.toGMTString() : "") +
    ((path) ? "; path=" + path : "") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
}
function DeleteCookie (name,path,domain) {
  if (GetCookie(name)) {
    document.cookie = name + "=" +
      ((path) ? "; path=" + path : "") +
      ((domain) ? "; domain=" + domain : "") +
      "; expires=Thu, 01-Jan-70 00:00:01 GMT";
  }
}

function fixHeight(divname,margin){ 
//divname: name of the div elements which you want to have fixed size
//margin: the uncalculated height of the div due to a margins or padding

     var divs,minHeight,divHeight,d; 

     // get all div elements in the document 
     divs=document.getElementsByTagName('div'); 

     contDivs=[]; 

     // initialize maximum height value 
     maxHeight=50; 

     // iterate over all div elements in the document 
	
	for(var i=0;i<divs.length;i++){ 
		if (divs[i].name==divname) {
			d=divs[i]; 
			// determine height for div element 
			if(d.offsetHeight){ 
				divHeight=d.offsetHeight; 
			} else if(d.style.pixelHeight){ 
				divHeight=d.style.pixelHeight; 
			} 
			if (divHeight>maxHeight) maxHeight=divHeight+margin;
		}
	} 
	
	for(var i=0;i<divs.length;i++){ 
		if (divs[i].name==divname) {
			d=divs[i]; 
			d.style.height=maxHeight;
		}
	} 
	
} 


//Random generator
var keylist="abcdefghijklmnopqrstuvwxyz123456789"
var temp=''

function generateRand(plength){
temp=''
for (i=0;i<plength;i++)
temp+=keylist.charAt(Math.floor(Math.random()*keylist.length))
return temp
}


function changeAction(f,formName)
{
	if (formName=='EIM Mail') {
		f.action = f.action + '&mm=' + generateRand(20);
	}
	return true;
}


//feedback form check
function CheckAll(noSelect)
{

if (noSelect=='true') {
  if (feedback.feedbackType.value == ''){ 
    alert("Please select a feedback type");
//    document.feedback.feedbackType.focus();
    return (false);
  }; 
  if (feedback.inquiryType.value == ''){ 
    alert("Please select a feedabck sub-category");
//    document.feedback.inquiryType.focus();
    return (false);
  }; 
} else {

  if (feedback.feedbackType.selectedIndex == 0){ 
    alert("Please select a feedback type");
    document.feedback.feedbackType.focus();
    return (false);
  }; 
  if (feedback.inquiryType.selectedIndex <= 0){ 
    alert("Please select an inquiry type");
    document.feedback.inquiryType.focus();
    return (false);
  }; 
}
  if (document.feedback.name.value == ""){ 
    document.feedback.name.focus() ;
    alert("Please enter your name");
    return false ;
  };
  if (document.feedback.email.value == ""){
    document.feedback.email.focus() ;
    alert("Please enter your email address");
    return false ;
  };	
  if(!isEmail(document.feedback.email.value)){
    document.feedback.email.focus() ;
    alert("The email address you entered wasn't correct \nPlease check it again");
    return false ;				
  };
  if (document.feedback.contact.value == ""){ 
    document.feedback.contact.focus() ;
    alert("Please enter your contact");
    return false ;
  };
  if (document.feedback.subject.value == ""){ 
    document.feedback.subject.focus() ;
    alert("Please enter feedback subject");
    return false ;
  };
  if (document.feedback.comments.value == ""){ 
    document.feedback.comments.focus() ;
    alert("Please enter your comments");
    return false ;
  };
  return true;	
}

function isEmail(str) 
{
  // are regular expressions supported?
  var supported = 0;
  if (window.RegExp) 
  {
    var tempStr = "a";
    var tempReg = new RegExp(tempStr);
    if (tempReg.test(tempStr)) supported = 1;
  }
  if (!supported) 
    return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);
    var r1 = new RegExp("(@.*@)|(\\.\\.)|(@\\.)|(^\\.)");
    var r2 = new RegExp("^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$");
    return (!r1.test(str) && r2.test(str));
}
