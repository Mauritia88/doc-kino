<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%con}}`.
 */
class m221109_065358_create_con_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'con1','actfilm', 'id_a', 'actors','id_actor', 'CASCADE'
        );
        $this->addForeignKey(
            'con2','actfilm', 'id_f', 'film','id_film', 'CASCADE'
        );
        $this->addForeignKey(
            'con3','film', 'id_cat', 'category','id_category', 'CASCADE'
        );
        $this->addForeignKey(
            'con4','user_rating', 'id_user', 'users','id_user', 'CASCADE'
        );
        $this->addForeignKey(
            'con5','user_rating', 'id_film', 'film', 'id_film', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%con}}');
    }
}
