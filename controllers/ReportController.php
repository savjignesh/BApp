<?php

namespace app\controllers;
use Yii;
use app\models\Report;
use app\models\Credit;
use yii\bootstrap\Alert;
class ReportController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionSample()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $searchname= $data['searchname'];
            $searchby= $data['searchby'];
            return $searchname.$searchby;
        }
    }
    public function actionIndex()
    {
        $model = new Report();

        if ($model->load(Yii::$app->request->post())) {

            $d1 = date("Y-m-d", strtotime($model->sdate));
            $d2 = date("Y-m-d", strtotime($model->edate));

            $model = Credit::find()->where('credit_date between :sdate and :edate && credit_type_Id = :type', [':sdate' => $d1, ':edate' => $d2, ':type' => $model->type])->orderBy('credit_date')->all();

            $connection = Yii::$app->db;

            $sql = $connection->createCommand('SELECT sum(credit_amount) as total  FROM tbl_credit WHERE credit_type_Id =5 and credit_date > :sdate and credit_debit=0');
            $sql->bindValue(':sdate',$d1);
            $opening = $sql->queryOne();
            $opening_balance = $opening['total'];

            $sql1 = $connection->createCommand('SELECT sum(credit_amount) as total  FROM tbl_credit WHERE credit_type_Id =5 and credit_date > :sdate and credit_debit=1');
            $sql1->bindValue(':sdate',$d1);
            $opening1 = $sql1->queryOne();
            $opening_balance1 = $opening1['total'];

            $obalance = $opening_balance - $opening_balance1;

            //$content =$this->renderPartial('account',['model'=>$model, 'opening'=>$obalance]);
            //echo $content =$this->render('/bill/account', ['model'=>$model, 'opening'=>$obalance, 'sdate'=>$d1, 'edate'=>$d2]);//,'model1'=>$model1]);

            $pdf = Yii::$app->pdf;
            $pdf->options = array('title' => 'PDF Document Title',
                'subject' => 'PDF Document Subject',
                'keywords' => 'krajee, grid, export, yii2-grid, pdf'
            );
            $pdf->filename = "Billing Reports";
            $pdf->methods = array( 'SetHeader'=>['CASH LEDGER'],
                'SetFooter'=>['{PAGENO}']
            );

           // $pdf->content = $content;
            // return the pdf output as per the destination setting
           // return $pdf->render();
            return $this->redirect(['index']);
        } else {
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-info',
                ],
                'body' => 'Say hello...',
            ]);
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

}
