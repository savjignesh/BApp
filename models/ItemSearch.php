<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Item;

/**
 * ItemSearch represents the model behind the search form about `app\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_ID', 'item_cat_Id', 'is_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['item_name', 'description', 'image', 'purchase_price', 'sales_price', 'Item_role', 'item_stock', 'item_uom', 'created_time', 'updated_time'], 'safe'],
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
        $query = Item::find();

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
            'item_ID' => $this->item_ID,
            'item_cat_Id' => $this->item_cat_Id,
            'is_deleted' => $this->is_deleted,
            'created_Id' => $this->created_Id,
            'created_time' => $this->created_time,
            'updated_Id' => $this->updated_Id,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'purchase_price', $this->purchase_price])
            ->andFilterWhere(['like', 'sales_price', $this->sales_price])
            ->andFilterWhere(['like', 'Item_role', $this->Item_role])
            ->andFilterWhere(['like', 'item_stock', $this->item_stock])
            ->andFilterWhere(['like', 'item_uom', $this->item_uom]);
			
		$query->andWhere('is_deleted = 0');
        return $dataProvider;
    }
}
