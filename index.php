<!DOCTYPE HTML>
<html>
<head>
<title>�����԰</title>
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
          �����԰��ӭ����    
 �����ǣ�&nbsp;
    <script language="javascript"> 
<!--
var today = new Date();    
/*myDate.getYear();        //��ȡ��ǰ���(2λ)    
myDate.getFullYear();    //��ȡ���������(4λ,1970-????)    
myDate.getMonth();       //��ȡ��ǰ�·�(0-11,0����1��)    
myDate.getDate();        //��ȡ��ǰ��(1-31)  */  
var enabled = 0;
var day; var date;
if(today.getDay()==0) day = "������"
if(today.getDay()==1) day = "����һ"
if(today.getDay()==2) day = "���ڶ�"
if(today.getDay()==3) day = "������"
if(today.getDay()==4) day = "������"
if(today.getDay()==5) day = "������"
if(today.getDay()==6) day = "������"
date = (today.getFullYear()) + "��" + (today.getMonth() + 1 ) + "��" + today.getDate() + "��  " + "&nbsp;"+day +"";
document.write(date);
// -->
</script>
</div>
		<div class="nav">
				<ul>
						<li  class="a"><a  class="active" href="./index.php">�����԰</a></li>
      					<li ><a href="./baike.php">������Դվ</a></li>
      					<li ><a href="./baike.php">��������վ</a></li>
      					<li ><a href="./message.php?page=1">��������վ</a></li>
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
        <input type="checkbox" name="setcookie" value="on" />�����¼��Ϣ 
        <input name="login" id="login" value="��¼" type="button" onclick="chef1user()"/>
        <a class="button" href="regpage.php">ע��</a>
      </form>
      <?php
      }
	  else
	  {
			echo "<h2 style='color:#fff;padding:5px;'>��ӭ��Ա��". $_SESSION["uname"] ."<a href='logout.php' style='color:#000;'> ע��</a></h2>";
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
        <p>�����԰����һ�����߷���ɻ���ƽ̨��ҳ��򵥡�</p>
	</div>	        
	  <div class="clear"></div>
	  </div>
	 <!-- start slider -->
	<div class="slider">
		<div class="fluid_container">
        <div class="camera_wrap camera_magenta_skin" id="camera_wrap_2">
            <div data-src="http://227.s21i-3.faidns.com/3861227/2/ABUIABACGAAgkoGsogUokKLB4gcwgA84sAk.jpg">
                <div class="camera_caption fadeFromBottom">
                	<p><a href="index.html">����</a></p>
                    <h2>���Ƕ��Ǻ����ѣ����coder��</h2>
                </div>
            </div>
            <div data-src="http://227.s21i-3.faidns.com/3861227/2/ABUIABACGAAgtYGsogUo5N6dhwYwgA84sAk.jpg">
                <div class="camera_caption fadeFromBottom">
                	<p><a href="index.html">����</a></p>
                   <h2>���Ƕ��Ǻ����ѣ����coder��</h2>
                </div>
            </div>
            <div data-src="http://227.s21i-3.faidns.com/3861227/2/ABUIABACGAAg34GsogUoh-jG9AMwgA84sAk.jpg">
                <div class="camera_caption fadeFromBottom">
                	<p><a href="index.html">����</a></p>
                    <h2>���Ƕ��Ǻ����ѣ����coder��</h2>
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
							<li><p><i class="icon1"> </i><span>10 �� 23 ��</span><p></li>
							<li ><a href="#"> <i class="icon2"> </i> <span>��һƪ</span></a></li>
					  		<li ><a href="#"> <i class="icon3"> </i><span>��һƪ</span></a></li>
						</ul>
						<div class="clear"></div>
				   </div>  
		          <h2>�����԰��վ��ʽ����</h2>   		
		          <p>�����԰��Ҫ��Ϊ�˰���wordpress�ı��صĲ��Ϳ�����ϣ���������ٵĴ���ȥ���ϸ������Դ���������������Ĳ����Է�����վ�����Ƕ�����������·��һ��һ��������������</p>
			      <h6><a href="#">�Ķ���������</a></h6>
			  </div>
	   </div>
	  </div>
	   <div class="middle-bg">	
	   <div class="wrap">  
		   <div class="top-cont1">
		         <div class="f_nav1">
						<ul>
							<li><p><i class="icon1"> </i><span>10 �� 23 ��</span><p></li>
							<li ><a href="#"> <i class="icon2"> </i> <span>��һƪ</span></a></li>
					  		<li ><a href="#"> <i class="icon3"> </i><span>��һƪ</span></a></li>
						</ul>
						<div class="clear"></div>
				   </div> 
		          <h2>�����԰��ȫ�ɻ�����</h2>    		
		          <p>�����԰��Ҫ��Ϊ�˰���wordpress�ı��صĲ��Ϳ�����ϣ���������ٵĴ���ȥ���ϸ������Դ���������������Ĳ����Է�����վ�����Ƕ�����������·��һ��һ��������������</p>
			      <h6><a href="#">�Ķ�����ɻ�</a></h6>
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
					<p>����֧�֣� <a href="javascript:;">���Coder</a> �ο�ͳ�ƣ�<a href="javascript:;"><?php
    include"./count.php";
    ?></a>��</p>
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
