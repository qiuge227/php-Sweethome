// JavaScript Document
function reloop()
{
 var time = new Date( ); //获得当前时间
 //获得年、月、日，Date()函数中的月份是从0－11计算
 var year = time.getYear();  
 var month = time.getMonth()+1;
 var date = time.getDate();
 var op;
 //获得小时、分钟、秒
 var hour = time.getHours();  
 var minute = time.getMinutes();
 var second = time.getSeconds();
 //获得一个星期中的第几天,西方的星期是从星期日开始，星期六结束
 var day = time.getDay();
 if (minute < 10) //如果分钟只有1位，补0显示
   minute="0"+minute;
 if (second < 10) //如果秒数只有1位，补0显示
   second="0"+second; 
	
 var apm="AM"; //默认显示上午: AM
 if (hour>12) //按12小时制显示
 {
    hour=hour-12;
    apm="PM"  ;
 }
 var weekday = 0;
 switch(time.getDay())
	{
	  case 0:
		weekday = "星期日";
	  break;
	  case 1:
		weekday = "星期一";
	  break;
	  case 2:
		weekday = "星期二";
	  break;
	  case 3:
		weekday = "星期三";
	  break;
	  case 4:
		weekday = "星期四";
	  break;
	  case 5:
		weekday = "星期五";
	  break;
	  case 6:
		weekday = "星期六";
	  break;
 	}
 op="欢迎您,今天是:"+year+"年"+month+"月"+date+"日"+weekday+":"+hour+":"+minute+":"+second+apm;
 document.getElementById("t").value=op;
 setTimeout("reloop()",1000);//定时刷新
}

function indexpage(){
	var s = document.URL;	
	var b =s.substr(s.lastIndexOf("/")+1); 
	var a=b.substr(0,b.lastIndexOf(".")); 
	//alert(a);
	var a1 =new Array("index","baike","media","others","history","documents","message");
	for(var i=0;i<a1.length;i++){
		if(a==a1[i])
		{
			//alert(a);
			document.getElementById(a).style.backgroundColor="#F66";
			document.getElementById(a).style.color="white";
		}
			
	}
}

function unnonull(){
	var s1 = document.f1.username.value;
	if(s1==""){
		alert("用户名不可为空！！");
		return false;
	}
	return true;
}


function psnonull(){
	var s2 = document.f1.psw.value;
	if(s2==""){
		alert("密码不可为空！！");
		return false;
	}else if(s2.length<6){
		alert("密码最少长度为6");
		return false;
	}
	return true;
}

function chef1user(){
	if(unnonull()&&psnonull()){
		document.f1.submit();
	}else{
		var s = confirm("密码或账户名为空！请重新输入");
		if(s==true){
			document.f1.username.value="";
			document.f1.psw.value="";
		}
	}
}

// 初始化，打开网页窗口是光标在用户名的文本框闪烁
function ini()
{
	f1.username.focus();
}

//检验用户名填写长度
function chkusername()
{
	
	var username=f.username.value;
	if (username.length==0)
	{
		document.getElementById("err_username").innerHTML="用户名不能为空！";
		document.getElementById("err_username").style.color="red";
		f1.username.focus();
		return false;}
	else if (username.length>15 || username.length<6)
	{
		document.getElementById("err_username").innerHTML="用户名过短或过长！";
 		document.getElementById("err_username").style.color="red";
 		return false;
	}
	document.getElementById("err_username").innerHTML="";
	return true;
}

//检验用户名填写长度
function regchkusername()
{
	var username=document.f2.username.value;
	if (username.length==0)
	{
		document.getElementById("err_username").innerHTML="用户名不能为空！";
		document.getElementById("err_username").style.color="red";
		document.f2.username.focus();
		return false;
	}
	else if (username.length>15 || username.length<6)
	{
		document.getElementById("err_username").innerHTML="用户名过短或过长！";
		document.getElementById("err_username").style.color="red";
 		return false;
	}
	document.getElementById("err_username").innerHTML="用户名格式符合要求";
	document.getElementById("err_username").style.color="green";
	return true;
}
//检验密码长度
function chkpwd()
{
var pwd=f2.userpsw.value;
	if (pwd.length==0)
	{
		document.getElementById("err_pwd").innerHTML="密码不能为空！";
		document.getElementById("err_pwd").style.color="red";
		return false;
	}
	else if (pwd.length>15 || pwd.length<6)
	{
		document.getElementById("err_pwd").innerHTML="密码过短或过长！";
 		document.getElementById("err_pwd").style.color="red";
		return false;
	}
	document.getElementById("err_pwd").innerHTML="密码格式符合要求";
	document.getElementById("err_pwd").style.color="green";
	return true;
}

//检验两次密码是否一致
function chkrepwd()
{
	var pwd=f2.userpsw.value;
	var repwd=f2.userrepsw.value;
	if (pwd!=repwd&&pwd!="")
	{
		document.getElementById("err_pwd").innerHTML="密码长度不少于6位";
		document.getElementById("err_repwd").innerHTML="两次密码输入不一致，请重新输入！";
		document.getElementById("err_repwd").style.color="red";
		f2.userpsw.value="";
		f2.userrepsw.value="";
		f2.userpsw.focus();
		return false;
	}
	if(repwd==""){
		document.getElementById("err_repwd").innerHTML="二次验证不可为空！";
 		document.getElementById("err_repwd").style.color="red";
		return false;
	}
	document.getElementById("err_repwd").innerHTML="密码格式符合要求";
	document.getElementById("err_repwd").style.color="green";
return true;
}

//文本框获取光标的时候消除原本里面的提示文字
function cleartext()
{
	f2.email.value="";
}

//检验邮箱地址是否合法
function chkemail()
{
	var email=f2.email.value;
	if(email=="")
	{
		alert("邮箱不能为空！");
		return false;
	}
	if (email.indexOf("@",0)==-1)
	{
		alert ("邮箱地址不正确！\n 必须包含\" @ \"符号！");
		return false;
	}
	if (email.indexOf(".",0)==-1)
	{
		alert ("邮箱地址不正确！\n 必须包含 \" . \" 符号！");
		return false;
	}
	if (email.search (/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) 
/*^是匹配的字符开头,
\w匹配的是字母,数字,下划线,汉字,
+是匹配一次或多次(就是最少一次),
\.是匹配的 . (因为.在正则中匹配除换行符以外的任意字符),所以如果需要.在字符串中出现的话就加一个\ ,这个是转义符
*匹配的是重复零次或更多次
@是匹配字符串中必须出现的字符
$是字符串结尾 */
	{
		alert("不是合法的邮箱地址！");
		return false; 
	}
	return true;
}

//点击提交按钮的时候检验各必填项是否都填写正确并获取填写项内容并输出，之后提交注册表单
function validatef1()
{
	var username=f2.username.value;
	var pwd=f2.userpsw.value;
	var email=f2.email.value;
	if(chkusername() && chkrepwd() && chkemail()) 
	{ 
	alert("您填写的内容如下：\n用户名：" + username +" \n密码：" + pwd +" \n邮箱：" + email); 
        return true;
	}
 	else
        return false;  
}

//点击"立即注册"图片的时候检验各必填项是否都填写正确并获取填写项内容并输出，之后提交注册表单
function chkf2()
{
	var username=f2.username.value;
	var pwd=f2.userpsw.value;
	var email=f2.email.value;
	if(chkusername() && chkpwd() && chkrepwd() && chkemail()) 
	{ 
		alert("您填写的内容如下：\n用户名：" + username +" \n密码：" + pwd +" \n邮箱：" + email); 
		document.f2.submit();
	}
	else
        return false;    
}

