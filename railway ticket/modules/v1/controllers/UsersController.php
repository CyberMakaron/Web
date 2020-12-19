<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\LoginForm;
use app\modules\v1\models\User;
use PharIo\Manifest\InvalidEmailException;
use yii\db\Exception;
use yii\web\NotAcceptableHttpException;

class UsersController extends ApiController {
    public function actionLogin($email, $password_md5) {
        $form = User::find()
            ->where(['email' => $email])
            ->one();
        if ($form != null or $form != ''){
            if ($form->checkPass($password_md5))
                return $form->getUser();
        }
        throw new NotAcceptableHttpException('Неверный логин или пароль!'); //406
    }

    public function actionRegistration() {
        $data = \Yii::$app->request->getBodyParams();
        if (User::find()
                ->where(['email' => $data['email']])
                ->one() != null){
            throw new NotAcceptableHttpException('Email занят!');   //406
            //return null;
        }

        $user = new User();
        $user->load($data, '');
        $str = strpos($user->getAttribute('email'), "@");
        $user->setAttribute('name', substr($user->getAttribute('email'), 0, $str));
        $user->save();
        return $user;
    }
}