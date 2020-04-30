<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><!-- InstanceBegin template="/Templates/Inner Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Etisalat Nigeria | Preorder </title>
<link href="common/blaq.css" rel="stylesheet" type="text/css" />

<style type="text/css">

.book
{
	border: none;
    background: url('images/preorder/book.png') no-repeat top left;
    padding: 2px 8px;
    height:41px;
    width:139px;
}

.book:hover {
    border-style: none;
	border-color: inherit;
	border-width: medium;
	background: url('images/preorder/book_over.png') no-repeat left top;
	padding: 2px 8px;
}


.pay
{
	border: none;
    background: url('images/preorder/pay.png') no-repeat top left;
    padding: 2px 8px;
    height:43px;
    width:141px;
}

.pay:hover {
    border-style: none;
	border-color: inherit;
	border-width: medium;
	background: url('images/preorder/pay_over.png') no-repeat left top;
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
//include('flashbanner.html');
require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(Isset($_POST['cbotitle']))
	$cbotitle = $_POST['cbotitle']; else $cbotitle = "";

if(Isset($_POST['txtfirstname']))
	$txtfirstname = $_POST['txtfirstname']; else $txtfirstname = "";

if(Isset($_POST['txtlastname']))
	$txtlastname = $_POST['txtlastname']; else $txtlastname = "";

if(Isset($_POST['txtemail']))
	$txtemail = $_POST['txtemail']; else $txtemail = "";

if(Isset($_POST['txtalternateemail']))
	$txtalternateemail = $_POST['txtalternateemail']; else $txtalternateemail = "";

if(Isset($_POST['txtnumber']))
	$txtnumber = $_POST['txtnumber']; else $txtnumber = "";

if(Isset($_POST['txtalternatenumber']))
	$txtalternatenumber = $_POST['txtalternatenumber']; else $txtalternatenumber = "";

if(Isset($_POST['devicetype']))
	$devicetype = $_POST['devicetype']; else $devicetype = "";

if(Isset($_POST['devicesize']))
	$devicesize = $_POST['devicesize']; else $devicesize = "";

if(Isset($_POST['cboshop']))
	$cboshop = $_POST['cboshop']; else $cboshop = "";

if(Isset($_POST['squestion']))
	$squestion = $_POST['squestion']; else $squestion = "";

if(Isset($_POST['sanswer']))
	$sanswer = $_POST['sanswer']; else $sanswer = "";


?>


<tr>
 <td>
  <table border="0" cellspacing="0" cellpadding="0" style="width: 815px; height: 293px" bgcolor="#ffffff" align="center">
    <!-- MSTableType="layout" -->
   	<tr>
       <td style="width: 15px">&nbsp;</td>
       <td style="width: 627px" valign="top">
		<table border="0" cellspacing="0" cellpadding="0" style="width: 660px; margin-left:auto; margin-right:auto;">
		  <tr>
            <td style="height: 18px"></td>
          </tr>
		  <tr>
            <td valign="top">
				<div class="serviceHeader">
				<table width="100%">
					<tr>
						<td style="text-align:left;color:#739C18; font-size:17px;"><strong>Welcome to Etisalat Preordering System</strong></td>
						<!--td style="text-align:right;color:red; font-size:17px;"><strong><span >Note: This site is for testing purposes only</span></strong></td-->
					</tr>
				</table>
				<br/>
				</div>
				<div class="outerTable">
				<div class="innerTable" id="results" >
				<table style="width: 100%">
					<tr>
						<td>
						<?php
							if(isset($_GET['msg']) )
							{
								 $errorMsg = $_GET['msg'];
								 echo '<br/>';
								 echo '<span style="color:red;font-size:13pt"><strong>**'.$errorMsg.'</strong></span>';
								 echo '<br/>';
							}
			    	    ?>
						<span class="charge"><strong>Customer Preorder Request Information </strong> </span>
						</td>
					</tr>
					<tr>
					  <td>
						<form method="post" onsubmit='return formValidator()'>
					        <table class="serviceTable" border="0" bordercolor="#cccccc" cellpadding="5" cellspacing="0" width="100%">
					            <tr>
					              <td colspan="3" align="right" valign="top"><div align="justify">
									  Kindly fill out the form below and click on the submit button
									  to place your preorder. <br/>
					                <br />
					                The fields marked <span style="color:red">*</span> are mandatory.</div></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top" width="40%">Title:</td>
					              <td colspan="2"><select name="cbotitle" id="cbotitle">
					                <option selected="selected" value="" <?php echo '' . ( $cbotitle == '' ? 'selected':'' ); ?>>----- Select Title ------</option>
									<option value="Miss" <?php echo '' . ( $cbotitle == 'Miss' ? 'selected':'' ); ?>>Miss</option>
					                <option value="Mr" <?php echo '' . ( $cbotitle == 'Mr' ? 'selected':'' ); ?>>Mr</option>
					                <option value="Mrs" <?php echo '' . ( $cbotitle == 'Mrs' ? 'selected':'' ); ?>>Mrs</option>
					                <option value="Dr" <?php echo '' . ( $cbotitle == 'Dr' ? 'selected':'' ); ?>>Dr</option>
					                <option value="Chief" <?php echo '' . ( $cbotitle == 'Chief' ? 'selected':'' ); ?>>Chief</option>
					              </select></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">First Name:</td>
					              <td colspan="2"><input name="txtfirstname" id="txtfirstname" value="<?php echo $txtfirstname ?>" type="text" />
					                <span style="color:red">*</span></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">Last  Name: </td>
					              <td colspan="2"><input name="txtlastname" id="txtlastname" value="<?php echo $txtlastname ?>" type="text" />
					                <span style="color:red">*</span></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">E-mail Address: </td>
					              <td colspan="2"><input name="txtemail" id="txtemail" value="<?php echo $txtemail ?>" type="text" />
					                <span style="color:red">*</span></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">Alternative E-mail Address: </td>
					              <td colspan="2"><input name="txtalternateemail" id="txtalternateemail" value="<?php echo $txtalternateemail ?>" type="text" />
					                <span style="color:red"></span></td>
					            </tr>
					            <tr>
					              <td  align="right"  height="29" valign="top">Mobile number<strong><br />
					                Please provide phone number</strong> on which you can be reached during the day. </td>
					              <td colspan="2" align="left" valign="top"><input name="txtnumber" id="txtnumber" maxlength="11" value="<?php echo $txtnumber ?>" type="text" />
					                <span style="color:red">* eg 08090000200</span></td>
					            </tr>
					            <tr>
					              <td  align="right" valign="top" style="height: 29px">Alternative Mobile number</td>
					              <td colspan="2" align="left" valign="top" style="height: 29px"><input name="txtalternatenumber" id="txtalternatenumber" maxlength="11" value="<?php echo $txtalternatenumber ?>" type="text" />
					                <span style="color:red"></span></td>
					            </tr>
					            <tr>
					              <td  align="right"  height="29" valign="top">Type</td>
					              <td colspan="2" align="left" valign="top">
								  <select name="devicetype" id="devicetype" onChange="getSize(this.value)">
								  <option selected="selected" value="" <?php echo '' . ( $devicetype == '' ? 'selected':'' ); ?>>------------ Select Type ----------</option>
								  <?php

						            	$type = ""; $manu = "";
						            	$query = "SELECT * FROM DEVICES group by name";
										$data = mysqli_query($dbc,$query);

										while($row = mysqli_fetch_array($data))
										{

											$manu = $row['MANUFACTURER'];
											$type = $row['NAME'];

									 	    echo '<option value="'. $type . '" ' . ( $devicetype == $type ? 'selected':'' ) ." > $manu $type </option>";

									    }

								  ?>
								  </select>
				                </td>
					            </tr>
								 <tr>
					              <td  align="right"  height="29" valign="top">Size</td>
					              <td colspan="2" align="left" valign="top">
					               <select name="devicesize" id="devicesize">
					              	 <option value="<?php echo $devicesize ?>"><?php echo $devicesize ?></option>
					               </select>
					              </td>
					            </tr>
					            <tr>
					              <td  align="right" valign="top">Enter quantity you want to preorder </td>
					              <td colspan="2" align="left" valign="top"><span style="color:red">
					              <select name="cboquantity" id="cboquantity">
					                <option selected="selected" value="">--------- Select Quantity ---------</option>
									<option value="1">1</option>
					                <option value="2">2</option>
					                <option value="3">3</option>
					                <option value="4">4</option>
					                <option value="5">5</option>
					                <option value="6">6</option>
					                <option value="7">7</option>
					                <option value="8">8</option>
					                <option value="9">9</option>
					                <option value="10">10</option>
					                <option value="11">11</option>
					                <option value="12">12</option>
					                <option value="13">13</option>
					                <option value="14">14</option>
					                <option value="15">15</option>
					                <option value="16">16</option>
					                <option value="17">17</option>
					                <option value="18">18</option>
					                <option value="19">19</option>
					                <option value="20">20</option>
					                <option value="21">21</option>
					                <option value="22">22</option>
									<option value="23">23</option>
					                <option value="24">24</option>
									<option value="25">25</option>
					                <option value="26">26</option>
									<option value="27">27</option>
					                <option value="28">28</option>
									 <option value="29">29</option>
									<option value="30">30</option>
					                <option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
					              </select>*</span></td>
					            </tr>
					            <tr>
					              <td colspan="3" align="left" valign="top"><strong>INFORMATION&nbsp;ON THE DELIVERY LOCATION
								  </strong> &nbsp;<span style="color:red">*</span></td>
					            </tr>
					            <tr>
					              <td align="right" valign="top">Select the Etisalat experience
								  center you want to pick-up your device </td>
					              <td colspan="2" align="left" valign="top">
								  <select name="cboshop" id="cboshop" style="width: 389px" onchange="document.getElementById('txtshops').value=this.options[this.selectedIndex].text">
						              <option selected="selected" value="" <?php echo '' . ( $cboshop == '' ? 'selected':'' ); ?>>------------ Select Experience Center ----------</option>
									  <?php
	
							            	$shops = ""; $shopsid= "";
							            	$query = "SELECT * FROM ETISALATSHOPS";
											$data = mysqli_query($dbc,$query);
	
											while($row = mysqli_fetch_array($data))
											{
	
												$shopsid = $row['ID'];
												$shops = $row['SHOPS'];
	
										 	    echo '<option value="'. $shopsid . '" ' . ( $cboshop == $shopsid ? 'selected':'' ) ." > $shops </option>";
	
										    }
	
									  ?>
								  </select>
								  <input type="hidden" name="txtshops" id="txtshops" value="" />
								  </td>
					            </tr>
					            <tr>
					              <td colspan="3" align="left" valign="top"><strong>FOR AUTHENTICATION</strong> &nbsp;<span style="color:red">*</span></td>
					            </tr>
					            <tr>
					              <td  align="right"  height="29" valign="top">Secret Question</td>
					              <td colspan="2" align="left" valign="top">
									 <select name="squestion" id="squestion">
									 	<option selected="selected" value="" <?php echo '' . ( $squestion == '' ? 'selected':'' ); ?>>------------ Select Question ----------</option>
										  <?php

								            	$questions = "";
								            	$query = "SELECT * FROM SECRETQUESTIONS";
												$data = mysqli_query($dbc,$query);

												while($row = mysqli_fetch_array($data))
												{

													$questions = $row['QUESTIONS'];

											 	    echo '<option value="'. $questions . '" ' . ( $squestion == $questions ? 'selected':'' ) ." > $questions </option>";

											    }

											     mysqli_close($dbc);

										  ?>
										  </select>
								   <span style="color:red">&nbsp;</span>
				                  </td>
				                </tr>
					            <tr>
					              <td align="right" valign="top">Secret Answer </td>
					              <td colspan="2"><input name="sanswer" id="sanswer" value="<?php echo $sanswer ?>" type="text" size="50px" />
					                <span style="color:red">&nbsp;</span>
					              </td>
					            </tr>
					            <tr>
					            	<th colspan="3" align="center">
					            	   <table>
					            		<br/>
					            		<tr>
								            <th>
								                <input name="booknow" value="" type="submit" class="book" onclick="book(this.form)" />
								            </th>
								            <th width="40px">
								            	<strong>OR</strong>
								            </th>
								            <th>
								                <input name="paynow" value="" type="submit" class="pay" onclick="pay(this.form)" />
								            </th>
								         </tr>
							           </table>
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



<script language="javascript">

function clear(form)
{
	form.action = "index.php";
	form.submit();
}

function book(form)
{
	form.action = "confirm_booking.php";
}

function pay(form)
{
	form.action = "confirm_payment.php";
}

function getSize(str)
{

if (str=="")
{
  document.getElementById("devicesize").innerHTML="";
  return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange=function()
{
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
  {
    document.getElementById("devicesize").innerHTML=xmlhttp.responseText;
  }
}

xmlhttp.open("GET","getsize.php?q="+str,true);
xmlhttp.send();
}


function formValidator()
{
	// Make quick references to our fields
	var txtfirstname = document.getElementById('txtfirstname');
	var txtlastname = document.getElementById('txtlastname');
	var txtemail = document.getElementById('txtemail');
	var txtalternateemail = document.getElementById('txtalternateemail');
	var txtnumber = document.getElementById('txtnumber');
	var txtalternatenumber = document.getElementById('txtalternatenumber');
	var devicetype = document.getElementById('devicetype');
	var devicesize = document.getElementById('devicesize');
	var cboshop = document.getElementById('cboshop');
	var txtdoorstep = document.getElementById('txtdoorstep');
	var squestion = document.getElementById('squestion');
	var sanwser = document.getElementById('sanwser');


	// Check each input in the order that it appears in the form!
	if(isAlphabet(txtfirstname, "Please note that firstname is required and must be letters only")){
		if(isAlphabet(txtlastname, "Please note that lastname is required and must be letters only")){
			if(notEmpty(txtemail, "Please enter a valid email address")){
				if(emailValidator(txtemail, "Please enter a valid email address")){
					if(isNumeric(txtnumber, "Please enter a valid Mobile number ")){
						if(phoneValidator(txtnumber, "Please enter a valid Mobile number ")){
							if(notEmpty(devicetype, "Please select the type of device")){
								if(notEmpty(devicesize, "Please select the size of device")){
									if(isNumeric(cboquantity, "Please select the quantity")){
										if(notEmpty(cboshop,"Please note that delivery location is required" )){
											if(notEmpty(squestion,"Please note that security question is required" )){
												if(notEmpty(sanwser,"Please note that security anwser is required" )){
													return true;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}

	return false;

}

function phoneValidator(elem, helperMsg)
{
	if( elem.value.length > 11 || elem.value == "" || elem.value.length < 11 || isNaN(elem.value) )
	{
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	else
	{
		if(elem.value.charAt(0) != "0")
		{
			alert(helperMsg);
			elem.focus(); // set the focus to this input
			return false;
		}
	}
	return true;
}


function notEmpty(elem, helperMsg){
	if(elem.value.length == 0 || elem.value == "" ){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function BothNotEmpty(elem1, elem2, helperMsg){
	if((elem1.value == "none" && elem2.value.length == 0 ) || (elem1.value == "none" && elem2.value == "") ){
		alert(helperMsg);
			elem1.focus(); // set the focus to this input
			return false;
	}

	return true;
}

function notEmptyAndEqual(elem1, elem2, helperMsg){
	if(elem1.value.length == 0){
		alert(helperMsg);
			elem1.focus(); // set the focus to this input
			return false;
	}else if(elem1.value != elem2.value  ){
		alert(helperMsg);
			elem1.focus();
			return false;
	}

	return true;
}


function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z ]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphanumericAndXter(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z\ \.\/\-\,\_ ]+$/;
	if(elem.value.length==0 || elem.value=="" )
	{
		return true;
	}else{

		if(elem.value.match(alphaExp)){
			return true;
		}else{
			alert(helperMsg);
			elem.focus();
			return false;
		}
	}
}


function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters");
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}


</script>
