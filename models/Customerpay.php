<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_customerpay".
 *
 * @property integer $customerpay_ID
 * @property integer $customer_Id
 * @property string $payment_mode
 * @property integer $Amount
 * @property string $payment_date
 */
class Customerpay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_customerpay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_Id', 'payment_mode', 'Amount', 'payment_date'], 'required'],
            [['customer_Id', 'Amount'], 'integer'],
            [['payment_date'], 'safe'],
            [['payment_mode'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerpay_ID' => 'Parties payment  ID',
            'customer_Id' => 'Parties  ID',
            'payment_mode' => 'Payment Mode',
            'Amount' => 'Amount',
            'payment_date' => 'Payment Date',
        ];
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_ID' => 'customer_Id']);
    }
}
