<?php
// Token de acceso del bot proporcionado por BotFather
$token = '6997496940:AAFrR2MmZl6uk8lQO4i9M0tFgr8cnZvymBo';
//Acceso a la web de Telegram
$website = 'https://api.telegram.org/bot' .$token;

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$chatId = $update['message'] ['chat'] ['id'];
$message = $update['message'] ['text'];

//Recibe el mensaje
switch($message) {
        case '/start':
            $response = 'Bienvenido a MiBotSupermercado.';
            sendMessage($chatId, $response);
            break;
        case 'carne':
        case 'queso':
        case 'jamon':
            $response = 'Los productos se encuentran en el Pasillo 1.';
            sendMessage($chat_id, $response);
            break;
        case 'leche':
        case 'yogurth':
        case 'cereal':
            $response = 'Los productos se encuentran en el Pasillo 2.';
            sendMessage($chat_id, $response);
            break;
        case 'bebidas':
        case 'jugos':
            $response = 'Los productos se encuentran en el Pasillo 3.';
            sendMessage($chat_id, $response);
            break;
        case 'pan':
        case 'pasteles':
        case 'tortas':
            $response = 'Los productos se encuentran en el Pasillo 4.';
            sendMessage($chat_id, $response);
            break;
        case 'detergente':
        case 'lavaloza':
            $response = 'Los productos se encuentran en el Pasillo 5.';
            sendMessage($chat_id, $response);
            break;
        default:
            $response = 'Lo siento, no entendí la pregunta.';
            sendMessage($chat_id, $response);
            break;
}

 // Función para enviar mensajes al bot
function sendMessage($chat_id, $response) {
    $url = $GLOBALS[‘website’]. ’/sendMessage?chat_id=’ .$chatId. ‘&parse_mode=HTML&text=’. urlencode($response);
    file_get_contents($url);
}
?>
