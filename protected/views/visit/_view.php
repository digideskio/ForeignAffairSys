<?php
/* @var $this VisitController */
/* @var $data Visit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('visit_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->visit_id), array('view', 'id'=>$data->visit_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approve_unit')); ?>:</b>
	<?php echo CHtml::encode($data->approve_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assign_unit')); ?>:</b>
	<?php echo CHtml::encode($data->assign_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_unit')); ?>:</b>
	<?php echo CHtml::encode($data->group_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_unit')); ?>:</b>
	<?php echo CHtml::encode($data->claim_unit); ?>
	<br />

	<b><?php 
	//echo CHtml::encode($data->getAttributeLabel('领队姓名')); 
	echo CHtml::encode($data->getAttributeLabel('leader_id')); 
	?>:</b>
	<?php echo CHtml::encode($data->leader_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visit_task')); ?>:</b>
	<?php echo CHtml::encode($data->visit_task); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees')); ?>:</b>
	<?php echo CHtml::encode($data->fees); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_person_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_person_id); ?>
	<br />

	*/ ?>

</div>