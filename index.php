<?php
require 'config.php';
$transaction_id = 'BT'.date('y').date('m').date('d').time();
$session_id = session_id();
$db = mysqli_connect('localhost', 'root', 'anchal', 'skrill'); 
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<html>
<head>
</head>
<body>
	<!-- <form action="https://pay.skrill.com/?sid=<?= $session_id; ?>" method="post" target="_blank">
		<input type="hidden" name="pay_to_email" value="demowallet@sun-fish.com">
		<input type="hidden" name="recipient_description" value="BETMACAN">
		<input type="hidden" name="return_url" value="https://betmacan.com/skrill_pay/process_payment.php">
		<input type="hidden" name="cancel_url" value="https://betmacan.com/skrill_pay/process_payment_cancel.php">
		<input type="hidden" name="status_url" value="mailto:myinrbtc@gmail.com">
		<input type="hidden" name="transaction_id" value="<?= $transaction_id; ?>">
		<input type="text" name="amount" value="23">
		<input type="hidden" name="currency" value="EUR">
		<input type="submit" value="Pay!">
	</form> -->
	<!-- 	<form action="https://pay.skrill.com" method="post" target="_blank">
		 <input type="hidden" name="pay_to_email" value="anchal.gupta@w3villa.com">
		 <input type="hidden" name="status_url" value="mailto:anchalchery@gmail.com">
		 <input type="hidden" name="language" value="EN">
		 <input type="hidden" name="amount" value="6">
		 <input type="hidden" name="currency" value="INR">
		 <input type="hidden" name="detail1_description" value="Description:">
		 <input type="hidden" name="detail1_text" value="Betmacan">
		 <input type="submit" value="Withdraw!">
		</form> 

 
 		<form action="https://pay.skrill.com" method="post" target="_blank">
		 <input type="hidden" name="pay_to_email" value="anchal.gupta@w3villa.com">
		 <input type="hidden" name="status_url" value="https://example.com/
		process_payment.cgi">
		 <input type="hidden" name="language" value="EN">
		 <input type="hidden" name="amount" value="6">
		 <input type="hidden" name="currency" value="GBP">
		 <input type="hidden" name="detail1_description" value="Description:">
		 <input type="hidden" name="return_url" value="https://betmacan.com/skrill_pay/process_payment.php">
		 <input type="hidden" name="detail1_text" value="Betmacan">
		 <input type="submit" value="Deposit!">
		</form>  -->

