<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tickets}}`.
 */
class m201212_081336_create_tickets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tickets}}', [
            'id' => $this->primaryKey(),
            'seatId' => $this->integer()->notNull()->comment('ID места'),
            'userId' => $this->integer()->notNull()->comment(''),
            'createdAt' => $this->dateTime()->comment('Дата создания'),
            'updatedAt' => $this->dateTime()->comment('Дата изменения')
        ]);
        $this->addForeignKey('fk_seatId', '{{%tickets}}', 'seatId', '{{%seats}}', 'id');
        $this->addForeignKey('fk_userId', '{{%tickets}}', 'userId', '{{%users}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_seatId', '{{%tickets}}');
        $this->dropForeignKey('fk_userId', '{{%tickets}}');
        $this->dropTable('{{%tickets}}');
    }
}
