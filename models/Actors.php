<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actors".
 *
 * @property int $id_actor
 * @property string|null $firstName
 * @property string|null $middleName
 * @property string|null $lastName
 * @property string|null $birthdaydate
 *
 * @property Actfilm[] $actfilms
 */
class Actors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthdaydate'], 'safe'],
            [['firstName', 'middleName', 'lastName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_actor' => 'ID',
            'firstName' => 'Имя',
            'middleName' => 'Отчество',
            'lastName' => 'Фамилия',
            'birthdaydate' => 'Дата Рождения',
        ];
    }

    /**
     * Gets query for [[Actfilms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActfilms1()
    {
//        return $this->hasMany(Actfilm::class, ['id_a' => 'id_actor']);
        return $this->hasMany(Film::className(),['id_film'=>'id_f'])->viaTable('actfilm', ['id_a' => 'id_actor']);
    }
}
