<?php

namespace App\Http;

class ValidatorAPI {

    /**
     * @param $validator
     * @param $vocabulary
     * @return false|string
     */
    public static function getJSONErrors($validator, $vocabulary){
        //Выход из функции в случае не обнаружения ошибок
        if(count($validator->errors()->messages()) == 0){
            return false;
        }
        //Объявления коллекции ошибок
        $messages = [];
        //Добавление ошибок в массив
        foreach($validator->errors()->messages() as $message){
            $messages['message'] = $message;
        }
        //Конкретинация ошибок
        $messages['message'] = join(' ', $messages['message']);
        //Изменение ключевых слов
        if(count($vocabulary) > 0){
            foreach($vocabulary as $key => $value){
                $messages['message'] = str_replace($key, $value, $messages['message']);
            }
        }
        //Отправка JSON
        return json_encode($messages, JSON_UNESCAPED_UNICODE);
    }
}
