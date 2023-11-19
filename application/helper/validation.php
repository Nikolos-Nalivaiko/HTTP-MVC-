<?php

namespace application\helper;
use Rakit\Validation\Validator;

use application\lib\Db;

class Validation {

    public $db;
    public $validation;
    public $login_auth;

    public function __construct()
    {
        $this->validation = new Validator;
    }

    function validUserCreate($data) {
        
        $validator = $this->validation;

        $rules_for_dataset_a = [
            'login' => ['required', $this->setRegex(), function($value) {

                $this->db = new Db;
                
                $params = [
                    'login' => $value
                ];
    
                $sql = "SELECT * FROM users WHERE login=:login";
                $result = $this->db->row($sql, $params);
                
                if(!empty($result)) {
                    return ":attribute вже існує";
                }
    
            }],
            'password' => ['required', $this->setRegex()], 
            'confirm' => ['required', $this->setRegex(), 'same:password'],
            'user-name' => ['required', $this->setRegex()],
            'middle-name' => ['required', $this->setRegex()],
            'last-name' => ['required', $this->setRegex()],
            'region' => ['required'],
            'city' => ['required'],
            'phone' => ['required'],
        ];

        $validation_a = $validator->make($data, $rules_for_dataset_a);

        $this->setMessages($validation_a);

        $this->setAliases($validation_a);

        return $this->errors($validation_a);

    }

    function validCompanyCreate($data) {
        
        $validator = $this->validation;

        $rules_for_dataset_a = [
            'login' => ['required', $this->setRegex(), function($value) {

                $this->db = new Db;
                
                $params = [
                    'login' => $value
                ];
    
                $sql = "SELECT * FROM users WHERE login=:login";
                $result = $this->db->row($sql, $params);
                
                if(!empty($result)) {
                    return ":attribute вже існує";
                }
    
            }],
            'password' => ['required', $this->setRegex()], 
            'confirm' => ['required', $this->setRegex(), 'same:password'],
            'company-name' => ['required', $this->setRegex()],
            'region' => ['required'],
            'city' => ['required'],
            'phone' => ['required'],
        ];

        $validation_a = $validator->make($data, $rules_for_dataset_a);

        $this->setMessages($validation_a);

        $this->setAliases($validation_a);

        return $this->errors($validation_a);

    }

    public function validLogin($data) {
        
        $validator = $this->validation;
        $login_auth = 'login';

        $rules_for_dataset_a = [
            'login_auth' => [$this->setRegex(),'required', function($value) {
                $this->db = new Db;
                $this->login_auth = $value;

                $params = [
                    'login' => $value
                ];

                $sql = "SELECT * FROM users WHERE login=:login";
                $result = $this->db->row($sql, $params);
                
                if(empty($result)) {
                    return ":attribute не існує";
                }

            }],
            'pass_auth' => [$this->setRegex(),'required', function($value) use ($login_auth) {
                $this->db = new Db;

                $params = [
                    'login' => $login_auth,
                ];

                $sql = "SELECT password FROM users WHERE login=:login";
                $result = $this->db->column($sql, $params);
                
                if(!empty($result)) {
                    $hash = $result;

                    if(!password_verify($value, $hash)) {
                        return ":attribute не існує";
                    }

                } else {
                    return "Користувача не існує";
                }

            }],
        ];

        $validation_a = $validator->make($data, $rules_for_dataset_a);

        $this->setMessages($validation_a);
        $this->setAliases($validation_a);
        return $this->errors($validation_a);
    }

    public function validCargo($data) {
        $validator = $this->validation;

        $rules_for_dataset_a = [
            'name' => ['required', $this->setRegex()],
            'description' => ['required', $this->setRegex()], 
            'load_region' => ['required', $this->setRegex()],
            'load_city' => ['required'],
            'load_date' => ['required'],
            'unload_region' => ['required'],
            'unload_city' => ['required'],
            'unload_date' => ['required'],
            'weight' => ['required'],
            'body' => ['required'],
            'distance' => ['required'],
            'pay_method' => ['required'],
        ];

        $validation = $validator->make($data, $rules_for_dataset_a);

        $this->setMessages($validation);

        $this->setAliases($validation);

        return $this->errors($validation);

    }

    public function validcar($data) {
        $validator = $this->validation;

        $rules = [
            'brand' => ['required'],
            'model' => ['required'],
            'engine' => ['required'],
            'wheel-mode' => ['required'],
            'gearbox' => ['required'],
            'power' => ['required'],
            'mileage' => ['required'],
            'engine-type' => ['required'],
            'body' => ['required'],
            'load-volume' => ['required'],
            'region' => ['required'],
            'city' => ['required'],
            'description' => [$this->setRegex()],
            'price' => ['required']
        ];

        $validation = $validator->make($data, $rules);

        $this->setMessages($validation);

        $this->setAliases($validation);

        return $this->errors($validation);
    }

    private function errors($validation) {
        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            $message = $errors->all();
            $message = $message[0];
        } else {
            $message = null;
        }
        return $message;
    }

    private function setAliases($validation) {

        $validation->setAliases([
            'login' => 'Логін',
            'password' => 'Пароль', 
            'confirm' => 'Підтвердження паролю',
            'user-name' => 'Ім’я користувача',
            'company-name' => 'Назва компанії',
            'middle-name' => 'По-батькові',
            'last-name' => 'Прізвище користувача',
            'phone' => 'Номер телефону',
            'region' => 'Ваша область',
            'city' => 'Ваше місто',
            'login_auth' => 'Логін',
            'pass_auth' => 'Пароль',
            'name' => 'Назва',
            'description' => 'Опис',
            'load_region' => 'Область завантаження',
            'load_city' => 'Місто завантаження',
            'load_date' => 'Дата завантаження',
            'unload_region' => 'Область розвантаження',
            'unload_city' => 'Місто розвантаження',
            'unload_date' => 'Дата розвантаження',
            'weight' => 'Вага',
            'distance' => 'Дистанція',
            'body' => 'Тип кузова',
            'pay_method' => 'Спосіб оплати',
        ]);
    }

    private function setMessages($validation) {
        $validation->setMessages([
            'required' => ':attribute - поле повинно бути заповнено',
            'regex' => ':attribute - поле має невірний формат',
            'confirm:same' => ':attribute - не відповідає паролю',
        ]);
    }

    private function setRegex() {
        $regex = 'regex:/^[a-zA-Z0-9а-яА-ЯЁёҐґЄєІіЇї\s"#,.]*$/u';
        return $regex;
    }
}