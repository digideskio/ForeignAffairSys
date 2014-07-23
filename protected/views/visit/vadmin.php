<?php
/* @var $this VisitController */
/* @var $model Visit */

$this->breadcrumbs=array(
	//'Visits'=>array('index'),
	'个人出访历史记录'=>array('visitors/admin'),
	'加入出访',
);

$this->menu=array(
	//array('label'=>'List Visit', 'url'=>array('index')),
	array('label'=>'返回', 'url'=>array('visitors/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#visit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>加入出访</h1>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'visit-grid',
	'dataProvider'=>$model->Vsearch(),
	'filter'=>$model,
	'columns'=>array(
		'visit_id',
		//'approve_unit',
		'assign_unit',
		'group_unit',
		'claim_unit',
		//'leader_id',
		//'lName',
		array(
			'name'=>'lName',
			'header'=>'领队',
			),
		
		/*array(
           'name'=>'visit_id',
           'type'=>'raw',
           'header'=>'领队',
           //'value'=>array($this, 'showUseriew')
           'value'=>array($this,'getLeaderName'),
            'filter'=>false,
         ),*/
		
		//'start_date',
		array(
			'name'=>'start_date',
			//'value'=>'Visit::model()->findBySql("SELECT `start_date` FROM `visit` WHERE TO_DAYS(NOW()) - TO_DAYS(start_date) > 0 AND visit_id=vid",array('vid'=>$data->visit_id))',
			'value'=>'Visit::model()->findByPk($data->visit_id)->start_date',
			),
		'end_date',
		'visit_task',
		/*'fees',
		'create_person_id',
		*/
		array(
			'class'=>'CButtonColumn',
			'header' => '操作',  
            'template'=>'{create} ', 
			'buttons'=>array
		    (
		        'create' => array
		        (
		            'label'=>'加入',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
		            //'url'=>'Yii::app()->createUrl("visitors/create", array("id"=>$data->visitors_id))',
		            'url'=>'Yii::app()->createUrl("visitors/vcreate",array("vid"=>$data->visit_id))',
		            //'url'=>'Yii::app()->createUrl("visit/vadmin")',
		            //'url'=>'Yii::app()->createUrl("javascript:alert(2) ")',
		        ),
			),
			),
))); ?>

<!--<script>
	$(document).ready(function(){
		$("a[title='加入']").click(function(){
			if(confirm("你确定加入本次出访？"))
			{
				
				//this.href="http://localhost:8087/fight/index.php?r=visitors/vcreate";
			        //alert($("a").html);
			}
			else
			{
			    this.href="http://localhost:8087/fight/index.php?r=visit/vadmin";
			       // alert($("a").html);
			}
		})
	});
</script>-->