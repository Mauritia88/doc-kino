<?php

namespace app\models;

use yii\base\Model;
use app\models\Users;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $login;
    public $email;
    public $password;
    public $family;
    public $name;
    public $patronymic;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'required', 'message' => 'Заполните поле'],
            ['login', 'unique', 'targetClass' => '\app\models\Users', 'message' => 'Такое логин уже занят.'],
            ['login', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Заполните поле'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\Users', 'message' => 'Такая почта уже занята.'],

            ['password', 'required', 'message' => 'Заполните поле'],
            ['password', 'string', 'min' => 6],

            ['family', 'required', 'message' => 'Заполните поле'],
            ['name', 'required', 'message' => 'Заполните поле'],

            ['family', 'string', 'min' => 1, 'max' => 100],
            ['name', 'string', 'min' => 1, 'max' => 100],
            ['patronymic', 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'family' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
        ];
    }

    /**
     * Signs user up.
     *
     * @return \app\models\Users
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Users();
        $user->family = $this->family;
        $user->name = $this->name;
        $user->patronymic = $this->patronymic;
        $user->login = $this->login;
        $user->email = $this->email;
        $user->password = $this->password;

        return $user->save() ? $user : null;
    }
}