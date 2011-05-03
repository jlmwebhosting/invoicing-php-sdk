<?php
$path = './lib';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once('lib/services/Invoice/InvoiceService.php');
require_once('PPLoggingManager.php');

$logger = new PPLoggingManager('createInvoiceTest');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// send request
	$requestEnvelope = new RequestEnvelope();
	$requestEnvelope->errorLanguage = "en_US";
	$createInvoiceRequest = new SendInvoiceRequest($requestEnvelope, $_POST['invoiceID']);
	$logger->error("created SendInvoice Object");
	$invoice_service = new InvoiceService();
	$sendInvoiceResponse = $invoice_service->SendInvoice($createInvoiceRequest, 'jb-us-seller2_api1.paypal.com');
	$logger->error("Received SendInvoiceResponse:");
	var_dump($sendInvoiceResponse);
} else {
	
?>
<html>
<head><title>SendInvoice Sample API Page</title></head>
<body>
<h2>SendInvoice API Test Page</h2>
<form method="POST">
	<div class="params">
		<div class="param_name">InvoiceID</div>
		<div class="param_value"><input type="text" name="invoiceID" value="" size="50" maxlength="260"/></div>
	</div>
	<input type="submit" name="CreateInvoiceBtn" value="Send Invoice"/>
</form>
</body>
</html>
<?php 
}
?>