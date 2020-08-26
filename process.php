<?php
require 'config.php';
extract($_POST);
$process = $_POST['process'];
if($process == 'sendingMoney')
{
	header( 'Content-type: text/json' );
	$transaction_id = 'BT'.date('y').date('m').date('d').time();
	$amount = $_POST['amount'];
	$pass = md5('skrill123');
	$params = array(
		"action" => "prepare",
		"email" => "demoqco@sun-fish.com",
		"currency" => "EUR",
		"bnf_email" => "demoqcoflexible@sun-fish.com",
		"subject" => "Sending a transfer prepare request",
		"note" => "Test",
		"password" => $pass,
		"amount" => $amount,
		"frn_trn_id" => $transaction_id
	);
	$url = "https://www.skrill.com/app/pay.pl";
	$sXML = httpPost($url, $params);
	$xml = simplexml_load_string($sXML);
	$json = json_encode($xml);
	$arr = json_decode($json,true);
	$sid = $arr['sid'];
	$transparams = array(
		"action" => "transfer",
		"sid" => $sid
	);
	$resp = httpPost($url, $transparams);
	$xml = simplexml_load_string($resp);
	$json = json_encode($xml);
	$arr = json_decode($json,true);
	print_r($arr);
	echo '<br>'.$arr['transaction']['amount'];
	echo '<br>'.$arr['transaction']['currency'];
	echo '<br>'.$arr['transaction']['id'];
	echo '<br>'.$arr['transaction']['status'];
	echo '<br>'.$arr['transaction']['status_msg'];
	exit;
}

if($process == 'sendingTransferMoney')
{
	$url = "https://www.skrill.com/app/pay.pl";
	$sid = $_POST['sid'];
	$transparams = array(
		"action" => "transfer",
		"sid" => $sid
	);
	if (function_exists('simplexml_load_string')) {
		echo "simpleXML functions are available.<br />\n";
	} else {
		echo "simpleXML functions are not available.<br />\n";
	}
	$sXML = download_page('https://www.skrill.com/app/pay.pl?action=transfer&sid='.$sid);
	var_dump($sXML);
	$oXML = new SimpleXMLElement($sXML);
	header( 'Content-type: text/xml' );
	var_dump($oXML);
	foreach($oXML->response as $oEntry){
		var_dump($oEntry);
		echo $oEntry->transaction->amount . "\n";
		echo $oEntry->transaction->currency . "\n";
		echo $oEntry->transaction->status_msg . "\n";
	}
	$xml = simplexml_load_string($sXML);
	$json = json_encode($xml);
	$arr = json_decode($json,true);
	print_r($arr);
	exit;
	echo '<pre>';
	
	var_dump($xml);
	var_dump($json);
	print_r($arr);
	
	
	//$resp = httpPost($url, $transparams);
	print_r($resp);
	//var_dump($resp);
	exit;
}

function httpPost($url, $params)
{
	$postData = '';
	//create name value pairs seperated by &
	foreach($params as $k => $v) { 
		$postData .= $k . '='.$v.'&';
	}
	$postData = rtrim($postData, '&');
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POST, count($postData));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	$output=curl_exec($ch);
	curl_close($ch);
    return $output; 
}

function httpGetWithErros($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
    $output = curl_exec($ch);
 
    if($output === false)
    {
        echo "Error Number:".curl_errno($ch)."<br>";
        echo "Error String:".curl_error($ch);
    }
    curl_close($ch);
    return $output;
}
function download_page($path)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$path);
    curl_setopt($ch, CURLOPT_FAILONERROR,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $retValue = curl_exec($ch);
    curl_close($ch);
    return $retValue;
}