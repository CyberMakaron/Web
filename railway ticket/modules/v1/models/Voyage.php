<?php

namespace app\modules\v1\models;

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
            [['routId', 'departDateTime', 'arriveDateTime', 'createdAt'], 'required'],
            [['routId', 'trainId'], 'integer'],
            [['departDateTime', 'arriveDateTime', 'createdAt', 'updatedAt'], 'safe'],
            [['routId'], 'exist', 'skipOnError' => true, 'targetClass' => Rout::className(), 'targetAttribute' => ['routId' => 'id']],
            [['trainId'], 'exist', 'skipOnError' => true, 'targetClass' => Train::className(), 'targetAttribute' => ['trainId' => 'id']],
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
        return [
            'id' => $this->id,
            'routId' => $this->routId,
            'trainId' => $this->trainId,
            'departDateTime' => $this->departDateTime,
            'arriveDateTime' => $this->arriveDateTime
        ];
    }

    /**
     * Gets query for [[Seats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeats()
    {
        return $this->hasMany(Seat::className(), ['voyageId' => 'id']);
    }

    /**
     * Gets query for [[Rout]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRout()
    {
        return $this->hasOne(Rout::className(), ['id' => 'routId']);
    }

    /**
     * Gets query for [[Train]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrain()
    {
        return $this->hasOne(Train::className(), ['id' => 'trainId']);
    }
}