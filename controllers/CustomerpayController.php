<?php

namespace app\controllers;

use Yii;
use app\models\Customerpay;
use app\models\CustomerpaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Credit;
/**
 * CustomerpayController implements the CRUD actions for Customerpay model.
 */
class CustomerpayController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Customerpay models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerpaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customerpay model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customerpay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customerpay();

        if ($model->load(Yii::$app->request->post())) {
            $model->payment_date = date("Y-m-d", strtotime($model->payment_date));

            if($model->save()){
                $credit = new Credit();

                //take 0 for bank, cash, credit, office
                $credit->credit_bill_Id = $model->customerpay_ID;
                $credit->credit_ac_Id   = $model->customer_Id;
                $credit->credit_type_Id =  5;
                $credit->credit_amount  = $model->Amount;
                $credit->credit_date    = date("Y-m-d", strtotime($model->payment_date));
                $credit->credit_debit   = 0;
                $credit->save(false);

                return $this->redirect(['index']);
            // return $this->redirect(['view', 'id' => $model->customerpay_ID]);
            }
        }else {
                return $this->render('create', [
                    'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing Customerpay model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
             $model->payment_date = date("Y-m-d", strtotime($model->payment_date));
             // print_r($model);
             // exit;
            if($model->save()){
                $credit = $this->findCreditModel($model->customerpay_ID);
                //$credit->credit_bill_Id = $model->customerpay_ID;
                $credit->credit_ac_Id   = $model->customer_Id;
                $credit->credit_type_Id =  5;
                $credit->credit_amount  = $model->Amount;
                $credit->credit_date    = date("Y-m-d", strtotime($model->payment_date));
                $credit->credit_debit   = 0;
                $credit->save(false);

                return $this->redirect(['index']);
            // return $this->redirect(['view', 'id' => $model->customerpay_ID]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Customerpay model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
         $credit = $this->findCreditModel($model->customerpay_ID);
         $credit->delete();
         
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Customerpay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customerpay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customerpay::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findCreditModel($id)
    {
        if (($model = Credit::find($id)->where('credit_bill_Id = :cbid', [':cbid' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
