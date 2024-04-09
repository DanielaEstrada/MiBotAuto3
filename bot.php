<?php
// Token de acceso del bot proporcionado por BotFather
define('BOT_TOKEN', '7038253395:AAEamokL-50vV0SrBjMhZwmSPrhbpvVFu70');

// Función para enviar mensajes al bot
function enviarMensaje($chat_id, $mensaje) {
    $url = 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($mensaje);
    file_get_contents($url);
}

// Procesar el mensaje recibido del bot
$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $chat_id = $update['message']['chat']['id'];
    $mensaje_recibido = strtolower($update['message']['text']);

    // Respuestas según el mensaje recibido
    switch ($mensaje_recibido) {
        case 'carne':
        case 'queso':
        case 'jamón':
            enviarMensaje($chat_id, 'Los productos se encuentran en el Pasillo 1.');
            break;
        case 'leche':
        case 'yogurth':
        case 'cereal':
            enviarMensaje($chat_id, 'Los productos se encuentran en el Pasillo 2.');
            break;
        case 'bebidas':
        case 'jugos':
            enviarMensaje($chat_id, 'Los productos se encuentran en el Pasillo 3.');
            break;
        case 'pan':
        case 'pasteles':
        case 'tortas':
            enviarMensaje($chat_id, 'Los productos se encuentran en el Pasillo 4.');
            break;
        case 'detergente':
        case 'lavaloza':
            enviarMensaje($chat_id, 'Los productos se encuentran en el Pasillo 5.');
            break;
        default:
            enviarMensaje($chat_id, 'Lo siento, no entendí la pregunta.');
            break;
    }
}
?>
