<?php
/* @var $this VisitorsController */
/* @var $model Visitors */

$this->breadcrumbs=array(
	'出国访问管理'=>array('visit/admin'),
	'本次出访详情'=>array('visit/view','id'=>$model->visit_id),
	'出访人员管理'=>array('Visitors/vadmin','vid'=>$model->visit_id),
	//'出访人员管理'=>array('Visitors/vadmin','vid'=>$this->visit->visit_id),
	//$model->visitors_id=>array('view','id'=>$model->visitors_id),
	'更新',
);

$this->menu=array(
	//array('label'=>'List Visitors', 'url'=>array('index')),
	//array('label'=>'Create Visitors', 'url'=>array('create')),
	//array('label'=>'View Visitors', 'url'=>array('view', 'id'=>$model->visitors_id)),
	array('label'=>'返回', 'url'=>array('Visitors/vadmin','vid'=>$model->visit_id)),
);
?>

<h1>更新 “<?php echo  $model->person->name; ?>”所任的职务</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>