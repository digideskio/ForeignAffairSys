<?php
/* @var $this FamilyController */
/* @var $data Family */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('family_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->family_id), array('view', 'id'=>$data->family_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_id')); ?>:</b>
	<?php echo CHtml::encode($data->person_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('political')); ?>:</b>
	<?php echo CHtml::encode($data->political); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_unit')); ?>:</b>
	<?php echo CHtml::encode($data->work_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job')); ?>:</b>
	<?php echo CHtml::encode($data->job); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('domicile')); ?>:</b>
	<?php echo CHtml::encode($data->domicile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('get_cityzenship')); ?>:</b>
	<?php echo CHtml::encode($data->get_cityzenship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('get_long_stay')); ?>:</b>
	<?php echo CHtml::encode($data->get_long_stay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('get_permenent_stay')); ?>:</b>
	<?php echo CHtml::encode($data->get_permenent_stay); ?>
	<br />

	*/ ?>

</div>