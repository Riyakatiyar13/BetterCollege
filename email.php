<?php
if(isset($_POST['submit'])){
  $name = $_POST['name']; //getting customer name
  $email = $_POST['email']; //getting customer email
  $message = $_POST['message']; //getting customer message

  $html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Message</td><td>$message</td></tr></table>";

  include('php/smtp/PHPMailerAutoload.php');
  $mail = new PHPMailer(true);
  $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'riyakatiyar18@gmail.com'; // SMTP username
    $mail->Password = ' ykwoxtlzdhmozzpt'; // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom("riyakatiyar18@gmail.com");
    $mail->addAddress("riyakatiyar18@gmail.com");

    // Content
    $mail->isHTML(true);
    $mail->Subject = "New Query";
    $mail->Body    = $html;
    $mail->SMTPOptions=array('ssl'=>array(
      'verify_peer'=>false,
      'verify_peer_name'=>false,
      'allow_self_signed'=>false
    ));

if($mail->send()){
    // echo "success";
  header("location:thankyou.html");
}else{
  echo "Error";
}
}
?>