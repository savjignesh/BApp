<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "tbl_vendor".
 *
 * @property integer $vendor_ID
 * @property string $vendor_name
 * @property string $vendor_email
 * @property string $city
 * @property string $address1
 * @property string $address2
 * @property integer $current_balance
 * @property string $gender
 * @property string $home_phone
 * @property string $mobile1
 * @property string $mobile2
 * @property string $dnd_call
 * @property string $dnd_email
 * @property string $dnd_sms
 * @property string $accounting_persion_name
 * @property string $accounting_persion_contact
 * @property string $marketing_person_name
 * @property string $marketing_persion_contact
 * @property integer $is_deleted
 * @property integer $created_Id
 * @property string $created_time
 * @property integer $updated_Id
 * @property string $updated_time
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_vendor';
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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_name', 'gender', 'home_phone', 'mobile1', 'vendor_email', 'address1', 'city','current_balance'], 'required'],
            [['current_balance', 'is_deleted', 'created_Id', 'updated_Id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['vendor_name', 'gender', 'home_phone', 'mobile1', 'mobile2', 'dnd_call', 'dnd_email', 'dnd_sms', 'accounting_persion_name', 'accounting_persion_contact', 'marketing_person_name', 'marketing_persion_contact'], 'string', 'max' => 100],
            [['vendor_email', 'address1', 'address2'], 'string', 'max' => 200],
            [['city'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vendor_ID' => 'Vendor  ID',
            'vendor_name' => 'Vendor Name',
            'vendor_email' => 'Vendor Email',
            'city' => 'City',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'current_balance' => 'Current Balance',
            'gender' => 'Gender',
            'home_phone' => 'Home Phone',
            'mobile1' => 'Mobile1',
            'mobile2' => 'Mobile2',
            'dnd_call' => 'Dnd Call',
            'dnd_email' => 'Dnd Email',
            'dnd_sms' => 'Dnd Sms',
            'accounting_persion_name' => 'Accounting Persion Name',
            'accounting_persion_contact' => 'Accounting Persion Contact',
            'marketing_person_name' => 'Marketing Person Name',
            'marketing_persion_contact' => 'Marketing Persion Contact',
            'is_deleted' => 'Is Deleted',
            'created_Id' => 'Created  ID',
            'created_time' => 'Created Time',
            'updated_Id' => 'Updated  ID',
            'updated_time' => 'Updated Time',
        ];
    }
}
