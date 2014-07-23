<?php
/* @var $this FamilyController */
/* @var $model Family */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'family-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>的为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'person_id'); ?>
		<?php echo $form->textField($model,'person_id'); ?>
		<?php echo $form->error($model,'person_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'called'); ?>
		<?php echo $form->textField($model,'called',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'called'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'political'); ?>
		<?php 
		//echo $form->textField($model,'political',array('size'=>10,'maxlength'=>10)); 
		echo $form->dropDownList($model,'political',$model->getPoliticalStatuss());
		?>
		<?php echo $form->error($model,'political'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_unit'); ?>
		<?php echo $form->textField($model,'work_unit',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'work_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job'); ?>
		<?php echo $form->textField($model,'job',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'job'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domicile'); ?>
		<?php echo $form->textField($model,'domicile',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'domicile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'get_cityzenship'); ?>
		<?php  //getCityzenships
		//echo $form->textField($model,'get_cityzenship',array('size'=>20,'maxlength'=>20)); 
		echo $form->dropDownList($model,'get_cityzenship',$model->getCityzenships());
		?>
		<?php echo $form->error($model,'get_cityzenship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'get_long_stay'); ?>
		<?php 
		//echo $form->textField($model,'get_long_stay',array('size'=>20,'maxlength'=>20)); 
		echo $form->dropDownList($model,'get_long_stay',$model->getStays());
		?>
		<?php echo $form->error($model,'get_long_stay'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创  建' : '保  存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->