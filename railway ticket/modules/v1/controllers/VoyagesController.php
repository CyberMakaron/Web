<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Voyage;

class VoyagesController extends ApiController
{
    public function actionVoyage_from_id($id){
        return Voyage::find()
            ->where(['id' => $id])
            ->one();
    }
    public function actionVoyages($departId, $arriveId, $depart_date){
    return Voyage::find()
        ->joinWith('rout')
        ->where(['departId' => $departId,
                 'arriveId' => $arriveId])
        ->andWhere(['like', 'departDatetime', $depart_date])
        ->all();
    }
}