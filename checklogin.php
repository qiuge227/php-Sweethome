<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�����û���Ϣ������cookie</title>
</head>

<body>
<?php
include"connect.php";

//��������ȡ�û���д���û���������
$UID=$_POST["username"];
$PWD=$_POST["psw"];

	
/**
����õ�¼�ߵ����������֤
�˴��������ݿ���
*/
$sql = "select upsw from userbased where uname = '".$UID."'";
$result=$conn->query($sql);
$row;
//��Ԥ���˺���Ϣ��֤
//�������
/*if ($result!=null&&$result!="")
{*/
$row = $result->fetch_row();

if ($row[0]==$PWD)
{
	//����session��¼
	session_start();
	//�趨session
	$_SESSION["uname"]=$UID;
	echo("���Ѿ���½�ɹ�����ӭ���٣� ". $UID."<br />");
	//�Ƿ��趨cookies
	if (array_key_exists('setcookie',$_POST))
	{
		//��ȡ�������
		$cookie=$_POST['setcookie'];
		if($cookie=="on")
		{
			setcookie("username",$UID, time()+24*60*60);
			setcookie("psw",$PWD, time()+24*60*60);
			echo ("����cookie����ʱ����һ���Ժ�");
		}
		/*if($cookie=="30")
		{
			setcookie("username",$UID, time()+30*24*60*60);
			setcookie("pwd",$PWD, time()+30*24*60*60);
			echo ("����cookie����ʱ����һ�����Ժ�");
		}
			if($cookie=="90")
		{
			setcookie("username",$UID, time()+90*24*60*60);
			setcookie("pwd",$PWD, time()+90*24*60*60);
			echo ("����cookie����ʱ�����������Ժ�");
		}
			if($cookie=="365")
		{
			setcookie("username",$UID, time()+365*24*60*60);
			setcookie("pwd",$PWD, time()+365*24*60*60);
			echo ("����cookie����ʱ����һ���Ժ�");
		}*/
	}
	echo "<script> location.href='index.php'; </script>";
}else
{
	echo("��½ʧ�ܣ��뷵�����µ�½��");
	echo "<script> location.href='index.php'; </script>";
}
?>

<Script language="javascript">

  //ͣ��800�����رմ���
  setTimeout("window.close()",2800);
</Script>
<?php
  //�򿪴˽ű�����ҳ����ת��ҳ
echo "<script> location.href='index.php'; </script>";
mysqli_close($conn);
?>

</body>
</html>