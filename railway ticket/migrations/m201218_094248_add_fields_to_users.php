<?php

use yii\db\Migration;

/**
 * Class m201218_094248_add_fields_to_users
 */
class m201218_094248_add_fields_to_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{users}}', 'email', $this->string(128)->comment("email пользователя"));
        $this->addColumn('{{users}}', 'password_md5', $this->string(32)->comment("hash код пароля пользователя"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{users}}', 'email');
        $this->dropColumn('{{users}}', 'password_md5');
    }
}
