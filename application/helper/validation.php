<?php

namespace application\helper;
use Rakit\Validation\Validator;

class Validation {

    function validFields($data) {

        $message = null;
        
        $validator = new Validator;

        $regex = 'regex:/^[a-zA-Z0-9а-яА-ЯЁёҐґЄєІіЇї\s#]*$/u';

        $rules_for_dataset_a = [
            'login' => [$regex],
            'password' => [$regex], 
            'confirm' => [$regex, 'same:password'],
            'user-name' => [$regex],
            'middle-name' => [$regex],
            'last-name' => [$regex],
        ];

        $validation_a = $validator->make($data, $rules_for_dataset_a);

        $validation_a->setMessages([
            'required' => ':attribute - поле повинно бути заповнено',
            'regex' => ':attribute - поле має невірний формат',
            'confirm:same' => ':attribute - не відповідає паролю'
        ]);

        $validation_a->setAliases([
            'login' => 'Логін',
            'password' => 'Пароль', 
            'confirm' => 'Підтвердження паролю',
            'user-name' => 'Ім’я користувача',
            'middle-name' => 'По-батькові',
            'last-name' => 'Прізвище користувача',
            'phone' => 'Номер телефону',
            'file' => 'Зображення профілю'
        ]);


        $validation_a->validate();

        if ($validation_a->fails()) {
            $errors = $validation_a->errors();
            $message = $errors->all();
            $message = $this->showErrorMessage($message);
        } else {
            $message = null;
        }

        return $message;

    }

    function showErrorMessage($message) {
        $mess_echo = $message[0];

        return "<div class='error-message message'>
                    <p class='error-message__text'>$mess_echo</p>
                    <p class='message-close __icon-close'></p>
                </div>";

    }

}