<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_customer".
 *
 * @property integer $customer_ID
 * @property string $customer_name
 * @property string $gender
 * @property string $home_phone
 * @property string $mobile1
 * @property string $mobile2
 * @property string $customer_email
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $current_balance
 * @property string $marketing_person_name
 * @property string $marketing_persion_contact
 * @property string $accounting_persion_name
 * @property string $accounting_persion_contact
 * @property string $dnd_sms
 * @property string $dnd_call
 * @property string $dnd_email
 * @property integer $id_deleted
 * @property integer $created_Id
 * @property string $created_time
 * @property integer $updated_Id
 * @property string $updated_time
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'gender', 'home_phone', 'mobile1', 'customer_email', 'address1', 'city','current_balance'], 'required'],
            [['id_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['customer_name', 'home_phone', 'mobile1', 'mobile2', 'customer_email', 'marketing_person_name', 'marketing_persion_contact', 'accounting_persion_name', 'accounting_persion_contact', 'dnd_sms', 'dnd_call', 'dnd_email'], 'string', 'max' => 100],
            [['gender', 'city', 'current_balance'], 'string', 'max' => 50],
            [['address1', 'address2'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_ID' => 'Customer  ID',
            'customer_name' => 'Customer Name',
            'gender' => 'Gender',
            'home_phone' => 'Home Phone',
            'mobile1' => 'Mobile1',
            'mobile2' => 'Mobile2',
            'customer_email' => 'Customer Email',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'current_balance' => 'Current Balance',
            'marketing_person_name' => 'Marketing Person Name',
            'marketing_persion_contact' => 'Marketing Persion Contact',
            'accounting_persion_name' => 'Accounting Persion Name',
            'accounting_persion_contact' => 'Accounting Persion Contact',
            'dnd_sms' => 'Dnd Sms',
            'dnd_call' => 'Dnd Call',
            'dnd_email' => 'Dnd Email',
            'id_deleted' => 'Id Deleted',
            'created_Id' => 'Created  ID',
            'created_time' => 'Created Time',
            'updated_Id' => 'Updated  ID',
            'updated_time' => 'Updated Time',
        ];
    }
}
