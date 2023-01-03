<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_rating}}`.
 */
class m221109_065147_create_user_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_rating}}', [
            'id' => $this->primaryKey(),
            'id_user'=> $this->integer()->notNull(),
            'id_film'=> $this->integer()->notNull(),
            'review'=> $this->string(255),
            'stars'=> $this->integer(),
        ]);
        $this->createIndex(
            'idx_4',
            'user_rating',
            'id_user' 
            );
        $this->createIndex(
            'idx_5',
            'user_rating',
            'id_film' 
            );    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_rating}}');
    }
}
