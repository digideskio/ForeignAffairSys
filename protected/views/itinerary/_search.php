<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'itinerary_id'); ?>
		<?php echo $form->textField($model,'itinerary_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invit_unit'); ?>
		<?php echo $form->textField($model,'invit_unit',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visit_place'); ?>
		<?php echo $form->textField($model,'visit_place',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stay_days'); ?>
		<?php echo $form->textField($model,'stay_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visit_id'); ?>
		<?php echo $form->textField($model,'visit_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->