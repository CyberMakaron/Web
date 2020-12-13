<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trains}}`.
 */
class m201211_213737_create_trains_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trains}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(10)->notNull()->comment('Название поезда'),
            'economyCount' => $this->integer()->notNull()->comment('Количество плацкарт вагонов'), //Вагоны считаем стандартными
            'coupCount' => $this->integer()->notNull()->comment('Количество купе вагонов'), //Вагоны считаем стандартными
            'economyMultiplierTop' => $this->float()->notNull()->defaultValue(1.0)->comment('Коэффициент стоимости верхнего места плацкарта'),
            'economyMultiplierBot' => $this->float()->notNull()->defaultValue(1.0)->comment('Коэффициент стоимости нижнего места плацкарта'),
            'coupMultiplierTop' => $this->float()->notNull()->defaultValue(1.0)->comment('Коэффициент стоимости нижнего места купе'),
            'coupMultiplierBot' => $this->float()->notNull()->defaultValue(1.0)->comment('Коэффициент стоимости нижнего места купе'),
            'createdAt' => $this->dateTime()->notNull()->comment('Дата создания'),
            'updatedAt' => $this->dateTime()->comment('Дата изменения')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trains}}');
    }
}
