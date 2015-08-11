<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vendor;

/**
 * VendorSearch represents the model behind the search form about `app\models\Vendor`.
 */
class VendorSearch extends Vendor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_ID', 'current_balance', 'is_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['vendor_name', 'vendor_email', 'city', 'address1', 'address2', 'gender', 'home_phone', 'mobile1', 'mobile2', 'dnd_call', 'dnd_email', 'dnd_sms', 'accounting_persion_name', 'accounting_persion_contact', 'marketing_person_name', 'marketing_persion_contact', 'created_time', 'updated_time'], 'safe'],
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
        $query = Vendor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'vendor_ID' => $this->vendor_ID,
            'current_balance' => $this->current_balance,
            'is_deleted' => $this->is_deleted,
            'created_Id' => $this->created_Id,
            'created_time' => $this->created_time,
            'updated_Id' => $this->updated_Id,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'vendor_name', $this->vendor_name])
            ->andFilterWhere(['like', 'vendor_email', $this->vendor_email])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'home_phone', $this->home_phone])
            ->andFilterWhere(['like', 'mobile1', $this->mobile1])
            ->andFilterWhere(['like', 'mobile2', $this->mobile2])
            ->andFilterWhere(['like', 'dnd_call', $this->dnd_call])
            ->andFilterWhere(['like', 'dnd_email', $this->dnd_email])
            ->andFilterWhere(['like', 'dnd_sms', $this->dnd_sms])
            ->andFilterWhere(['like', 'accounting_persion_name', $this->accounting_persion_name])
            ->andFilterWhere(['like', 'accounting_persion_contact', $this->accounting_persion_contact])
            ->andFilterWhere(['like', 'marketing_person_name', $this->marketing_person_name])
            ->andFilterWhere(['like', 'marketing_persion_contact', $this->marketing_persion_contact]);

        return $dataProvider;
    }
}
