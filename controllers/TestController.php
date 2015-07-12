<?php

namespace app\controllers;

use Yii;
use app\models\Test;
use app\models\TestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Command;
use yii\helpers\Json;
use kartik\mpdf\Pdf;
/**
 * TestController implements the CRUD actions for Test model.
 */
class TestController extends Controller
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
     * Lists all Test models.
     * @return mixed
     */
    public function actionReport() {
        // get your HTML raw content without any layouts or scripts
        $content =$this->renderPartial('index');
        
        $pdf = Yii::$app->pdf;


        $pdf->options = array('title' => 'PDF Document Title',
                              'subject' => 'PDF Document Subject',
                              'keywords' => 'krajee, grid, export, yii2-grid, pdf'
                              );
        $pdf->filename = "Billing Reports";
        $pdf->methods = array( 'SetHeader'=>['Billing Report Header'], 
                                'SetFooter'=>['{PAGENO}']
                              );
       
        $pdf->content = $content;
      
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }

    public function actionIndex()
    {
 
        $searchModel = new TestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $bookId = Yii::$app->request->post('editableKey');
            $model = Test::findOne($bookId);
     
            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
     
            // fetch the first entry in posted data (there should 
            // only be one entry anyway in this array for an 
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['Test']);
            $post['Test'] = $posted;
     
            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model
                $model->save();
     
                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by 
                // in the input by user is updated automatically.
                $output = '';
     
                // specific use case where you need to validate a specific
                // editable column posted when you have more than one 
                // EditableColumn in the grid view. We evaluate here a 
                // check to see if buy_amount was posted for the Book model
                if (isset($posted['buy_amount'])) {
                   $output =  Yii::$app->formatter->asDecimal($model->buy_amount, 2);
                } 
     
                // similarly you can check if the name attribute was posted as well
                // if (isset($posted['name'])) {
                //   $output =  ''; // process as you need
                // } 
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            } 
            // return ajax json encoded response and exit
            echo $out;
            return;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Test model.
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
     * Creates a new Test model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Test();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Test model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Test model.
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
     * Finds the Test model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Test the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Test::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
