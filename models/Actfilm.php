<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actfilm".
 *
 * @property int $id
 * @property int $id_a
 * @property int $id_f
 *
 * @property Actors $a
 * @property Film $f
 */
class Actfilm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actfilm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_a', 'id_f'], 'required'],
            [['id_a', 'id_f'], 'integer'],
            [['id_a'], 'exist', 'skipOnError' => true, 'targetClass' => Actors::class, 'targetAttribute' => ['id_a' => 'id_actor']],
            [['id_f'], 'exist', 'skipOnError' => true, 'targetClass' => Film::class, 'targetAttribute' => ['id_f' => 'id_film']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_a' => 'Id Актера',
            'id_f' => 'Id Фильма',
        ];
    }

    /**
     * Gets query for [[A]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getA()
    {
        return $this->hasOne(Actors::class, ['id_actor' => 'id_a']);
    }

    /**
     * Gets query for [[F]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getF()
    {
        return $this->hasOne(Film::class, ['id_film' => 'id_f']);
    }
}
