<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%voyages}}`.
 */
class m201212_080714_create_voyages_table extends Migration
{
    /**
     * Рейсы
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%voyages}}', [
            'id' => $this->primaryKey(),
            'routId' => $this->integer()->notNull()->comment('ID маршрута'),
            'trainId' => $this->integer()->comment('ID поезда'),
            'departDateTime' => $this->dateTime()->notNull()->comment('Дата и время отправления'),
            'arriveDateTime' => $this->dateTime()->notNull()->comment('Дата и время прибытия'),
            'createdAt' => $this->dateTime()->notNull()->comment('Дата создания'),
            'updatedAt' => $this->dateTime()->comment('Дата изменения')
        ]);
        $this->addForeignKey('fk_routId', '{{%voyages}}', 'routId', '{{%routs}}', 'id');
        $this->addForeignKey('fk_trainId', '{{%voyages}}', 'trainId', '{{%trains}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_routId', '{{%voyages}}');
        $this->dropForeignKey('fk_trainId', '{{%voyages}}');
        $this->dropTable('{{%voyages}}');
    }
}
