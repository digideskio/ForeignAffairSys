<?php
/* @var $this FamilyController */
/* @var $model Family */
$id=Yii::app()->user->name;//根据用户信息来显示
$user=Person::model()->findByAttributes(array('person_code'=>$id));

$this->breadcrumbs=array(
	$user->name=>array('person/view'),
	'家庭成员管理'=>array('family/admin'),
	'新建家庭成员',
);

$this->menu=array(
	//array('label'=>'List Family', 'url'=>array('index')),
	array('label'=>'返回家庭成员管理页', 'url'=>array('admin')),
);
?>

<h1>创建家庭成员</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>