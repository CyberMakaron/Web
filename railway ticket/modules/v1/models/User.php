<?php

namespace app\modules\v1\models;

use app\modules\v1\models\BaseModel;
use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name Имя пользователя (пасажира)
 * @property string|null $phone Номер телефона пользователя (пасажира)
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата изменения
 *  @property string|null $email email пользователя
 * @property string|null $password_md5 hash код пароля пользователя
 *
 * @property Ticket[] $tickets Билеты пользователя
 */
class User extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createdAt', 'updatedAt'], 'safe'],
            [['name', 'phone', 'email'], 'string', 'max' => 128],
            [['password_md5'], 'string', 'max' => 33],
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
            'name' => 'Имя пользователя (пасажира)',
            'phone' => 'Номер телефона пользователя (пасажира)',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
            'email' => 'email пользователя',
            'password_md5' => 'hash код пароля пользователя'
        ];
    }

    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
//            'password_md5' => $this->password_md5
        ];
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::class, ['userId' => 'id']);
    }

    public function checkPass($password_md5) {
        return $this->password_md5 == $password_md5;
    }

    public function getUser() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'accessToken' => md5(microtime(null))
        ];
    }
}