
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  <style type="text/css">
      body{text-align:center;
        font-family: "黑体";
      }
    div{
      margin:auto;
    }
      table{
         border-collapse:collapse;
         width:700px;
         text-align: center;
         table-layout: fixed;
         font-size:15px;
         margin:auto;
      }
      caption{
        font-size: 40px;
        color:red;
        font-family: 黑体;
      }
      .main_table>td{
        border:1px solid black;
      }
      .bold{
        font-size:17px;
      }
      tr{
        height:9.5mm;
      }
  </style>
</head>
<body style="font-size:20px">
   <?php 
   echo '<br>';
   echo CHtml::link('导出Word文档', array('/person/passportPrint','id'=>$model->person_id,'vid'=>$visit->visit_id));
   echo '<br>';echo '<br>';
   ?> 
  <div style="width:710px;height:240mm;margin:auto;">
    <div style="font-size:26pt;font-weight:bold">四川省因公出国电子护照申请表</div>
    <table>
      <tr>
        <td class="bold" style="text-align:left;border:0px ">申报单位名称:<?php echo $visit->claim_unit?></td>
      </tr>
    </table>
  <table class="main_table" border=1 style="border:black">
       <tr style="height:9.5mm">
          <td class="bold" style="width:78px">中文姓</td>
          <td  style="width:78px"><?php  echo $model->china_xing;?></td>
          <td  style="width:78px" class="bold">中文名</td>
          <td  style="width:78px"><?php echo $model->china_ming?></td>
          <td  style="width:55px;" class="bold"> 性别</td>
          <td  style="width:30px;border-right:0px;text-align:right" ><?php echo $model->gender;?></td>
          <td  style="border-left:0px;width:30px"></td>
          <td   class="bold" >出生地</td>
          <td style="width:145px"><?php echo $model->birth_place;?></td>
        </tr>
        <tr>
          <td class="bold">姓拼音</td>
          <td><?php echo $model->spell_xing?></td>
          <td class="bold">名拼音</td>
          <td><?php echo $model->spell_ming?></td>
          <td class="bold">民族</td>
          <td  colspan=2><?php echo $model->nation?></td>
          <td class="bold">出生日期</td>
          <td><?php echo $model->birth_day?></td>
        </tr>
        <tr>
          <td class="bold" colspan=2>工作单位及职务</td>
          <td colspan=5><?php echo $model->workunit.":".$model->job;?></td>
          <td class="bold">户口所在地</td>
          <td><?php echo $model->hukou_place?></td>
        </tr>
        <tr>
          <td class="bold" colspan=2>证件名称</td>
          <td  colspan=2  style="text-align:left"><?php 
          if($model->cert_name=='身份证')
          {
            echo '■身份证 □军官证';
          }elseif($model->cert_name=='军官证')
          {
            echo  '□身份证 ■军官证';
          }else{
            echo '□身份证 □军官证';
          }
          
          ?></td>
          <td class="bold" colspan=3>证件号码</td>
          <td  colspan=2><?php echo $model->cert_number;?></td>
        </tr>
        <tr>
          <td class="bold" colspan=2>职业属性</td>
          <td colspan=7  style="text-align:left"><?php
          $jobAttribute=array('国家公务员','事业单位人员','军人','国企人员','非国企人员','其他');
          for($i=0;$i<6;$i++)
          {
            if($model->job_attribute!=$jobAttribute[$i])
            {
              echo '□'.$jobAttribute[$i].' ';
            }else{
              echo '■'.$jobAttribute[$i].' ';
            }
          }
          ?></td>
        </tr>
        <tr>
          <td class="bold"  colspan=2>行政级别</td>
          <td colspan=7 style="text-align:left"><?php 
          $adminLevel=array('正副省级','正副厅局级','正副县处级','普通');
          for($i=0;$i<4;$i++)
          {
              if($model->admin_level!=$adminLevel[$i])
              {
                echo '□'.$adminLevel[$i].' ';
              }else{
                echo '■'.$adminLevel[$i].' ';
              }
          }
          ?></td>
        </tr>
        <tr>
          <td class="bold" colspan=2>数字照片编号</td>
          <td colspan=3></td>
          <td class="bold" colspan=3>配偶姓名</td>
          <td><?php echo $model->spouse_name?></td>
        </tr>
        <tr>
          <td class="bold" colspan=2>对外身份(选填)</td>
          <td colspan=7 style="text-align:left">&nbsp;<?php echo $model->foreign_identity?></td>
        </tr>
        <tr  style="height:70mm">
          <td class="bold" colspan=5 style="border-bottom:0px #fff">身份证/军官证复印件</td>
          <td colspan=4>  
             <img src="http://localhost:8087/table/head.png" alt="">          
            <div style="font-size:11px;">
              粘贴一张二寸免冠近照，另备一张二寸<br>数码照片供制证用，照片背景为白色
            </div></td>
        </tr>
        <tr style="height:20mm">
          <td colspan=5 style="border-top:0px #fff;border-bottom:0px #fff"></td>
          <td> 签<br>名</td>
          <td colspan=3></td>
        </tr> 
        <tr  style="height:12mm">
          <td colspan=5 style="border-top:0px #fff"></td>
          <td colspan=4 style="font-size:11px;text-align:left;">请本人在上框内签名，不要出框或压框线。此签名将打印在护照上，作为持照人签名</td>
        </tr>  
        <tr>
          <td class="bold" style="text-align:left;" colspan=9>备注:</td>
        </tr> 
        <tr>
          <td class="bold"  style="text-align:left;" colspan=5>联系人姓名:</td>
          <td class="bold"  style="text-align:left;" colspan=4>联系人电话:</td>
        </tr>    
  </table>    
  </div>

    
</body>
</html>

