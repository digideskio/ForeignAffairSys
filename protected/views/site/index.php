<?php
/* @var $this SiteController */
Yii::import('application.vendors.*');
$this->pageTitle=Yii::app()->name;
?>

<h1>欢迎访问<?php echo CHtml::encode(Yii::app()->name); ?></h1>

<?php
if (!isset(Person::model()->findByAttributes(array('person_code'=>Yii::app()->user->name))->person_code)) {
	echo '<h1><b>您是第一次登录，务必请先到个人信息管理页面添加个人信息！</b></h1>';
	return;
}
echo '<h1>欢迎再次登录</h1>';
//echo Yii::app()->request->baseUrl;
//echo Yii::app()->getLayoutPath();
?>

<br>
<h4>1. 如果您是第一次登录系统，请到个人信息管理页面添加个人信息，如下图所示：</h4>
<table>
<tr>
	<td width="360px"></td>
	<td><img src="<?php echo Yii::app()->request->baseUrl;?>/images/person_manage.jpg" width="600px"></td>
</tr>
</table>

<br><br>
<h4>2. 在添加个人信息之后，可以进行家庭成员的管理，如下图所示：</h4>
<table>
<tr>
	<td width="360px"></td>
	<td><img src="<?php echo Yii::app()->request->baseUrl;?>/images/family_manage.jpg" width="600px"></td>
</tr>
</table>

<br><br>
<h4>3. 也可以加入出访或者创建出访，如下图所示：</h4>
<table>
<tr>
	<td width="360px"></td>
	<td><img src="<?php echo Yii::app()->request->baseUrl;?>/images/visit_manage.jpg" width="600px"></td>
</tr>
</table>
<br>
<?php
if (!isset(Superadmin::model()->findByAttributes(array('admin_code'=>Yii::app()->user->name))->admin_code)) {
	echo '当前日期：';
	echo $showtime=date("Y-m-d");
	return;
}
?>

<br><br>
<h4>4. 如果您是管理员，还可以有以下几种权利：查看所有出访并导出表格、管理出访国家地区及其经费、管理管理员账号，如下图所示：</h4>
<table>
<tr>
	<td width="360px"></td>
	<td><img src="<?php echo Yii::app()->request->baseUrl;?>/images/super_admin.jpg" width="600px"></td>
</tr>
</table>





<?php echo '当前日期：';?>
<?php echo $showtime=date("Y-m-d");?>