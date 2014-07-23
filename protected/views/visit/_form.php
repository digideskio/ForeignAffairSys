<?php
/* @var $this VisitController */
/* @var $model Visit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'visit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'approve_unit'); ?>
		<?php echo $form->textField($model,'approve_unit',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'approve_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assign_unit'); ?>
		<?php echo $form->textField($model,'assign_unit',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'assign_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_unit'); ?>
		<?php echo $form->textField($model,'group_unit',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'group_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_unit'); ?>
		<?php echo $form->textField($model,'claim_unit',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'claim_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'leader_id'); ?>
		<?php
		echo "(注意！请务必在领队成员加入该访问后，再来选择领队！)"
		?><br>
		<?php //print_r($model->getAllPersons()); ?>
		<?php 
		//echo $form->dropDownList($model,'gender',$model->getGenders());
		//echo $form->textField($model,'leader_name');  //getAllPersons()
		echo $form->dropDownList($model,'leader_id',$model->getAllPersons());
		?>
		<?php echo $form->error($model,'leader_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<i>格式：2013-02-09</i>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
		<i>格式：2013-02-09</i>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visit_task'); ?>
		<p>(请尽可能详尽地说明出访的必要性!)</p>
		<?php echo $form->textArea($model,'visit_task',array('style'=>'height:120px;width:320px;')); ?>
		<?php echo $form->error($model,'visit_task'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'visit_task'); ?>
		<?php echo $form->textField($model,'visit_task',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'visit_task'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'fees'); ?>
		<?php echo $form->textField($model,'fees',array('size'=>50,'maxlength'=>'50')); ?>
		<?php echo $form->error($model,'fees'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'create_person_id'); ?>
		<?php echo $form->textField($model,'create_person_id'); ?>
		<?php echo $form->error($model,'create_person_id'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创  建' : '保  存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->