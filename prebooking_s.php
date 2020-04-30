<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><!-- InstanceBegin template="/Templates/Inner Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Etisalat Nigeria | Preorder</title>
<link href="common/blaq.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5547935-1']);
  _gaq.push(['_setDomainName', 'etisalat.com.ng']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>

<?php 

include('header.html'); 
include('flashbanner.html');

$device= "";

if(Isset($_GET['devicetype']))
{
	$device= $_GET['devicetype'];
}
else
{
	header('Location: index.php');
}


?>

<tr>
 <td>
  <table border="0" cellspacing="0" cellpadding="0" style="width: 815px; height: 293px" bgcolor="#ffffff" align="center">
    <!-- MSTableType="layout" -->
   	<tr>
       <td style="width: 15px">&nbsp;</td>
       <td style="width: 627px" valign="top">
		<table border="0" cellspacing="0" cellpadding="0" style="width: 600px; margin-left:auto; margin-right:auto;">			
		  <tr>
            <td style="height: 18px"></td>
          </tr>
		  <tr>
            <td valign="top">
				<div class="serviceHeader"><strong><span class="header"><?php echo $device ?> Booking<br/><br/></span></strong></div>
				<div class="outerTable">
				<div class="innerTable" id="results" >
				<table style="width: 100%">				
					<tr>
						<td>																				
					        <table class="serviceTable" border="0" bordercolor="#cccccc" cellpadding="5" cellspacing="0" width="100%">
					         
					            <tr>
					              <th align="right" valign="top">
					              <div align="justify">Dear <?php echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?>,
									  <br />
									  <br />
									  Your <?php echo $device ?> booking request has been processed. 
									  Kindly visit your chosen etisalat experience center 
									  to complete the transaction. <br />
									  <br />
									  Do bring along your Customer ID :  <?php echo $_GET['custid']; ?>
									  <br /><br /> 
									  Thank you. <br />
									  <br />
									</div>
									</th>
					            </tr>                    
					        </table>
     				     </td>
				     </tr>
				</table>
				</div>
			    </div>
			</td>
          </tr>
		</table>
	   </td>
    </tr>
   </table>
 </td>
</tr>

<tr>
  <td>
    <table width="815" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td class="tdivider">&nbsp;</td>
      </tr>
      <tr>
        <td><?php include('common/footer.html'); ?></td>
      </tr>   
    </table>
  </td>
</tr>
