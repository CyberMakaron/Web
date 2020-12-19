<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%routs}}`.
 */
class m201212_080410_create_routs_table extends Migration
{
    /**
     * Маршруты
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%routs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->comment('Название маршрута'),
            'departId' => $this->integer()->notNull()->comment('ID пункта отправления'),
            'arriveID' => $this->integer()->notNull()->comment('ID пункта прибытия'),
            'baseCost' => $this->decimal(6, 2)->notNull()->comment('Базовая стоимость маршрута'),
            'createdAt' => $this->dateTime()->comment('Дата создания'),
            'updatedAt' => $this->dateTime()->comment('Дата изменения')
        ]);
        $this->addForeignKey('fk_departId', '{{%routs}}', 'departId', '{{%stations}}', 'id');
        $this->addForeignKey('fk_arriveId', '{{%routs}}', 'arriveId', '{{%stations}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_departId', '{{%routs}}');
        $this->dropForeignKey('fk_arriveId', '{{%routs}}');
        $this->dropTable('{{%routs}}');
    }
}
