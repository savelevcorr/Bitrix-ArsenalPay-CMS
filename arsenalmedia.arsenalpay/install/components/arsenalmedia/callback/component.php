<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('arsenalmedia.arsenalpay'))
{
    ShowError(GetMessage("CC_BCF_MODULE_NOT_INSTALLED"));
	return;
}
CModule::IncludeModule("sale");
// Example to check / callback

/*
	Here is read from CMS config params:
	$KEY      - Security key
	$IP_ALLOW - Allow remote IP address
*/
// For example:
$KEY       = COption::GetOptionString('arsenalmedia.arsenalpay','key');
$IP_ALLOW  = COption::GetOptionString('arsenalmedia.arsenalpay','ip_adress');

$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
$str_log = date("Y-m-d H:i:s")." ".$REMOTE_ADDR." ";
// Read incoming POST request:
foreach ($_POST as $post_key => $post_value)
{
	$str_log.= "$post_key=$post_value ";
	$$post_key = $post_value;
}
post_log($str_log);

// Check IP allow:
if(strlen($IP_ALLOW)>0 && $IP_ALLOW!=$REMOTE_ADDR) exitf("ERR_IP");
/*
	Incoming params:
	ID       - Identifier of the partner
	FUNCTION - Request type
	RRN      - Identifier of the transaction
	PAYER    - Identifier of the payer
	AMOUNT   - Amount of payment
	ACCOUNT  - Identifier of the recipient
	STATUS   - Status of the payment
	DATETIME - Date and time by ISO 8601 (YYYY-MM-DDThh:mm:ss±hh:mm), URL-encoded
	SIGN     - Signature of request
*/

// Decode DATETIME
$DATETIME = urldecode($DATETIME);
// Check Params:
if(strlen($ID)       == 0) exitf("ERR_ID");
if(strlen($FUNCTION) == 0) exitf("ERR_FUNCTION");
if(strlen($RRN)      == 0) exitf("ERR_RRN");
if(strlen($PAYER)    == 0) exitf("ERR_PAYER");
if(strlen($AMOUNT)   == 0) exitf("ERR_AMOUNT");
if(strlen($ACCOUNT)  == 0) exitf("ERR_ACCOUNT");
if(strlen($STATUS)   == 0) exitf("ERR_STATUS");
if(strlen($DATETIME) == 0) exitf("ERR_DATETIME");
// Check Signature
if(strlen($SIGN)==0 || $SIGN!=md5(md5($ID).md5($FUNCTION).md5($RRN).md5($PAYER).md5($AMOUNT).md5($ACCOUNT).md5($STATUS).md5($KEY))) exitf("ERR_SIGN");

if($FUNCTION=="check")
{
	// Check account
	/*
		Here is account check procedure
		Result:
		YES - account exists
		NO - account not exists
	*/
	// For example:	
	$bCorrectPayment = false;
	
	if(IntVal($ACCOUNT) > 0)
	{
		$bCorrectPayment = True;
		if (!($arOrder = CSaleOrder::GetByID(IntVal($ACCOUNT))))
			$bCorrectPayment = False;	
			
		else if ($arOrder["PAYED"] == "Y")
			$bCorrectPayment = False;
	}
	
	if($bCorrectPayment)
	{	
		exitf("YES");
	}
	else
	{
		exitf("NO");
	}
}
elseif($FUNCTION=="payment")
{
	// Payment callback
	/*
		Here is callback payment saving procedure
		Result:
		OK - success saving
		ERR - error saving
	*/

	$arOrder = CSaleOrder::GetByID(IntVal($ACCOUNT));
	$arFields = array(
		"PS_STATUS" => "Y",
		"PS_STATUS_CODE" => "-",
		"PS_STATUS_DESCRIPTION" => "PAYED",
		"PS_STATUS_MESSAGE" => "Îïëà÷åíî",
		"PS_SUM" => $AMOUNT,
		"PS_CURRENCY" => "",
		"PS_RESPONSE_DATE" => Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat("FULL", LANG))),
	);
	
	if ($arOrder["PRICE"] == $AMOUNT)
	{
		$arFields["PAYED"] = "Y";
		$arFields["DATE_PAYED"] = Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat("FULL", LANG)));
		$arFields["EMP_PAYED_ID"] = false;
	}

	if(CSaleOrder::Update($arOrder["ID"], $arFields))
	{
		CSaleOrder::StatusOrder($arOrder["ID"], "P");
		exitf("OK");
	}
	else
	{
		exitf("ERR");
	}
}
else exitf("ERR_FUNCTION");

function exitf($msg)
{
	global $str_log;
	// Save incoming params into log file:
	$fp=fopen(realpath(dirname(__FILE__))."/callback.log","a");
	fwrite($fp,$str_log.$msg."\r\n");
	fclose($fp);

	echo $msg;
	exit;
}

function post_log($str)
{
	$fp=fopen(realpath(dirname(__FILE__))."/callback.log","a");
	fwrite($fp,$str."\r\n");
	fclose($fp);
}
?>
