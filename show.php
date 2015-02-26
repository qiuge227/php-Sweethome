<!DOCTYPE HTML>
<html>
<head>
<title>用户信息</title>
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
    <fieldset>
      <legend><b>个人信息：</b></legend>
      你所填写的信息如下：<br/>
      <br/>
      <?php
	  //变量初始化
	  $uname="";
	  $upsw="";
	  $uoname="";
	  $gender="";
	  $email="";
	  $uname=$_POST['username'];
	  
	   //连接数据库
	include "connect.php";
	//SQL插入语句1
	$sql ="select * from userbased where uname='".$uname."'";
	
	//执行SQL插入语句1
	$result1=$conn->query($sql);
	//if($result1==null){
			   //表单提交method使用post
		if ($_POST['regNow']) {
		//用户名
	  	echo ("用户名:". $_POST['username']."<br>");
	 	 $uname=$_POST['username'];
	  //密码
	  	echo ("密码: ". $_POST['userpsw']."<br>");
	  	$upsw=$_POST['userpsw'];
	   //别名
	   echo ("别名: ". $_POST['othername']."<br>");
	   $uoname=$_POST['othername'];
	   //性别
	  	echo ("性别:". $_POST['gender']."<br>");
	  	$gender=$_POST['gender'];
	  //邮箱
	 	 echo("电子邮箱:".$_POST['email']."<br>");
	  	$email=$_POST['email'];
	  
	  //城市
	  	$myCity='sss';
	  	if($_POST['city']=='BeiJing')
	  		$myCity='北京';
	  	else if($_POST['city']=='Hebei')
	  		$myCity='河北';
	  	else if($_POST['city']=='Henan')
	  		$myCity='河南';
	  	else if($_POST['city']=='Guangzhou')
	  		$myCity='广州';
	  	else if($_POST['city']=='Shanghai')
	  		$myCity='上海';
	  	else
	  		$myCity='北京';
	 	echo ("城市：:".$myCity."<br>");
		//SQL插入语句1
		$sql1 ="insert into userbased(uname,upsw) values ('".$uname."','".$upsw."')";
	
		//执行SQL插入语句1
		$result1=$conn->query($sql1);
		if($result1){
			echo ("插入userbase成功<br>");
		}else{
			echo ("插入userbase失败<br>");
		}
		//SQL插入语句2
		$sql2 ="insert into userinfo(uname,uoname,gender,email,city) values ('".$uname."','".$uoname."','".$gender."','".$email."','".$myCity."')";
		//执行SQL插入语句2
		$result2=$conn->query($sql2);
		if($result2){
			echo ("插入userinfo成功<br>");
		}else{
			echo ("插入userinfo失败<br>");
		}
		echo ("已为您登陆！");
		}
	//关闭数据库
	mysqli_close($conn);
	echo ("<a href=\"javascript:;\">查看详情</a>");
	echo "<script> location.reload([bForceGet]); </script>";
	 ?>
    </fieldset>
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
