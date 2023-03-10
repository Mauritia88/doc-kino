<?php

namespace app\modules\movie\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * ActorsSearch represents the model behind the search form of `app\models\Actors`.
 */
class ActorsSearch extends Actors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_actor'], 'integer'],
            [['firstName', 'middleName', 'lastName', 'birthdaydate'], 'safe'],
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
        $query = Actors::find();

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
            'id_actor' => $this->id_actor,
            'birthdaydate' => $this->birthdaydate,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'middleName', $this->middleName])
            ->andFilterWhere(['like', 'lastName', $this->lastName]);

        return $dataProvider;
    }
}
