<!DOCTYPE HTML>
<html>
<head>
<title>��������վ</title>
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
  <!--���԰��б�-->
<?php 
//window.parent.focus_querywindow
	include"connect.php";
	//SQL��ѯ���������������
	$sqlcount = "SELECT COUNT(1) FROM message where orginal = '0'";
	//ִ��SQL
	$rCount=$conn->query($sqlcount);
	//ÿҳ���Ե�����
	$pageSize = 5;
	//���Է�ҳ��ǰҳ
	$pageIndex = $_GET["page"];
	//����
	session_start();
	//�趨session
	$uname=$_SESSION["uname"];
	//������
	if($uname==null){
		$uname="��������";
	}
?>
<div align="right">
	<span  style="border: 1px solid #f66; border-radius: 20px; padding:5px">
<?php 
	echo("<a  href=\"newRec.php?orginal=0&Upper=0&poster=".$uname."\" target=_blank onclick=\"return javascript:document.body.newwin(this.href)\"  style=\"text-decoration: none;color:#fff\" >����������</a>");
?>
	</span>
</div>
<?php 
	//�������ݻ�ü�¼����
	$row = $rCount->fetch_row();
	//��ֵ����¼��������
	$resultCount = $row[0];
	//echo($resultCount[0]);
	if($resultCount<=0){
		echo("<span style=\"border: 3px solid #f66; border-radius: 10px; padding:5px\">û�����ԣ�������</span>");
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
		/*ȡ�����е�ԭʼ����*/
		$sql = "SELECT * FROM `message` WHERE orginal = '0' ORDER BY creatTime DESC LIMIT ".(($pageIndex-1)*$pageSize).",".$pageSize;
		$result=$conn->query($sql);
		
		//echo(count($result));
		echo("<dl>");
		$i=0;
		$secret="";
		$feedBack="";
		$recontext="";
		while($resultrow = $result->fetch_row()){
		/*�г�����*/
		if($uname=="Admins"){//�����û���֤
			$secret= "<a class='hidden' href=\"deleteRec.php?ContId=".$resultrow[0]."\" target=_blank\" >[ɾ��]</a>";
			$feedBack="<a  class='hidden' href=\"newRec.php?orginal= 1 &Upper=".$resultrow[0]."&poster=".$uname."\" target=_blank onclick=\"return javascript:document.body.newwin(this.href)\" >[�ظ�]</a>";
		}
		//��ѯ�ظ�
		$sqlChild = "SELECT * FROM `message` WHERE orginal = '1'AND upper = '".$resultrow[0]."' AND poster ='Admins' ORDER BY creatTime DESC LIMIT ".(($pageIndex-1)*$pageSize).",".$pageSize;
		$resultChild=$conn->query($sqlChild);
		$reChild = $resultChild->fetch_row();
		
		if($reChild[2]!=""&&$reChild[2]!=null){
			$recontext = "\n<dt style='margin-left:20px;'>[Admins�ظ���]</dt><dd  class='con' style='margin-left:20px;'>\n".$reChild[2]."</dd>";
		}
			echo("<dt><a class='title' href=\"#Section".$i."\">[���⣺".$resultrow[1]."]</a><br>[�����ˣ�".$resultrow[5]."]----[IP:".$resultrow[6]."]<span>".$secret."</span><span>".$feedBack."</span></dt>");
			echo("<dd class='con' id=\"Section".$i."\">");
				echo("<p readOnly=\"true\">".$resultrow[2].$recontext."</p>");
			echo("</dd>");
		$i++;
		}
		echo("</dl>");
		/*��ҳ*/
function ShowPage( $pageCounts, $pageNo )  {
	echo("<ul id=\"nav\">");
  
	// ��ʾ��һҳ�������ǰҳ���ǵ�һҳ������������
	if($pageNo>1)
		echo(" <li><A HREF=message.php?page=1>��1ҳ</A>&nbsp;&nbsp;</li>");
	else
		echo("<li style=\"clear\">��1ҳ&nbsp;&nbsp;</li>");
	// ��ʾ��һҳ�������������һҳ������������
	if($pageNo>1)
		echo("<li><A HREF=message.php?page=" . ($pageNo-1) . ">��һҳ</A>&nbsp;&nbsp;</li>");
	else
		echo("<li style=\"clear\">��һҳ&nbsp;&nbsp;</li>");
	// ��ʾ��һҳ�������������һҳ������������
	if($pageNo<>$pageCounts)
	    echo("<li><A HREF=message.php?page=" . ($pageNo+1) . ">��һҳ</A>&nbsp;&nbsp;<li>");
	else
		echo("<li style=\"clear\">��һҳ&nbsp;&nbsp;</li>");
	// ��ʾ���һҳ�������ǰҳ�������һҳ������������
	if($pageNo <> $pageCounts)
	    echo("<li><A HREF=message.php?page=" . $pageCounts . ">���1ҳ</A>&nbsp;&nbsp;<li>");
	else
		echo("<li style=\"clear\">���1ҳ&nbsp;&nbsp;</li>");

	// ���ҳ��
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
