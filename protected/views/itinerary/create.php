<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs=array(
	//'Itineraries'=>array('index'),
	'出国访问管理'=>array('visit/admin'),
	'本次出访详情'=>array('visit/view','id'=>$this->getVisit()->visit_id),
	'访问路线安排'=>array('Itinerary/admin','vid'=>$this->getVisit()->visit_id),
	'新建访问路线',
);

$this->menu=array(
	//array('label'=>'List Itinerary', 'url'=>array('index')),
	array('label'=>'返回', 'url'=>array('Itinerary/admin','vid'=>$this->getVisit()->visit_id)),
);
?>

<h1>新建访问路线</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>