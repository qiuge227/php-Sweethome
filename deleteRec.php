<html>
<head>
<title>ɾ���û���Ϣ</title>
</head>
<body>
<?PHP

	session_start();
	$name=$_SESSION["uname"];
	if($name=="Admins"){
		include('connect.php');
		$ContId = $_GET["ContId"];	// ��ȡҪɾ�������Լ�¼���
		
		$sql = "DELETE FROM message WHERE _id = '".$ContId."'" ;
				$result = $conn->query($sql);
		echo($sql);
		if($result!=null){
			echo("<br><h2>��Ϣ�ѳɹ�ɾ����</h2><br>");
		}else{
			echo("<br><h2>��Ϣɾ��ʧ�ܣ�</h2><br>");
		}
		mysqli_close($conn);
	}else{
		echo("<br>��Ȩ��ɾ�����ӣ���<br>");
	}

?>
<Script Language="JavaScript">
  //�򿪴˽ű�����ҳ����ˢ��
  opener.location.reload();
  //ͣ��800�����رմ���
  setTimeout("window.close()",800);
</Script>
</body>
</html>