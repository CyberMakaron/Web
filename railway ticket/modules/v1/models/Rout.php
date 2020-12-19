<?php

namespace app\modules\v1\models;

use app\modules\v1\models\BaseModel;
use Yii;

/**
 * This is the model class for table "routs".
 *
 * @property int $id
 * @property string $name Название маршрута
 * @property int $departId ID пункта отправления
 * @property int $arriveID ID пункта прибытия
 * @property float $baseCost Базовая стоимость маршрута
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата изменения
 *
 * @property Station $arrive   Пункт прибытия
 * @property Station $depart   Пункт отправления
 * @property Voyage[] $voyages Рейсы
 */
class Rout extends BaseModel
{
    /**
     * @var mixed|null
     */

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'routs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'departId', 'arriveID', 'baseCost'], 'required'],
            [['departId', 'arriveID'], 'integer'],
            [['baseCost'], 'number'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['arriveID'], 'exist', 'skipOnError' => true, 'targetClass' => Station::class, 'targetAttribute' => ['arriveID' => 'id']],
            [['departId'], 'exist', 'skipOnError' => true, 'targetClass' => Station::class, 'targetAttribute' => ['departId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название маршрута',
            'departId' => 'ID пункта отправления',
            'arriveID' => 'ID пункта прибытия',
            'baseCost' => 'Базовая стоимость маршрута',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
        ];
    }

    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        return [
//            'id' => $this->id,
            'name' => $this->name,
            'depart' => $this->depart,
            'arrive' => $this->arrive,
            'baseCost' => $this->baseCost
        ];
    }

    /**
     * Gets query for [[Arrive]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArrive()
    {
        return $this->hasOne(Station::class, ['id' => 'arriveID']);
    }

    /**
     * Gets query for [[Depart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepart()
    {
        return $this->hasOne(Station::class, ['id' => 'departId']);
    }

    /**
     * Gets query for [[Voyages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(Voyage::class, ['routId' => 'id']);
    }
}