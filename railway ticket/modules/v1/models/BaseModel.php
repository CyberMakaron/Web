<?php

namespace app\modules\v1\models;

use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use yii\db\Expression;

class BaseModel extends ActiveRecord
{
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'createdAt',
                'updatedAtAttribute' => 'updatedAt',
                'value' => new Expression('now()')
//                'value' => date('Y-m-d H:i:s')
            ]
        ];
        //parent::behaviors();
    }

}