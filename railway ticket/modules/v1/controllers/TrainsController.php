<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Train;

class TrainsController extends ApiController
{
    public function actionTrains() {
        $trains = Train::find()
            ->all();
        return $trains;
    }
}