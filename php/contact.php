<?php
$to="nitish.pakhare@intelliswift.co.in";
$from ="nitishp3@gmail.com";
$subject ="mail subject content";
$message ="mail message body";
$headers    = array
    (
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset="UTF-8";',
        'Content-Transfer-Encoding: 7bit',
        'Date: ' . date('r', $_SERVER['REQUEST_TIME']),
        'Message-ID: <' . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
        'X-Mailer: PHP v' . phpversion(),
        'X-Originating-IP: ' . $_SERVER['SERVER_ADDR'],
    );




mail($to , strip_tags($subject),$message , implode("\r\n", $headers));

?>