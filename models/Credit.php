<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_credit".
 *
 * @property integer $credit_ID
 * @property integer $credit_bill_Id
 * @property integer $credit_ac_Id
 * @property integer $credit_type_Id
 * @property string $credit_amount
 * @property string $credit_date
 */
class Credit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_credit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['credit_bill_Id', 'credit_ac_Id', 'credit_type_Id', 'credit_amount', 'credit_date'], 'required'],
            [['credit_bill_Id', 'credit_ac_Id', 'credit_type_Id'], 'integer'],
            [['credit_date'], 'safe'],
            [['credit_amount'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'credit_ID' => 'Credit  ID',
            'credit_bill_Id' => 'Credit Bill  ID',
            'credit_ac_Id' => 'Credit Ac  ID',
            'credit_type_Id' => 'Credit Type  ID',
            'credit_amount' => 'Credit Amount',
            'credit_date' => 'Credit Date',
        ];
    }
}
