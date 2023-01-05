<?php

use yii\db\Migration;

/**
 * Class m230105_083720_add_date_to_comment
 */
class m230105_083720_add_date_to_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_rating','date', $this->date());
        $this->addColumn('user_rating','status', $this->tinyInteger()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user_rating','date');
        $this->dropColumn('user_rating','status');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230105_083720_add_date_to_comment cannot be reverted.\n";

        return false;
    }
    */
}
