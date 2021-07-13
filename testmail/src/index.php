<?php

$mailjetApiKey = '829396f430489effef4adadb99917ee5';
$mailjetApiSecret = '0cb589497fd46af39b035c1ca9f4b576';

$messageData = [
    'Messages' => [
        [
            'From' => [
                'Email' => 'from@email.com',
                'Name' => 'from name'
            ],
            'To' => [
                [
                    'Email' => 'hazem.elsayed8@gmail.com',
                    'Name' => 'to name'
                ]
            ],
            'Subject' => 'Mailjet test email',
            'TextPart' => 'Mailjet test body email message',
            'HTMLPart' => '<strong>Mailjet test body email message</strong>'
        ]
    ]
]; 

$jsonData = json_encode($messageData);
$ch = curl_init('https://api.mailjet.com/v3.1/send');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_USERPWD, "{$mailjetApiKey}:{$mailjetApiSecret}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
]);

$response = json_decode(curl_exec($ch));

var_dump($response);