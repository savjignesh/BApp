<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "tbl_bill".
 *
 * @property integer $bill_ID
 * @property integer $customer_Id
 * @property string $bill_date
 * @property string $net_amount
 * @property string $gross_amount
 * @property string $vat
 * @property string $tax
 * @property string $discount
 * @property string $total_items
 * @property integer $is_deleted
 * @property integer $created_Id
 * @property string $created_time
 * @property integer $updated_Id
 * @property string $updated_time
 *
 * @property TblBilldetail[] $tblBilldetails
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_bill';
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
            [['customer_Id', 'bill_date', 'net_amount', 'gross_amount', 'vat', 'tax', 'discount', 'total_items'], 'required'],
            [['customer_Id', 'is_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['bill_date'], 'string', 'max' => 25],
            [['net_amount', 'gross_amount', 'vat', 'tax', 'discount', 'total_items'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bill_ID' => 'Bill  ID',
            'customer_Id' => 'Customer  ID',
            'bill_date' => 'Bill Date',
            'net_amount' => 'Net Amount',
            'gross_amount' => 'Gross Amount',
            'vat' => 'Vat',
            'tax' => 'Tax',
            'discount' => 'Discount',
            'total_items' => 'Total Items',
            'is_deleted' => 'Is Deleted',
            'created_Id' => 'Created  ID',
            'created_time' => 'Created Time',
            'updated_Id' => 'Updated  ID',
            'updated_time' => 'Updated Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBilldetails()
    {
        return $this->hasMany(Billdetail::className(), ['bill_Id' => 'bill_ID']);
    }
}
