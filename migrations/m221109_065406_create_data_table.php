<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m221109_065406_create_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('actors', [
            'id_actor' => 1,
            'firstName'=> 'Илон',
            'middleName'=> '',
            'lastName'=> 'Маск',
            'birthdaydate'=>  date_create('1971-06-28')->format('Y-m-d'),
        ]);
        $this->insert('actors', [
            'id_actor' => 2,
            'firstName'=> 'Эмбер',
            'middleName'=> '',
            'lastName'=> 'Хёрд',
            'birthdaydate'=>  date_create('1986-04-22')->format('Y-m-d'),
        ]);
        $this->insert('category', [
            'id_category' => 1,
            'name'=> 'Про животных',
        ]);
        $this->insert('category', [
            'id_category' => 2,
            'name'=> 'о космосе',
        ]);
        $this->insert('category', [
            'id_category' => 3,
            'name'=> 'Известные люди',
        ]);
        $this->insert('film', [
            'id_film' => 1,
            'title'=> 'Илон Маск: Настоящий железный человек',
            'year'=> 2018,
            'duration' => '1 ч. 14 мин.',
            'age_limit' => '16+',
            'producer' => 'Соня Андерсон',
            'image' => 'https://rus.team/images/article/28261/avatar_4x3.webp?actual=1593203247', //!!!!!
            'video' => '',
            'description' => 'История жизни и громких достижений американского инженера, изобретателя и миллиардера Илона Маска.',
            'id_cat'=> 3,
        ]);
        $this->insert('actfilm', [
            'id' => 1,
            'id_a'=> 1,
            'id_f'=> 1,
        ]);
        $this->insert('actfilm', [
            'id' => 2,
            'id_a'=> 2,
            'id_f'=> 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //!!!!! just need to remove the data with $this->delete()
    }
}
