<html>
<head>
<title>删除用户信息</title>
</head>
<body>
<?PHP

	session_start();
	$name=$_SESSION["uname"];
	if($name=="Admins"){
		include('connect.php');
		$ContId = $_GET["ContId"];	// 获取要删除的留言记录编号
		
		$sql = "DELETE FROM message WHERE _id = '".$ContId."'" ;
				$result = $conn->query($sql);
		echo($sql);
		if($result!=null){
			echo("<br><h2>信息已成功删除！</h2><br>");
		}else{
			echo("<br><h2>信息删除失败！</h2><br>");
		}
		mysqli_close($conn);
	}else{
		echo("<br>无权限删除帖子！！<br>");
	}

?>
<Script Language="JavaScript">
  //打开此脚本的网页将被刷新
  opener.location.reload();
  //停留800毫秒后关闭窗口
  setTimeout("window.close()",800);
</Script>
</body>
</html>