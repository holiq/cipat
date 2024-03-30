<?php

function sendTelegramNotification($msg)
{
    $token = '7080219501:AAE6D8DOJP57XXX9u8zneiMjKQILk1Iwqmc';

    $message = [
        'chat_id' => '-1002047418871',
        'text'    => $msg,
    ];

    $url = "https://api.telegram.org/bot{$token}/sendMessage";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($message));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_exec($ch);
    curl_close($ch);
}
