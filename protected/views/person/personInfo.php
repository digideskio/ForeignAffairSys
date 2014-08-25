<html>
  <head>
    <meta charset="UTF-8">
       <style type="text/css">
        body{text-align:center;}
        div{
          margin:auto;
        }
          table{
             border-collapse:collapse;
             border-color: Black;
             width:700px;
             text-align: center;
             table-layout: fixed;
             font-size:15px;
             margin:auto;
          }
          caption{
            font-size: 35px;
            font-weight: bold;
          }
          tr{
            height:15mm;
          }
          </style>
  </head>
  <body style="font-size:20px">
   <?php 
   echo '<br>';
   echo CHtml::link('导出Word文档', array('/person/personInfoPrint','id'=>$model->person_id,'vid'=>$visit->visit_id));
   echo '<br>';echo '<br>';
   ?> 
    <div  style="width:210mm;height:225mm;margin:auto;">
      <table border=1 style="border:black">
        <caption > 因公临时出国人员备案表</caption>
        <tr style="height:13mm">
            <td style="width:85px">姓名</td>
            <td style="width:75px"><?php echo $model->name?></td>
            <td style="width:80px">性别</td>
            <td style="width:80px"><?php echo $model->gender?></td>
            <td style="width:70px">出生年月</td>
            <td style="width:90px"><?php echo $model->birth_day?></td>
            <td>政治面貌</td>
            <td style="width:100px"><?php echo $model->political_status?></td>
          </tr>
          <tr>
            <td colspan=2 style="font-size:14px">工作单位及职务、是否为涉密人员及涉密等级</td>
            <td colspan=4><?php echo $model->workunit.':'.$model->job.' ';
              if($model->is_secret=='是'){
                echo '(为涉密人员，涉密等级：'.$model->secret_level.')';
              }
            ?></td>
            <td>健康状况</td>
            <td><?php echo $model->health?></td>
          </tr>
          <tr style="height:12mm">
            <td rowspan=<?php 
            if(count($model->families)>4)
            {
              echo count($model->families)+1;
            }else{
              echo 5;
            }//echo count($model->families)+1;
            
            ?> class="chageRowSpan">家庭<br>主要<br>成员<br>情况</td>
            <td>称谓</td>
            <td>姓名</td>
            <td>年龄</td>
            <td>政治面貌</td>
            <td colspan=3  style="font-size:14px">工作单位、职务及居住地(是否取得<br>外国国籍、境外长期或永久居留权)</td>
          </tr>
          <?php 
          $old=4;
          $height=13;
          $family_count=count($model->families);
          if($family_count>$old)
          {
            $height=4.0*13.0/$family_count-$family_count*0.09;
            //echo $height;
          }
          foreach($model->families as $k=>$v){
            echo "<tr style='height:".$height.
            "mm'><td>".$v->name."</td><td>".
            $v->name."</td><td>".$v->age.
            "</td><td>".$v->political."</td><td colspan=3>".
            $v->work_unit.
            "，".$v->job.
            "。居住地:".$v->domicile."。取得外国国籍:".$v->get_cityzenship."。国外居留权:".$v->get_long_stay."</td></tr>";
          }
          if($family_count<4){
            $empty=4- $family_count;
            for($i=0;$i<$empty;$i++)
            {
              echo  "<tr style='height:".$height."mm'><td></td><td></td><td></td><td></td><td colspan=3></td></tr>";
            }
          }

          ?>  

          <tr style="height:13mm">
            <td colspan=2>组团单位</td>
            <td colspan=3><?php echo $visit->group_unit?></td>
            <td colspan=2>在团中拟任职务</td>
            <td><?php echo $this->getVisitRole($model->person_id,$visit->visit_id);?></td>
          </tr>
          <tr style="height:18mm">
            <td colspan=2  style="font-size:14px">出国任务、所赴国家<br>(地区)及停留时间</td>
            <td colspan=6>
            <?php echo '时间：'.$visit->start_date.'---'.$visit->end_date.'<br>';
            echo '出国任务：'.$visit->visit_task.'<br>';
            foreach ($visit->itineraries as $k => $v) {
              $expenditure = Expenditure::model()->findByPk($v['visit_place']);
              $temp = $expenditure->country_name;
              if ($expenditure->city_name!="") {
                $temp = $temp."(".$expenditure->city_name.")";
              }
              echo $temp.' 停留时间：'.$v->stay_days.' 天'.'<br>';
            }
            ?>
          </td>
          </tr>
          <tr style="height:13mm">
            <td colspan=2>出国任务审批单位</td>
            <td colspan=6><?php echo $visit->approve_unit?></td>
          </tr>
          <tr style="height:15mm">
            <td colspan=2  style="font-size:14px">上一次因公出国时间、<br>所赴国家(地区)及任务</td>
            <td colspan=6><?php 
           $arr= $this->getLastAllInfo($model->person_id,$visit->visit_id);
           //$contries=$this->getDistinctCountries($visit->visit_id);
           $contries=$this->getDistinctCountries($arr['lvisitId']);
           echo '时间：'.$arr['ldate_start'].'---'.$arr['ldate_end'].'<br>';
           echo '国家:'.$contries.'<br>'.'任务：'.$arr['ltask'];
            ?></td>
          </tr>
          <tr style="height:20mm">
            <td rowspan=3>人员<br>派出<br>单位<br>意见</td>

            <td colspan=5  style="border-bottom:0px;border-right:0"></td>
            <td colspan=2  style="border-bottom:0px;border-left:0"></td>
          </tr>
          <tr>
            <td colspan=5 style="border-top:0px;border-bottom:0px;text-align:left;border-right:0">&nbsp;负责人签字:</td>
            <td colspan=2 style="border-top:0px;border-bottom:0px;text-align:left;border-left:0">&nbsp; &nbsp; 单位盖章</td>
          </tr>
          <tr style="height:10mm">
            <td colspan=5  style="border-top:0px;border-right:0;text-align:left">&nbsp; &nbsp;年&nbsp; &nbsp;月&nbsp; &nbsp;日</td>
            <td colspan=2 style="border-top:0px;border-left:0;text-align:right">年&nbsp; &nbsp;月&nbsp; &nbsp;日&nbsp; &nbsp; &nbsp; &nbsp;</td>
          </tr>
          <tr style="height:10mm">
            <td>说明</td>
            <td colspan=7 style="text-align:left">本表由因公临时出国人员所在单位填写，按照干部管理权限，报组织人事部备案，并抄报外事审批部门。</td>
          </tr>
      </table>
    </div>
  </body>
</html>