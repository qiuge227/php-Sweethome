<html>
<head>
<title>����������Ϣ</title>
</head>
<body>
<?PHP
   date_default_timezone_set('Asia/Chongqing'); //ϵͳʱ���8Сʱ����
	include('connect.php');
	//$objContent = new Content();
	// �Ӳ�������н������ݵ�������
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
	//������Ϣ��Ϊ��
	if($content!=null&&$title!=null){
	$sql = "INSERT INTO 
	message (title, content, orginal, upper, poster, ip, creatTime, uemail, uspace, avatar)
	 VALUES
	 ('" . $title. "', '" .$content. "', '" . $orginal. "','" .$upper. "', '" . $poster . "', '" . $ip . "', '" . $creattime  . "', '" .$uemail . "', '" .$uspace. "', '" . $avatar . "')";
	
			$result = $conn->query($sql);
	if($result!=null){
		echo("<h2>��Ϣ�ѳɹ����棡</h2>");
	}else{
		echo("<h2>��Ϣ����ʧ�ܣ�</h2>");
	}
	}else{
		echo("<h2>��Ϣ��Ч�����Բ���Ϊ�գ�</h2>");
	}
	mysqli_close($conn);
?>
</body>
<Script language="javascript">
  //�򿪴˽ű�����ҳ����ˢ��
  opener.location.reload();
  //ͣ��800�����رմ���
  setTimeout("window.close()",2800);
</Script>
</html>