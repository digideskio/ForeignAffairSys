<?php
/* @var $this SuperadminController */
/* @var $data Superadmin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_code')); ?>:</b>
	<?php echo CHtml::encode($data->admin_code); ?>
	<br />


</div>