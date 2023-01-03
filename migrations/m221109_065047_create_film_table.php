<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 */
class m221109_065047_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film}}', [
            'id_film' => $this->primaryKey(),
            'title'=> $this->string(),
            'year'=> $this-> integer(),
            'duration' => $this->string()->notNull(),
            'age_limit' => $this->string()->notNull(),
            'producer' => $this->string(),
            'image' => $this->string(),
            'video' => $this->string(),
            'description' => $this->text()->notNull(),
            'id_cat'=> $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx_1',
            'film',
            'id_cat' 
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%film}}');
    }
}
