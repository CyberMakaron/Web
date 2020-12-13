<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Station;
use yii\base\InvalidConfigException;

class StationsController extends ApiController
{
    public function actionStation_query() {
        $stations = [];
        $params = \Yii::$app->request->getBodyParams();
        for($x=0; $x<sizeof($params); $x++) {
            array_push($stations, Station::find()
                ->where($params[$x])
                ->one());
        }
        return $stations;
    }
    public function actionAll_departs() {
        $stations = Station::find()
            ->orderBy(['name' => SORT_ASC])
            ->all();
        return $stations;
    }
    public function actionAll_arrives() {
        $stations = Station::find()
            ->orderBy(['name' => SORT_ASC])
            ->all();
        return $stations;
    }
}