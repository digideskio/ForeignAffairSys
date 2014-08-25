<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expenditure-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'country_name'); ?>
		<?php echo $form->textField($model,'country_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'country_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_name'); ?>
		<?php echo $form->textField($model,'city_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'city_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accommodation_expenses'); ?>
		<?php echo $form->textField($model,'accommodation_expenses'); ?>
		<?php echo $form->error($model,'accommodation_expenses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diet_expenses'); ?>
		<?php echo $form->textField($model,'diet_expenses'); ?>
		<?php echo $form->error($model,'diet_expenses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'miscellaneous_expenses'); ?>
		<?php echo $form->textField($model,'miscellaneous_expenses'); ?>
		<?php echo $form->error($model,'miscellaneous_expenses'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '新建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->