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
 * @property Seat $seat
 * @property User $user
 * @property Voyage $voyage
 * @property Train $train
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
            [['seatId', 'userId'], 'required'],
            [['seatId', 'userId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['seatId'], 'exist', 'skipOnError' => true, 'targetClass' => Seat::class, 'targetAttribute' => ['seatId' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['userId' => 'id']],
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

    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        $res = [
            'id' => $this->id,
            'user' => $this->user,
            'seat' => $this->seat,
            'voyage' => $this->voyage,
        ];
        return [
            'voyageName' => $res['voyage']['name'],
            'departDateTime' => $res['voyage']['departDateTime'],
            'arriveDateTime' => $res['voyage']['arriveDateTime'],
            'passenger' => $res['user']['name'],
            'phone' => $res['user']['phone'],
            'seatWagon' => $res['seat']['wagonNumber'],
            'seatNumber' => $res['seat']['seatNumber'],
            'seatClass' => $res['seat']['class'],
            'seatPlacement' => $res['seat']['placement'],
        ];
    }

    public function behaviors()
    {
        return parent::behaviors();
    }

    /**
     * Gets query for [[Seat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeat()
    {
        return $this->hasOne(Seat::class, ['id' => 'seatId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyage()
    {
        $seat = new Seat($this->seat);
        return $seat->getVoyage();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrain()
    {
        $voyage = new Voyage($this->voyage);
        return $voyage->getTrain();
    }
}