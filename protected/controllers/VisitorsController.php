<?php

class VisitorsController extends Controller
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
	/**
   * 回调函数 显示对号和错号
   */
 	public function showUseriew($data, $row, $c) {
   		return 'hello';
 	}

 	public function getVisitLeaderName($data, $row, $c){
		$_visit=Visit::model()->findByPk($data->visit_id);

		$person=Person::model()->findByPk($_visit->leader_id);
		if (isset($person->name)) {
			return $person->name;
		}
	}

	public function getVisitPersonName($data, $row, $c){
		$person=Person::model()->findByPk($data->person_id);
		return $person->name;
	}

	public function getPersonDepartment($data, $row, $c){
		$person=Person::model()->findByPk($data->person_id);
		return $person->department;
	}

	public function getPersonWorkUnit($data, $row, $c){
		$person=Person::model()->findByPk($data->person_id);
		return $person->workunit;
	}

	public function getVisitTask($data,$row,$c){
		$visit=Visit::model()->findByPk($data->visit_id);
		return $visit->visit_task;
	}

	public function getVisitCreatorName($data,$row,$c){
		$visit=Visit::model()->findByPk($data->visit_id);
		$person=Person::model()->findByPk($visit->create_person_id);
		return $person->name;
	}
 ///////////////////////////////////////////////////

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
			'postOnly + delete ', // we only allow deletion via POST request
			'visitContext +vadmin vcreate',
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
				'actions'=>array('vcreate','vadmin','vupdate','admin','delete'),
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
		$model=new Visitors;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $id=Yii::app()->user->name;//根据用户信息来显示
		$user=Person::model()->findByAttributes(array('person_code'=>$id));
        $model->person_id=$user->person_id;

        //$this->performAjaxValidation($model);
		if(isset($_POST['Visitors']))
		{
			$model->attributes=$_POST['Visitors'];

			//$model_exist=Visitors::model()->findByAttributes(array('person_id'=>$model->person_id));
			if($model->save())
				$this->redirect(array('visitors/admin'));//,'id'=>$model->visitors_id
		}



		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionVcreate()
	{
		$model=new Visitors;
		$model->scenario = 'vcreate';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $id=Yii::app()->user->name;//根据用户信息来显示
		$user=Person::model()->findByAttributes(array('person_code'=>$id));
        $model->person_id=$user->person_id;

        //$this->performAjaxValidation($model);
		if(isset($_POST['Visitors']))
		{
			$model->attributes=$_POST['Visitors'];

			//$model_exist=Visitors::model()->findByAttributes(array('person_id'=>$model->person_id));
			if($model->save())
				$this->redirect(array('visitors/admin'));//,'id'=>$model->visitors_id
		}
		$model->visit_id=$this->_visit->visit_id;



		$this->render('vcreate',array(
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

		if(isset($_POST['Visitors']))
		{
			$model->attributes=$_POST['Visitors'];
			if($model->save())
				$this->redirect(array('visitors/vadmin','vid'=>$model->visit_id));//,'id'=>$model->visitors_id
				//$this->redirect(array('view','id'=>$model->visitors_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
		/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionVupdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Visitors']))
		{
			$model->attributes=$_POST['Visitors'];
			if($model->save())
				$this->redirect(array('visitors/admin'));//,'id'=>$model->visitors_id
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
		$dataProvider=new CActiveDataProvider('Visitors');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Visitors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Visitors']))
			$model->attributes=$_GET['Visitors'];

        $id=Yii::app()->user->name;//根据用户信息来显示
		$user=Person::model()->findByAttributes(array('person_code'=>$id));
		if (isset($user))
		{
	        $model->person_id=$user->person_id;
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
	 * Manages all models.创建出访记录中的人员管理
	 */
	public function actionVadmin()
	{
		$model=new Visitors('search');
		$model->unsetAttributes();  // clear any default values

		

		if(isset($_GET['Visitors']))
			$model->attributes=$_GET['Visitors'];

        $model->visit_id=$this->_visit->visit_id;//过滤

		$this->render('vadmin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Visitors the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Visitors::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Visitors $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='visitors-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
