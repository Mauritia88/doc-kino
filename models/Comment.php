<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_rating".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_film
 * @property string|null $review
 * @property int|null $stars
 * @property string|null $date
 * @property int|null $status
 *
 * @property Film $film
 * @property Users $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    const STATUS_ALLOW = 1;
    const STATUS_DISALLOW = 0;


    public static function tableName()
    {
        return 'user_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_film'], 'required'],
            [['id_user', 'id_film', 'stars', 'status'], 'integer'],
            [['date'], 'safe'],
            [['review'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id_user']],
            [['id_film'], 'exist', 'skipOnError' => true, 'targetClass' => Film::class, 'targetAttribute' => ['id_film' => 'id_film']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_film' => 'Id Film',
            'review' => 'Review',
            'stars' => 'Stars',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Film]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::class, ['id_film' => 'id_film']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id_user' => 'id_user']);
    }


    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public function isAllowed()
    {
        return $this->status;
    }

    public function allow()
    {
        $this->status = self::STATUS_ALLOW;
        return $this->save(false);
    }

    public function disallow()
    {
        $this->status = self::STATUS_DISALLOW;
        return $this->save(false);
    }
}
