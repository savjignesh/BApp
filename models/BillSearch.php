<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bill;

/**
 * BillSearch represents the model behind the search form about `app\models\Bill`.
 */
class BillSearch extends Bill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bill_ID', 'customer_Id', 'is_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['bill_date', 'net_amount', 'gross_amount', 'vat', 'tax', 'discount', 'total_items', 'created_time', 'updated_time'], 'safe'],
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
        $query = Bill::find();
		//$query->joinWith(['item']);
		$query->joinWith(['customer']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 500,
            ],
        ]);

         $dataProvider->sort->attributes['customer'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
            'asc' => ['tbl_customer.customer_name' => SORT_ASC],
            'desc' => ['tbl_customer.customer_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'bill_ID' => $this->bill_ID,
            'customer_Id' => $this->customer_Id,
            'is_deleted' => $this->is_deleted,
            'created_Id' => $this->created_Id,
            'created_time' => $this->created_time,
            'updated_Id' => $this->updated_Id,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'bill_date', $this->bill_date])
            ->andFilterWhere(['like', 'net_amount', $this->net_amount])
            ->andFilterWhere(['like', 'gross_amount', $this->gross_amount])
            ->andFilterWhere(['like', 'vat', $this->vat])
            ->andFilterWhere(['like', 'tax', $this->tax])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'total_items', $this->total_items]);
            //->andFilterWhere(['like', 'tbl_customer.customer_name', $this->customer_Id]);
            $query->andWhere('tbl_bill.is_deleted = 0');
        return $dataProvider;
    }
}
