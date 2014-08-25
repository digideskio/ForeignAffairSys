<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv='X-UA-Compatible' content='IE=EmulateIE7' />
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<!--[if IE 7]>
      <style>
      p {
        line-height:20px;
        padding-bottom:0;
      }
      h1 {
        font-size:20px;
        font-weight:bold;
        color:#272e34;
        padding-bottom:0;
      }
      h2 {
        font-size:16px;
        font-weight:bold;
        color:#272e34;
        padding-bottom:0;
      }
    </style>
  <![endif]-->

<link rel='stylesheet' type='text/css' href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
</head>
<body class='wsite-theme-light wsite-page-index weeblypage-index'>
<div id="wrapper">
    <div id="sitename">
      <span class='wsite-logo'>
        <table style='height:80px'>
          <tr>
          <td>
            <div id="logo-image">
              <div id="logo"></div>
            </div>
          </td>
          <td><a href='#'><span id="wsite-title">
          <?php 
          //echo Yii::app()->name;
          echo "西南财经大学出国访问信息服务系统";
          ?>
          </span></a>
          </td>
          </tr>
        </table>
      </span>
    </div>
    <div id="content-wrapper">
      <div id="navigation">
        <div id="navigation-links">
        <?php $this->widget('zii.widgets.CMenu',array(
          'items'=>array(
            array('label'=>'主页', 'url'=>array('/site/index')),
            array('label'=>'个人信息管理', 'url'=>array('/person/view'), 'visible'=>!Yii::app()->user->isGuest),
            array('label'=>'加入出访', 'url'=>array('/visitors/admin'), 'visible'=>!Yii::app()->user->isGuest),
            array('label'=>'出国访问管理', 'url'=>array('/visit/admin'), 'visible'=>!Yii::app()->user->isGuest),
            array('label'=>'查看所有出访', 'url'=>array('/visit/superadmin'), 'visible'=>isset(Superadmin::model()->findByAttributes(array('admin_code'=>Yii::app()->user->name))->admin_code)),
            array('label'=>'出访国家地区经费管理', 'url'=>array('/expenditure/admin'), 'visible'=>isset(Superadmin::model()->findByAttributes(array('admin_code'=>Yii::app()->user->name))->admin_code)),
            array('label'=>'超级管理员', 'url'=>array('/superadmin/admin'), 'visible'=>isset(Superadmin::model()->findByAttributes(array('admin_code'=>Yii::app()->user->name))->admin_code)),
            array('label'=>'退出', 'url'=>array('site/logout2'))
          ),
        )); ?>
        </div>
      </div> 
      <div id="header-image">
        <div id="image" class="wsite-header"></div>
      </div>
      <div style="margin:10px">
      <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
          'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
      <?php endif?>
      </div>
      <div id="contents-body">
        <div id="contents">
          <!-- <div id='wsite-content' class='wsite-not-footer'> -->
            <?php echo $content; ?>
          <!-- </div> -->
        </div>
      </div>

      <div class="clear"></div>
      <!-- <div id="footer">
        <div id="footer-contents"><a href='#' target='_blank'><?php echo Yii::app()->name ?></a> by you<div>
      </div> -->
      <div id="footer">
        <div id="footer-contents"><?php echo date('Y'); ?> Copyright &copy; <a href="http://it.swufe.edu.cn/" target="_blank">西南财经大学经济信息工程学院</a>版权所有<br/>
        All Rights Reserved.<br/>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
