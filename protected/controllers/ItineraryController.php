<?php

class ItineraryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $_visit=null;//出访对象
    public function getVisit() {
		return $this->_visit;//P105 访问私有变量的接口 放在控制器中
	}
	protected function loadVisit($visit_id) {//issue的project上下文
		//if the project property is null, create it based on input id
		if ($this->_visit === null) {
			$this->_visit = Visit::model()->findbyPk($visit_id);
			if ($this->_visit === null) {
				throw new CHttpException(404,'你所请求的访问不存在。');
			}
		}
		return $this->_visit;
	}

	public function filterVisitContext($filterChain) {
	//set the project identifier based on either the GET or POST input
	//request variables, since we allow both types for our actions
		$visitId = null;
		if (isset($_GET['vid']))
			$visitId = $_GET['vid'];//访问id
		else
		if (isset($_POST['vid']))
			$visitId = $_POST['vid'];

		$this->loadVisit($visitId);//函数
		//complete the running of other filters and execute the requested
		//action
		$filterChain->run();
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'visitContext +admin create'//create
		);
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Itinerary;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//------------------------
		//if($this->_visit==null)
			$model->visit_id=$this->_visit->visit_id;
		//else
			//$model->visit_id=1;
		//--------------------------
		if(isset($_POST['Itinerary']))
		{
			$model->attributes=$_POST['Itinerary'];
			if($model->save())
				$this->redirect(array('admin','vid'=>$model->visit_id));
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

		if(isset($_POST['Itinerary']))
		{
			$model->attributes=$_POST['Itinerary'];
			if($model->save())
				$this->redirect(array('admin','vid'=>$model->visit_id));
				//$this->redirect(array('view','id'=>$model->itinerary_id));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Itinerary');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()//$id
	{
		$model=new Itinerary('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Itinerary']))
			$model->attributes=$_GET['Itinerary'];

		//--------------------------------
		//$this->_visit=Visit::model()->findByPk($id);
		$model->visit_id=$this->_visit->visit_id;
		//--------------------------------

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Itinerary the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Itinerary::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Itinerary $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='itinerary-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function show_accommodation_expenses($data)
	{
		return round($data->expenditure->accommodation_expenses*$data->exchange_rate);
	}

	public function show_diet_expenses($data)
	{
		return round($data->expenditure->diet_expenses*$data->exchange_rate);
	}

	public function show_miscellaneous_expenses($data)
	{
		return round($data->expenditure->miscellaneous_expenses*$data->exchange_rate);
	}

	public function show_other_fee($data)
	{
		return $data->passport_manage_fee+$data->insurance_fee+$data->conference_regist_fee;
	}
}
