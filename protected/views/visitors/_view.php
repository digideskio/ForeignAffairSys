<?php
/* @var $this VisitorsController */
/* @var $data Visitors */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('visitors_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->visitors_id), array('view', 'id'=>$data->visitors_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visit_id')); ?>:</b>
	<?php echo CHtml::encode($data->visit_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_id')); ?>:</b>
	<?php echo CHtml::encode($data->person_id); ?>
	<br />


</div>