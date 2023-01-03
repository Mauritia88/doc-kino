<?php

namespace app\models;

use app\models\Category;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CategorySearch represents the model behind the search form of `app\models\Category`.
 */
class CategorySearch extends Category
{
    public $categoryCount;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_category'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query= Category::find();

        // add conditions that should always apply here

        $query = Category::find()
            ->select([
                '{{category}}.*', // получить все атрибуты category
                'COUNT({{film}}.id_film) AS categoryCount' // вычислить количество заказов
            ])
            ->groupBy('{{category}}.id_category')
            ->joinWith('films', 'id_cat= id_category');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_category' => $this->id_category,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
