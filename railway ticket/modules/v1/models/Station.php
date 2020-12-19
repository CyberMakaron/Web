<?php

namespace app\modules\v1\models;

use app\modules\v1\models\BaseModel;
use Yii;

/**
 * This is the model class for table "stations".
 *
 * @property int $id
 * @property string $name Название станции
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата изменения
 *
 * @property Rout[] $routs
 * @property Rout[] $routs0
 */
class Station extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название станции',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

    /**
     * Gets query for [[Routs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRouts()
    {
        return $this->hasMany(Rout::class, ['arriveID' => 'id']);
    }

    /**
     * Gets query for [[Routs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRouts0()
    {
        return $this->hasMany(Rout::class, ['departId' => 'id']);
    }
}