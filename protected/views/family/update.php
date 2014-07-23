<?php
/* @var $this FamilyController */
/* @var $model Family */

$this->breadcrumbs=array(
	'家庭成员'=>array('admin'),
	$model->name=>array('view','id'=>$model->family_id),
	'更新家庭成员信息',
);

$this->menu=array(
	//array('label'=>'List Family', 'url'=>array('index')),
	//array('label'=>'Create Family', 'url'=>array('create')),
	//array('label'=>'View Family', 'url'=>array('view', 'id'=>$model->family_id)),
	array('label'=>'返回家庭成员管理页', 'url'=>array('admin')),
);
?>

<h1>更新家庭成员<?php echo $model->name; ?>的信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>