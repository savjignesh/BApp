<?php

namespace app\controllers;

use Yii;
use app\models\Bill;
use app\models\BillDetail;
use app\models\Item;
use app\models\BillSearch;
use app\models\BillDetailSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Credit;
use app\models\Debit;
use app\models\CustItemDiscount;
use app\models\Type;
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
                    //'ddelete' => ['post'],
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
        $min = null;
        $max = null;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'min' => $min,
            'max' => $max,
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
	public function actionDetail($bid, $id)
    {
        $model = new Billdetail();
		    $model->item_Id = $bid;
        $model->bill_Id = $id;

        $item = Item::findOne($bid);

        if($item){
          $model->price = $item->sales_price;
          $model->vat   = $item->vat;
          $model->tax   = $item->tax;
        }

        if ($model->load(Yii::$app->request->post())) {
            //  echo "<pre>";
            // print_r($model);
              if($item){
                  $finddiscount = CustItemDiscount::find()->where('customer_Id = :id and item_Id = :bid', [':id' => $this->findModel($id)->customer_Id,':bid' => $bid])->one();
                  if($finddiscount){
                      $model->discount = $finddiscount->discount * $model->qty;
                  }else{
                      $model->discount = 0;
                  }
              }
            // $model->discount = $model->discount * $model->qty;
            // $model->vat   = $model->vat * $model->qty;
            // $model->tax   = $model->tax * $model->qty;

            $discount = ($model->discount > 0 ? $model->discount : 0);
            $Amount = ($model->price  + $model->vat + $model->tax - $discount) *  $model->qty;

            $model->final_price = round($Amount, 2);

            if($model->save()){
                $connection = Yii::$app->db;
                //update item stock
                $items = Item::findOne($model->item_Id);
                $items->item_stock = $items->item_stock - $model->qty;
                $items->save(false);
                $sql = $connection->createCommand('SELECT count(billdetail_ID) total, sum(qty) as qty, sum(price * qty) net_amount, sum(final_price) price,
                                   sum(discount) discount, sum(vat) vat, sum(tax) tax
                                   FROM tbl_billdetail WHERE bill_Id=:billid');
                $sql->bindValue(':billid',$model->bill_Id);
                $counts = $sql->queryOne();

                //var_dump($counts);
                //exit;
                //update bill data for  billdetail
                $updatebill = $this->findModel($id);
                $updatebill->net_amount = $counts['net_amount'];
                $updatebill->gross_amount = $counts['price'];
                $updatebill->discount = $counts['discount'];
                $updatebill->vat = $counts['vat'];
                $updatebill->tax = $counts['tax'];
                $updatebill->total_items = $counts['total'];
                $updatebill->save(false);
                return $this->redirect(['update', 'id' => $model->bill_Id]);
            }else{
              echo "error";
              print_r($model->getErrors());
            }


        } else {
            return $this->renderAjax('detail', [
                'model' => $model,
            ]);
        }
    }
     public function actionDdelete($id, $rid)
    {
        $model = $this->findBillDetailModel($id);
        $connection = Yii::$app->db;
          //update item stock
          $items = Item::findOne($model->item_Id);
          $items->item_stock = $items->item_stock + $model->qty;
          $items->save(false);
          $model->delete();
          $sql = $connection->createCommand('SELECT count(billdetail_ID) total, sum(qty) as qty, sum(price * qty) net_amount, sum(final_price) price,
                             sum(discount) discount, sum(vat) vat, sum(tax) tax
                             FROM tbl_billdetail WHERE bill_Id=:billid');
          $sql->bindValue(':billid',$rid);
          $counts = $sql->queryOne();

          //update bill data for  billdetail
          $updatebill = $this->findModel($rid);
          if($counts['total'] > 0){
              $updatebill->net_amount = $counts['net_amount'];
              $updatebill->gross_amount = $counts['price'];
              $updatebill->discount = $counts['discount'];
              $updatebill->vat = $counts['vat'];
              $updatebill->tax = $counts['tax'];
              $updatebill->total_items = $counts['total'];
          }else{
               $updatebill->net_amount = 0;
                $updatebill->gross_amount = 0;
                $updatebill->discount = 0;
                $updatebill->vat = 0;
                $updatebill->tax = 0;
                $updatebill->total_items = 0;
          }

          $updatebill->save(false);

        return $this->redirect(['update', 'id' => $rid]);
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

    $model->is_deleted = 0;
		$query = Billdetail::find()->where("bill_Id=".$id);

		$BillDetails=new ActiveDataProvider([
			'query' => $query,
             'pagination' => [
                'pageSize' => 500,
            ],
		]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if($model->gross_amount > 0 ){

                   $cr_check = Credit::find()->where('credit_bill_Id = :cbid', [':cbid' => $model->bill_ID])->all();
                   // echo "<pre>";
                   // print_r($cr_check);
                   // exit;
                   if($cr_check){
                        // foreach ($cr_check as $crvalue) {

                        // }
                        //     $cr_update = Credit::find($crvalue->credit_ID)->one();
                        //     if($crvalue->credit_ac_Id = 0 and ($crvalue->credit_type_Id = 3 || $crvalue->credit_type_Id = 2 || $crvalue->credit_type_Id = 7))
                        //     {
                        //         $cr_update->credit_type_Id =  Type::find()->where('type_name = :tname', [':tname' => $model->payment_mode])->one()->type_ID;
                        //         $cr_update->credit_amount  = $model->gross_amount;
                        //         $cr_update->credit_date    = date("Y-m-d", strtotime($model->bill_date));

                        //     }
                        //     else if($crvalue->credit_type_Id = 5)
                        //     {
                        //         $cr_customer->credit_ac_Id   = $model->customer_Id;
                        //         $cr_customer->credit_amount  = $model->gross_amount;
                        //         $cr_customer->credit_date    = date("Y-m-d", strtotime($model->bill_date));
                        //     }
                        //     else if($crvalue->credit_type_Id = 8)
                        //     {
                        //         $cr_customer->credit_ac_Id   = $model->customer_Id;
                        //         $cr_customer->credit_amount  = $model->gross_amount;
                        //         $cr_customer->credit_date    = date("Y-m-d", strtotime($model->bill_date));
                        //     }

                        // }
                   }else{
                        //bill entry
                       $credit = new Credit();

                       $credit->credit_bill_Id = $model->bill_ID;
                       //take 0 for bank, cash, credit, office
                       $credit->credit_ac_Id   = 0;

                       $credit->credit_type_Id =  Type::find()->where('type_name = :tname', [':tname' => $model->payment_mode])->one()->type_ID;
                       $credit->credit_amount  = $model->gross_amount;
                       $credit->credit_date    = date("Y-m-d", strtotime($model->bill_date));
                       $credit->credit_debit   = 0;
                       $credit->save();

                       //Customer Entry
                       $cr_customer = new Credit();

                       $cr_customer->credit_bill_Id = $model->bill_ID;
                       $cr_customer->credit_ac_Id   = $model->customer_Id;
                       $cr_customer->credit_type_Id =  5;
                       $cr_customer->credit_amount  = $model->gross_amount;
                       $cr_customer->credit_date    = date("Y-m-d", strtotime($model->bill_date));
                       $cr_customer->credit_debit        = 0;
                       $cr_customer->save();

                       //Item Entry
                       $item_data = BillDetail::find()->where('bill_id = :billid', [':billid' => $model->bill_ID])->all();
                       foreach ($item_data as $items) {
                           //Item
                           $cr_item = new Credit();
                           $cr_item->credit_bill_Id = $model->bill_ID;
                           $cr_item->credit_ac_Id   = $items->item_Id;
                           $cr_item->credit_type_Id = 8;
                           $cr_item->credit_amount  = $items->price;
                           $cr_item->credit_date    = date("Y-m-d", strtotime($model->bill_date));
                           $cr_item->credit_debit    = 0;
                           $cr_item->save();

                           //Discount
                           $cr_item = new Credit();
                           $cr_item->credit_bill_Id = $model->bill_ID;
                           $cr_item->credit_ac_Id   = 0;
                           $cr_item->credit_type_Id = 6;
                           $cr_item->credit_amount  = $items->discount;
                           $cr_item->credit_date    = date("Y-m-d", strtotime($model->bill_date));
                           $cr_item->credit_debit    = 0;
                           $cr_item->save();
                       } //foreach
                   }

            }
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
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->is_deleted = 1;
        $model->save(false);
        return $this->redirect(['index']);
    }
    public function actionPrint($id) {
        // get your HTML raw content without any layouts or scripts
        $model = Bill::find()
                 ->where("bill_ID =:id")
                 ->addParams([':id'=>$id])
                 ->one();
        $data = Billdetail::find()
                ->where("bill_Id =:id")
                 ->addParams([':id'=>$id])
                ->all();

        $content =$this->renderPartial('report',['model'=>$model,'data'=>$data]);
        //echo $content =$this->render('report',['model'=>$model,'data'=>$data]);
        $pdf = Yii::$app->pdf;
        $pdf->options = array('title' => 'PDF Document Title',
                              'subject' => 'PDF Document Subject',
                              'keywords' => 'krajee, grid, export, yii2-grid, pdf'
                              );
        $pdf->filename = "Billing Reports";
        $pdf->methods = array( 'SetHeader'=>['Billing Report'],
                                'SetFooter'=>['{PAGENO}']
                              );
        $pdf->content = $content;

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
    public function actionAccount($id) {
        // get your HTML raw content without any layouts or scripts
        $model = Credit::find()->where('credit_type_Id = :cbid', [':cbid' => $id])->orderBy('credit_date')->all();
        //$model1 = Debit::find()->where('debit_type_Id = :dbid', [':dbid' => 4])->all();
        $connection = Yii::$app->db;

        $current_date = date("Y-m-d");

        if($current_date > date("Y").'-04-01'){
          $d1 = date("Y")."-04-01";
          $d2 = date("Y")."-03-31";
        }else{
          $year = date("Y") - 1;
          $d1 = $year."-04-01";
          $d2 = $year."-03-31";
        }
       //echo $d1;
        $sql = $connection->createCommand('SELECT sum(credit_amount) as total  FROM tbl_credit WHERE credit_type_Id =5 and credit_date > :sdate and credit_debit=0');
        $sql->bindValue(':sdate',$d1);
        $opening = $sql->queryOne();
        $opening_balance = $opening['total'];

        $sql1 = $connection->createCommand('SELECT sum(credit_amount) as total  FROM tbl_credit WHERE credit_type_Id =5 and credit_date > :sdate and credit_debit=1');
        $sql1->bindValue(':sdate',$d1);
        $opening1 = $sql1->queryOne();
        $opening_balance1 = $opening1['total'];

        //  $sql1 = $connection->createCommand('SELECT sum(credit_amount) as total  FROM tbl_credit WHERE credit_type_Id =5 and credit_date > ":sdate" and credit_debit=1');
        // $sql1->bindValue(':sdate',$d2);
        // $opening1 = $sql1->queryOne();
        // $opening_balance1 = $opening1['total'];

        $obalance = $opening_balance - $opening_balance1;

        $content =$this->renderPartial('account',['model'=>$model, 'opening'=>$obalance]);
        //echo $content =$this->render('account', ['model'=>$model, 'opening'=>$obalance]);//,'model1'=>$model1]);
        $pdf = Yii::$app->pdf;
        $pdf->options = array('title' => 'PDF Document Title',
                              'subject' => 'PDF Document Subject',
                              'keywords' => 'krajee, grid, export, yii2-grid, pdf'
                              );
        $pdf->filename = "Billing Reports";
        $pdf->methods = array( 'SetHeader'=>['CASH LEDGER'],
                                'SetFooter'=>['{PAGENO}']
                              );

        $pdf->content = $content;

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
    public function actionReport($id) {
        echo "data".$id;
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
