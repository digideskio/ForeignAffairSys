<?php
/* @var $this ItineraryController */
/* @var $data Itinerary */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('itinerary_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->itinerary_id), array('view', 'id'=>$data->itinerary_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invit_unit')); ?>:</b>
	<?php echo CHtml::encode($data->invit_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visit_place')); ?>:</b>
	<?php echo CHtml::encode($data->visit_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stay_days')); ?>:</b>
	<?php echo CHtml::encode($data->stay_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visit_id')); ?>:</b>
	<?php echo CHtml::encode($data->visit_id); ?>
	<br />


</div>