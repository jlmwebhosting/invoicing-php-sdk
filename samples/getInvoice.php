<?php
$path = '../lib';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once('services/Invoice/InvoiceService.php');
require_once('PPLoggingManager.php');

$logger = new PPLoggingManager('getInvoiceTest');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// send request
	$requestEnvelope = new RequestEnvelope();
	$requestEnvelope->errorLanguage = "en_US";
	$getInvoiceDetailsRequest = new GetInvoiceDetailsRequest($requestEnvelope, 
																$_POST['invoiceID']);
	$logger->error("created  GetInvoiceDetailsRequest Object");
	$invoice_service = new InvoiceService();
	$sendInvoiceResponse = $invoice_service->GetInvoiceDetails($getInvoiceDetailsRequest, 'jb-us-seller1_api1.paypal.com');
	$logger->error("Received SendInvoiceResponse:");
	var_dump($sendInvoiceResponse);
} else {
	
?>
<html>
<head><title>GetInvoiceDetails Sample API Page</title></head>
<body>
<h2>GetInvoiceDetails API Test Page</h2>
<form method="POST">
	<div class="params">
		<div class="param_name">InvoiceID</div>
		<div class="param_value"><input type="text" name="invoiceID" value="" size="50" maxlength="260"/></div>
	</div>
	<input type="submit" name="GetInvoiceDetailsBtn" value="Get Invoice Details"/>
</form>
</body>
</html>
<?php 
}
?>