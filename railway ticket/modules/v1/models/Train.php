<?php

namespace app\modules\v1\models;

use app\modules\v1\models\BaseModel;
use Yii;

/**
 * This is the model class for table "trains".
 *
 * @property int $id
 * @property string $name Название поезда
 * @property int $economyCount Количество плацкарт вагонов
 * @property int $coupCount Количество купе вагонов
 * @property float $economyMultiplierTop Коэффициент стоимости верхнего места плацкарта
 * @property float $economyMultiplierBot Коэффициент стоимости нижнего места плацкарта
 * @property float $coupMultiplierTop Коэффициент стоимости нижнего места купе
 * @property float $coupMultiplierBot Коэффициент стоимости нижнего места купе
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата изменения
 *
 * @property Voyage[] $voyages Рейсы
 */
class Train extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trains';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'economyCount', 'coupCount'], 'required'],
            [['economyCount', 'coupCount'], 'integer'],
            [['economyMultiplierTop', 'economyMultiplierBot', 'coupMultiplierTop', 'coupMultiplierBot'], 'number'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['name'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название поезда',
            'economyCount' => 'Количество плацкарт вагонов',
            'coupCount' => 'Количество купе вагонов',
            'economyMultiplierTop' => 'Коэффициент стоимости верхнего места плацкарта',
            'economyMultiplierBot' => 'Коэффициент стоимости нижнего места плацкарта',
            'coupMultiplierTop' => 'Коэффициент стоимости нижнего места купе',
            'coupMultiplierBot' => 'Коэффициент стоимости нижнего места купе',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
        ];
    }

    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'economyCount' => $this->economyCount,
            'coupCount' => $this->coupCount,
            'economyMultiplierTop' => $this->economyMultiplierTop,
            'economyMultiplierBot' => $this->economyMultiplierBot,
            'coupMultiplierTop' => $this->coupMultiplierTop,
            'coupMultiplierBot' => $this->coupMultiplierBot
        ];
    }

    /**
     * Gets query for [[Voyages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(Voyage::class, ['trainId' => 'id']);
    }
}