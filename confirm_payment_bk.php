<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><!-- InstanceBegin template="/Templates/Inner Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Etisalat Nigeria | Preorder</title>
<link href="common/blaq.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.back
{
	border: none;
    background: url('images/preorder/back.png') no-repeat top left;
    padding: 2px 8px;
    height:43px;
    width:141px;
}

.back:hover {
    border-style: none;
	border-color: inherit;
	border-width: medium;
	background: url('images/preorder/back_over.png') no-repeat left top;
	padding: 2px 8px;
}

</style>

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
require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


$cbotitle= $_POST['cbotitle'];
$txtfirstname= $_POST['txtfirstname'];
$txtlastname= $_POST['txtlastname'];
$txtemail= $_POST['txtemail'];
$txtalternateemail= $_POST['txtalternateemail'];
$txtnumber= $_POST['txtnumber'];
$txtalternatenumber= $_POST['txtalternatenumber'];
$cboquantity= $_POST['cboquantity'];
$cboshop= $_POST['cboshop'];
$squestion = $_POST['squestion'];
$sanswer = $_POST['sanswer'];
$devicetype= $_POST['devicetype'];
$devicesize= $_POST['devicesize'];
$itemcode = "";
$paymentcode = "";
$amount = "";


$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y")+17);
$expdate = date("Y-m-d", $tomorrow);
$query=""; $newdbref = ""; $nowdate = date("Y-m-d");
$iswresult = ""; $client = ""; $array = "";


//Generate Customer ID and get device details (amount, itemcode & paymentcode)
$custid = "";
try
{
	$query = "SELECT REFERENCE_NO FROM reference";
	$data = mysqli_query($dbc,$query);

	if(mysqli_num_rows($data) == 1)
	{
		$row = mysqli_fetch_array($data);

		$newdbref = $row['REFERENCE_NO'] + 1;
		$custid = ISW_ID . str_pad($newdbref,9,"0",STR_PAD_LEFT);
	}

	$query = "SELECT * FROM DEVICES WHERE NAME = '$devicetype'  AND SIZE = '$devicesize'";
	$data = mysqli_query($dbc,$query);
	while($row = mysqli_fetch_array($data))
	{
		$amount = $row['AMOUNT'];
		$paymentcode = $row['PAYMENTCODE'];
		$itemcode = $row['ITEMCODE'];
	}

	//$amount = 100;
	$amount = $amount * $cboquantity;
	$iswamount = $amount * 100;

}
catch (Exception $e)
{
header('Location: index.php?msg=101 - Oops, server is temporarily unavailable, please try again later!');
}


//Connect to Interswitch to log Id
try
{

	$Booking = array(
		  'ReferenceNumber' => $custid,
		  'Description' => $devicetype,
		  'Amount' => $iswamount ,
		  'DateBooked' => $nowdate,
		  'DateExpired' => $expdate,
		  'FirstName' => $txtfirstname,
		  'LastName' => $txtlastname,
		  'Email' => $txtemail,
		  'ItemCode' => $itemcode
	);

	$params = array(
		  'MerchantId' => ISW_ID,
		  'Bookings' => array($Booking)
	);


	if(!@file_get_contents(WSDL_URL))
	{
		throw new SoapFault('Server', 'No WSDL found at ' . WSDL_URL);
	}

	$client = new SoapClient(WSDL_URL);

	$array = $client->CreateBooking(array('ReservationRequest' => $params));
	$iswresult = $array->CreateBookingResult->Booking->ResponseCode;

}
catch (Exception $e)
{
    header('Location: index.php?msg=102 - Oops, server is temporarily unavailable, please try again later!');
}
catch(SoapFault $se)
{
	header('Location: index.php?msg=103 - Oops, server is temporarily unavailable, please try again later!');
}

//var_dump($Booking);
//var_dump($params);
//echo $iswresult;
//exit;
//Connect and Log transaction on local db

