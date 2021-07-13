<?php

function sendYamSMS($number, $message){
    
    $username = "0552525000ة";
    $password = "Aa@112233";
    $tagname = "";
     
    $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.yamamah.com/SendSMS",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\r\n\t\"Message\":\"$message\",\r\n\t\"Password\":\"$password\",\r\n\t\"RecepientNumber\":\"$number\",\r\n\t\"Tagname\":\"$tagname\",\r\n\t\"Username\":\"$username\",\r\n}",
            CURLOPT_HTTPHEADER => array(
              "cache-control: no-cache",
              "content-type: application/json;charset=UTF-8",
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
}
?>