<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\LoginForm;

class UserController extends ApiController {
    public function actionLogin() {
        $form = new LoginForm();
        $form->load(\Yii::$app->request->getBodyParams(), '');

        if ($form->validate()) {
            $form->login();
            return $form->getUser();
        }
        //если в форме есть ошибка, то возвращает 422 код и список ошибок
        return $form;
    }
}