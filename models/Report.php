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
    public $edate;
   
    public function rules()
    {
        return [
            // Application Name
           // ['sdate', 'edate', 'required'],
            ['sdate', 'edate', 'string', 'max' => 150],

           // [['sdate', 'edate'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sdate' => 'Start Date',
            'edate' => 'End Date',
            
        ];
    }
}