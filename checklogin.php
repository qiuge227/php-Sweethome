<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>接收用户信息并设置cookie</title>
</head>

<body>
<?php
include"connect.php";

//服务器获取用户填写的用户名和密码
$UID=$_POST["username"];
$PWD=$_POST["psw"];

	
/**
，获得登录者的密码进行验证
此处需与数据库结合
*/
$sql = "select upsw from userbased where uname = '".$UID."'";
$result=$conn->query($sql);
$row;
//用预设账号信息验证
//密码存在
/*if ($result!=null&&$result!="")
{*/
$row = $result->fetch_row();

if ($row[0]==$PWD)
{
	//启动session记录
	session_start();
	//设定session
	$_SESSION["uname"]=$UID;
	echo("您已经登陆成功，欢迎光临： ". $UID."<br />");
	//是否设定cookies
	if (array_key_exists('setcookie',$_POST))
	{
		//获取开启标记
		$cookie=$_POST['setcookie'];
		if($cookie=="on")
		{
			setcookie("username",$UID, time()+24*60*60);
			setcookie("psw",$PWD, time()+24*60*60);
			echo ("您的cookie过期时间是一天以后");
		}
		/*if($cookie=="30")
		{
			setcookie("username",$UID, time()+30*24*60*60);
			setcookie("pwd",$PWD, time()+30*24*60*60);
			echo ("您的cookie过期时间是一个月以后");
		}
			if($cookie=="90")
		{
			setcookie("username",$UID, time()+90*24*60*60);
			setcookie("pwd",$PWD, time()+90*24*60*60);
			echo ("您的cookie过期时间是三个月以后");
		}
			if($cookie=="365")
		{
			setcookie("username",$UID, time()+365*24*60*60);
			setcookie("pwd",$PWD, time()+365*24*60*60);
			echo ("您的cookie过期时间是一年以后");
		}*/
	}
	echo "<script> location.href='index.php'; </script>";
}else
{
	echo("登陆失败，请返回重新登陆。");
	echo "<script> location.href='index.php'; </script>";
}
?>

<Script language="javascript">

  //停留800毫秒后关闭窗口
  setTimeout("window.close()",2800);
</Script>
<?php
  //打开此脚本的网页将跳转首页
echo "<script> location.href='index.php'; </script>";
mysqli_close($conn);
?>

</body>
</html>