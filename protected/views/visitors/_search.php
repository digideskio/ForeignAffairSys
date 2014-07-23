<?php
/* @var $this VisitorsController */
/* @var $model Visitors */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'visitors_id'); ?>
		<?php echo $form->textField($model,'visitors_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visit_id'); ?>
		<?php echo $form->textField($model,'visit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_id'); ?>
		<?php echo $form->textField($model,'person_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->