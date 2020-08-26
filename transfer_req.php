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
		<input type="text" name="sid" value="430f360f83850af836f56255e74b88c4">
		<button type="submit" name="process" value="sendingTransferMoney">Submit</button>
	</form>
</body>
</html>