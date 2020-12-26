<?php

namespace app\modules\v1\models;

use app\modules\v1\models\BaseModel;
use Yii;

/**
 * This is the model class for table "seats".
 *
 * @property int $id
 * @property int|null $voyageId ID рейса
 * @property int|null $wagonNumber Номер вагона
 * @property int $seatNumber Номер места
 * @property string $class Класс места: economy/coup
 * @property string $placement Размещение: top/bot
 * @property int|null $isBusy Занято ли место: занято(1)/свободно(0)
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата изменения
 *
 * @property Voyage $voyage        Рейс
 * @property Ticket $ticket
 */
class Seat extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['voyageId', 'wagonNumber', 'seatNumber', 'isBusy'], 'integer'],
            [['seatNumber', 'class', 'placement'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['class', 'placement'], 'string', 'max' => 7],
            [['voyageId'], 'exist', 'skipOnError' => true, 'targetClass' => Voyage::class, 'targetAttribute' => ['voyageId' => 'id']],
        ];
    }

    public function behaviors()
    {
        return parent::behaviors();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'voyageId' => 'ID рейса',
            'wagonNumber' => 'Номер вагона',
            'seatNumber' => 'Номер места',
            'class' => 'Класс места: economy/coup',
            'placement' => 'Размещение: top/bot',
            'isBusy' => 'Занято ли место: занято(1)/свободно(0)',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
        ];
    }

    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        return [
            'id' => $this->id,
            'voyageId' => $this->voyageId,
            'wagonNumber' => $this->wagonNumber,
            'seatNumber' => $this->seatNumber,
            'class' => $this->class,
            'placement' => $this->placement,
            'isBusy' => $this->isBusy
        ];
    }

    /**
     * Gets query for [[Voyage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoyage()
    {
        return $this->hasOne(Voyage::class, ['id' => 'voyageId']);
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
//    public function getTickets()
//    {
//        return $this->hasMany(Tickets::class, ['seatId' => 'id']);
//    }
    /**
     * Gets query for [[Ticket]].
     *
     * @return \yii\db\ActiveQuery
     */
     public function getTicket()
     {
         return $this->hasOne(Ticket::class, ['seatId' => 'id']);
     }
}