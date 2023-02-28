<?php

namespace app\modules\yadmin\modules\process\controllers;

use Yii;
use app\modules\yadmin\modules\process\models\UpDownTime;
use app\modules\yadmin\modules\process\models\UpDownTimeSearch;
use app\modules\yadmin\modules\process\models\PowerLogsSearch;
use app\modules\yadmin\modules\process\models\modelform\UploadupdownForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\modules\yadmin\modules\process\models\Project;
use app\modules\yadmin\modules\process\models\School;
use app\modules\yadmin\modules\process\models\PowerLogs;
use app\modules\yadmin\modules\process\helpers\SchoolHelper;
use yii\helpers\ArrayHelper; 

/**
 * UpdowntimeController implements the CRUD actions for UpDownTime model.
 */
class PowerlogController extends Controller {
/**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UpDownTime models.
     * @return mixed
     */
    public function actionIndex() {
	if(Yii::$app->request->queryParams){
		$received_data = Yii::$app->request->queryParams;
		$received = $received_data['UpDownTimeSearch'];
		$project_id = 'ICT@252';//$received['project_id'];
 		$school_id = $received['school_id'];
		$start_date = $received['from_date'];
		$end_date = $received['to_date'];
		//var_dump($received);exit;
		if((strlen($project_id)>0)&&(strlen($school_id)>14)){
			$post =[
                        	'def'=> 'no',  
                        	'project_code'=> 'ICT@252',
                        	'org_id'=>$school_id,
                         	'start_date'=>$start_date,
                        	'end_date'=>$end_date  
               		 ];
		}else{
			$post =[
                        	'def'=> 'no',  
                        	'project_code'=> 'ICT@252',
                        	'org_id'=>'na',
                         	'start_date'=>$start_date,
                        	'end_date'=>$end_date  
                	];
		}//end of if else	
		//var_dump($post);
		//var_dump($received_data['UpDownTimeSearch']);exit;		
	}else{
		$post =[
            		'def'=> 'yes',  
            		'project_code'=> 'ICT@252',
            		'org_id'=>'na',
           		 'start_date'=>'na',
            		'end_date'=>'na'  
        	];

	}//end of if else

	//var_dump($post);exit;

	//var_dump(Yii::$app->request->queryParams);exit;
	/*
	$searchModel = new UpDownTimeSearch();
        $searchModel->from_date = $searchModel->getMind();
        $searchModel->to_date = $searchModel->getMaxd();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
	*/
	$curl = curl_init();
        //$post =[
          //  'def'=> 'yes',  
            //'project_code'=> 'na',
	    //'org_id'=>'na',
	    //'start_date'=>'na',
	    //'end_date'=>'na'  
       // ];
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mdm.exactics.in/dms/api_devices_log/get_organisations_power_log',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($post),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
		
        $response = curl_exec($curl);
		
        curl_close($curl);
			$output = Json::decode($response);
	//var_dump($output);exit;
	if($output){
	$all_data = array();
	
	foreach($output as $key => $orgval){
		$school_data = (new \yii\db\Query())
    		->select(['school_id', 'UDISECode', 'IETSCode', 'school_name', 'district', 'block'])
    		->from('tbl_school')
    		->where(['UDISECode' => $orgval['udise_code']])
    		->one();
		//var_dump($school_data);exit;
	   $orgval['school_id'] = $school_data['school_id'];
	   $orgval['IETSCode'] = $school_data['IETSCode'];
	   $orgval['school_name'] = $school_data['school_name'];
	   $orgval['district'] = $school_data['district'];
	   $orgval['block'] = $school_data['block'];
           array_push($all_data, $orgval);
	}//end of foreach

	//var_dump($all_data);exit;

       	$searchModel = new UpDownTimeSearch();
        $searchModel->from_date = $searchModel->getMind();
        $searchModel->to_date = $searchModel->getMaxd();
        $dataProvider = new \yii\data\ArrayDataProvider([
        'allModels' =>  $all_data,
        'pagination' => [
            'pageSize' => 100,
        ]
	]);
	$totalCount = $dataProvider->getTotalCount();
        //var_dump($dataProvider);exit;
		return $this->render('index', [
                    'searchModel' => $searchModel,
          	    'dataProvider' => $dataProvider,
            	    // 'orgs_data'	=>	$all_data,
        	]);
	}else{
		$searchModel = new UpDownTimeSearch();
        	$searchModel->from_date = $searchModel->getMind();
        	$searchModel->to_date = $searchModel->getMaxd();
		$dataProvider = new \yii\data\ArrayDataProvider([
	        'allModels' =>  array(),
        	'pagination' => [
            	'pageSize' => 100,
        			]
        	]);

		return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
		
        	]);
	}
    }//end of action index

    public function actionReport() {
        $searchModel = new UpDownTimeSearch();
        $searchModel->from_date = $searchModel->getMind();
        $searchModel->to_date = $searchModel->getMaxd();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('report', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSummary() {
        $searchModel = new UpDownTimeSearch();
        $dataProvider = $searchModel->searchReport(Yii::$app->request->queryParams);

        return $this->render('summary', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpload() {
        $model = new UploadupdownForm();

        if ($model->load(Yii::$app->request->post())) {
//            \Yii::$app
//                    ->db
//                    ->createCommand()
//                    ->delete('tbl_up_down_time', ['school_id' => $model->school_id])
//                    ->execute();
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('upload', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays a single UpDownTime model.
     * @param double $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UpDownTime model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        // echo "<pre>";print_r(Yii::$app->request->post());die;
        $model = new UpDownTime();
        $searchModel = new UpDownTimeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing UpDownTime model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param double $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UpDownTime model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param double $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDownload() {
        $path = Yii::getAlias('@webroot') . '/downloads/Updown_upload.csv';

        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, 'Updown_template.csv');
        }
    }

    /**
     * Finds the UpDownTime model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return UpDownTime the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = UpDownTime::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}//end of main class
