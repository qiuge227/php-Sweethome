<!DOCTYPE HTML>
<html>
<head>
<title>用户注册</title>
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
	      
	   <form  action="show.php" method="post" name="f2">
       	 <fieldset>
       	   <legend>基本信息:</legend>
       	   <label for="username"><b>个人账户：</b></label>
       	   <input name="username" type="text" id="username" onblur="regchkusername()"/>
       	   <a style="color:red">*</a>
           <span id="err_username">  （用户名不少于6位且不超过15个字符）</span>
       	   <br />
       	   <label for="userpsw"><b>个人密码：</b></label>
       	   <input name="userpsw" type="password" id="userpsw" onblur="chkpwd()"/>
       	   <a style="color:red">*</a>
           <span id="err_pwd">（密码不少于6位且不超过15位）</span>
       	   <br />
       	   <label for="userrepsw"><b>重输密码：</b></label>
       	   <input name="userrepsw" type="password" id="userrepsw" onblur="chkrepwd()"/>
       	   <a style="color:red">*</a>
           <span id="err_repwd">（请再次输入密码！）</span>

   	     </fieldset>
         <fieldset>
           <legend><b>个人信息：</b></legend>
            <label for="othername"><b>账户别名：</b></label>
         	<input name="othername" type="text" id="othername"/>
         	<br />
            <fieldset>
         		<legend><b>性别：</b></legend>
            	<b>男</b>
         		<input name="gender" type="radio" id="gender" checked="checked" value="男" border="clear" width="5px"/>
            	<b>女</b>
         		<input name="gender" type="radio" id="gender" value="女"/>
            </fieldset>
         	<br />
         	<label for="email"><b>电子邮箱：</b></label>
         	<input name="email" type="text" id="email" value="请输入真实的邮箱" onFocus="cleartext()" onblur="chkemail()">
            <a style="color:red">*</a>
            <br />
            <label for="city"><b>城市：</b></label>
            <select name="city" id="city">
              <option value="Beijing" selected="selected">北京</option>
              <option value="Heinan">河南</option>
              <option value="Hebei">河北</option>
            </select>
            <br />
         </fieldset>
       	 	
            
        	<input name="reset" type="reset" value="重置" id="reset" />
        	<input name="regNow" type="submit" value="确定" id="regNow" onkeydown="chkf2()"/>
        </form>
        
        
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
