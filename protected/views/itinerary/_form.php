<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */
/* @var $form CActiveForm */
?>

<script language=javascript type="text/javascript">
function qwe(){
	alert("qwer");
}
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'itinerary-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带 <span class="required">*</span> 为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'invit_unit'); ?>
		<?php echo $form->textField($model,'invit_unit',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'invit_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visit_place'); ?>
		<?php //echo $form->textField($model,'visit_place',array('size'=>30,'maxlength'=>30)); ?>
		<?php
		echo $form->dropDownList($model,'visit_place',$model->getAllRegion(),array(
			'empty'=>'请选择--',
			));
		?>
		<?php echo CHtml::button('添加一个出访地区',array('onclick'=>'qwe()'));?>
		<?php echo $form->error($model,'visit_place'); ?>
	</div>
        
<!--        <div class="row">
		<?php echo $form->labelEx($model,'visit_place'); ?>
		<?php //echo $form->textField($model,'visit_place',array('size'=>30,'maxlength'=>30)); ?>
		<?php
		echo $form->listBox($model,'visit_place',$model->getAllRegion(),array(
			'size'=>'5','multiple'=>true,'class'=>'listbox'
			));
		?>
		<?php //echo CHtml::button('添加一个出访地区',array('onclick'=>'qwe()'));?>
		<?php echo $form->error($model,'visit_place'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'exchange_rate'); ?>
		<?php echo $form->textField($model,'exchange_rate'); ?>
		<?php echo "请正确填写所访问国家币种对人民币的汇率（例如：美元对人民币汇率为6.2时，请添入6.2）"; ?>
		<?php echo $form->error($model,'exchange_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stay_days'); ?>
		<?php echo $form->textField($model,'stay_days'); ?>
		<?php echo $form->error($model,'stay_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'travel_fee'); ?>
		<?php echo $form->textField($model,'travel_fee'); ?>
		<?php echo "（人民币）"; ?>
		<?php echo $form->error($model,'travel_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passport_manage_fee'); ?>
		<?php echo $form->textField($model,'passport_manage_fee'); ?>
		<?php echo "（人民币）"; ?>
		<?php echo $form->error($model,'passport_manage_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'insurance_fee'); ?>
		<?php echo $form->textField($model,'insurance_fee'); ?>
		<?php echo "（人民币）"; ?>
		<?php echo $form->error($model,'insurance_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conference_regist_fee'); ?>
		<?php echo $form->textField($model,'conference_regist_fee'); ?>
		<?php echo "（人民币）"; ?>
		<?php echo $form->error($model,'conference_regist_fee'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'other_fee'); ?>
		<?php echo $form->textField($model,'other_fee'); ?>
		<?php echo "（人民币）"; ?>
		<?php echo $form->error($model,'other_fee'); ?>
	</div> -->

	<!-- <div class="row">
		<?php //echo $form->labelEx($model,'visit_id'); ?>
		<?php echo $form->hiddenField($model,'visit_id'); ?>
		<?php //echo $form->error($model,'visit_id'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创  建' : '保  存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->