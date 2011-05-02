PayPal PHP Invoice SDK
======================

Prerequisites
-------------

PayPal's PHP Invoice SDK requires 

 * PHP version 5.2.11 or above with the following extensions enabled
  * cURL with openSSL support
  

Using the SDK
-------------

To use the SDK, 

 * Copy the config and lib folders into your project.
 * Make sure that the lib folder in your project is available in PHP's include path
 * Include the *services\InvoiceService.php* file in your code.
 * Create a service wrapper object
 * Create a request object as per your project's needs. All the API request and response classes are available in services\Invoice\Invoice.php
 * Invoke the appropriate method on the request object.


	require_once 'services\InvoiceService.php';


	$req = new CreateInvoiceRequest();
	$req->invoice = $invo;
	......

	$invc = new InvoiceService();
	$ret = $invc->CreateInvoice($req);
 
  
 

SDK Configuration
-----------------

The SDK uses an INI format configuration file. The default location for this file is config/sdk_config.ini
You can use the configuration file to configure
 * (Multiple) API account credentials.
 * HTTP connection parameters 
 * Service endpoint
 
Please refer to the sample config file provided with this bundle  
  