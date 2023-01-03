<?php

namespace app\models;

use Yii;
use yii\data\ArrayDataProvider;
use yii\db\Expression;

/**
 * This is the model class for table "category".
 *
 * @property int $id_category
 * @property string|null $name
 *
 * @property Film[] $films
 */
class Category extends \yii\db\ActiveRecord
{
    public $categoryCount;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array(
            'id_category' => 'ID',
            'name' => 'Категория',
            'categoryCount' => 'Количество фильмов',
        );
    }

    /**
     * Gets query for [[Films]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::class, ['id_cat' => 'id_category']);
    }

}
