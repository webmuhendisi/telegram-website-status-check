<?php
$url = "http://www.example.com"; // istek gönderilecek URL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($status_code != 200) {
    $error_message = "Hata kodu: " . $status_code;
    $bot_token = "BOT_TOKEN"; // Telegram botunuzun token'ı
    $chat_id = "CHAT_ID"; // Mesajı göndereceğiniz chat ID
    $telegram_url = "https://api.telegram.org/bot{$bot_token}/sendMessage";
    $params = [
        "chat_id" => $chat_id,
        "text" => $error_message
    ];
    $ch = curl_init($telegram_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $telegram_response = curl_exec($ch);
    curl_close($ch);
}

?>
