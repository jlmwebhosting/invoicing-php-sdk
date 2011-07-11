<?php
$path = './lib';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once('lib/services/Invoice/InvoiceService.php');
require_once('PPLoggingManager.php');

$logger = new PPLoggingManager('searchInvoiceTest');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// send request
	$requestEnvelope = new RequestEnvelope();
	$requestEnvelope->errorLanguage = "en_US";
	$parameters = new SearchParametersType($_POST['currencyCode']);
	if(isset($_POST['email'])) {
		$parameters->email = $_POST['email'];
	}
	if(isset($_POST['recipientName'])) {
		$parameters->recipientName = $_POST['recipientName'];
	}
	if(isset($_POST['companyName'])) {
		$parameters->companyName = $_POST['companyName'];
	}
	if(isset($_POST['invoiceNumber'])) {
		$parameters->invoiceNumber = $_POST['invoiceNumber'];
	}
	if(isset($_POST['status'])) {
		$parameters->status = $_POST['status'];
	}
	if(isset($_POST['lowerAmount'])) {
		$parameters->lowerAmount = $_POST['lowerAmount'];
	}
	if(isset($_POST['upperAmount'])) {
		$parameters->upperAmount = $_POST['upperAmount'];
	}
	if(isset($_POST['memo'])) {
		$parameters->memo = $_POST['memo'];
	}
	if(isset($_POST['origin'])) {
		$parameters->origin = $_POST['origin'];
	}
	if(isset($_POST['invoiceDate_startDate']) || isset($_POST['invoiceDate_endDate'])) {
		 $invoiceDate = new DateRangeType();
		if(isset($_POST['invoiceDate_startDate']))
			$invoiceDate->startDate = $_POST['invoiceDate_startDate'];
		if(isset($_POST['invoiceDate_endDate']))
			$invoiceDate->endDate = $_POST['invoiceDate_endDate'];
			
		$parameters->invoiceDate = $invoiceDate;
	}
	
	if(isset($_POST['dueDate_startDate']) || isset($_POST['dueDate_endDate'])) {
		 $dueDate = new DateRangeType();
		if(isset($_POST['dueDate_startDate']))
			$dueDate->startDate = $_POST['dueDate_startDate'];
		if(isset($_POST['dueDate_endDate']))
			$dueDate->endDate = $_POST['dueDate_endDate'];
			
		$parameters->dueDate = $dueDate;
	}
	if(isset($_POST['paymentDate_startDate']) || isset($_POST['paymentDate_endDate'])) {
		 $paymentDate = new DateRangeType();
		if(isset($_POST['paymentDate_startDate']))
			$paymentDate->startDate = $_POST['paymentDate_startDate'];
		if(isset($_POST['paymentDate_endDate']))
			$paymentDate->endDate = $_POST['paymentDate_endDate'];
			
		$parameters->paymentDate = $paymentDate;
	}
	if(isset($_POST['creationDate_startDate']) || isset($_POST['creationDate_endDate'])) {
		 $creationDate = new DateRangeType();
		if(isset($_POST['creationDate_startDate']))
			$creationDate->startDate = $_POST['creationDate_startDate'];
		if(isset($_POST['creationDate_endDate']))
			$creationDate->endDate = $_POST['creationDate_endDate'];
			
		$parameters->creationDate = $creationDate;
	}	
	
	$searchInvoicesRequest = new SearchInvoicesRequest($requestEnvelope, $_POST['merchantEmail'], $parameters);
	$logger->error("created SendInvoice Object");
	var_dump($searchInvoicesRequest);
	$invoice_service = new InvoiceService();
	$searchInvoicesResponse = $invoice_service->SearchInvoices($searchInvoicesRequest, 'jb-us-seller2_api1.paypal.com');
	$logger->error("Received SearchInvoicesResponse:");
	var_dump($searchInvoicesResponse);
} else {
	
?>
<html>
<head><title>SearchInvoices Sample API Page</title></head>
<body>
<h2>SearchInvoices API Test Page</h2>
<form method="POST">
	<div class="params">
		<div class="param_name">Merchant Email</div>
		<div class="param_value"><input type="text" name="merchantEmail" value="jb-us-seller2@paypal.com" size="50" maxlength="260"/></div>
		<div class="param_category">Search Parameters:
			<div class="param_name">CurrencyCode</div>
				<div class="param_value">
				<select name="currencyCode">
					<option value="USD" selected>USD</option>
					<option value="EUR">EUR</option>
				</select>
			</div>
			<div class="param_name">Email</div>
			<div class="param_value"><input type="text" name="email" value="" size="50" maxlength="260"/></div>
			<div class="param_name">RecipientName</div>
			<div class="param_value"><input type="text" name="recipientName" value="" size="50" maxlength="260"/></div>
			<div class="param_name">CompanyName</div>
			<div class="param_value"><input type="text" name="companyName" value="" size="50" maxlength="260"/></div>
			<div class="param_name">InvoiceNumber</div>
			<div class="param_value"><input type="text" name="invoiceNumber" value="" size="50" maxlength="260"/></div>		
			<div class="param_name">Status</div>
			<div class="param_value">
				<select name="status">
					<option value="" selected></option>
					<option value="Draft">Draft</option>
					<option value="Sent">Sent</option>
					<option value="Paid">Paid</option>
					<option value="Marked_as_paid">Marked_as_paid</option>
					<option value="Canceled">Canceled</option>
				</select>
			</div>
			<div class="param_name">LowerAmount</div>
			<div class="param_value"><input type="text" name="lowerAmount" value="" size="10" maxlength="19"/></div>
			<div class="param_name">UpperAmount</div>
			<div class="param_value"><input type="text" name="upperAmount" value="" size="10" maxlength="19"/></div>
			<div class="param_name">Memo</div>
			<div class="param_value"><input type="text" name="$memo" value="" size="50" maxlength="260"/></div>
			<div class="param_name">Origin</div>
			<div class="param_value">
				<select name="origin">
					<option value="" selected></option>
					<option value="Web">Web</option>
					<option value="API">API</option>
				</select>
			</div>
			<div class="param_category">InvoiceDate (format YYYY-MM-DD eg.2011-06-22)</div>
				<div class="param_name">startDate:</div>
				<div class="param_value"><input type="text" name="invoiceDate_startDate" value="" size="10" maxlength="19"/></div>
				<div class="param_name">endDate:</div>
				<div class="param_value"><input type="text" name="invoiceDate_endDate" value="" size="10" maxlength="19"/></div>
			</div>			
			<div class="param_category">DueDate (format YYYY-MM-DD eg.2011-06-22)</div>
				<div class="param_name">startDate:</div>
				<div class="param_value"><input type="text" name="dueDate_startDate" value="" size="10" maxlength="19"/></div>
				<div class="param_name">endDate:</div>
				<div class="param_value"><input type="text" name="dueDate_endDate" value="" size="10" maxlength="19"/></div>
			</div>
			<div class="param_category">PaymentDate (format YYYY-MM-DD eg.2011-06-22)</div>
				<div class="param_name">startDate:</div>
				<div class="param_value"><input type="text" name="paymentDate_startDate" value="" size="10" maxlength="19"/></div>
				<div class="param_name">endDate:</div>
				<div class="param_value"><input type="text" name="paymentDate_endDate" value="" size="10" maxlength="19"/></div>
			</div>
			<div class="param_category">CreationDate (format YYYY-MM-DD eg.2011-06-22)</div>
				<div class="param_name">startDate:</div>
				<div class="param_value"><input type="text" name="creationDate_startDate" value="" size="10" maxlength="19"/></div>
				<div class="param_name">endDate:</div>
				<div class="param_value"><input type="text" name="creationDate_endDate" value="" size="10" maxlength="19"/></div>
			</div>
		</div>
	</div>
	<input type="submit" name="SearchInvoicesBtn" value="Search Invoices"/>
</form>
</body>
</html>
<?php 
}
?>