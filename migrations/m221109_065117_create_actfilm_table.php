<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%actfilm}}`.
 */
class m221109_065117_create_actfilm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%actfilm}}', [
            'id' => $this->primaryKey(),
            'id_a'=> $this->integer()->notNull(),
            'id_f'=> $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx_2',
            'actfilm',
            'id_a'
        );
        $this->createIndex(
            'idx_3',
            'actfilm',
            'id_f'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%actfilm}}');
    }
}
