<?php
	header("Content-type: text/html; charset=utf-8"); 
    $txt = $_POST['txt'];
	include_once("smtp.class.php");
	$smtpserver = "smtp.163.com";              //SMTP服务器
    $smtpserverport = 25;                                   //SMTP服务器端口
    $smtpusermail = "lljj201010@163.com";          //SMTP服务器的用户邮箱
    $smtpuser = "lljj201010@163.com";                //SMTP服务器的用户帐号
    $smtppass = "";                          //SMTP服务器的用户密码
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $emailtype = "text";                                    //信件类型，文本:text；网页：HTML
    $smtpemailto = "";                  // 设置接收的邮箱
    $smtpemailfrom = $smtpusermail;
    $emailsubject = "接受反馈信息";    // 标题
    $emailbody = "存在的问题：".$txt;
    @$rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
	header("refresh:5;url=http://www.nexty.cn/email/index.html");
	print('发送成功，感谢您的宝贵意见！<br>请稍等...5秒后自动跳转~~~');

