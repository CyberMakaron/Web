<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Voyage;

class VoyagesController extends ApiController
{
    public function actionVoyage($id){
        return Voyage::find()
            ->where(['id' => $id])
            ->all();
    }
}