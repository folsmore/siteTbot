<?php
    include('vendor/autoload.php'); //Подключаем библиотеку
    use Telegram\Bot\Api; 
    $token = '1482885814:AAFu3S6CTLyGK7n1g65psKligPN4nMQr2eQ';
    $telegram = new Api($token);
     //данные о пользовательском сообщении
    global $result;
    global $text;
    global $chat_id;
    $name = $result["message"]["from"]["first_name"]; //Имя пользователя
    $surname = $result["message"]["from"]["last_name"]; //Фамилия пользователя
    $phone = $result["message"]["from"]["phone_number"]; //Телефон пользователя
    global $keyboard;
    function getTextMessages($text,$keyboard,$chat_id,$result){
        $result = $telegram -> getWebhookUpdates();
        $text = $result["message"]["text"];
        $chat_id = $result["message"]["chat"]["id"];
        $keyboard =[ [ [
            'text'=>'Send contact',
            'request_contact'=>true,
        ]]];
        if($text){
            if ($text == "/start") {
                $reply = "Привет, отправь контакт";
                $reply_markup = $telegram->replyKeyboardMarkup([ 
                    'keyboard' => $keyboard, 
                    'resize_keyboard' => true, 
                    'one_time_keyboard' => true ]);
                $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);
            }
        }

        else{
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение." ]);
        } 
    }
    getTextMessages($text,$keyboard,$chat_id);
    if(Message.chat  =='request_contact'){

    } 
    
?>