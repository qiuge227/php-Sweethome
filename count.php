<html> 
<head> 
<title>��ˢ���ı�������</title> 
</head> 
<body> 
<?php
  
//��ˢ�¼����� 
session_start();  

$allow_sep = "1";  //��������ˢ�µ�ʱ��������λΪ��

$file = "counter.txt"; 
if(file_exists($file))
	$fp = fopen($file , "r");  //��������ļ����ڣ�����ֻ����ʽ���ļ�
else
	$fp = fopen($file , "w"); //��������ļ������ڣ�����д�뷽ʽ�����ļ����˴�������Ϊw,w+,a,a+
	
if ($fp == false)
{   //�����ܴ򿪾���ʾʧ����Ϣ�����˳����� 
	printf ("���ļ�%s ʧ��!",$file);  
	exit;
}  

fclose ($fp);

//���Դ򿪼����ļ�

if(isset($_SESSION["post_sep"]))  // ����Ѿ���sessionֵ����¼�����ϴδ򿪻�ˢ��ҳ���ʱ��
{ 
	if(time() - $_SESSION["post_sep"] < $allow_sep)  // ��ȡ��ǰʱ���ȥ�ϴδ�ҳ��ʱ�䣬������С����������������ʾˢ��̫Ƶ��
	{  	
	  exit("�벻Ҫ����ˢ��");  //��die�����ı����������÷���ͬ���������һ����Ϣ�����˳���ǰ�ű�
     }  
	else
	{  
	  $_SESSION["post_sep"]=time();  //���ˢ�¼������Ҫ����session���ϴδ�ʱ���Ϊ��ǰʱ��
	}  

}  
else //���δ����sessionֵ������һ�δ򿪱���վҳ�棬ֻ����������ű�ʾһ���µĻỰ������������Ҫ��һ������
{   
	$_SESSION["post_sep"]=time();  //��ʼһ���»Ự������session��������sessionֵ����Ϊ��ǰʱ��	
	$fp = fopen($file , "r"); //ֻ����ʽ�򿪼����ļ�
	$num=fgets($fp);
	
	if ($num=="") // �����ȡ�����ļ�counter.txtΪ�գ����ʼ��������������һ��д������ļ�
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

 //��ʾ����
$fp = fopen($file, "r"); //��ֻ��ģʽ���ļ�	
while (!feof($fp)) 
	{ 	
	 $current_number = fgets($fp,9);   
	}
 
echo ("<font color=red><b>".$current_number."</b></font>"); 

?> 
</body> 
</html>