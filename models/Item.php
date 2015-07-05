<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "tbl_item".
 *
 * @property integer $item_ID
 * @property string $item_name
 * @property string $Item_role
 * @property string $item_stock
 * @property string $item_uom
 * @property integer $item_cat_Id
 * @property string $description
 * @property string $image
 * @property string $purchase_price
 * @property string $sales_price
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
	public $file;
    public static function tableName()
    {
        return 'tbl_item';
    }

	public function behaviors()
	{
		 return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_time',
				'updatedAtAttribute' => 'updated_time',
				'value' => new Expression('NOW()'),
			],
			[
				'class' => AttributeBehavior::className(),
				'attributes' => [
					Item::EVENT_BEFORE_INSERT => 'created_Id',
					Item::EVENT_BEFORE_UPDATE => 'updated_Id',
					],
				'value' => function ($event) {
					return Yii::$app->user->identity->id;
					},
			],
			[
				'class' => AttributeBehavior::className(),
				'attributes' => [
					Item::EVENT_BEFORE_INSERT => 'is_deleted',
					],
				'value' => function ($event) {
					return 0;
					},
			],
		];
	}
     /* @inheritdoc 'created_Id', 'created_time', 'updated_Id', 'updated_time'
     */
    public function rules()
    {
        return [
            [['item_name', 'Item_role', 'item_stock', 'item_uom', 'item_cat_Id', 'description',  'sales_price'], 'required'],
            [['item_cat_Id', 'is_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
			[['file'],'file'],
            [['item_name', 'image'], 'string', 'max' => 100],
            [['Item_role', 'item_stock', 'item_uom', 'purchase_price', 'sales_price'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200]
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
            'Item_role' => 'Item Reorder level',
            'item_stock' => 'Item Stock',
            'item_uom' => 'Item Uom',
            'item_cat_Id' => 'Item Category',
            'description' => 'Description',
            'image' => 'Image',
            'file' => 'Image',
            'purchase_price' => 'Purchase Price',
            'sales_price' => 'Sales Price',
            'is_deleted' => 'Is Deleted',
            'created_Id' => 'Created  ID',
            'created_time' => 'Created Time',
            'updated_Id' => 'Updated  ID',
            'updated_time' => 'Updated Time',
        ];
    }
}
