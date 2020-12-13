<?php

namespace app\modules\v1\models;

use app\modules\v1\models\BaseModel;
use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property int $seatId ID места
 * @property int $userId
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата изменения
 *
 * @property Seats $seat
 * @property Users $user
 */
class Ticket extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seatId', 'userId', 'createdAt'], 'required'],
            [['seatId', 'userId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['seatId'], 'exist', 'skipOnError' => true, 'targetClass' => Seats::className(), 'targetAttribute' => ['seatId' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seatId' => 'ID места',
            'userId' => 'User ID',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
        ];
    }

    /**
     * Gets query for [[Seat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeat()
    {
        return $this->hasOne(Seats::className(), ['id' => 'seatId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'userId']);
    }
}