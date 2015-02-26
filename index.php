<!DOCTYPE HTML>
<html>
<head>
<title>芬香家园</title>
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

<div class="wrap">
	<div class="logo">
      <a href="index.html"><img src="images/logo.png"/></a>
    </div>
	<div class="grid">
        <p>芬香家园就是一个在线分享干货的平台，页面简单。</p>
	</div>	        
	  <div class="clear"></div>
	  </div>
	 <!-- start slider -->
	<div class="slider">
		<div class="fluid_container">
        <div class="camera_wrap camera_magenta_skin" id="camera_wrap_2">
            <div data-src="http://227.s21i-3.faidns.com/3861227/2/ABUIABACGAAgkoGsogUokKLB4gcwgA84sAk.jpg">
                <div class="camera_caption fadeFromBottom">
                	<p><a href="index.html">主题</a></p>
                    <h2>我们都是好朋友，零度coder。</h2>
                </div>
            </div>
            <div data-src="http://227.s21i-3.faidns.com/3861227/2/ABUIABACGAAgtYGsogUo5N6dhwYwgA84sAk.jpg">
                <div class="camera_caption fadeFromBottom">
                	<p><a href="index.html">主题</a></p>
                   <h2>我们都是好朋友，零度coder。</h2>
                </div>
            </div>
            <div data-src="http://227.s21i-3.faidns.com/3861227/2/ABUIABACGAAg34GsogUoh-jG9AMwgA84sAk.jpg">
                <div class="camera_caption fadeFromBottom">
                	<p><a href="index.html">主题</a></p>
                    <h2>我们都是好朋友，零度coder。</h2>
                </div>
            </div>
        </div><!-- #camera_wrap_2 -->
    </div><!-- .fluid_container -->
    <div class="clear"></div>
	</div>
 	   <!--start-grids-->
	 	  <div class="top-bg">
	 	  <div class="wrap">
		 	  <div class="top-cont">
		         <div class="f_nav1">
						<ul>
							<li><p><i class="icon1"> </i><span>10 月 23 日</span><p></li>
							<li ><a href="#"> <i class="icon2"> </i> <span>上一篇</span></a></li>
					  		<li ><a href="#"> <i class="icon3"> </i><span>下一篇</span></a></li>
						</ul>
						<div class="clear"></div>
				   </div>  
		          <h2>芬香家园网站正式启动</h2>   		
		          <p>芬香家园主要是为了摆脱wordpress的笨重的博客开发，希望利用做少的代码去整合更多的资源。开发出轻量级的博客性分享网站。我们都是在这样的路上一点一点的摸索与进步。</p>
			      <h6><a href="#">阅读更多新闻</a></h6>
			  </div>
	   </div>
	  </div>
	   <div class="middle-bg">	
	   <div class="wrap">  
		   <div class="top-cont1">
		         <div class="f_nav1">
						<ul>
							<li><p><i class="icon1"> </i><span>10 月 23 日</span><p></li>
							<li ><a href="#"> <i class="icon2"> </i> <span>上一篇</span></a></li>
					  		<li ><a href="#"> <i class="icon3"> </i><span>下一篇</span></a></li>
						</ul>
						<div class="clear"></div>
				   </div> 
		          <h2>芬香家园最全干货分享</h2>    		
		          <p>芬香家园主要是为了摆脱wordpress的笨重的博客开发，希望利用做少的代码去整合更多的资源。开发出轻量级的博客性分享网站。我们都是在这样的路上一点一点的摸索与进步。</p>
			      <h6><a href="#">阅读更多干货</a></h6>
			  </div>
	   </div>
 </div>	
	   <div class="bottom-bg"> 
		   <div class="wrap">
			  <div class="bottom-cont">
	      
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
    

	<script src="js/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.mobile.customized.min.js"></script>
    <script type='text/javascript' src="js/jquery.easing.1.3.js"></script> 
    <script type='text/javascript' src="js/camera.min.js"></script> 
    <script>
		jQuery(function(){

			jQuery('#camera_wrap_2').camera({
				loader: 'bar',
				pagination: false,
				thumbnails: true
			});
		});
	</script>
<!-- end slider -->

</body>
</html>
