<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs=array(
	//'Itineraries'=>array('index'),
	//$model->itinerary_id=>array('view','id'=>$model->itinerary_id),
	'出国访问管理'=>array('visit/admin'),
	'本次出访详情'=>array('visit/view','id'=>$model->visit_id),
	'访问路线安排'=>array('Itinerary/admin','vid'=>$model->visit_id),
	'更新访问路线',
);

$this->menu=array(
	//array('label'=>'List Itinerary', 'url'=>array('index')),
	//array('label'=>'Create Itinerary', 'url'=>array('create')),
	//array('label'=>'View Itinerary', 'url'=>array('view', 'id'=>$model->itinerary_id)),
	//array('label'=>'返回', 'url'=>array('admin','vid'=>$this->getVisit()->visit_id)),
	array('label'=>'返回', 'url'=>array('admin','vid'=>$model->visit_id)),
);
?>

<h1>更新访问路线 <?php //echo $model->itinerary_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>