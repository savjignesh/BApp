<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Report;
use app\models\Credit;
class ReportController extends \yii\web\Controller
{
	
    public function actionIndex()
    {
    	
        $model = new Report();
        //$model->sdate = "vcv";
        if ($model->load(Yii::$app->request->post())) {
        	
            //return $this->redirect(['index']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

}
