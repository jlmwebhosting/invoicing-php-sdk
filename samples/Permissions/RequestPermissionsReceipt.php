<?php
session_start();
/********************************************
 RequestPermissionsReceipt.php


 Called by RequestPermissions.php
 ********************************************/
$path = '..\..\lib';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once('services/PermissionsService.php');



try {
	$serverName = $_SERVER['SERVER_NAME'];
	$serverPort = $_SERVER['SERVER_PORT'];
	$url=dirname('http://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
	$returnURL = $url."/GetAccessToken.php";
	$cancelURL = $url. "/RequestPermissions.php" ;
		
		
	if(isset($_POST['chkScope']))
	{
		$i =0;

		foreach ($_POST['chkScope'] as $value)
		{
				
			$scope[$i] = $value;
			$i++;
				
		}
	}
	$requestEnvelope = new RequestEnvelope();
	$requestEnvelope->errorLanguage = "en_US";
	$request = new RequestPermissionsRequest($scope,$returnURL);
    $request->requestEnvelope = $requestEnvelope;
    $permissions = new PermissionsService('Permissions');
    $reqPerResponse = $permissions->RequestPermissions($request);
	/* Display the API response back to the browser.
	 If the response from PayPal was a success, display the response parameters'
	 If the response was an error, display the errors received using APIError.php.
	 */
	$ack = strtoupper($reqPerResponse->responseEnvelope->ack);

	if($ack!="SUCCESS"){
		$_SESSION['reshash']=$reqPerResponse;
		$location = "APIError.php";
		header("Location: $location");
	}

	 
}
catch(Exception $ex) {
	throw new Exception('Error occurred in GetPermissions method');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>


<body>
<br />






<div id="request_form">

<center>
<h3>RequestPermissions - Response</h3>
</center>
<br />

<?php
require_once 'ShowAllResponse.php';
$token = $reqPerResponse->token;
$payPalURL = 'https://www.sandbox.paypal.com/webscr&cmd='.'_grant-permission&request_token='.$token;


?>
<table width="600" align="center">
	<tr>
		<td><a href=<?php echo $payPalURL;?>><b>* Redirect URL to Complete
		RequestPermissions API operation </b></a><br>
		
		</td>
	</tr>
</table>


</div>
</div>

</body>
</html>
