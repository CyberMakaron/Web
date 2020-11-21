<?php

namespace app\modules\v1\models;

use yii\base\Model;

class LoginForm extends Model {
    public $email;
    public $password;

    public function rules() {
        return [
            [['email', 'password'], 'required'],
            [['email'], 'email', 'message' => 'Некорректный Email.'],
            [['email', 'password'], 'string', 'max' => 64, 'min' => 3]
        ];
    }

    public function login() {
        // TODO: сделать авторизацию
    }

    public function getUser() {
        $str = strpos($this->email, "@");
        return [
            'name' => substr($this->email, 0, $str),
            'email' => $this->email,
            'accessToken' => md5(microtime(null))
        ];
    }
}