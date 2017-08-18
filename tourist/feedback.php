<?php

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

echo $message;
$headers = "From: $email\r\nReply-to: $email\r\nMessage: $message\r\nContent-type: text/html; charset=utf-8\r\n";
$msg = "Собщение отправил(а) ".$_POST['name']."Текст собщения:".$_POST['message']."Вопрос с сайта:Petshoparm.tk";

ini_set("SMTP","localhost");
   ini_set("smtp_port","25");
   ini_set("sendmail_from","00000@gmail.com");
   ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");

if(mail("makaryanruben97@gmail.com",$headers,$msg,$message)){
		echo "Собщение отправлено";
	}else{
		echo "Собщение не отправлено";
	}

?>