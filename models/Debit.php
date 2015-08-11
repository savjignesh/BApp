<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_debit".
 *
 * @property integer $debit_ID
 * @property integer $debit_bill_Id
 * @property integer $debit_ac_Id
 * @property integer $debit_type_Id
 * @property string $debit_amount
 * @property string $debit_date
 */
class Debit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_debit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['debit_bill_Id', 'debit_ac_Id', 'debit_type_Id', 'debit_amount', 'debit_date'], 'required'],
            [['debit_bill_Id', 'debit_ac_Id', 'debit_type_Id'], 'integer'],
            [['debit_date'], 'safe'],
            [['debit_amount'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'debit_ID' => 'Debit  ID',
            'debit_bill_Id' => 'Debit Bill  ID',
            'debit_ac_Id' => 'Debit Ac  ID',
            'debit_type_Id' => 'Debit Type  ID',
            'debit_amount' => 'Debit Amount',
            'debit_date' => 'Debit Date',
        ];
    }
}
