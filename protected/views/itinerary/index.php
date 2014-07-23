<?php
/* @var $this ItineraryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Itineraries',
);

$this->menu=array(
	array('label'=>'Create Itinerary', 'url'=>array('create')),
	array('label'=>'Manage Itinerary', 'url'=>array('admin')),
);
?>

<h1>Itineraries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
