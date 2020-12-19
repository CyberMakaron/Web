<?php


namespace app\modules\v1\controllers;
use app\modules\v1\models\Seat;

class SeatsController extends ApiController
{
    public function actionVoyage_empty_seats($voyageId){
        return Seat::find()
            ->with('voyage')
            ->where(['voyageId' => $voyageId, 'isBusy' => '0'])
            ->all();
    }
}