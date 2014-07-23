<?php /*<?php echo CHtml::link('导出word', array('/visit/teacherApplyPrint','id'=>$model->visit_id));?>*/?>
<html>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
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
         font-size:12px;
         margin:auto;
      }
      caption{
        font-size: 20px;

        font-family: 黑体;
      }
      tr{
        height: 9mm;
      }
      td{
        
        border:1px solid ;
      }
      .change{
        height:9.5mm;
      }
      .second_table tr{
        height:1.1em;
      }
      </style>    
  </head>
  <body style="margin:0;padding:0;font-size:20px">
    <?php 
    echo '<br>';
    echo CHtml::link('导出Word文档', array('/visit/teacherApplyPrint','id'=>$model->visit_id));
    echo '<br>';echo '<br>';
    ?>
    <div style="width:210mm;height:250mm;margin:auto">
      <table>
        <caption>西南财经大学教师因公出国（境）申请表</caption>
        <tr style="vertical-align:bottom;height:6mm">
          <td style="width:80px;border:0"></td>
          <td style="width:80px;border:0"></td>
          <td style="width:130px;border:0"></td>
          <td style="width:30px;border:0"></td>
          <td style="width:90px;border:0"></td>
          <td style="width:160px;font-size:12px;text-align:right;border:0">申请日期: &nbsp; &nbsp; 年</td>
          <td style="font-size:12px;text-align:left;border:0"> &nbsp; 月 &nbsp;日</td>
        </tr>
        <tr>
          <td></td>
          <td>姓名</td>
          <td>学院/部门</td>
          <td colspan=2>职称/职务</td>
          <td>身份证号</td>
          <td>上次出访时间</td>
        </tr>
        <tr style=<?php 
              $old=6;
              $height=9.5;
              $person_count=count($model->visitors);
              if($person_count>6)
              {
                //echo $person_count;
                $height=(6*9.5)/$person_count;
              }
              echo "'height:".$height."mm'";
            ?>>
          <td>领队</td>
          <td><?php echo $model->getLeaderName();?></td>
          <td><?php echo $leader->department;?></td>
          <td colspan=2><?php echo $leader->job;?></td>
          <td><?php echo $leader->cert_number;?></td>
          <td>
            <?php 
            $leader_id=$model->leader_id;
            echo $this->getLastOutDate($leader_id);
            ?>
          </td>
        </tr>
        <tr  style=<?php echo "'height:".$height."mm'"?>>
          <td rowspan=<?php 
            if(count($model->visitors )>7)
            {
              echo (count($model->visitors )-1);
            }else{
              echo 6;
            }//echo count($model->families)+1;
            ?>>
            团员
          </td>
          <?php 
            foreach($model->visitors as $k=>$v)
            {
              if($v->person->person_id!=$model->leader_id)
              {
                $second_person_id=$v->person->person_id;
                echo "<td>".$v->person->name."</td><td>".$v->person->department."</td><td colspan=2>".$v->person->job."</td><td>".$v->person->cert_number."</td><td>".$this->getLastOutDate($v->person->person_id)."</td>";
                break;
              }
              else
              {
                echo "<td></td><td></td><td colspan=2></td><td></td><td></td>";
              }
            }
          ?>
        </tr>
          <?php 
            foreach($model->visitors as $k=>$v)
            {
              if($v->person->person_id!=$model->leader_id&&$v->person->person_id!=$second_person_id)
              {
                echo "<tr style='height:".$height."mm'><td>".$v->person->name."</td><td>".$v->person->department."</td><td colspan=2>".$v->person->job."</td><td>".$v->person->cert_number."</td><td>".$this->getLastOutDate($v->person->person_id)."</td></tr>";
              }
            }
            if($person_count<7)
            {  
                $empty=7-$person_count;
                for($empty;$empty>1;$empty--){
                        echo "<tr style='height:".$height."mm'>
                              <td></td>
                              <td></td>
                              <td colspan=2></td>
                              <td></td>
                              <td></td>
                              </tr>";
                }
            }
          ?>
        <tr  class="change" style=<?php 
            $count=count($model->itineraries);
            $old=2;
            $height=9.5;
            if($count>$old)
            {
               $height=(2*9.5)/$count;
            }
            echo "'height:".$height."mm'";

        ?>>
          <td rowspan=<?php echo count($model->itineraries)?>>本次出<br>访国家<br>(地区)</td>
            <?php 
              foreach ($model->itineraries as $k => $v) {
                $expenditure = Expenditure::model()->findByPk($v['visit_place']);
                $temp = $expenditure->country_name;
                if ($expenditure->city_name!="") {
                  $temp = $temp."(".$expenditure->city_name.")";
                }
                $first_itinerary=$v->itinerary_id;
                echo "<td style='border-right:0'>".$temp."</td><td style='border-left:0;border-right:0;'>停留 ".$v->stay_days." 天</td><td colspan=4 style='text-align:left;border-left:0;'>邀请单位:".$v->invit_unit."</td>";
                break;
              }
            ?>         
        </tr>
