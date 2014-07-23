<?php
/* @var $this ExpenditureController */
/* @var $data Expenditure */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_name')); ?>:</b>
	<?php echo CHtml::encode($data->country_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_name')); ?>:</b>
	<?php echo CHtml::encode($data->city_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accommodation_expenses')); ?>:</b>
	<?php echo CHtml::encode($data->accommodation_expenses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diet_expenses')); ?>:</b>
	<?php echo CHtml::encode($data->diet_expenses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miscellaneous_expenses')); ?>:</b>
	<?php echo CHtml::encode($data->miscellaneous_expenses); ?>
	<br />


</div>