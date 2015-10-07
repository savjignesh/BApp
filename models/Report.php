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
    public $type;
    public $mode;
    public function rules()
    {
        return [
            // Application Name
           // ['sdate', 'end_date', 'required'],
            [['sdate', 'edate'], 'required'],
            [['item_name', 'end_date', 'type', 'mode'], 'string', 'max' => 150],
           // [['sdate', 'edate'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sdate' => 'Start Date',
            'edate' => 'End Date',
            'type'  => 'Laider Type',
            'mode'  => 'Mode'
        ];
    }
}
