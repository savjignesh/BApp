<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_billdetail".
 *
 * @property integer $billdetail_ID
 * @property integer $bill_Id
 * @property integer $item_Id
 * @property string $qty
 * @property string $price
 * @property string $discount
 * @property string $vat
 * @property string $tax
 * @property integer $created_Id
 * @property string $created_time
 * @property integer $updated_Id
 * @property string $updated_time
 *
 * @property TblItem $item
 * @property TblBill $bill
 */
class Billdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_billdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bill_Id', 'item_Id', 'qty', 'price', 'discount'], 'required'], // 'vat', 'tax'
            [['bill_Id', 'item_Id', 'created_Id', 'updated_Id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['qty', 'price', 'discount', 'vat', 'tax'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'billdetail_ID' => 'Billdetail  ID',
            'bill_Id' => 'Bill  ID',
            'item_Id' => 'Item  ID',
            'qty' => 'Qty',
            'price' => 'Price',
            'discount' => 'Discount',
            'vat' => 'Vat',
            'tax' => 'Tax',
            'created_Id' => 'Created  ID',
            'created_time' => 'Created Time',
            'updated_Id' => 'Updated  ID',
            'updated_time' => 'Updated Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['item_ID' => 'item_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBill()
    {
        return $this->hasOne(Bill::className(), ['bill_ID' => 'bill_Id']);
    }
}
