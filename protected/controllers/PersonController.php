<?php

class PersonController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions 'admin'
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'passport', 'passportPrint', 'personInfo', 'personInfoPrint'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function getLastAllInfo($pid, $vid) {
        //select max(visit.start_date) as ldate, visit.visit_task as ltask ,visit.visit_id as lvisitId from visit join visitors on visit.visit_id=visitors.visit_id where visitors.person_id=2
        $visit = Visit::model()->findByPk($vid);

        $connection = Yii::app()->db;

        $sql = 'select distinct visit.start_date as ldate_start,
                    visit.end_date as ldate_end,
                    visit.visit_task as ltask ,
                    visit.visit_id as lvisitId
                    from visit join visitors
                    where (visitors.person_id=' . $pid .
                ') and (to_days(visit.start_date)-to_days(\'' . $visit->start_date . '\')<0)' .
                ' order by ldate_start desc limit 0,1';

        // $sql = 'select min(visit.start_date) as ldate, 
        // visit.visit_task as ltask ,
        // visit.visit_id as lvisitId
        //  from visit join visitors 
        //  on visit.visit_id='.$vid.
        //  ' where visitors.person_id='.$pid;
        //"SELECT MAX(visit\.start_date)  from visit join visitors on visit\.visit_id=visitors\.visit_id where visitors\.person_id=".$personId; //.$model->visit_id 

        $command = $connection->createCommand($sql);

        $result = $command->queryAll();

        //print_r($result);  

        foreach ($result as $v) {
            return $v;
        }
    }

    //获取出访的国家（无重复）
    public function getDistinctCountries($visitId) {
        $connection = Yii::app()->db;
        $sql = "select distinct(visit_place) from itinerary where visit_id=" . $visitId; //.$model->visit_id 
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        $str = '';
        foreach ($result as $v) {
            $expenditure = Expenditure::model()->findByPk($v['visit_place']);
            $temp = $expenditure->country_name;
            $str.= $temp . '，';
        }
        $newStr = rtrim($str, "，");
        return $newStr;
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView() {//$id

        /* $this->render('view',array(
          'model'=>$this->loadModel($id),
          )); */

        //$user=Person::model()->findByAttributes(array('person_code'=>'212081203003'));
        //$user=Person::model()->findByAttributes(array('person_code'=>$id));
        if (empty(Yii::app()->user)) {
            Yii::app()->request->redirect("index.php?");
        }

        $id = Yii::app()->user->name; //根据用户信息来显示
        $user = Person::model()->findByAttributes(array('person_code' => $id));
        if ($user === null) {
            $this->redirect(array('create'));
        } //不存在用户，跳转到【创建用户】页面
        $this->render('view', array('model' => $user,));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Person;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model->person_code = Yii::app()->user->name; //用户编码早已经给出

        if (isset($_POST['Person'])) {
            $model->attributes = $_POST['Person'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->person_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionPassport($id, $vid) {
        $model = $this->loadModel($id);
        $visit = Visit::model()->findByPk($vid);
        $this->renderPartial('passport', array('model' => $model, 'visit' => $visit));
    }

    public function actionPassportPrint($id, $vid) {
        $model = $this->loadModel($id);
        $visit = Visit::model()->findByPk($vid);
        $this->renderPartial('passportPrint', array('model' => $model, 'visit' => $visit));
    }

    public function actionPersonInfo($id, $vid) {
        $model = $this->loadModel($id);
        $visit = Visit::model()->findByPk($vid);
        $this->renderPartial('personInfo', array('model' => $model, 'visit' => $visit));
    }

    public function actionPersonInfoPrint($id, $vid) {
        $model = $this->loadModel($id);
        $visit = Visit::model()->findByPk($vid);
        $this->renderPartial('personInfoPrint', array('model' => $model, 'visit' => $visit));
    }

    public function getVisitRole($person_id, $visit_id) {
        $connection = Yii::app()->db;
        $sql = 'select aspire_duty from visitors WHERE visit_id= ' . $visit_id . ' and person_id = ' . $person_id;
        //$sql ="SELECT aspire_duty FROM visitors WHERE visit_id=7 and person_id=2";
        //"SELECT MAX(visit\.start_date)  from visit join visitors on visit\.visit_id=visitors\.visit_id where visitors\.person_id=".$personId; //.$model->visit_id 

        $command = $connection->createCommand($sql);

        $result = $command->queryAll();

        //print_r($result);  

        foreach ($result as $v) {

            return $v['aspire_duty'];
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {//$id
        //$model=$this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $id = Yii::app()->user->name; //根据用户信息来显示
        $model = Person::model()->findByAttributes(array('person_code' => $id));

        if (isset($_POST['Person'])) {
            $model->attributes = $_POST['Person'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->person_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        /* $dataProvider=new CActiveDataProvider('Person');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          )); */
        if (empty(Yii::app()->user)) {
            Yii::app()->request->redirect("index.php?");
        }

        $id = Yii::app()->user->name; //根据用户信息来显示
        $user = Person::model()->findByAttributes(array('person_code' => $id));
        if ($user === null) {
            $this->redirect(array('create'));
        } //不存在用户，跳转到【创建用户】页面
        $this->render('view', array('model' => $user,));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Person('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Person'])) {
            $model->attributes = $_GET['Person'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Person the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Person::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Person $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'person-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