if( $iswresult == '100' )
{
	try
	{
		$query = "INSERT INTO transactions VALUES ('$custid',NOW(),'$txtfirstname','$txtlastname','$txtemail','$txtalternateemail','$txtnumber',".
			     "'$txtalternatenumber','$cboquantity','$devicetype','$devicesize','$amount','$cboshop','$squestion','$sanswer','0','','')";

		mysqli_query($dbc, $query);

		$query = "UPDATE reference SET REFERENCE_NO = '$newdbref'";
		mysqli_query($dbc, $query);

	}
	catch(Exception $e)
	{
		header('Location: index.php?msg=104 - Oops, server is temporarily unavailable, please try again later!');
	}

}
else
{
	header('Location: index.php?msg=105 - Oops, server is temporarily unavailable, please try again later!'.$iswresult);
}

mysqli_close($dbc);


//$txtredirect = 'http://preorder.etisalat.com.ng/do_payment.php?params=' . $amount . ',' . $custid . ',' . $device . ',' . $ipadtype . ',' . $txtfirstname . ',' . $txtlastname;
$txtredirect = 'http://preorder.etisalat.com.ng/do_payment.php?params=' . $custid;

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
				<div class="serviceHeader"><strong><span class="header">Etisalat Preordering System<br/><br/></span></strong></div>
				<div class="outerTable">
				<div class="innerTable" id="results" >
				<table style="width: 100%">
					<tr>
						<td><span class="charge"><strong>Customer Preorder Request Information </strong> </span></td>
					</tr>
					<tr>
					  <td>
						<form action="do_booking.php" method="post" >
						<input name="amount" id="amount" value="<?php echo $amount; ?>" type="hidden" />
						<input name="custid" id="custid" value="<?php echo $custid; ?>" type="hidden" />
						<input name="txtfirstname" id="txtfirstname" value="<?php echo $txtfirstname; ?>" type="hidden" />
						<input name="txtlastname" id="txtlastname" value="<?php echo $txtlastname; ?>" type="hidden" />
						<input name="devicetype" id="devicetype" value="<?php echo $devicetype; ?>" type="hidden" />
					        <table class="serviceTable" border="0" bordercolor="#cccccc" cellpadding="5" cellspacing="0" width="100%">
					            <tr>
					              <td colspan="3" align="right" valign="top">
					              <div align="justify">
									  Kindly confirm the form below and click on the submit button
									  to place your <strong><?php echo $devicetype?></strong> preorder. <br/>
					                <br />
					                These are your entries for confirmation. <span style="color:red">*</span>
					                &nbsp;&nbsp;&nbsp;Customer ID : <strong><?php echo $custid; ?></strong>
					              </div>
					              </td>
					            </tr>
					            <tr>
					              <td align="right" valign="top" width="35%">Title:</td>
					              <td colspan="2"><strong><?php echo $cbotitle; ?></strong></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">First Name:</td>
					              <td colspan="2"><strong><?php echo $txtfirstname; ?></strong></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">Last  Name: </td>
					              <td colspan="2"><strong><?php echo $txtlastname; ?></strong></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">E-mail Address: </td>
					              <td colspan="2"><strong><?php echo $txtemail; ?></strong></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">Alternative E-mail Address: </td>
					              <td colspan="2"><strong><?php echo $txtalternateemail; ?></strong></td>
					            </tr>
					            <tr>
					              <td  align="right"  height="29" valign="top">Mobile number<strong><br />
					                Please provide phone number</strong> on which you can be reached during the day. </td>
					              <td colspan="2" align="left" valign="top"><strong><?php echo $txtnumber; ?></strong></td>
					            </tr>
					            <tr>
					              <td  align="right"  height="29" valign="top">Alternative Mobile number</td>
					              <td colspan="2" align="left" valign="top"><strong><?php echo $txtalternatenumber; ?></strong></td>
					            </tr>
					            <tr>
					              <td  align="right" valign="top">Quantity you want to preorder </td>
					              <td colspan="2" align="left" valign="top"><strong><?php echo $cboquantity; ?></strong></td>
					            </tr>
					            <tr>
					              <td  align="right" valign="top">Amount</td>
					              <td colspan="2" align="left" valign="top"><strong><strike>N</strike><?php echo number_format($amount); ?></strong></td>
					            </tr>
					            <tr>
					              <td colspan="3" align="left" valign="top"><strong>INFORMATION&nbsp;ON THE DELIVERY LOCATION
								  </strong> &nbsp;<span style="color:red">*</span></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">Select the Etisalat experience
								  center you want to pick-up your device </td>
					              <td colspan="2" align="left" valign="top"><strong><?php echo $cboshop; ?></strong></td>
					            </tr>
					            <tr>
 						            <th>
 						            <br/>
						                <input name="back" value="" type="button" class="back" onClick="window.history.back()" />
						            </th>
									<th colspan="2" align="left">
									<br/>
									<input type="hidden" id="amountField" runat="server" value="<?php echo $iswamount; ?>" />
									<input type="hidden" id="customerIdField" runat="server" value="<?php echo $custid; ?>" />
									<input type="hidden" id="emailField" runat="server" value="<?php echo $txtemail; ?>" />
									<input type="hidden" id="mobileNumberField" runat="server" value="<?php echo $txtnumber; ?>" />
									<input type="hidden" id="txtredirect" value="<?php echo $txtredirect; ?>" />

								   <a class="quickteller-checkout-anchor" id="<?php echo $paymentcode; ?>" ></a>
					               <script type="text/javascript">
					                   var QTCheckout = QTCheckout || {};
					                   QTCheckout.paymentItems = QTCheckout.paymentItems || [];
					                   QTCheckout.paymentItems.push({
					                       paymentCode: '<?php echo $paymentcode; ?>',
					                       extraData: {
					                            amount: 'default',
									            amountFieldId:'amountField',
									            customerId: 'default',
									            customerIdFieldId:'customerIdField',
									            mobileNumber:'default',
									            mobileNumberFieldId:'mobileNumberField',
									            emailAddress:'default',
									            emailAddressFieldId: 'emailField',
									            buttonSize:'large',
									            redirectUrl:'<?php echo $txtredirect; ?>'
					                       }
					                   });
					                   if (!QTCheckout.qtScript) {
					                       var qtScript = document.createElement('script'); qtScript.type = 'text/javascript'; qtScript.async = true; qtScript.src = "https://paywith.quickteller.com/scripts/quickteller-checkout-min.js?v=" + new Date().getDay(); var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(qtScript, s); QTCheckout.qtScript = qtScript;
					                   } else if (QTCheckout.buildPaymentItemsUI) { QTCheckout.buildPaymentItemsUI(); }
					               </script>
					           	   <!--a class="quickteller-checkout-anchor" id="95002"></a>
					               <script type="text/javascript">
					                   var QTCheckout = QTCheckout || {};
					                   QTCheckout.paymentItems = QTCheckout.paymentItems || [];
					                   QTCheckout.paymentItems.push({
					                       paymentCode: "95002",
					                       extraData: {
					                           amount: 'default',
					                           amountFieldId:'amountField',
					                           customerId: 'default',
					                           customerIdFieldId:'customerIdField',
					                           mobileNumber:'default',
					                           mobileNumberFieldId:'mobileNumberField',
					                           emailAddress:'default',
					                           emailAddressFieldId: 'emailField',
					                           buttonSize:'long',
					                           redirectUrl:'default'
					                       }
					                   });
					                   if (!QTCheckout.qtScript) {
					                       var qtScript = document.createElement('script'); qtScript.type = 'text/javascript'; qtScript.async = true; qtScript.src = "http://testwebpay.interswitchng.com/quicktellercheckout/scripts/quickteller-checkout.js?v=" + new Date().getDay(); var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(qtScript, s); QTCheckout.qtScript = qtScript;
					                   } else if (QTCheckout.buildPaymentItemsUI) { QTCheckout.buildPaymentItemsUI(); }
					               </script-->
   						          </th>
					            </tr>
					        </table>
					      </form>
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

