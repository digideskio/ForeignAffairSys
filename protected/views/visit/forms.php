
<?php
$this->breadcrumbs=array(
	'出国访问管理'=>array('superadmin'),
	//$model->visit_id,
	'本次出访详情'=>array('visit/view','id'=>$model->visit_id),
	'所有表单'
);

$this->menu=array(
	array('label'=>'返回', 'url'=>array('visit/view','id'=>$model->visit_id)),
);


//echo $model->leader->name;
if (!isset($model->leader->name)) {
	echo '(该出访暂无领队，请先';
	echo CHtml::link('选择领队', array('visit/update', 'id'=>$model->visit_id));
	echo '再查看各项表单！)';
	return;
}

echo "<br><br>";


/*if (isset($model->leader->name)) {
	echo CHtml::link('因公出国（赴港澳）任务申报表', array('visit/taskApply','id'=>$model->visit_id),array('target'=>'_blank'));
} else {
	echo CHtml::link('因公出国（赴港澳）任务申报表');
	echo '(该出访暂无领队，请先选择领队！)';
}*/

echo CHtml::link('因公出国（赴港澳）任务申报表', array('visit/taskApply','id'=>$model->visit_id),array('target'=>'_blank'));

echo "<br><br>";

/*if (isset($model->leader->name)) {
	echo CHtml::link('因公临时出国任务和预算审批意见表', array('visit/personApprov','id'=>$model->visit_id),array('target'=>'_blank'));
} else {
	echo CHtml::link('因公临时出国任务和预算审批意见表');
	echo '(该出访暂无领队，请先选择领队！)';
}*/

echo CHtml::link('因公临时出国任务和预算审批意见表', array('visit/personApprov','id'=>$model->visit_id),array('target'=>'_blank'));

echo "<br><br>";

/*if (isset($model->leader->name)) {
	echo CHtml::link('西南财经大学教师因公出国（境）申请表', array('visit/teacherApply','id'=>$model->visit_id),array('target'=>'_blank'));
} else {
	echo CHtml::link('西南财经大学教师因公出国（境）申请表');
	echo '(该出访暂无领队，请先选择领队！)';
}*/

echo CHtml::link('西南财经大学教师因公出国（境）申请表', array('visit/teacherApply','id'=>$model->visit_id),array('target'=>'_blank'));

//echo count($visitors);

echo "<br><br><br><h3>护照申请表</h3>";
foreach($visitors as $k=>$v){
    //echo "<br>".$v['person_id']."<br>".$v->person->name."<br>";
    echo CHtml::link('四川省因公出国电子护照申请表-'.$v->person->name, 
    	array('person/passport','id'=>$v['person_id'],'vid'=>$model->visit_id),array('target'=>'_blank'));
    echo "<br><br>";
}

echo "<br><br><h3>人员备案表</h3><br>";

foreach($visitors as $k=>$v){
    //echo "<br>".$v['person_id']."<br>".$v->person->name."<br>";
    echo CHtml::link('因公临时出国人员备案表-'.$v->person->name, 
    	array('person/personInfo','id'=>$v['person_id'],'vid'=>$model->visit_id),array('target'=>'_blank'));
    echo "<br><br>";
}


		/*foreach($arr as $k =>$v)
		{
			$person=Person::model()->findByPk($v['person_id']);
		   $narr[$v['person_id']]=$person->name;
		}*/
?>


