<?php
if (isset($_POST['submit'])) {
    $config = include('config.php'); // Include configuration file

    $name = htmlspecialchars($_POST['name']); // Getting and sanitizing customer name
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Getting and sanitizing customer email
    $message = htmlspecialchars($_POST['message']); // Getting and sanitizing customer message

    $html = "<table>
                <tr><td>Name</td><td>{$name}</td></tr>
                <tr><td>Email</td><td>{$email}</td></tr>
                <tr><td>Message</td><td>{$message}</td></tr>
             </table>";

    include('php/smtp/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $config['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['SMTP_USERNAME'];
        $mail->Password = $config['SMTP_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $config['SMTP_PORT'];

        // Recipients
        $mail->setFrom($config['SMTP_FROM_EMAIL']);
        $mail->addAddress($config['SMTP_TO_EMAIL']);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Query';
        $mail->Body = $html;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            )
        );

        if ($mail->send()) {
            header('Location: thankyou.html');
            exit();
        } else {
            echo 'Error sending email.';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
