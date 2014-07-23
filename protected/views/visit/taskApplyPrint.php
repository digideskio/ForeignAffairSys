
<?php
$filename=iconv("UTF-8", "GBK", "因公出国（赴港澳）任务申报表-领队-".$model->leader->name.".doc");
header("Content-Type:application/msword");
header("Content-Disposition:attachment; filename=".$filename);
header("Pragma:no-cache");
header("Expires:0");
?>
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
         font-size:15px;
         margin:auto;
      }
      caption{
        font-size: 40px;
        font-weight: bold;
        color:red;
        font-family: 黑体;
      }
      .outer td{
        border:1px solid ;     
      }

      .inner td{
        border:0px ;
      }

      .table_persons tr{
        height:9.5mm;

      }
      .table_persons tr td{
         border:1px solid;
      }

    </style>
  </head>
  <body style="margin:0;padding:0;">


   <div style="width:210mm;height:250mm;margin:auto">
    <table class="outer" align='center'   cellspacing=0 >

      <caption > 因公出国(赴港澳)任务申报表</caption>
      <tr >
        <td colspan=3 style="padding:8pt 0 0 20pt;border:0px;text-align:left;height:30pt">编号：</td>
        <td colspan=3 style="padding:8pt 30pt 0 0;border:0px;text-align:right;height:30pt">申报日期:&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;日</td>
      </tr>
      <tr style="height:66px ;text-align:center;">
        <td style="width:70px;">申报单位</td>
        <td style="width:210px;"><?php echo $model->claim_unit?></td>
        <td style="width:70px;">出访人数</td>
        <td style="width:120px;"><?php //echo $model->visitors[0]->person_id;
        echo count($model->visitors);
        ?>人</td>
        <td style="width:100px">团组负责<br>人姓名</td>
        <td><?php echo $model->leader->name?></td>
      </tr>
      <tr style="height:66px ;">
        <td >出访费用<br>来源</td>
        <td><?php echo $model->fees;?></td>
        <td>出访时间</td>
        <td><?php echo $model->start_date;?>至<?php echo $model->end_date;?></td>
        <td>境外停留<br>总天数</td>
        <td>
          <?php 
          $total_stay_days=0;
          foreach ($model->itineraries as $key => $value) {
            $total_stay_days += $value['stay_days'];
          }
          echo $total_stay_days;
          ?>
        </td>
      </tr >
      <tr class="hello" style="height:120px;">
        <td>出访国家<br>或地区</td>
        <td colspan=5 style="margin:0;padding:0">
          <table class="inner" cellspacing=0 cellpadding=0 style="width:100%;line-height:1.5">
                <tr>
                  <td style="text-align:right;">
                  <?php
                    foreach($model->itineraries as $k=>$v){
                      $expenditure = Expenditure::model()->findByPk($v['visit_place']);
                      $temp = $expenditure->country_name;
                      if ($expenditure->city_name!="") {
                        $temp = $temp."(".$expenditure->city_name.")";
                      }
                      echo $temp." <br>";
                    }
                  ?>
                   
                  </td>
                  <td style="width:3em;text-algn:left"><?php 
                  foreach ($model->itineraries as $k => $v) {
                    echo " 停留 <br>";
                  }
                  ?>
                  </td>
                  <td style="text-align:left;width:2em"><?php 
                  foreach ($model->itineraries as $k => $v) {
                    echo $v->stay_days."<br>";
                  }
                  ?>
                  </td>
                  <td "text-align:left;width:6em"><?php 
                  foreach ($model->itineraries as $k => $v) {
                    echo "天&nbsp;邀请单位<br>";
                  }
                  ?>
                  </td>
                  <td style="text-align:left;width:16em"><?php 
                  foreach ($model->itineraries as $k => $v) {
                    echo $v->invit_unit."<br>";
                  }
                  ?>
                </td>
              </tr>
          </table>
          </td>
      </tr>
      <tr style="height:120px;">
        <td>出访路线</td>
        <td colspan=5></td>
      </tr>
      <tr style="height:360px;">
        <td>出访任务<br>及说明</td>
        <td colspan=5><?php echo $model->visit_task?></td>        
      </tr>
      <tr style="height:20px ;text-align: left;">
        <td colspan=3 style="padding:10 0 10 30;border:0px;">经办人姓名：</td>
        <td colspan=3 style="padding:10 0 10 30;border:0px;">电话：</td>        
      </tr>
    </table>
   </div>

   <div style="width:210mm;height:250mm;margin:auto">

    <table class="table_persons" align='center' style="">
      <tr >
        <td>姓名</td>
        <td>性<br>别</td>
        <td>年<br>龄</td>
        <td>工 作 单 位</td>
        <td>职务或职称</td>
        <td>行政级别</td>
        <td>身份证号码</td>
      </tr>
      <?php 
          $old=10;
          $height=12;
          $have=count($model->visitors );
          $empty=$old-$have;
          if($have>10){
             $height=120/$have-$have*0.1;
          }
         

          foreach($model->visitors as $k=>$v){
              //echo "<br>".$v['person_id']."<br>".$v->person->name."<br>";
            //计算年龄$birth=date("1990-02-11");
            $birth=$v->person->birth_day;

            list($by,$bm,$bd)=explode('-',$birth);
            $cm=date('n');
            $cd=date('j');
            $age=date('Y')-$by-1;
            if ($cm>$bm || $cm==$bm && $cd>$bd) $age++;

              echo "<tr style='height:".$height."mm'><td>".$v->person->name."</td><td>".$v->person->gender."</td><td>".$age."</td><td>".$v->person->workunit."</td><td>".$v->person->job."</td><td>".$v->person->admin_level."</td><td>".$v->person->cert_number."</td></tr>";
          }

          if($have<10)
          {
            for($empty;$empty>0;$empty--){//  style='height:".$height."mm'
              echo "<tr style='height:".$height."mm'>
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

    <table align='center' >
      <tr style="height:10mm;text-align:left">
        <td style="border-right:1px solid;border-left:1px solid;width:30%">组团单位意见：</td>
        <td style="border-right:1px solid;width:30%">省级部门外事处、市州外办意见：</td>
        <td style="border-right:1px solid;width:30%">主管部门领导意见：</td>
      </tr>
      <tr style="height:25mm">
        <td style="border-right:1px solid;border-left:1px solid"></td>
        <td style="border-right:1px solid"></td>
        <td style="border-right:1px solid"></td>
      </tr>
      <tr style="height:10mm">
        <td style="border-right:1px solid;border-left:1px solid;border-bottom:1px solid;text-align:right">（主要领导人签名）<br>（盖公章）&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td style="border-right:1px solid;border-bottom:1px solid;text-align:right">（负责人签名）<br>（盖公章）&nbsp;&nbsp;</td>
        <td style="border-right:1px solid;border-bottom:1px solid;text-align:right">（负责人签名）<br>（盖公章）&nbsp;&nbsp;</td>
      </tr>
    </table>
    <table align='center'>
      <tr>
        <td style="width:10mm;height:50mm;border-top:0px;border-left:1px solid;border-right:1px solid;border-bottom:1px solid; ">审<br>批<br>意<br>见</td>
        <td style="border-top:0px;border-right:1px solid;border-bottom:1px solid; "> </td>
      </tr>
    </table>
   </div>
  </body>
</html>

