<?php
/**
* by www.phpddt.com
*/
header("content-type:text/html;charset=utf-8");
ini_set("magic_quotes_runtime",0);
require 'class.phpmailer.php';



try {
	$mail = new PHPMailer(true); 
	$mail->IsSMTP();
	$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
	$mail->SMTPAuth   = true;                  //开启认证
	$mail->Port       = 25;                    
	$mail->Host       = "smtp.163.com"; 
	$mail->Username   = "leqo@163.com";  //发送邮箱  
	$mail->Password   = "aa75195124";  //发送邮箱密码
	//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could  not execute: /var/qmail/bin/sendmail ”的错误提示
	$mail->AddReplyTo("leqo@163.com","mckee");//回复地址
	$mail->From       = "leqo@163.com";
	$mail->FromName   = "www.pindie.cn";
	$to = "75195124@qq.com";//收件箱
	$mail->AddAddress($to);
	$mail->Subject  = "申请试用";
	$mail->Body = "手机号码：".$_POST['t1'];
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
	$mail->WordWrap   = 80; // 设置每行字符串的长度
	//$mail->AddAttachment("f:/test.png");  //可以添加附件
	$mail->IsHTML(true); 
	$mail->Send();
	echo "<script>alert('已发送到站长邮箱！等待回复！');location.href='index.html';</script>";
} catch (phpmailerException $e) {
	echo "邮件发送失败：".$e->errorMessage();
}
?>