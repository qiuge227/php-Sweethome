<!DOCTYPE HTML>
<html>
<head>
<title>�û�ע��</title>
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
	      
	   <form  action="show.php" method="post" name="f2">
       	 <fieldset>
       	   <legend>������Ϣ:</legend>
       	   <label for="username"><b>�����˻���</b></label>
       	   <input name="username" type="text" id="username" onblur="regchkusername()"/>
       	   <a style="color:red">*</a>
           <span id="err_username">  ���û���������6λ�Ҳ�����15���ַ���</span>
       	   <br />
       	   <label for="userpsw"><b>�������룺</b></label>
       	   <input name="userpsw" type="password" id="userpsw" onblur="chkpwd()"/>
       	   <a style="color:red">*</a>
           <span id="err_pwd">�����벻����6λ�Ҳ�����15λ��</span>
       	   <br />
       	   <label for="userrepsw"><b>�������룺</b></label>
       	   <input name="userrepsw" type="password" id="userrepsw" onblur="chkrepwd()"/>
       	   <a style="color:red">*</a>
           <span id="err_repwd">�����ٴ��������룡��</span>

   	     </fieldset>
         <fieldset>
           <legend><b>������Ϣ��</b></legend>
            <label for="othername"><b>�˻�������</b></label>
         	<input name="othername" type="text" id="othername"/>
         	<br />
            <fieldset>
         		<legend><b>�Ա�</b></legend>
            	<b>��</b>
         		<input name="gender" type="radio" id="gender" checked="checked" value="��" border="clear" width="5px"/>
            	<b>Ů</b>
         		<input name="gender" type="radio" id="gender" value="Ů"/>
            </fieldset>
         	<br />
         	<label for="email"><b>�������䣺</b></label>
         	<input name="email" type="text" id="email" value="��������ʵ������" onFocus="cleartext()" onblur="chkemail()">
            <a style="color:red">*</a>
            <br />
            <label for="city"><b>���У�</b></label>
            <select name="city" id="city">
              <option value="Beijing" selected="selected">����</option>
              <option value="Heinan">����</option>
              <option value="Hebei">�ӱ�</option>
            </select>
            <br />
         </fieldset>
       	 	
            
        	<input name="reset" type="reset" value="����" id="reset" />
        	<input name="regNow" type="submit" value="ȷ��" id="regNow" onkeydown="chkf2()"/>
        </form>
        
        
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
