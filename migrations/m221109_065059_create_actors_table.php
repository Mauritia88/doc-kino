<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%actors}}`.
 */
class m221109_065059_create_actors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%actors}}', [
            'id_actor' => $this->primaryKey(),
            'firstName'=> $this->string(),
            'middleName'=> $this->string(),
            'lastName'=> $this->string(),
            'birthdaydate'=> $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%actors}}');
    }
}
