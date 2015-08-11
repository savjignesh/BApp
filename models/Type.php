<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_type".
 *
 * @property integer $type_ID
 * @property string $type_name
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['type_name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_ID' => 'Type  ID',
            'type_name' => 'Type Name',
        ];
    }
}
