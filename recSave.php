<html>
<head>
<title>保存留言信息</title>
</head>
<body>
<?PHP
   date_default_timezone_set('Asia/Chongqing'); //系统时间差8小时问题
	include('connect.php');
	//$objContent = new Content();
	// 从参数或表单中接收数据到变量中
	$orginal = (int)$_POST["orginal"];
	$upper =(int)$_POST["upper"];
	$poster = $_POST["uname"];
	$uemail = $_POST["email"];
	$uspace = $_POST["homepage"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$avatar = (int)$_POST["logo"];
	//ip
	$ip =$_SERVER['REMOTE_ADDR'];
	
	//creattime
	$now = getdate();
	$creattime = $now['year'] . "-" . $now['mon'] . "-" . $now['mday'] 
		. "  " . $now['hours'] . ":" . $now['minutes'] . ":" . $now['seconds'];
	//留言信息不为空
	if($content!=null&&$title!=null){
	$sql = "INSERT INTO 
	message (title, content, orginal, upper, poster, ip, creatTime, uemail, uspace, avatar)
	 VALUES
	 ('" . $title. "', '" .$content. "', '" . $orginal. "','" .$upper. "', '" . $poster . "', '" . $ip . "', '" . $creattime  . "', '" .$uemail . "', '" .$uspace. "', '" . $avatar . "')";
	
			$result = $conn->query($sql);
	if($result!=null){
		echo("<h2>信息已成功保存！</h2>");
	}else{
		echo("<h2>信息保存失败！</h2>");
	}
	}else{
		echo("<h2>信息无效，留言不可为空！</h2>");
	}
	mysqli_close($conn);
?>
</body>
<Script language="javascript">
  //打开此脚本的网页将被刷新
  opener.location.reload();
  //停留800毫秒后关闭窗口
  setTimeout("window.close()",2800);
</Script>
</html>