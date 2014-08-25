<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'person-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">带 <span class="required">*</span> 为必填项.</p>

    <?php echo $form->errorSummary($model); ?>

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'person_code'); ?>
    <?php echo $form->textField($model, 'person_code', array('size' => 30, 'maxlength' => 30)); ?>
    <?php echo $form->error($model, 'person_code'); ?>
    </div>-->

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 40, 'maxlength' => 40)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'china_xing'); ?>
        <?php echo $form->textField($model, 'china_xing', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'china_xing'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'china_ming'); ?>
        <?php echo $form->textField($model, 'china_ming', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'china_ming'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spell_xing'); ?>
        <?php echo $form->textField($model, 'spell_xing', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'spell_xing'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spell_ming'); ?>
        <?php echo $form->textField($model, 'spell_ming', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'spell_ming'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'gender'); ?>
        <?php
        //echo $form->textField($model,'gender',array('size'=>4,'maxlength'=>4)); 
        //echo $form->textField($model,'gender',array('size'=>4,'maxlength'=>4)); 
        echo $form->dropDownList($model, 'gender', $model->getGenders());
        ?>

    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'health'); ?>
        <?php
        //echo $form->textField($model,'health',array('size'=>20,'maxlength'=>20)); 
        echo $form->dropDownList($model, 'health', $model->getHealths());
        ?>
        <?php echo $form->error($model, 'health'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birth_place'); ?>
        <?php echo $form->textField($model, 'birth_place', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'birth_place'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'hukou_place'); ?>
        <?php echo $form->textField($model, 'hukou_place', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'hukou_place'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nation'); ?>
        <?php echo $form->textField($model, 'nation', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'nation'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birth_day'); ?>
        <?php echo $form->textField($model, 'birth_day'); ?>
        <i>格式：2013-02-09</i>
        <?php echo $form->error($model, 'birth_day'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cert_name'); ?>
        <?php
        //echo $form->textField($model,'cert_name',array('size'=>10,'maxlength'=>10)); 
        echo $form->dropDownList($model, 'cert_name', $model->getCertNames());
        ?>
        <?php echo $form->error($model, 'cert_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cert_number'); ?>
        <?php echo $form->textField($model, 'cert_number', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'cert_number'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spouse_name'); ?>
        <?php echo $form->textField($model, 'spouse_name', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'spouse_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'political_status'); ?>
        <?php
        //getPoliticalStatuss
        //echo $form->textField($model,'political_status',array('size'=>10,'maxlength'=>10)); 
        echo $form->dropDownList($model, 'political_status', $model->getPoliticalStatuss());
        ?>
        <?php echo $form->error($model, 'political_status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'workunit'); ?>
        <?php echo $form->textField($model, 'workunit', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'workunit'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'department'); ?>
        <?php echo $form->textField($model, 'department', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'department'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'job'); ?>
        <?php echo $form->textField($model, 'job', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'job'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'job_attribute'); ?>
        <?php
        //getJobAttributes
        //echo $form->textField($model,'job_attribute',array('size'=>10,'maxlength'=>10));
        echo $form->dropDownList($model, 'job_attribute', $model->getJobAttributes());
        ?>
        <?php echo $form->error($model, 'job_attribute'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'admin_level'); ?>
        <?php
//getAdminLevel
//echo $form->textField($model,'admin_level',array('size'=>20,'maxlength'=>20));
        echo $form->dropDownList($model, 'admin_level', $model->getAdminLevel());
        ?>
        <?php echo $form->error($model, 'admin_level'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'is_secret'); ?>
        <?php
//getIsSecrets
//echo $form->textField($model,'is_secret',array('size'=>10,'maxlength'=>10)); 
        echo $form->dropDownList($model, 'is_secret', $model->getIsSecrets());
        ?>
        <?php echo $form->error($model, 'is_secret'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'secret_level'); ?>
        <?php echo $form->textField($model, 'secret_level', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'secret_level'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'foreign_identity'); ?>
        <?php echo $form->textField($model, 'foreign_identity', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'foreign_identity'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '创  建' : '保  存'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->