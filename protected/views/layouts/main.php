<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title>
		<?php 
		echo CHtml::encode($this->pageTitle); 
		//echo CHtml::link("西南财经大学出国访问信息服务系统", array('/site/index');
		?>
	</title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<?php 
			echo CHtml::encode(Yii::app()->name); 
			//echo CHtml::link("西南财经大学出国访问信息服务系统", array('/site/index');
			?>
		</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'主页', 'url'=>array('/site/index')),
				array('label'=>'个人信息管理', 'url'=>array('/person/view'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'加入出访', 'url'=>array('/visitors/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'出国访问管理', 'url'=>array('/visit/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'查看所有出访', 'url'=>array('/visit/superadmin'), 'visible'=>isset(Superadmin::model()->findByAttributes(array('admin_code'=>Yii::app()->user->name))->admin_code)),
				//array('label'=>'出访管理', 'url'=>array('/visit/view'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'关于我们', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'人员基本信息管理', 'url'=>array('/person/view&person_code="212081203003"', 'view'=>'about')),
				//array('label'=>'联系我们', 'url'=>array('/site/contact')),
				//array('label'=>'登录Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'退出', 'url'=>array('site/logout2&logoutxxf='),'visible'=>Yii::app()->user->isGuest)
				//array('label'=>'退出', 'url'=>array('site/logout2&logoutxxf='))
				array('label'=>'超级管理员', 'url'=>array('/superadmin/admin'), 'visible'=>isset(Superadmin::model()->findByAttributes(array('admin_code'=>Yii::app()->user->name))->admin_code)),
				array('label'=>'退出', 'url'=>array('site/logout2'))
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php echo date('Y'); ?> Copyright &copy;<a href="http://www.swufe.edu.cn/" target="_blank">Southwestern University of Finance and Economics</a>.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
