<?php
require 'config.php';
$transaction_id = 'BT'.date('y').date('m').date('d').time();
$session_id = session_id();
?>
<html>
<head>
</head>
<body>
	<p>demoqco@sun-fish.com mqi: skrill123, secretword: skrill </p>
	<form action="process.php" method="post" target="_blank">
		<input type="text" name="amount" value="23">
		<button type="submit" name="process" value="sendingMoney">Send Money</button>
	</form>
</body>
</html>