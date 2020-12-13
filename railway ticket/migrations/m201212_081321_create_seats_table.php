<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%seats}}`.
 */
class m201212_081321_create_seats_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%seats}}', [
            'id' => $this->primaryKey(),
            'voyageId' => $this->integer()->comment('ID рейса'),
            'wagonNumber' => $this->integer()->comment('Номер вагона'),
            'seatNumber' => $this->integer()->notNull()->comment('Номер места'),
            'class' => $this->string(7)->notNull()->comment('Класс места: economy/coup'),
            'placement' => $this->string(7)->notNull()->comment('Размещение: top/bot'),
            'isBusy' => $this->boolean()->comment('Занято ли место: занято(1)/свободно(0)'),
            'createdAt' => $this->dateTime()->notNull()->comment('Дата создания'),
            'updatedAt' => $this->dateTime()->comment('Дата изменения')
        ]);
        $this->addForeignKey('fk_voyageId', '{{%seats}}', 'voyageId', '{{%voyages}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_voyageId', '{{%seats}}');
        $this->dropTable('{{%seats}}');
    }
}
