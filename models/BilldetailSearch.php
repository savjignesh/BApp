<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Billdetail;

/**
 * BilldetailSearch represents the model behind the search form about `app\models\Billdetail`.
 */
class BilldetailSearch extends Billdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['billdetail_ID', 'bill_Id', 'item_Id', 'created_Id', 'updated_Id'], 'integer'],
            [['qty', 'price', 'discount', 'vat', 'tax', 'created_time', 'updated_time'], 'safe'],
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
        $query = Billdetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 500,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'billdetail_ID' => $this->billdetail_ID,
            'bill_Id' => $this->bill_Id,
            'item_Id' => $this->item_Id,
            'created_Id' => $this->created_Id,
            'created_time' => $this->created_time,
            'updated_Id' => $this->updated_Id,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'qty', $this->qty])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'vat', $this->vat])
            ->andFilterWhere(['like', 'tax', $this->tax]);

        return $dataProvider;
    }
}
