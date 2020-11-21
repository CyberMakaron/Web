<?php


namespace app\modules\v1\controllers;


class TicketsController extends ApiController {
    public function actionDepart_points() {
        return [
            [ 'text' => 'Белгород', 'value' => 'Белгород' ],
            [ 'text' => 'Старый Оскол', 'value' => 'Старый Оскол' ],
            [ 'text' => 'Москва', 'value' => 'Москва' ]
        ];
    }
    public function actionArrive_points() {
        return [
            [ 'text' => 'Белгород', 'value' => 'Белгород' ],
            [ 'text' => 'Старый Оскол', 'value' => 'Старый Оскол' ],
            [ 'text' => 'Москва', 'value' => 'Москва' ]
        ];
    }
    public function actionTrains() {
        return [
            [ 'depart' => 'Белгород',
              'departTime'=> '8:00',
              'arrive'=> 'Старый Оскол',
              'arriveTime' => '10:45',
              'train' => 'Белгород - Старый Оскол №001',
              'economyPrice' => '50 руб',
              'economyEmptySeats' => '30',
              'coupPrice' => '1000 руб',
              'coupEmptySeats' => '15' ],

            [ 'depart' => 'Белгород',
                'departTime'=> '11:00',
                'arrive'=> 'Старый Оскол',
                'arriveTime' => '13:45',
                'train' => 'Белгород - Старый Оскол №001',
                'economyPrice' => '50 руб',
                'economyEmptySeats' => '30',
                'coupPrice' => '1000 руб',
                'coupEmptySeats' => '15' ],

            [ 'depart' => 'Белгород',
                'departTime'=> '18:00',
                'arrive'=> 'Старый Оскол',
                'arriveTime' => '20:45',
                'train' => 'Белгород - Старый Оскол №001',
                'economyPrice' => '50 руб',
                'economyEmptySeats' => '30',
                'coupPrice' => '1000 руб',
                'coupEmptySeats' => '15' ]
        ];
    }
}