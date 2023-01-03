<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * FilmSearch represents the model behind the search form of `app\models\Film`.
 */
class FilmSearch extends Film
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_film', 'year', 'id_cat'], 'integer'],
            [['title', 'duration', 'age_limit', 'producer', 'image', 'video', 'description'], 'safe'],
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
        $query = Film::find();

        // add conditions that should always apply here

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
//            'id_film' => $this->id_film,
            'year' => $this->year,
            'id_cat' => $this->id_cat,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'age_limit', $this->age_limit])
            ->andFilterWhere(['like', 'producer', $this->producer])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
