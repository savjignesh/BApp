<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_ID', 'is_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['customer_name', 'home_phone', 'mobile1', 'mobile2', 'customer_email', 'address1', 'address2', 'city', 'current_balance', 'marketing_person_name', 'marketing_persion_contact', 'accounting_persion_name', 'accounting_persion_contact', 'dnd_sms', 'dnd_call', 'dnd_email', 'created_time', 'updated_time'], 'safe'],
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
        $query = Customer::find();

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
            'customer_ID' => $this->customer_ID,
            'is_deleted' => $this->is_deleted,
            'created_Id' => $this->created_Id,
            'created_time' => $this->created_time,
            'updated_Id' => $this->updated_Id,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'home_phone', $this->home_phone])
            ->andFilterWhere(['like', 'mobile1', $this->mobile1])
            ->andFilterWhere(['like', 'mobile2', $this->mobile2])
            ->andFilterWhere(['like', 'customer_email', $this->customer_email])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'current_balance', $this->current_balance])
            ->andFilterWhere(['like', 'marketing_person_name', $this->marketing_person_name])
            ->andFilterWhere(['like', 'marketing_persion_contact', $this->marketing_persion_contact])
            ->andFilterWhere(['like', 'accounting_persion_name', $this->accounting_persion_name])
            ->andFilterWhere(['like', 'accounting_persion_contact', $this->accounting_persion_contact])
            ->andFilterWhere(['like', 'dnd_sms', $this->dnd_sms])
            ->andFilterWhere(['like', 'dnd_call', $this->dnd_call])
            ->andFilterWhere(['like', 'dnd_email', $this->dnd_email]);
        $query->andWhere('is_deleted = 0');
        return $dataProvider;
    }
}
