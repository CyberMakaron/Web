<?php

namespace app\modules\v1\models;

use app\modules\v1\controllers\SeatsController;
use app\modules\v1\models\BaseModel;
use Yii;

/**
 * This is the model class for table "voyages".
 *
 * @property int $id
 * @property int $routId ID маршрута
 * @property int|null $trainId ID поезда
 * @property string $departDateTime Дата и время отправления
 * @property string $arriveDateTime Дата и время прибытия
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата изменения
 *
 * @property Seat[] $seats Места
 * @property Rout $rout    Маршрут
 * @property Train $train  Поезд
 * @property String $name
 * @property int $economyEmptySeats
 * @property int $coupEmptySeats
 */
class Voyage extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'voyages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['routId', 'departDateTime', 'arriveDateTime'], 'required'],
            [['routId', 'trainId'], 'integer'],
            [['departDateTime', 'arriveDateTime', 'createdAt', 'updatedAt'], 'safe'],
            [['routId'], 'exist', 'skipOnError' => true, 'targetClass' => Rout::class, 'targetAttribute' => ['routId' => 'id']],
            [['trainId'], 'exist', 'skipOnError' => true, 'targetClass' => Train::class, 'targetAttribute' => ['trainId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'routId' => 'ID маршрута',
            'trainId' => 'ID поезда',
            'departDateTime' => 'Дата и время отправления',
            'arriveDateTime' => 'Дата и время прибытия',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
        ];
    }

    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        $res = [
            'name' => $this->name,
            'rout' => $this->rout,
            'train' => $this->train,
            'departDateTime' => $this->departDateTime,
            'arriveDateTime' => $this->arriveDateTime
        ];

        return [
            'id' => $this->id,
            'name' => $res['rout']['name'] . ' ' . $res['train']['name'],
            'depart' => $res['rout']['depart']['name'],
            'arrive' => $res['rout']['arrive']['name'],
            'departDateTime' => $this->departDateTime,
            'arriveDateTime' => $this->arriveDateTime,
            'economyPriceTop' => $res['train']['economyMultiplierTop'] * $res['rout']['baseCost'],
            'economyPriceBot' => $res['train']['economyMultiplierBot'] * $res['rout']['baseCost'],
            'coupPriceTop' => $res['train']['coupMultiplierTop'] * $res['rout']['baseCost'],
            'coupPriceBot' => $res['train']['coupMultiplierBot'] * $res['rout']['baseCost'],
            'economyEmptySeats' => $this->economyEmptySeats,
            'coupEmptySeats' => $this->coupEmptySeats
        ];
    }

    /**
     * Gets query for [[Seats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeats()
    {
        return $this->hasMany(Seat::class, ['voyageId' => 'id']);
    }

    /**
     * Gets query for [[Rout]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRout()
    {
        return $this->hasOne(Rout::class, ['id' => 'routId']);
    }

    /**
     * Gets query for [[Train]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrain()
    {
        return $this->hasOne(Train::class, ['id' => 'trainId']);
    }

    /**
     * @return string
     */
    public function getName()
    {
        $tmp = ['rout' => $this->rout, 'train' => $this->train];
        return $tmp['rout']['name'] . ' ' . $tmp['train']['name'];
    }

    /**
     * @return int
     */
    public function getEconomyEmptySeats(){
        return count(Seat::find()
            ->with('voyage')
            ->where(['voyageId' => $this->id, 'class' => 'economy', 'isBusy' => '0'])
            ->all());
    }

    /**
     * @return int
     */
    public function getCoupEmptySeats(){
        return count(Seat::find()
            ->with('voyage')
            ->where(['voyageId' => $this->id, 'class' => 'coup', 'isBusy' => '0'])
            ->all());
    }
}