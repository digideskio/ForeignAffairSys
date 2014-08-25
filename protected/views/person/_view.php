<?php
/* @var $this PersonController */
/* @var $data Person */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->person_id), array('view', 'id'=>$data->person_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_code')); ?>:</b>
	<?php echo CHtml::encode($data->person_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('china_xing')); ?>:</b>
	<?php echo CHtml::encode($data->china_xing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('china_ming')); ?>:</b>
	<?php echo CHtml::encode($data->china_ming); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spell_xing')); ?>:</b>
	<?php echo CHtml::encode($data->spell_xing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spell_ming')); ?>:</b>
	<?php echo CHtml::encode($data->spell_ming); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('health')); ?>:</b>
	<?php echo CHtml::encode($data->health); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_place')); ?>:</b>
	<?php echo CHtml::encode($data->birth_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hukou_place')); ?>:</b>
	<?php echo CHtml::encode($data->hukou_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nation')); ?>:</b>
	<?php echo CHtml::encode($data->nation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_day')); ?>:</b>
	<?php echo CHtml::encode($data->birth_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cert_name')); ?>:</b>
	<?php echo CHtml::encode($data->cert_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cert_number')); ?>:</b>
	<?php echo CHtml::encode($data->cert_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spouse_name')); ?>:</b>
	<?php echo CHtml::encode($data->spouse_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('political_status')); ?>:</b>
	<?php echo CHtml::encode($data->political_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workunit')); ?>:</b>
	<?php echo CHtml::encode($data->workunit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($data->department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job')); ?>:</b>
	<?php echo CHtml::encode($data->job); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_attribute')); ?>:</b>
	<?php echo CHtml::encode($data->job_attribute); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_level')); ?>:</b>
	<?php echo CHtml::encode($data->admin_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_secret')); ?>:</b>
	<?php echo CHtml::encode($data->is_secret); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secret_level')); ?>:</b>
	<?php echo CHtml::encode($data->secret_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foreign_identity')); ?>:</b>
	<?php echo CHtml::encode($data->foreign_identity); ?>
	<br />

	*/ ?>

</div>