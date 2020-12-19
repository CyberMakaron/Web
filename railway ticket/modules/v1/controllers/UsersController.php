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

    public function actionChange($id, $name=null, $phone=null, $email=null, $password_md5=null){
        $user = User::find()
            ->where(['id' => $id])
            ->one();
        if ($name != null)
            $user->setAttribute('name', $name);
        if ($phone != null)
            $user->setAttribute('phone', $phone);
        if ($email != null)
            $user->setAttribute('email', $email);
        if ($password_md5 != null)
            $user->setAttribute('password_md5', $password_md5);
        $user->save();
        return $user;
    }
}