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
 * @property Stations $arrive   Пункт прибытия
 * @property Stations $depart   Пункт отправления
 * @property Voyages[] $voyages Рейсы
 */
class Rout extends BaseModel
{
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
            [['name', 'departId', 'arriveID', 'baseCost', 'createdAt'], 'required'],
            [['departId', 'arriveID'], 'integer'],
            [['baseCost'], 'number'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['arriveID'], 'exist', 'skipOnError' => true, 'targetClass' => Stations::className(), 'targetAttribute' => ['arriveID' => 'id']],
            [['departId'], 'exist', 'skipOnError' => true, 'targetClass' => Stations::className(), 'targetAttribute' => ['departId' => 'id']],
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

    /**
     * Gets query for [[Arrive]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArrive()
    {
        return $this->hasOne(Stations::className(), ['id' => 'arriveID']);
    }

    /**
     * Gets query for [[Depart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepart()
    {
        return $this->hasOne(Stations::className(), ['id' => 'departId']);
    }

    /**
     * Gets query for [[Voyages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(Voyages::className(), ['routId' => 'id']);
    }
}