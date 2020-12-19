<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Train;
use app\modules\v1\models\Voyage;

class TrainsController extends ApiController
{
    public function actionVoyage_train($voyageId){
        return Train::find()
            ->innerJoin('voyages', 'voyages.id = ' . $voyageId)
            ->one();
    }
    public function actionTrains() {
        $trains = Train::find()
            ->all();
        return $trains;
    }
}