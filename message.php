<!DOCTYPE HTML>
<html>
<head>
<title>芬香留言站</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html;charset=gb2312" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- start slider -->
<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
</head>
<script src="js/js.js" language="javascript"></script>
<body onload="reloop(),indexpage()">
 <!--start header-->
<div class="header-bg">
<div class="wrap">
<div class="header">
<div id="whe">
          芬香家园欢迎您！    
 今天是：&nbsp;
    <script language="javascript"> 
<!--
var today = new Date();    
/*myDate.getYear();        //获取当前年份(2位)    
myDate.getFullYear();    //获取完整的年份(4位,1970-????)    
myDate.getMonth();       //获取当前月份(0-11,0代表1月)    
myDate.getDate();        //获取当前日(1-31)  */  
var enabled = 0;
var day; var date;
if(today.getDay()==0) day = "星期日"
if(today.getDay()==1) day = "星期一"
if(today.getDay()==2) day = "星期二"
if(today.getDay()==3) day = "星期三"
if(today.getDay()==4) day = "星期四"
if(today.getDay()==5) day = "星期五"
if(today.getDay()==6) day = "星期六"
date = (today.getFullYear()) + "年" + (today.getMonth() + 1 ) + "月" + today.getDate() + "日  " + "&nbsp;"+day +"";
document.write(date);
// -->
</script>
</div>
		<div class="nav">
				<ul>
						<li  class="a"><a  class="active" href="./index.php">芬香家园</a></li>
      					<li ><a href="./baike.php">芬香资源站</a></li>
      					<li ><a href="./baike.php">芬香讨论站</a></li>
      					<li ><a href="./message.php?page=1">芬香留言站</a></li>
				</ul>
		 </div>
         <div class="login">   
     
<?php
			/* Report all errors except E_NOTICE */
			error_reporting(E_ALL ^ E_NOTICE);
			session_start();
			if ($_SESSION["uname"]=="")
		{
		?>
      <form action="checklogin.php" method="post" name="f1">
        <?php
        if (array_key_exists('username',$_COOKIE))
        {
        ?>
        <input name="username" type="text" id="name" class="inputline" value="<?php echo($_COOKIE['username']); ?>" maxlength="10" onblur="unnonull()"/>
       	<input name="psw"  id="psw"  type="password" value="<?php echo($_COOKIE['psw']); ?>" class="inputline" onblur="psnonull()"/>
        <?php
        }
        else
        {
         ?>
        <input name="username" type="text" id="name" class="inputline" value="" maxlength="10"  onblur="unnonull()"/>
        <input name="psw"  id="psw"  type="password" value="" class="inputline" onblur="psnonull()"/>
        <?php
        }
        ?>
        <input type="checkbox" name="setcookie" value="on" />保存登录信息 
        <input name="login" id="login" value="登录" type="button" onclick="chef1user()"/>
        <a class="button" href="regpage.php">注册</a>
      </form>
      <?php
      }
	  else
	  {
			echo "<h2 style='color:#fff;padding:5px;'>欢迎会员：". $_SESSION["uname"] ."<a href='logout.php' style='color:#000;'> 注销</a></h2>";
	 }
	 ?>
         </div>
        <div class="clear"></div>
</div>
</div>
</div>
<!---end_header-->

<div id="main"> 
 
	   <div class="bottom-bg"> 
		   <div class="wrap">
			  <div class="bottom-cont">
  <!--留言板列表-->
<?php 
//window.parent.focus_querywindow
	include"connect.php";
	//SQL查询计算留言总数语句
	$sqlcount = "SELECT COUNT(1) FROM message where orginal = '0'";
	//执行SQL
	$rCount=$conn->query($sqlcount);
	//每页留言的条数
	$pageSize = 5;
	//留言分页当前页
	$pageIndex = $_GET["page"];
	//启动
	session_start();
	//设定session
	$uname=$_SESSION["uname"];
	//留言人
	if($uname==null){
		$uname="匿名网友";
	}
?>
<div align="right">
	<span  style="border: 1px solid #f66; border-radius: 20px; padding:5px">
<?php 
	echo("<a  href=\"newRec.php?orginal=0&Upper=0&poster=".$uname."\" target=_blank onclick=\"return javascript:document.body.newwin(this.href)\"  style=\"text-decoration: none;color:#fff\" >增加新留言</a>");
?>
	</span>
