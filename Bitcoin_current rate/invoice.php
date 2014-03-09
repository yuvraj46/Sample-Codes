<?php
	session_start();
	$walletBalance = $_SESSION['walletBalance']; 
	echo "<b>Balance amount in your Wallet is </b>".$walletBalance." BTC";
	echo "<br><br>";
	$currentTime = time();
	$timeCheck = $currentTime + 900;
	$_SESSION['currentTime'] = $currentTime;
	$_SESSION['timeCheck'] = $timeCheck;
	
	$Guid = $_SESSION['Guid']; 
	echo "<b>Target address : </b>";
	echo $Guid;
	echo "<br>";
	echo "QR code for this transaction<br>";
	echo "<img src='https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$Guid'/>";
	//echo "<img src='qr_img.php?d=$Guid'/>";
	
	 $url = "https://coinbase.com/api/v1/prices/buy";
				$json = file_get_contents($url);
				//var_dump( json_decode($json, true));
				$json_data = json_decode($json, true);
				$BTCperUSD=1/$json_data["amount"];
				$_SESSION['BTCperUSD'] = $BTCperUSD;
				echo "<br>";
				echo "<b>BTC/USD exchange rate : </b>";
				echo $BTCperUSD;
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function init()
		{
			var btc = document.getElementById("btc");
			var totalCost = document.getElementById("totalCost");
			
			btc.onkeyup=function(){
				var temp = <?php echo $BTCperUSD; ?>;
				totalCost.innerHTML =this.value*temp ;
			};
		}
	</script>

<br><br>
<b>Enter a value in USD</b> 
<body onload="init()">
<form method="post" action="success.php">
		<b>Use Wallet balance</b>
    <input type='checkbox' name='useWallet' id='useWallet' />
   <input id="btc" type="text" name="btc"><br><br>
   <b>BTC equivalent for USD entered above :</b>

   <div id="totalCost"></div><br>
   <input type="submit" name="submit" value="Buy Product"><br>
</form>
</body>
</html>
