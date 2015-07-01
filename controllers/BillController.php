<?php

namespace app\controllers;

use Yii;
use app\models\Bill;
use app\models\BillDetail;
use app\models\BillSearch;
use app\models\BillDetailSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\db\Query;

/**
 * BillController implements the CRUD actions for Bill model.
 */
class BillController extends Controller
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
     * Lists all Bill models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bill model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$query = Billdetail::find()->where("bill_Id=".$id);

		$BillDetails=new ActiveDataProvider([
			'query' => $query,
		]);
		
        return $this->render('view', [
            'model' => $this->findModel($id),
			'billdata' => $BillDetails,
        ]);
    }
	public function actionDetail($bid, $id, $price)
    {
        $model = new Billdetail();
		$model->item_Id = $bid;
		$model->bill_Id = $id;
		$model->price = $price;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$connection = Yii::$app->db;
			
			$sql = $connection->createCommand('SELECT count(billdetail_ID) total, sum(qty) as qty, sum(price) price, 
											   sum(discount) discount, sum(vat) vat, sum(tax) tax
											   FROM tbl_billdetail WHERE bill_Id=:billid');
			$sql->bindValue(':billid',$model->bill_Id);
			$counts = $sql->queryOne();

			//var_dump($counts);
			//exit;
			$updatebill = $this->findModel($id);
			//$updatebill->qty = $counts['qty'];
			$updatebill->gross_amount = $counts['price'];
			$updatebill->discount = $counts['discount'];
			$updatebill->vat = $counts['vat'];
			$updatebill->tax = $counts['tax'];
			$updatebill->total_items = $counts['total'];
			$updatebill->save(false);
            return $this->redirect(['update', 'id' => $model->bill_Id]);
           
        } else {
            return $this->renderAjax('detail', [
                'model' => $model,
            ]);
        }
    }
	 public function actionDupdate($id)
    {
        $model = $this->findBillDetailModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->bill_Id]);
        } else {
            return $this->render('detail', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Creates a new Bill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bill();
		$model->bill_date = date('d-M-Y');
		$model->is_deleted = 1;
		
		if($model->save(false)){
        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
           return $this->redirect(['update', 'id' => $model->bill_ID]);
        } else {
			return $this->redirect(['index']);
          //  return $this->render('create', [
            //    'model' => $model,
            //]);
        }
    }

    /**
     * Updates an existing Bill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$query = Billdetail::find()->where("bill_Id=".$id);

		$BillDetails=new ActiveDataProvider([
			'query' => $query,
		]);
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'billdata' => $BillDetails,
            ]);
        }
    }

    /**
     * Deletes an existing Bill model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bill::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	protected function findBillDetailModel($id)
    {
        if (($model = Billdetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