</div>
<?php 
	//解析数据获得记录总数
	$row = $rCount->fetch_row();
	//赋值给记录总数变量
	$resultCount = $row[0];
	//echo($resultCount[0]);
	if($resultCount<=0){
		echo("<span style=\"border: 3px solid #f66; border-radius: 10px; padding:5px\">没有留言！请留言</span>");
	}else{
		$pageCount=0;
		if($resultCount<=$pageSize){
			$pageSize=$resultCount;
			
		}
		if($resultCount%$pageSize){
			$pageCount=(int)$resultCount/$pageSize+1;
		}else{
			$pageCount=(int)($resultCount/$pageSize);
		}
		if($pageIndex==null||$pageIndex<=1){
			$pageIndex=1;
		}
		/*取出所有的原始留言*/
		$sql = "SELECT * FROM `message` WHERE orginal = '0' ORDER BY creatTime DESC LIMIT ".(($pageIndex-1)*$pageSize).",".$pageSize;
		$result=$conn->query($sql);
		
		//echo(count($result));
		echo("<dl>");
		$i=0;
		$secret="";
		$feedBack="";
		$recontext="";
		while($resultrow = $result->fetch_row()){
		/*列出留言*/
		if($uname=="Admins"){//管理用户验证
			$secret= "<a class='hidden' href=\"deleteRec.php?ContId=".$resultrow[0]."\" target=_blank\" >[删除]</a>";
			$feedBack="<a  class='hidden' href=\"newRec.php?orginal= 1 &Upper=".$resultrow[0]."&poster=".$uname."\" target=_blank onclick=\"return javascript:document.body.newwin(this.href)\" >[回复]</a>";
		}
		//查询回复
		$sqlChild = "SELECT * FROM `message` WHERE orginal = '1'AND upper = '".$resultrow[0]."' AND poster ='Admins' ORDER BY creatTime DESC LIMIT ".(($pageIndex-1)*$pageSize).",".$pageSize;
		$resultChild=$conn->query($sqlChild);
		$reChild = $resultChild->fetch_row();
		
		if($reChild[2]!=""&&$reChild[2]!=null){
			$recontext = "\n<dt style='margin-left:20px;'>[Admins回复：]</dt><dd  class='con' style='margin-left:20px;'>\n".$reChild[2]."</dd>";
		}
			echo("<dt><a class='title' href=\"#Section".$i."\">[标题：".$resultrow[1]."]</a><br>[发表人：".$resultrow[5]."]----[IP:".$resultrow[6]."]<span>".$secret."</span><span>".$feedBack."</span></dt>");
			echo("<dd class='con' id=\"Section".$i."\">");
				echo("<p readOnly=\"true\">".$resultrow[2].$recontext."</p>");
			echo("</dd>");
		$i++;
		}
		echo("</dl>");
		/*分页*/
function ShowPage( $pageCounts, $pageNo )  {
	echo("<ul id=\"nav\">");
  
	// 显示第一页，如果当前页就是第一页，则不生成链接
	if($pageNo>1)
		echo(" <li><A HREF=message.php?page=1>第1页</A>&nbsp;&nbsp;</li>");
	else
		echo("<li style=\"clear\">第1页&nbsp;&nbsp;</li>");
	// 显示上一页，如果不存在上一页，则不生成链接
	if($pageNo>1)
		echo("<li><A HREF=message.php?page=" . ($pageNo-1) . ">上一页</A>&nbsp;&nbsp;</li>");
	else
		echo("<li style=\"clear\">上一页&nbsp;&nbsp;</li>");
	// 显示下一页，如果不存在下一页，则不生成链接
	if($pageNo<>$pageCounts)
	    echo("<li><A HREF=message.php?page=" . ($pageNo+1) . ">下一页</A>&nbsp;&nbsp;<li>");
	else
		echo("<li style=\"clear\">下一页&nbsp;&nbsp;</li>");
	// 显示最后一页，如果当前页就是最后一页，则不生成链接
	if($pageNo <> $pageCounts)
	    echo("<li><A HREF=message.php?page=" . $pageCounts . ">最后1页</A>&nbsp;&nbsp;<li>");
	else
		echo("<li style=\"clear\">最后1页&nbsp;&nbsp;</li>");

	// 输出页码
	echo($pageNo . "/" . $pageCounts . "</ul>");
}
ShowPage((int)$pageCount,$pageIndex);
		mysqli_close($conn);
	}
?>
</div>
</div>
</div>

  
</div>

<!--footer-bottom--> 
	<div class="footer-bottom">
		 <div class="wrap">
				 <div class="copy-right">
					<p>技术支持： <a href="javascript:;">零度Coder</a> 游客统计：<a href="javascript:;"><?php
    include"./count.php";
    ?></a>人</p>
				</div>
			 	<div class="social-icons">
                    <div id="ckepop" style="position:relative;">  
                      <a class="jiathis_button_qzone"></a>  
                      <a class="jiathis_button_tsina"></a>   
                      <a class="jiathis_button_baidu"></a>  
                      <a class="jiathis_button_douban"></a>  
                      <a class="jiathis_button_tqq"></a>  
              		</div>  
				</div>
    		<script type='text/javascript' src="http://www.qiugesoft.com/share.js"></script>
	     </div>
       <div class="clear"> </div>
    </div>
    
</body>
</html>
