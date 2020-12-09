<?php
    include('vendor/autoload.php'); //Подключаем библиотеку
    use Telegram\Bot\Api; 
    $token = '';
    $telegram = new Api('1482885814:AAFu3S6CTLyGK7n1g65psKligPN4nMQr2eQ');
    echo "bot";
    $result = $telegram -> getWebhookUpdates(); //данные о пользовательском сообщении

    $text = $result["message"]["text"]; //Текст сообщения
    $chat_id = $result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя
    $name = $result["message"]["from"]["first_name"]; //Имя пользователя
    $surname = $result["message"]["from"]["last_name"]; //Фамилия пользователя
    $phone = $result["message"]["from"]["phone_number"]; //Телефон пользователя
    if($text){
        if ($text == "/start") {
            $reply = "Привет, отправь";
            $replyMarkup3 =[
                'keyboard' =>[ [ [
                    'text'=>'test',
                    'request_contact'=>true,
                ]]],
                'resize_keyboard'=>true,
                'one_time_keyboard'=>true,
            ];
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $replyContact ]);
        }
    }
    
    else{
        $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение." ]);
    }   
    
?>