<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "tbl_cust_item_discount".
 *
 * @property integer $item_Id
 * @property integer $customer_Id
 * @property integer $cust_item_discount_ID
 * @property string $discount
 * @property integer $created_Id
 * @property string $created_time
 * @property integer $updated_Id
 * @property string $updated_time
 */
class CustItemDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cust_item_discount';
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
		];
	}
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_Id', 'customer_Id', 'discount'], 'required'],
            [['item_Id', 'customer_Id', 'created_Id', 'updated_Id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['discount'], 'string', 'max' => 50]
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_Id' => 'Item  ID',
            'customer_Id' => 'Customer  ID',
            'cust_item_discount_ID' => 'Cust Item Discount  ID',
            'discount' => 'Discount',
            'created_Id' => 'Created  ID',
            'created_time' => 'Created Time',
            'updated_Id' => 'Updated  ID',
            'updated_time' => 'Updated Time',
        ];
    }
	
	public function getItem()
    {
        return $this->hasOne(Item::className(), ['item_ID' => 'item_Id']);
    }
}
