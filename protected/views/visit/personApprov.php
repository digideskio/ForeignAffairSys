<html>
  <head>
    <meta charset="UTF-8">
    <style type="text/css">
    body{text-align:center;
      }
        div{
      margin:auto;
         }
               table{
        border-collapse:collapse;
         border-color: Black;
         width:700px;
         table-layout: fixed;
         font-size:14px;
         margin:auto;
      }
      .person_table tr{
  height: 8mm;
      }
      tr{
        height:7mm;
      }
      td{
        
        border:1px solid ;
        text-align: left;
      }
      .out_office .trborder td{
        vertical-align: top;
      }
      .back_table tr{
        height:8.5mm;
      }
      .btm{
        vertical-align: top;
      }

      td{
        padding-left:2mm;
      }
    </style>    
  </head>
  <body style="margin:0;padding:0;font-size:20px">
    <?php 
    // $count_visitors=count($visitors);
    // echo $count_visitors;
    echo '<br>';
    echo CHtml::link('导出Word文档', array('/visit/personApprovePrint','id'=>$model->visit_id));
    echo '<br>';echo '<br>';
    ?> 
    <div style="width:210mm;height:240mm;margin:auto">
      <table >
        <caption style="font-family:黑体;font-size:1.5em;color:red">因公临时出国任务和预算审批意见表</caption>
        <tr style='height:3mm'>
          <td style='width:100mm;border:0'></td>
          <td style='width:35mm;border:0'></td>
          <td style='border:0'></td>
        </tr>
        <tr class='trborder' style="vertical-align:top">
          <td colspan=3>团组名称:</td>
        </tr>
        <tr  class='trborder' style="vertical-align:top">
          <td style='width:93mm'>组团单位:<?php echo $model->group_unit;?></td>
          <td colspan=2 style='width:30mm'>团长姓名:<?php echo $model->leader->name;?></td>
        </tr>
        <tr  class='trborder' style="vertical-align:top">
          <td>团长职务及职别:<?php echo $model->leader->job.'('.$model->leader->job_attribute.')';?></td>
          <td>团员人数:<?php 
          $count=count($model->visitors);
          echo $count;?></td>
          <td>出访时间:<?php echo $model->start_date?></td>
        </tr>
        <tr  class='trborder' style="vertical-align:top">
          <td colspan=2>出访国家、地区（含经停）:<?php 
              echo $this->getDistinctCountries($model->visit_id);
          ?></td>
          <td>停留 <?php
          $Date_1=date($model->start_date);
          $Date_2=date($model->end_date);
          $d1=strtotime($Date_1);
          $d2=strtotime($Date_2);
          $Days=round(($d2-$d1)/3600/24)+1;
          echo $Days;
        ?> 天</td>
        </tr>
        <tr  class='trborder' style="height:15mm;vertical-align:top">
          <td colspan=3>出访任务:<?php echo $model->visit_task;?></td>
        </tr>
        <tr  class='trborder'>
          <td colspan=3  style="text-align:center;vertical-align:bottom;font-size:1.2em;font-weight:bold ;border-bottom:0">本部门（本地）出访人员</td>
        </tr>
      </table>
      <table class='person_table' >
        <tr class='trtopborder' style='text-align:center;font-weight:bold'>
          <td style='width:19mm;text-align:center'>出访人员<br>姓名</td>
          <td style='width:8mm;text-align:center'>性<br>别</td>
          <td style='width:16mm;text-align:center'>出生<br>年月</td>
          <td style='width:53mm;text-align:center'>派员单位（工作单位）</td>
          <td style='width:25mm;text-align:center'>职务及<br>职别</td>
          <td style='width:16mm;text-align:center'>人员<br>属性</td>
          <td style='text-align:center'>上次出访<br>时间</td>
        </tr>
              <?php 
      $old=6;
      $height=8;
      $person_count=count($model->visitors);
      if($person_count>$old)
      {
        $height=($old*$height)/$person_count;
      }



      foreach($model->visitors as $k=>$v){
            # code...
            echo "<tr style='height:".$height."mm'><td>".$v->person->name."</td><td>".$v->person->gender."</td><td>".$v->person->birth_day."</td><td>".$v->person->workunit."</td><td>".$v->person->job."</td><td>".$v->person->job_attribute."</td><td>".$this->getLastOutDate($v->person->person_id)."</td></tr>";
      }
        if($person_count<$old)
        {  $empty=$old-$person_count;
            for($empty;$empty>0;$empty--){//  style='height:".$height."mm'
                    echo "<tr class='trborder' style='height:".$height."mm'>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>";
            }
        }
      ?>
      </table>
      <table class='out_office' >
        <tr style='height:0px'>
          <td style='width:22mm;padding:0;border:0px'></td>
          <td style='width:30mm;padding:0;border:0px'></td>
          <td style='width:28mm;padding:0;border:0px'></td>
          <td style='width:13mm;padding:0;border:0px'></td>
          <td style='width:18mm;padding:0;border:0px'></td>
          <td style='padding:0;border:0px'></td>
        </tr>
        <tr class='trtopborder'>
          <td colspan=6 style='text-align:center;font-size:1.2em;font-weight:bold;vertical-align:bottom;border-top:0'>外事部门审核意见</td>
        </tr>
        <tr class='trborder'>
          <td colspan=4 >是否列入出国计划:</td>
          <td  colspan=2>出访任务是否符合外事管理规定:</td>
        </tr>
        <tr  class='trborder'>
          <td rowspan=5 style='text-align:center;vertical-align:middle'>审核<br>内容</td>
          <td  colspan=5>年初省外办批复计划控制数 &nbsp; &nbsp; 人次，现已使用指标 &nbsp; &nbsp; 人次。</td>
        </tr>
        <tr  class='trborder'>
          <td colspan=5>出访目的和必要性:</td>
        </tr>
        <tr  class='trborder'> 
          <td  colspan=2>邀请函是否符合规定:</td>
          <td  colspan=3>时间（天数）是否符合规定:</td>
        </tr>
        <tr  class='trborder'>
          <td  colspan=2>路线是否符合规定:</td>
          <td  colspan=3>团组人数参团人员是否符合规定:</td>
        </tr>
        <tr  class='trborder'>
          <td>是否公示:</td>
          <td  colspan=3>公示地址:</td>
          <td>其他事项:</td>
        </tr>
        <tr  class='trborder' style='height:39mm'>
          <td style='text-align:center;vertical-align:middle'>审核意见</td>
          <td  colspan=5 style='vertical-align:bottom;text-align:right;padding:0 30mm 5mm 0'>审核人（公章）:  <br>&nbsp;年 &nbsp; 月 &nbsp; 日</td>
        </tr>
        <tr style='height:7mm'>
          <td colspan=3  style='vertical-align:top;border:0px'>&nbsp;经办人姓名:</td>
          <td colspan=3  style='vertical-align:top;border:0px'>联系电话（手机）:</td>
        </tr>
      </table>      
    </div>
    <div style="width:210mm;height:240mm;margin:auto;">
      <table  class='back_table' >
        <tr>
          <td colspan=7 style='text-align:center;font-size:1.2em;font-weight:bold;vertical-align:bottom'>财务部门审核意见</td>
        </tr>
        <tr>
          <td rowspan=5 style='text-align:center'>审核<br>内容</td>
          <td  colspan=4 class='btm'>本年度因公出国(境)经费预算 &nbsp;元，现已使用 &nbsp;元。</td>
          <td  colspan=2 class='btm'>是否列入年度预算:</td>
        </tr>
        <tr style='text-align:center'>
          <td style='text-align:center'>合计</td>
          <td style='text-align:center'>国际旅费</td>
          <td style='text-align:center'>住宿费</td>
          <td style='text-align:center'>伙食费</td>
          <td style='text-align:center'>公杂费</td>
          <td style='text-align:center'>其他费用</td>
        </tr>
        <tr  style='text-align:center'>
          <?php 
          $count_visitors=count($visitors);
          $country_name_arr=array();
          $accommodation_expense=0;
          $diet_expense=0;
          $miscellaneous_expense=0;
          $travel_fee=0;
          $other_fee=0;
          $total_expense=0;
          foreach ($itineraries as $key => $value) {
            $expenditure=Expenditure::model()->findByPk($value['visit_place']);
            $country_name_arr[$value['visit_place']]=$expenditure->country_name;
            $accommodation_expense+=$expenditure->accommodation_expenses * $value['exchange_rate'];
            $diet_expense+=$expenditure->diet_expenses * $value['exchange_rate'];
            $miscellaneous_expense+=$expenditure->miscellaneous_expenses * $value['exchange_rate'];
            $travel_fee+=$value['travel_fee'];
            $other_fee+=$value['other_fee'];
          }
          $accommodation_expense*=$count_visitors;
          $diet_expense*=$count_visitors;
          $miscellaneous_expense*=$count_visitors;
          $travel_fee*=$count_visitors;
          $other_fee*=$count_visitors;
          $total_expense=round($accommodation_expense)+round($diet_expense)+round($miscellaneous_expense)+round($travel_fee)+round($other_fee);
          ?>
          <td style="text-align:center"><?php echo $total_expense; ?></td>
          <td style="text-align:center"><?php echo round($travel_fee); ?></td>
          <td style="text-align:center"><?php echo round($accommodation_expense); ?></td>
          <td style="text-align:center"><?php echo round($diet_expense); ?></td>
          <td style="text-align:center"><?php echo round($miscellaneous_expense); ?></td>
          <td style="text-align:center"><?php echo round($other_fee); ?></td>
        </tr>
        <tr>
          <td  colspan=3 class='btm'>须事先报批的支出事项:</td>
          <td  colspan=3 class='btm'>出访经费预算审核是否符合规定:</td>
        </tr>
        <tr>
          <td  colspan=6 class='btm'>费用来源:</td>
        </tr>
        <tr>
          <td class='btm' style='text-align:center'>审核依据</td>
          <td  colspan=6></td>
        </tr>
        <tr style='height:38mm'>
          <td style='text-align:center;vertical-align:middle'>审核意见</td>
          <td  colspan=6 style='vertical-align:bottom;text-align:right;padding:0 30mm 5mm 0'>审核人（公章）:  <br>&nbsp;年 &nbsp; 月 &nbsp; 日</td>
        </tr>
        <tr>
          <td colspan=7 style='text-align:center;font-size:1.2em;font-weight:bold;vertical-align:bottom'>组织人事部门意见</td>
        </tr>
        <tr>
          <td rowspan=2 style='text-align:center'>审核<br>内容</td>
          <td colspan=6 class='btm'>已于 &nbsp; &nbsp; 年 &nbsp; 月 &nbsp; 日已按干部管理权限向 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 备案。</td>
        </tr>
        <tr>
          <td colspan=6 class='btm'>是否已按规定报经有关部门和领导审批同意:</td>
        </tr>
        <tr style='height:38mm'>
          <td style='text-align:center;vertical-align:middle'>审核意见</td>
          <td colspan=6 style='vertical-align:bottom;text-align:right;padding:0 30mm 5mm 0'>审核人（公章）:  <br>&nbsp;年 &nbsp; 月 &nbsp; 日</td>
        </tr>
        <tr>
          <td colspan=7 style='text-align:center;font-size:1.2em;font-weight:bold;vertical-align:bottom'>主管部门（市州）领导审批意见</td>
        </tr>
        <tr style='height:38mm'>
          <td colspan=7  style='vertical-align:bottom;text-align:right;padding:0 30mm 5mm 0'>审核人（公章）:  <br>&nbsp;年 &nbsp; 月 &nbsp; 日</td>
        </tr>
        <tr style='height:6mm'>
          <td colspan=7 class='btm' style='border:0px'>备注: 出访团组和单位财务部门应对各项支出的测算和审核做详细说明。</td>
        </tr>
      </table>
    </div>

  </body>
</html>
