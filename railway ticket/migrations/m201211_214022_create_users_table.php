<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m201211_214022_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->comment('Имя пользователя (пасажира)'),
            'phone' => $this->string(32)->comment('Номер телефона пользователя (пасажира)'),
            'createdAt' => $this->dateTime()->comment('Дата создания'),
            'updatedAt' => $this->dateTime()->comment('Дата изменения')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
