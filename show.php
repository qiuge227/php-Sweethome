<!DOCTYPE HTML>
<html>
<head>
<title>�û���Ϣ</title>
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
  
  
<div id="main">
  
  <div class="bottom-bg"> 
		   <div class="wrap">
			  <div class="bottom-cont">
    <fieldset>
      <legend><b>������Ϣ��</b></legend>
      ������д����Ϣ���£�<br/>
      <br/>
      <?php
	  //������ʼ��
	  $uname="";
	  $upsw="";
	  $uoname="";
	  $gender="";
	  $email="";
	  $uname=$_POST['username'];
	  
	   //�������ݿ�
	include "connect.php";
	//SQL�������1
	$sql ="select * from userbased where uname='".$uname."'";
	
	//ִ��SQL�������1
	$result1=$conn->query($sql);
	//if($result1==null){
			   //���ύmethodʹ��post
		if ($_POST['regNow']) {
		//�û���
	  	echo ("�û���:". $_POST['username']."<br>");
	 	 $uname=$_POST['username'];
	  //����
	  	echo ("����: ". $_POST['userpsw']."<br>");
	  	$upsw=$_POST['userpsw'];
	   //����
	   echo ("����: ". $_POST['othername']."<br>");
	   $uoname=$_POST['othername'];
	   //�Ա�
	  	echo ("�Ա�:". $_POST['gender']."<br>");
	  	$gender=$_POST['gender'];
	  //����
	 	 echo("��������:".$_POST['email']."<br>");
	  	$email=$_POST['email'];
	  
	  //����
	  	$myCity='sss';
	  	if($_POST['city']=='BeiJing')
	  		$myCity='����';
	  	else if($_POST['city']=='Hebei')
	  		$myCity='�ӱ�';
	  	else if($_POST['city']=='Henan')
	  		$myCity='����';
	  	else if($_POST['city']=='Guangzhou')
	  		$myCity='����';
	  	else if($_POST['city']=='Shanghai')
	  		$myCity='�Ϻ�';
	  	else
	  		$myCity='����';
	 	echo ("���У�:".$myCity."<br>");
		//SQL�������1
		$sql1 ="insert into userbased(uname,upsw) values ('".$uname."','".$upsw."')";
	
		//ִ��SQL�������1
		$result1=$conn->query($sql1);
		if($result1){
			echo ("����userbase�ɹ�<br>");
		}else{
			echo ("����userbaseʧ��<br>");
		}
		//SQL�������2
		$sql2 ="insert into userinfo(uname,uoname,gender,email,city) values ('".$uname."','".$uoname."','".$gender."','".$email."','".$myCity."')";
		//ִ��SQL�������2
		$result2=$conn->query($sql2);
		if($result2){
			echo ("����userinfo�ɹ�<br>");
		}else{
			echo ("����userinfoʧ��<br>");
		}
		echo ("��Ϊ����½��");
		}
	//�ر����ݿ�
	mysqli_close($conn);
	echo ("<a href=\"javascript:;\">�鿴����</a>");
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
    
</body>
</html>
