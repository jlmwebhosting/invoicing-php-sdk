<?php

/********************************************
 GetAccessToken.php

 Calls  GetAccessTokenReceipt.php,and APIError.php.
 ********************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>Permissions - Get Access Token</title>

</head>
<body>
<form action = "GetAccessTokenReceipt.php" method = "post"> 
 <h3>Permissions - Get Access Token</h3>
Verifier<input type = "text" name = "Verifier" size="50" value = "<?php if(isset($_REQUEST['verification_code'])) echo $_REQUEST['verification_code']?>"/><br></br>
Request Token<input type = "text" name = "Requesttoken" size="50" value = "<?php if(isset($_REQUEST['request_token'])) echo $_REQUEST['request_token']?>"/><br></br>
<input type ="submit" value ="GetAccessToken"/>
 </form>
</body>
</html>