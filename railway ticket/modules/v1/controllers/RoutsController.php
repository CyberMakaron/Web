<?php


namespace app\modules\v1\controllers;


use app\modules\v1\models\Rout;

class RoutsController extends ApiController
{
    public function actionRouts(){
        return Rout::find()
            ->all();
    }
    public function actionRout($id){
        return Rout::find()
            ->where(['id' => $id])
            ->one();
    }
}