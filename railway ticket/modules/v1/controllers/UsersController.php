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

    public function actionChange(){ //$id=null, $name=null, $phone=null, $email=null, $password_md5=null
        $data = \Yii::$app->request->getBodyParams();
        $user = User::find()
            ->where(['id' => $data['id']])
            ->one();
        if ($data['name'] != null)
            $user->setAttribute('name', $data['name']);
        if ($data['phone'] != null)
            $user->setAttribute('phone', $data['phone']);
        if ($data['email'] != null)
            $user->setAttribute('email', $data['email']);
        if ($data['password_md5'] != null)
            $user->setAttribute('password_md5', $data['password_md5']);
        $user->save();
        return $user;
    }
}