<?php
/* @var $this VisitController */
/* @var $model Visit */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'visit_id'); ?>
		<?php echo $form->textField($model,'visit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approve_unit'); ?>
		<?php echo $form->textField($model,'approve_unit',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assign_unit'); ?>
		<?php echo $form->textField($model,'assign_unit',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'group_unit'); ?>
		<?php echo $form->textField($model,'group_unit',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_unit'); ?>
		<?php echo $form->textField($model,'claim_unit',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'leader_id'); ?>
		<?php echo $form->textField($model,'leader_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'start_date'); ?>
		<?php //echo $form->textField($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'end_date'); ?>
		<?php //echo $form->textField($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'visit_task'); ?>
		<?php //echo $form->textField($model,'visit_task',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'fees'); ?>
		<?php //echo $form->textField($model,'fees',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'create_person_id'); ?>
		<?php //echo $form->textField($model,'create_person_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('搜索'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->