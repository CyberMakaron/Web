<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Station;
use yii\base\InvalidConfigException;

class StationsController extends ApiController
{
    public function actionStation($id)
    {
           return Station::find()
                ->where(['id' => $id])
                ->one();
    }
    public function actionAll_departs() {
        return Station::find()
            ->orderBy(['name' => SORT_ASC])
            ->all();
    }
    public function actionAll_arrives() {
        return Station::find()
            ->orderBy(['name' => SORT_ASC])
            ->all();
    }
}