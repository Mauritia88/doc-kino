<?php

use yii\db\Migration;

/**
 * Class m221115_115356_change_film_table
 */
class m221115_115356_change_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('film', 'producer', $this->string(50)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('film', 'producer'); // !!!!!
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221115_115356_change_film_table cannot be reverted.\n";

        return false;
    }
    */
}
