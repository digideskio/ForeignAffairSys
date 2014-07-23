<?php
Yii::$enableIncludePath = false;
Yii::import('application.vendors.PHPExcel.PHPExcel',1);
//require_once('PHPExcel/PHPExcel.php');

class VisitController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function getLeaderName($data, $row, $c){
		$leader=Person::model()->findByPk($data->leader_id);
		return $leader->name;
	}


	public function getCreatorName(){
		$creator=Person::model()->findByPk($data->create_person_id);
		//return '5';
		return $creator->name;
	}

	//获取出访的国家（无重复）
	public function getDistinctCountries($visitId){
		$connection = Yii::app()->db;  
		$sql = "select distinct(visit_place) from itinerary where visit_id=".$visitId; //.$model->visit_id 
		$command = $connection->createCommand($sql);  
		$result = $command->queryAll();  
		//print_r($result);  
		$str='';
	    foreach ($result as $v) 
		{
            $expenditure=Expenditure::model()->findByPk($v['visit_place']);
            $temp = $expenditure->country_name;
            if ($expenditure->city_name!="") {
            	$temp = $temp."(".$expenditure->city_name.")";
            }
			$str.= $temp.'，';
		}
		$newStr=rtrim($str, "，");
		return $newStr;
	}
	//上次出访时间
	public function getLastOutDate($personId){
		$connection = Yii::app()->db;  

		$sql = "select max(visit.start_date)  as start_d from visit join visitors on visit.visit_id=visitors.visit_id where visitors.person_id=".$personId;
		//"SELECT MAX(visit\.start_date)  from visit join visitors on visit\.visit_id=visitors\.visit_id where visitors\.person_id=".$personId; //.$model->visit_id 

		$command = $connection->createCommand($sql);  

		$result = $command->queryAll();  

		//print_r($result);  

	    foreach ($result as $v) 

		{

		   return $v['start_d'];

		}
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','teacherApplyPrint','teacherApply'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('personApprov','taskApply','taskApplyPrint','personApprovePrint','forms','dialog','vadmin','admin','delete'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('superadmin','exportexcel'),
				'users'=>array('@')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function getAllVistorsName(){
		$visit=$this->loadModel($id);
		$visitors=Visitors::model()->findByAttributes(array('visit_id'=>$visit->visit_id));
		$usersArray = CHtml::listData($this->users, 'id', 'username');
		return $usersArray;
	}

	public function actionTaskApplyPrint($id)//打印函数
	{
		$this->renderPartial('taskApplyPrint',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionPersonApprovePrint($id)//打印函数
	{
		$visitors=Visitors::model()->findAllByAttributes(array('visit_id'=>$id));
		$itineraries=Itinerary::model()->findAllByAttributes(array('visit_id'=>$id));
		$this->renderPartial('personApprovePrint',array(
			'model'=>$this->loadModel($id),
			'visitors'=>$visitors,
			'itineraries'=>$itineraries,
		));
	}
    public function actionTeacherApplyPrint($id)//打印函数
	{   
		$model=$this->loadModel($id);
		$leader=Person::model()->findByPk($model->leader_id);
		$this->renderPartial('teacherApplyPrint',array(
			'model'=>$model,
			'leader'=>$leader,
		));
	}
	public function actionTeacherApply($id)//打印函数
	{
		$model=$this->loadModel($id);
		$leader=Person::model()->findByPk($model->leader_id);
		$this->renderPartial('teacherApply',array(
			'model'=>$model,
			'leader'=>$leader,
		));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	//显示表单列表
	public function actionForms($id)
	{
		//$this->renderPartial('forms',array(
		$visitors=Visitors::model()->findAllByAttributes(array('visit_id'=>$id));
		$this->render('forms',array(
			'model'=>$this->loadModel($id),
			'visitors'=>$visitors,
		));
	}
		//因公出国（赴港澳）任务申报表
	public function actionTaskApply($id){
		$this->renderPartial('taskApply',array(
			'model'=>$this->loadModel($id),
		));		
	}//personApprov
	//因公出国（境）人员审批表
	public function actionPersonApprov($id){
		$visitors=Visitors::model()->findAllByAttributes(array('visit_id'=>$id));
		$itineraries=Itinerary::model()->findAllByAttributes(array('visit_id'=>$id));
		$this->renderPartial('personApprov',array(
			'model'=>$this->loadModel($id),
			'visitors'=>$visitors,
			'itineraries'=>$itineraries,
		));		
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Visit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//---------------------------------------
		$id=Yii::app()->user->name;//根据用户信息来显示
		$person=Person::model()->findByAttributes(array('person_code'=>$id));
		$model->create_person_id=$person->person_id;
		//---------------------------------------
		if(isset($_POST['Visit']))
		{
			$model->attributes=$_POST['Visit'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->visit_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Visit']))
		{
			$model->attributes=$_POST['Visit'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->visit_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));

	}
	public function actionDialog()
	{
		$this->render('vadmin',array(
			//'model'=>$model,
		));
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Visit');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Visit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Visit']))
			$model->attributes=$_GET['Visit'];

		//---------------------------------------
		$id=Yii::app()->user->name;//根据用户信息来显示
		$person=Person::model()->findByAttributes(array('person_code'=>$id));

		if (isset($person))
		{
			$model->create_person_id=$person->person_id;
			$this->render('admin',array(
				'model'=>$model,
			));
		}
		else
		{
			$this->render('no_person_info');
		}
	}
		/**
	 * Manages all models.
	 */
	public function actionVadmin()
	{
		$model=new Visit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Visit']))
			$model->attributes=$_GET['Visit'];

		//---------------------------------------
		//$id=Yii::app()->user->name;//根据用户信息来显示
		//$person=Person::model()->findByAttributes(array('person_code'=>$id));
		//$model->create_person_id=$person->person_id;
		//---------------------------------------
		/*$visitDataProvider = new CActiveDataProvider('Visit', array(
		'criteria' => array(
			//'condition' => 'project_id=:projectId',
			//'params' => array(
				//':projectId' => $this->loadModel($id)->id),
		),
		'pagination' => array('pageSize' => 20),
		));*/

		$this->render('vadmin',array(
			'model'=>$model,
			//'visitDataProvider'=>$visitDataProvider,
		));
	}


	public function actionSuperadmin()
	{
		$model=new Visit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Visit']))
			$model->attributes=$_GET['Visit'];

		$this->render('superadmin',array(
			'model'=>$model,
		));
	}


	public function actionExportexcel()
	{
		$model=new Visit('search');
		$model->unsetAttributes();

		$dataProvider=$model->search();
		$dataProvider->setPagination(false);
		$data=$dataProvider->getData();


		spl_autoload_unregister(array('YiiBase','autoload'));
		// Create new PHPExcel object
		//echo date('H:i:s') , " Create new PHPExcel object" , EOL;echo '<br>';
		$objPHPExcel=new PHPExcel();


		/*foreach ($data as $visit_record) {
			echo $visit_record->lName;echo '    ';
			echo $visit_record->approve_unit;echo '    ';
			echo $visit_record->assign_unit;echo '    ';
			echo $visit_record->group_unit;echo '    ';
			echo $visit_record->claim_unit;echo '    ';
			echo $visit_record->start_date;echo '    ';
			echo $visit_record->end_date;echo '    ';
			echo $visit_record->visit_task;echo '    ';
			echo $visit_record->fees;echo '    ';echo '<br>';
		}*/
		
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Swufe")
							 		 ->setLastModifiedBy("Swufe")
							 		 ->setTitle("Visit Detail Document")
							 		 ->setSubject("Visit Detail Document")
							 		 ->setDescription("Visit Detail Document for Swufe.")
							 		 ->setKeywords("visit swufe")
							 		 ->setCategory("Visit Detail file");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', '领队')
            		->setCellValue('B1', '人员审批单位')
            		->setCellValue('C1', '派员单位')
            		->setCellValue('D1', '组团单位')
            		->setCellValue('E1', '申报单位')
            		->setCellValue('F1', '出访开始时间')
            		->setCellValue('G1', '出访结束时间')
            		->setCellValue('H1', '出访任务')
            		->setCellValue('I1', '费用来源');

        $current_row = 2;
        foreach ($data as $visit_record) {
        	$objPHPExcel->getActiveSheet()->setCellValue("A$current_row", $visit_record->lName);
        	$objPHPExcel->getActiveSheet()->setCellValue("B$current_row", $visit_record->approve_unit);
        	$objPHPExcel->getActiveSheet()->setCellValue("C$current_row", $visit_record->assign_unit);
        	$objPHPExcel->getActiveSheet()->setCellValue("D$current_row", $visit_record->group_unit);
        	$objPHPExcel->getActiveSheet()->setCellValue("E$current_row", $visit_record->claim_unit);
        	$objPHPExcel->getActiveSheet()->setCellValue("F$current_row", $visit_record->start_date);
        	$objPHPExcel->getActiveSheet()->setCellValue("G$current_row", $visit_record->end_date);
        	$objPHPExcel->getActiveSheet()->setCellValue("H$current_row", $visit_record->visit_task);
        	$objPHPExcel->getActiveSheet()->setCellValue("I$current_row", $visit_record->fees);
        	$current_row = $current_row + 1;
        }

        // Miscellaneous glyphs, UTF-8
		//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'Miscellaneous glyphs')->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

        //$objPHPExcel->getActiveSheet()->setCellValue('A8',"Hello\nWorld");
		//$objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
		//$objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('出访详情');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		ob_end_clean();
		ob_start();

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="visit_detail.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');

		spl_autoload_register(array('YiiBase','autoload'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Visit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Visit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Visit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='visit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function show_visit_task($data)
	{
		$str=$data->visit_task;
		if (strlen($str)<12) {
			return $str.'asdfg';
		} 
		// else {
		// 	$str1=substr($str, 0, 20);
		// 	return $str1."....";
		// }

		//return strlen($str);
		return mb_substr($str, 0, 12, 'UTF-8')."......";
	}
}
