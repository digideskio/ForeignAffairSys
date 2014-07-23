<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'person_id'); ?>
		<?php echo $form->textField($model,'person_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_code'); ?>
		<?php echo $form->textField($model,'person_code',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'china_xing'); ?>
		<?php echo $form->textField($model,'china_xing',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'china_ming'); ?>
		<?php echo $form->textField($model,'china_ming',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spell_xing'); ?>
		<?php echo $form->textField($model,'spell_xing',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spell_ming'); ?>
		<?php echo $form->textField($model,'spell_ming',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'health'); ?>
		<?php echo $form->textField($model,'health',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_place'); ?>
		<?php echo $form->textField($model,'birth_place',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hukou_place'); ?>
		<?php echo $form->textField($model,'hukou_place',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nation'); ?>
		<?php echo $form->textField($model,'nation',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_day'); ?>
		<?php echo $form->textField($model,'birth_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cert_name'); ?>
		<?php echo $form->textField($model,'cert_name',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cert_number'); ?>
		<?php echo $form->textField($model,'cert_number',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spouse_name'); ?>
		<?php echo $form->textField($model,'spouse_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'political_status'); ?>
		<?php echo $form->textField($model,'political_status',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workunit'); ?>
		<?php echo $form->textField($model,'workunit',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job'); ?>
		<?php echo $form->textField($model,'job',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job_attribute'); ?>
		<?php echo $form->textField($model,'job_attribute',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_level'); ?>
		<?php echo $form->textField($model,'admin_level',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_secret'); ?>
		<?php echo $form->textField($model,'is_secret',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'secret_level'); ?>
		<?php echo $form->textField($model,'secret_level',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'foreign_identity'); ?>
		<?php echo $form->textField($model,'foreign_identity',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->