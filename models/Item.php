<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_item".
 *
 * @property integer $item_ID
 * @property string $item_name
 * @property string $description
 * @property string $image
 * @property string $purchase_price
 * @property string $sales_price
 * @property integer $item_cat_Id
 * @property string $Item_role
 * @property string $item_stock
 * @property string $item_uom
 * @property integer $is_deleted
 * @property integer $created_Id
 * @property string $created_time
 * @property integer $updated_Id
 * @property string $updated_time
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'description', 'image', 'purchase_price', 'sales_price', 'item_cat_Id', 'Item_role', 'item_stock', 'item_uom', 'is_deleted', 'created_Id', 'created_time', 'updated_Id', 'updated_time'], 'required'],
            [['item_cat_Id', 'is_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['item_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['image', 'purchase_price', 'sales_price', 'Item_role', 'item_stock', 'item_uom'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_ID' => 'Item  ID',
            'item_name' => 'Item Name',
            'description' => 'Description',
            'image' => 'Image',
            'purchase_price' => 'Purchase Price',
            'sales_price' => 'Sales Price',
            'item_cat_Id' => 'Item Cat  ID',
            'Item_role' => 'Item Role',
            'item_stock' => 'Item Stock',
            'item_uom' => 'Item Uom',
            'is_deleted' => 'Is Deleted',
            'created_Id' => 'Created  ID',
            'created_time' => 'Created Time',
            'updated_Id' => 'Updated  ID',
            'updated_time' => 'Updated Time',
        ];
    }
}
