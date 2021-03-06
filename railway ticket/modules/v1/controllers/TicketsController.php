<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Seat;
use app\modules\v1\models\Ticket;
use yii\db\Query;

class TicketsController extends ApiController {

    public function actionUser_tickets($userId) {
            return Ticket::find()
                ->where(['userId' => $userId])
                ->all();
    }

    public function actionVoyage_tickets($voyageId) {
        return Ticket::find()
            ->where(['voyageId' => $voyageId])
            ->all();
    }

    public function actionTickets() {
        return Ticket::find()
            ->all();
    }

    public function actionBuy(){
        $data = \Yii::$app->request->getBodyParams();
        $seat = Seat::find()
            ->where(['id' => $data['seatId']])
            ->one();
        $seat->setAttribute('isBusy', '1');
        $seat->save();
        $ticket = new Ticket();
//        $ticket->load($data, '');
        $ticket->setAttribute('userId', $data['userId']);
        $ticket->setAttribute('seatId', $data['seatId']);
        $ticket->save();
        return $ticket;
    }
}