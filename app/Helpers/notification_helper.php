<?php

function sendTelegramNotification($msg)
{
    $token = getenv('TELEGRAM_BOT_TOKEN');

    $message = [
        'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        'text'    => $msg,
    ];

    if ($token) {
        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($message));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);
        curl_close($ch);
    }
}
