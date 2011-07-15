<?php
$path = '../lib';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once('services/Invoice/InvoiceService.php');
require_once('PPLoggingManager.php');

$logger = new PPLoggingManager('createInvoiceTest');
$currentFile = $_SERVER["SCRIPT_NAME"];
$parts = Explode('/', $currentFile);
$currentFile = $parts[count($parts) - 1];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// send request
	$requestEnvelope = new RequestEnvelope();
	$requestEnvelope->errorLanguage = "en_US";
	$createInvoiceRequest = new SendInvoiceRequest($requestEnvelope, $_POST['invoiceID']);
	$logger->error("created SendInvoice Object");
	$invoice_service = new InvoiceService();
if(($_POST['accessToken']!= null) && ($_POST['tokenSecret'] != null))
	{
		$invoice_service->setAccessToken($_POST['accessToken']);
		$invoice_service->setTokenSecret($_POST['tokenSecret']);
	}
	$sendInvoiceResponse = $invoice_service->SendInvoice($createInvoiceRequest, 'jb-us-seller_api1.paypal.com');
	$logger->error("Received SendInvoiceResponse:");
	var_dump($sendInvoiceResponse);
} else {

	?>
<html>
<head>
<title>SendInvoice Sample API Page</title>
</head>
<body>
<h2>SendInvoice API Test Page</h2>
<form method="POST">
<div class="params">
<div class="param_name">InvoiceID</div>
<div class="param_value"><input type="text" name="invoiceID" value=""
	size="50" maxlength="260" /></div>
</div>
<br>
below fields are required only if third party permissioning is used<br>
---------------------------------------------------------------------------------------------<br>
Using Permission Credentials <br>
<a href="Permissions/RequestPermissions.php">(Get AccessToken and TokenSecret here)</a><br />
<div class="param_name">Access Token</div>

<div class="param_value"><input type="text" name="accessToken"
	value="<?php if(isset($_SESSION['permToken']))echo$_SESSION['permToken']?>"
	size="50" maxlength="260" /></div>
<div class="param_name">Token Secret</div>
<div class="param_value"><input type="text" name="tokenSecret" id="auth"
	value="<?php if(isset($_SESSION['permTokenSecret'])) echo $_SESSION['permTokenSecret']?>"
	size="50" maxlength="260" /></div>
<input type="submit" name="CreateInvoiceBtn" value="Send Invoice" /></form>
</body>
</html>
	<?php
}
?>