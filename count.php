<html> 
<head> 
<title>防刷新文本计数器</title> 
</head> 
<body> 
<?php
  
//防刷新计数器 
session_start();  

$allow_sep = "1";  //设置允许刷新的时间间隔，单位为秒

$file = "counter.txt"; 
if(file_exists($file))
	$fp = fopen($file , "r");  //如果计数文件存在，则以只读方式打开文件
else
	$fp = fopen($file , "w"); //如果计数文件不存在，则以写入方式生成文件。此处参数可为w,w+,a,a+
	
if ($fp == false)
{   //若不能打开就提示失败信息，并退出程序 
	printf ("打开文件%s 失败!",$file);  
	exit;
}  

fclose ($fp);

//可以打开计数文件

if(isset($_SESSION["post_sep"]))  // 如果已经有session值，记录的是上次打开或刷新页面的时间
{ 
	if(time() - $_SESSION["post_sep"] < $allow_sep)  // 获取当前时间减去上次打开页面时间，如果间隔小于设置允许间隔，提示刷新太频繁
	{  	
	  exit("请不要反复刷新");  //是die函数的别名，两者用法相同，都是输出一条消息，并退出当前脚本
     }  
	else
	{  
	  $_SESSION["post_sep"]=time();  //如果刷新间隔符合要求，则将session的上次打开时间记为当前时间
	}  

}  
else //如果未设置session值，即第一次打开本网站页面，只有这种情况才表示一次新的会话，计数器才需要加一并更新
{   
	$_SESSION["post_sep"]=time();  //开始一次新会话，设置session变量，将session值设置为当前时间	
	$fp = fopen($file , "r"); //只读方式打开计数文件
	$num=fgets($fp);
	
	if ($num=="") // 如果读取计数文件counter.txt为空，则初始化计数器，并加一后写入计数文件
	{
		$count=0;
		$count=$count+1;
		fclose ($fp); 
		$fp = fopen($file , "w");
		fwrite ($fp,$count);
		fclose ($fp);
	}
	else
	{		 	
		$count =$num + 1;  			
		fclose ($fp);   	
		$fp = fopen($file , "w"); 
		fwrite ($fp,$count); 
		fclose ($fp); 	
	}
}  

 //显示代码
$fp = fopen($file, "r"); //以只读模式打开文件	
while (!feof($fp)) 
	{ 	
	 $current_number = fgets($fp,9);   
	}
 
echo ("<font color=red><b>".$current_number."</b></font>"); 

?> 
</body> 
</html>