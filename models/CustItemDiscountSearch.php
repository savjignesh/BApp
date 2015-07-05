<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CustItemDiscount;

/**
 * CustItemDiscountSearch represents the model behind the search form about `app\models\CustItemDiscount`.
 */
class CustItemDiscountSearch extends CustItemDiscount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_Id', 'customer_Id', 'cust_item_discount_ID', 'created_Id', 'updated_Id'], 'integer'],
            [['discount', 'created_time', 'updated_time'], 'safe'],
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
        $query = CustItemDiscount::find();

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
            'item_Id' => $this->item_Id,
            'customer_Id' => $this->customer_Id,
            'cust_item_discount_ID' => $this->cust_item_discount_ID,
            'created_Id' => $this->created_Id,
            'created_time' => $this->created_time,
            'updated_Id' => $this->updated_Id,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'discount', $this->discount]);

        return $dataProvider;
    }
}
