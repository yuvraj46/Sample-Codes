<?php


	session_start();

	$secret = 'ZzsMLGKe162CfA5EcG6j';
	$my_address = '1A8JiWcwvpY7tAopUkSnGuEYHmzGYfZPiq';
	$my_callback_url = 'https://mystore.com?invoice_id=058921123&secret='.$secret;
	$root_url = 'https://blockchain.info/api/receive';
	$parameters = 'method=create&address=' . $my_address .'&callback='. urlencode($my_callback_url);
	$response = file_get_contents($root_url . '?' . $parameters);
	$object = json_decode($response);
	echo 'Send Payment To Address : ' . $object->input_address;

	$Guid = $object->input_address;
	$_SESSION['Guid'] = $Guid;
	
	$walletBalance=	rand(1,100);
	echo "<br><b>Balance amount in Wallet is </b>".$walletBalance." BTC";
	echo "<br><br>";
	$_SESSION['walletBalance'] = $walletBalance;
	


?>



<form action="invoice.php" method="post">
 <input type="submit" name="formSubmit" value="Click Here to start a transaction" />
</form>