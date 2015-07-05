<?php

namespace app\controllers;

use Yii;
use app\models\CustItemDiscount;
use app\models\CustItemDiscountSearch;
use app\models\Item;
use app\models\ItemSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

use yii\db\Query;
/**
 * CustItemDiscountController implements the CRUD actions for CustItemDiscount model.
 */
class CustItemDiscountController extends Controller
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
     * Lists all CustItemDiscount models.
     * @return mixed
     */
	public function actionUpvote($id)
	{
		if($id!=NULL){
			$model = new CustItemDiscount();
				$model->item_Id = $id;
				$model->customer_Id = 2;
				$model->discount = 1;
			$model->save(false);
		}
		$votes = Yii::$app->session->get('votes', 0);
		Yii::$app->session->set('votes', ++$votes);
		
		$searchModel = new CustItemDiscountSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$searchModel1 = new ItemSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
		$this->layout = 'onecolumn';
		
		return $this->renderAjax('index', [
            'dataProvider' => $dataProvider,
            'dataProvider1' => $dataProvider1,
        ]);
	}
	 
	public function actionDownvote()
	{
		$votes = Yii::$app->session->get('votes', 0);
		Yii::$app->session->set('votes', --$votes);
		return $this->render('index');
	}

    public function actionIndex()
    {
        $searchModel = new CustItemDiscountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$searchModel1 = new ItemSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
		$this->layout = 'onecolumn';
		
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dataProvider1' => $dataProvider1,
        ]);
    }

    /**
     * Displays a single CustItemDiscount model.
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
     * Creates a new CustItemDiscount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustItemDiscount();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cust_item_discount_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CustItemDiscount model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cust_item_discount_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CustItemDiscount model.
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
     * Finds the CustItemDiscount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustItemDiscount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CustItemDiscount::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}