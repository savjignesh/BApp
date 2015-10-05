<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class Report extends Model
{
    public $sdate;
    public $end_date;

    public function rules()
    {
        return [
            // Application Name
           // ['sdate', 'end_date', 'required'],
            [['sdate', 'end_date'], 'required'],
            [['item_name', 'end_date'], 'string', 'max' => 150],
           // [['sdate', 'edate'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sdate' => 'Start Date',
            'end_date' => 'End Date',

        ];
    }
}