<?php 
              foreach ($model->itineraries as $k => $v) {
                $expenditure = Expenditure::model()->findByPk($v['visit_place']);
                $temp = $expenditure->country_name;
                if ($expenditure->city_name!="") {
                  $temp = $temp."(".$expenditure->city_name.")";
                }
                if($first_itinerary!=$v->itinerary_id)
                { 
                  echo "<tr style='height:".$height."mm' ><td style='border-right:0'>".$temp."</td><td style='border-left:0;border-right:0;'>停留 ".$v->stay_days." 天</td><td colspan=4 style='text-align:left;border-left:0;'>邀请单位:".$v->invit_unit."</td></tr>";
                }
              }
?>
        <tr>
          <td>出访<br>日期</td>
          <td colspan=2 style="border-right:0">自 <?php echo substr($model->start_date,0,4);?>年 <?php echo substr($model->start_date,5,2);?>月 <?php echo substr($model->start_date,8,2);?>日 至 </td>
          <td colspan=2 style="border-left:0;border-right:0"><?php echo substr($model->end_date,0,4);?>年 <?php echo substr($model->end_date,5,2);?>月</td>
          <td colspan=2 style="text-align:left;border-left:0"> <?php echo substr($model->end_date,8,2);?>日 &nbsp; &nbsp;共计 <?php
          $Date_1=date($model->start_date);
          $Date_2=date($model->end_date);
          $d1=strtotime($Date_1);
          $d2=strtotime($Date_2);
          $Days=round(($d2-$d1)/3600/24)+1;
          echo $Days;
        ?>天</td>
        </tr>
        <tr>
          <td>经费<br>预算</td>
          <td style="border-right:0">合计约</td>
          <td colspan=2 style="border-left:0;border-right:0"></td>
          <td colspan=3 style="text-align:left;border-left:0">元</td>
        </tr>
        <tr style="height:25mm">
          <td>出访<br>任务<br>(中文)</td>
          <td colspan=6><?php echo $model->visit_task?></td>
        </tr>
        <tr>
          <td colspan=7 style="font-size:16px;font-weight:bold">以 下 栏 目 由 审 批 部 门 填 写</td>
        </tr>
        <tr style="vertical-align:top">
          <td colspan=4 style="font-size:16px;font-weight:bold;text-align:left;border-bottom:0;">国际交流与合作处(港澳台办)意见:</td>
          <td colspan=3 style="font-size:16px;font-weight:bold;text-align:left;border-bottom:0;">学校主管外事领导意见:</td>
        </tr>
        <tr>
          <td  colspan=4 style="border-bottom:0;border-top:0"></td>
          <td colspan=3 style="border-bottom:0;border-top:0"></td>
        </tr>
        <tr style="vertical-align:bottom">
          <td colspan=4  style="border-bottom:0;border-top:0">签字: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(公章)</td>
          <td colspan=3 style="border-bottom:0;border-top:0">签字: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(公章)</td>
        </tr>
        <tr style="vertical-align:top;height:6mm">
          <td colspan=4 style="text-align:right;border-top:0">年 &nbsp;月 &nbsp;日 &nbsp; &nbsp; &nbsp;</td>
          <td colspan=3 style="text-align:right;border-top:0">年 &nbsp;月 &nbsp;日 &nbsp; &nbsp; &nbsp;  &nbsp;</td>
        </tr>
        <tr>
          <td colspan=7 style="font-size:16px;font-weight:bold;text-align:left;vertical-align:top;border-bottom:0;">学校领导意见:
            <span style="font-size:15px;font-weight:normal">(正处级及以上干部出访需填写此栏)</span> </td>
        </tr>
        <tr>
          <td colspan=7 style="height:11mm;border-bottom:0;border-top:0"></td>
        </tr>
        <tr style="vertical-align:bottom">
          <td colspan=4 style="border-bottom:0;border-top:0;border-right:0;">签字:</td>
          <td colspan=3 style="border-bottom:0;border-top:0;border-left:0;">(公章)</td>
        </tr>
        <tr style="vertical-align:top;height:6mm">
          <td colspan=5 style="border-top:0;border-right:0"></td>
          <td colspan=2 style="text-align:left;border-left:0;border-top:0"> &nbsp; &nbsp; &nbsp; &nbsp;年 &nbsp;月 &nbsp;日  &nbsp;</td>
        </tr>   
      </table><br>
    </div>
    <div  style="width:210mm;height:230mm;margin:auto;">
      <table class="second_table">
          <tr style="height:0em;border:0px">
            <td style="width:5px;border-color:#FFF;border-bottom:1px solid black" ></td>
            <td style="width:50px;border-color:#FFF;border-bottom:1px solid black" ></td>
            <td style="border-color:#FFF;border-bottom:1px solid black"></td>
            <td style="width:70mm;border-color:#FFF;border-bottom:1px solid black"></td>
            <td style="border-color:#FFF;border-bottom:1px solid black"></td>
            <td style="border-color:#FFF;border-bottom:1px solid black"></td>
            <td style="width:5px;border-color:#FFF;border-bottom:1px solid black"></td>
          </tr>
          <tr>
            <td style="width:5px" rowspan=18></td>
            <td colspan=5 style="font-weight:bold;font-size:15px;padding:1mm 0 1mm 0">经 费 预 算 情 况</td>
            <td style="width:5px" rowspan=18></td>
          </tr>
          <tr>
            <td rowspan=2></td>
            <td rowspan=2 style="width:35mm">预算项目</td>
            <td rowspan=2>摘要</td>
            <td colspan=2>金额</td>
          </tr>
          <tr>
            <td style="width:25mm">外币</td>
            <td style="width:25mm">人民币</td>
          </tr>
          <tr>
            <td rowspan=6>实 依<br>报 据<br>实 凭<br>销 证</td>
            <td>护照办理费/签证费</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>国内差旅费</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>国际机票</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>国（境）外住宿标准</td>
            <td>每人每天 &nbsp; &nbsp; 元 × &nbsp; &nbsp; 人 × &nbsp; &nbsp;天</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>保险费</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>会议注册费</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td rowspan=8>包 签<br>干 写<br>报 领<br>销 条</td>
            <td rowspan=3>国（境）外伙食标准</td>
            <td>每人每天 &nbsp; &nbsp; 元 × &nbsp; &nbsp; 人 × &nbsp; &nbsp;天</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td rowspan=3>国（境）外公杂标准</td>
            <td>每人每天 &nbsp; &nbsp; 元 × &nbsp; &nbsp; 人 × &nbsp; &nbsp;天</td>
            <td></td>
            <td></td>
          </tr>
           <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>         
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
           <tr>
            <td>国（境）外零用标准</td>
            <td></td>
            <td></td>
            <td></td>
          </tr> 
           <tr>
            <td>其他</td>
            <td></td>
            <td></td>
            <td></td>
          </tr> 
          <tr>
             <td>总计<br>金额</td>
             <td style="text-align:left">小写:<br>大写:</td>
             <td style="text-align: right;vertical-align: top;">参考汇率:</td>
             <td colspan=2 style='text-align: left;vertical-align: top;'>外事处预算审核签字:</td>
           </tr> 
           <tr>
             <td colspan=7 style="font-size:17px;font-weight:bold">以下栏目由出访人员所在部门填写</td>
           </tr> 
        <tr >
          <td colspan=7 style="border-bottom:0px;margin:0;padding:0;height:13px"><div style="border:0px;text-align:center;margin:0;padding:0;padding:0;height:5mm;"><div>所在部门意见:<span style="font-size:12px">(若参加学术会议，请注明论文观点是否正确，会否泄密；有无支持产权保护问题；教学科研是否妥善安排)</span></div></div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0mm 0 0  30mm;padding:0;height:5mm">□同意_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ 此次出国(境)任务</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0 0 0  30mm;padding:0;height:5mm">□同意承担实际报销费用的 _ _ _ 分之 _ _ _ (_ _ _%)</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div   style="border:0px;text-align:left;margin:0mm 0 0  70mm;padding:0;height:5mm">签字： &nbsp;  &nbsp;  &nbsp; (公章)</div></td>
        </tr>
        <tr>
          <td colspan=7 style='border-top:0px;margin:0;padding:0;height:13px'><div  style="border:0px;text-align:left;margin:0  0 0 90mm;padding:0;height:5mm">年 &nbsp; 月 &nbsp; 日</div></td>
        </tr>
        <tr >
          <td colspan=7 style="border-bottom:0px;;margin:0;padding:0;height:13px"><div style="border:0px;text-align:center;margin:0;padding:0;padding:0;height:5mm;"><div>所在部门意见:<span style="font-size:12px">(若参加学术会议，请注明论文观点是否正确，会否泄密；有无支持产权保护问题；教学科研是否妥善安排)</span></div></div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0mm 0 0  30mm;padding:0;height:5mm">□同意_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ 此次出国(境)任务</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0 0 0  30mm;padding:0;height:5mm">□同意承担实际报销费用的 _ _ _ 分之 _ _ _ (_ _ _%)</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div   style="border:0px;text-align:left;margin:0mm 0 0  70mm;padding:0;height:5mm">签字： &nbsp;  &nbsp;  &nbsp; (公章)</div></td>
        </tr>
        <tr>
          <td colspan=7 style='border-top:0px;margin:0;padding:0;height:13px'><div  style="border:0px;text-align:left;margin:0  0 0 90mm;padding:0;height:5mm">年 &nbsp; 月 &nbsp; 日</div></td>
        </tr>
        <tr >
          <td colspan=7 style="border-bottom:0px;margin:0;padding:0;height:13px"><div style="border:0px;text-align:center;margin:0;padding:0;padding:0;height:5mm;"><div>所在部门意见:<span style="font-size:12px">(若参加学术会议，请注明论文观点是否正确，会否泄密；有无支持产权保护问题；教学科研是否妥善安排)</span></div></div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0mm 0 0  30mm;padding:0;height:5mm">□同意_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ 此次出国(境)任务</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0 0 0  30mm;padding:0;height:5mm">□同意承担实际报销费用的 _ _ _ 分之 _ _ _ (_ _ _%)</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div   style="border:0px;text-align:left;margin:0mm 0 0  70mm;padding:0;height:5mm">签字： &nbsp;  &nbsp;  &nbsp; (公章)</div></td>
        </tr>
        <tr>
          <td colspan=7 style='border-top:0px;margin:0;padding:0;height:13px'><div  style="border:0px;text-align:left;margin:0  0 0 90mm;padding:0;height:5mm">年 &nbsp; 月 &nbsp; 日</div></td>
        </tr>
        <tr >
          <td colspan=7 style="border-bottom:0px;margin:0;padding:0;height:13px"><div style="border:0px;text-align:center;margin:0;padding:0;padding:0;height:5mm;"><div>所在部门意见:<span style="font-size:12px">(若参加学术会议，请注明论文观点是否正确，会否泄密；有无支持产权保护问题；教学科研是否妥善安排)</span></div></div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0mm 0 0  30mm;padding:0;height:5mm">□同意_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ 此次出国(境)任务</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0 0 0  30mm;padding:0;height:5mm">□同意承担实际报销费用的 _ _ _ 分之 _ _ _ (_ _ _%)</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div   style="border:0px;text-align:left;margin:0mm 0 0  70mm;padding:0;height:5mm">签字： &nbsp;  &nbsp;  &nbsp; (公章)</div></td>
        </tr>
        <tr>
          <td colspan=7 style='border-top:0px;margin:0;padding:0;height:13px'><div  style="border:0px;text-align:left;margin:0  0 0 90mm;padding:0;height:5mm">年 &nbsp; 月 &nbsp; 日</div></td>
        </tr>
        <tr >
          <td colspan=7 style="border-bottom:0px;margin:0;padding:0;height:13px"><div style="border:0px;text-align:center;margin:0;padding:0;padding:0;height:5mm;"><div>所在部门意见:<span style="font-size:12px">(若参加学术会议，请注明论文观点是否正确，会否泄密；有无支持产权保护问题；教学科研是否妥善安排)</span></div></div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0mm 0 0  30mm;padding:0;height:5mm">□同意_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ 此次出国(境)任务</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div  style="border:0px;text-align:left;margin:0 0 0  30mm;padding:0;height:5mm">□同意承担实际报销费用的 _ _ _ 分之 _ _ _ (_ _ _%)</div></td>
        </tr>
        <tr>
          <td colspan=7 style="border-bottom:0px;border-top:0px;margin:0;padding:0;height:13px"><div   style="border:0px;text-align:left;margin:0mm 0 0  70mm;padding:0;height:5mm">签字： &nbsp;  &nbsp;  &nbsp; (公章)</div></td>
        </tr>
        <tr>
          <td colspan=7 style='border-top:0px;margin:0;padding:0;height:13px'><div  style="border:0px;text-align:left;margin:0  0 0 90mm;padding:0;height:5mm">年 &nbsp; 月 &nbsp; 日</div></td>
        </tr>
      </table>
    </div>
  </body>
</html>