<?php
/* @var $this VisitorsController */
/* @var $model Visitors */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'visitors-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,//开启客户端验证，生成js
	'clientOptions'=>array(
		'validateOnSubmit'=>true,//开启表单提交onsubmit时验证，如果为false则提交表单时不
		),

	//'action'=>'/manage/adzone/createadzone',
)); ?>

	<!--<p class="note">带 <span class="required">*</span> 为必填项.</p>-->

	<?php //echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php 
		echo $form->labelEx($model,'visit_id'); 
		?>
		<?php 
		echo $form->textField($model,'visit_id');
		//echo $form->dropDownList($model,'visit_id',$model->getVisitDescript()); 

		?>
		<?php echo $form->error($model,'visit_id'); ?>
	</div>-->
	<div class="row">
		<?php echo $form->labelEx($model,'aspire_duty'); ?>
		<?php echo $form->textField($model,'aspire_duty'); ?>
		<?php echo $form->error($model,'aspire_duty'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'person_id'); ?>
		<?php echo $form->textField($model,'person_id'); ?>
		<?php  echo $form->error($model,'person_id'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->