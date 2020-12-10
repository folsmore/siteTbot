<?php
    include('vendor/autoload.php'); //Подключаем библиотеку
    use Telegram\Bot\Api; 
    $token = '';
    $telegram = new Api('1482885814:AAFu3S6CTLyGK7n1g65psKligPN4nMQr2eQ');
    $result = $telegram -> getWebhookUpdates(); //данные о пользовательском сообщении

    $text = $result["message"]["text"]; //Текст сообщения
    $chat_id = $result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя
    $name = $result["message"]["from"]["first_name"]; //Имя пользователя
    $surname = $result["message"]["from"]["last_name"]; //Фамилия пользователя
    $phone = $result["message"]["from"]["phone_number"]; //Телефон пользователя
    $keyboard = [["Последние статьи"],["Картинка"],["Гифка"]]; //Клавиатура
    if($text){
        if ($text == "/start") {
            $reply = "Привет, отправь контакт";
            $reply_markup = $telegram->replyKeyboardMarkup([ 
                'keyboard' => $keyboard, 
                'resize_keyboard' => true, 
                'one_time_keyboard' => false ]);
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);
        }
    }
    
    else{
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение." ]);
    }   
    
?>