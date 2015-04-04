<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Album;

/**
 * AlbumSearch represents the model behind the search form about `backend\models\Album`.
 */
class AlbumSearch extends Album
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'track', 'duration'], 'integer'],
            [['title', 'artist', 'genre', 'theme', 'catalog', 'barcode', 'frontcover', 'backcover', 'releasedat', 'createdat', 'updatedat'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Album::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'track' => $this->track,
            'duration' => $this->duration,
            'releasedat' => $this->releasedat,
            'createdat' => $this->createdat,
            'updatedat' => $this->updatedat,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'artist', $this->artist])
            ->andFilterWhere(['like', 'genre', $this->genre])
            ->andFilterWhere(['like', 'theme', $this->theme])
            ->andFilterWhere(['like', 'catalog', $this->catalog])
            ->andFilterWhere(['like', 'barcode', $this->barcode])
            ->andFilterWhere(['like', 'frontcover', $this->frontcover])
            ->andFilterWhere(['like', 'backcover', $this->backcover]);

        return $dataProvider;
    }
}
