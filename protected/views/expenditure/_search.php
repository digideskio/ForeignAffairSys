<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country_name'); ?>
		<?php echo $form->textField($model,'country_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_name'); ?>
		<?php echo $form->textField($model,'city_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accommodation_expenses'); ?>
		<?php echo $form->textField($model,'accommodation_expenses'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diet_expenses'); ?>
		<?php echo $form->textField($model,'diet_expenses'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miscellaneous_expenses'); ?>
		<?php echo $form->textField($model,'miscellaneous_expenses'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('搜索'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->