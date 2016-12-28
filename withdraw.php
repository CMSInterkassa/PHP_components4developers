//Withdraw example of formation Withdraw 
<?php
$ch = curl_init();
        $header = array(
            'Authorization: Basic ' . base64_encode(':'),
            'Ik-Api-Account-Id: [....]'
        );
          $data = array(
            'amount' => 100, //Sum
            'paywayId' => '52e7f883e4ae1a2406000000', //Payway ID
            'details' => array(			//Details from prm
                'card' => '4731[....]5090', 
            ),
            'purseId' => '1052[....]9081', // Withdrawal purse id
            'calcKey' => 'ikPayerPrice',// psPayeeAmount || ikPayerPrice
            'action' => 'process',         // calc || process
	    'paymentNo' => 'EURtoUAH2 //pmNo
        );
        curl_setopt($ch, CURLOPT_URL, 'https://api.interkassa.com/v1/withdraw');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($ch);
        curl_close($ch);
        print_r($result);
?>