<!DOCTYPE html> 
			<html> 
			<head> 
			    <title>Payment</title> 
			    <link rel="stylesheet" type="text/css"
			                    href="style.css"> 
			</head> 
			<body> 
			    <div class="header"> 
			        <h2>Payment Info</h2> 
			    </div> 
			    <form action="https://pay.skrill.com" target="_blank" method="POST">

			<div class="input-group"> <strong>Enter Amount</strong>
            <input type="text" name="amount" min="1" max="10000"
                value="">
            </div>
            <div class="input-group"><strong><label for="gateway">Payment Gateway : </label></strong>
                <select name="gateway" style="width: 100%; height: 40px;">
                    <option value="Skrill">Skrill</option>
                </select>
            </div> <br> <br>
            	<input type="hidden" name="pay_to_email" value="anchal.gupta@w3villa.com">
            	<input type="hidden" name="pay_from_email" value="awanish.singh@w3villa.com">
				<input type="hidden" name="transaction_id" value="<?= $transaction_id; ?>">
				<input type="hidden" name="recipient_description" value="ACME Solutions">
				<input type="hidden" name="return_url" value="http://localhost/skrill_pay/process_payment.php">
				<input type="hidden" name="cancel_url" value="http://localhost/skrill_pay/">
				 <input type="hidden" name="status_url" value="http://localhost/skrill_pay/process_payment.php">
				 <input type="hidden" name="language" value="EN">
				 <input type="hidden" name="merchant_fields" value="customer_number,session_id">
				 <input type="hidden" name="customer_number" value="C1234">
				 <input type="hidden" name="session_ID" value="<?= $session_id; ?>">
				 <input type="hidden" name="amount2_description" value="Product Price:">
				 <input type="hidden" name="amount2" value="30">
				 <input type="hidden" name="amount3_description" value="Handling Fees & Charges:">
				 <input type="hidden" name="amount3" value="3.10">
				 <input type="hidden" name="amount4_description" value="VAT (20%):">
				 <input type="hidden" name="amount4" value="6.60">
				 <input type="hidden" name="currency" value="INR">
				<input type="hidden" name="firstname" value="John">
				 <input type="hidden" name="lastname" value="Payer">
				 <input type="hidden" name="address" value="Payerstreet">
				 <input type="hidden" name="postal_code" value="EC45MQ">
				 <input type="hidden" name="city" value="Payertown">
				 <input type="hidden" name="country" value="GBR">
				 <input type="hidden" name="detail1_description" value="Product ID:">
				 <input type="hidden" name="detail1_text" value="4509334">
				 <input type="hidden" name="detail2_description" value="Description:">
				 <input type="hidden" name="detail2_text" value="Romeo and Juliet (W.Shakespeare)">
				 <input type="hidden" name="detail3_description" value="Special Conditions:">
				 <input type="hidden" name="detail3_text" value="5-6 days for delivery">
				 <input type="hidden" name="logo_url" value="https://www.betmacan.com/mlp-cura/assets/img/mlp_logo.png">
				 <span class="input-group" style="float: right; margin-top: -30px;"> 
				 <button type="submit" name="pay" class="btn" value="pay">Pay!</button>
				</span>
            </form> 
            <?php if(!empty($_POST['pay'])){
	 			$amount = mysqli_real_escape_string($db, $_POST['amount']);
                $gateway = $_POST['gateway'];
                $username = "test" ;
                $user_id = "1" ;
                $email = "test@gmail.com";
                echo $query = "INSERT INTO payment_information (user_name, amount, email, payment_gateway, transaction_id) 
                VALUES('$username', '$amount', '$email', '$gateway', '$transaction_id')"; 
                mysqli_query($db, $query); 
                 if (mysqli_query($db, $query)) {
			        echo "New record created successfully";
			    } else {
			        echo "Error: " . $sql . "<br>" . mysqli_error($db);
			    }
} ?>

	<!-- <form action="https://pay.skrill.com" method="post" target="_blank">
	<input type="hidden" name="pay_to_email" value="anchal.gupta@w3villa.com">
	<input type="hidden" name="transaction_id" value="<?= $transaction_id; ?>">
	<input type="hidden" name="recipient_description" value="ACME Solutions">
	<input type="hidden" name="return_url" value="http://localhost/skrill_pay/process_payment.php">
	<input type="hidden" name="cancel_url" value="http://localhost/skrill_pay/">
 <input type="hidden" name="status_url" value="http://localhost/skrill_pay/process_payment.php">
 <input type="hidden" name="language" value="EN">
 <input type="hidden" name="merchant_fields" value="customer_number,session_id">
 <input type="hidden" name="customer_number" value="C1234">
 <input type="hidden" name="session_ID" value="<?= $session_id; ?>">
 <input type="hidden" name="pay_from_email" value="">
 <input type="hidden" name="amount2_description" value="Product Price:">
 <input type="hidden" name="amount2" value="30">
 <input type="hidden" name="amount3_description" value="Handling Fees & Charges:">
 <input type="hidden" name="amount3" value="3.10">
 <input type="hidden" name="amount4_description" value="VAT (20%):">
 <input type="hidden" name="amount4" value="6.60">
 <input type="hidden" name="amount" value="40">
 <input type="hidden" name="currency" value="INR">
<input type="hidden" name="firstname" value="John">
 <input type="hidden" name="lastname" value="Payer">
 <input type="hidden" name="address" value="Payerstreet">
 <input type="hidden" name="postal_code" value="EC45MQ">
 <input type="hidden" name="city" value="Payertown">
 <input type="hidden" name="country" value="GBR">
 <input type="hidden" name="detail1_description" value="Product ID:">
 <input type="hidden" name="detail1_text" value="4509334">
 <input type="hidden" name="detail2_description" value="Description:">
 <input type="hidden" name="detail2_text" value="Romeo and Juliet (W.Shakespeare)">
 <input type="hidden" name="detail3_description" value="Special Conditions:">
 <input type="hidden" name="detail3_text" value="5-6 days for delivery">
 <input type="hidden" name="logo_url" value="https://www.betmacan.com/mlp-cura/assets/img/mlp_logo.png">
 <input type="submit" value="Pay!">
</form> -->
</body>
</html>