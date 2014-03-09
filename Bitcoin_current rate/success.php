<?php
	session_start();
	
	$Guid = $_SESSION['Guid']; 
	echo "<b>Transaction ID : </b>";
	echo $Guid;
	echo "<br>";
	echo "QR code for this transaction<br>";
	echo "<img src='https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$Guid'/>";
	//echo "<img src='qr_img.php?d=$Guid'/>";
	
	$btc = $_POST['btc'];
	$BTCperUSD = $_SESSION['BTCperUSD'];
	$currentTime = time();
	$timeCheck = $_SESSION['timeCheck']; 
	$walletBalance = $_SESSION['walletBalance']; 
	if($currentTime > $timeCheck)
		echo "Page Expired";
	else
		if (isset($_POST['useWallet'])) 
		{
			if(($btc * $BTCperUSD) > $walletBalance)
			{
				echo "<br>";
				echo "<b>Invoice Paid Partially"."<br>"."Ammount remaining = </b>$";
				echo (($btc * $BTCperUSD) - $walletBalance) * (1/$BTCperUSD);
				
				$_SESSION['walletBalance'] = $walletBalance;
				echo "<br><br>";
				echo "<b>Balance amount in your Wallet is </b>".$walletBalance." BTC";
				echo "<br><br>";
				echo "<b>Choose Method for Payment for paying ramaining amount </b> $".(($btc * $BTCperUSD) - $walletBalance) * (1/$BTCperUSD);
				$walletBalance = 0;
			}		
			else
			{
				echo "<br>";
				echo "<b>Invoice Paid Completely</b>";
				$walletBalance = $walletBalance - $btc * $BTCperUSD;
				$_SESSION['walletBalance'] = $walletBalance;
				echo "<br><br>";
				echo "<b>Balance amount in your Wallet is </b>".$walletBalance." BTC";
				
			}
		}
		else
		{
			echo "<br><br>";
			echo "<b>Choose Method for Payment for paying ramaining amount </b> $".$btc;
		}


?>