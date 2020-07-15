<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
}

$name = strtolower(trim($_POST["name"]));
$email = (trim($_POST["email"]));
$subject = (trim($_POST["subject"]));
$message = ($_POST["message"]);
$message = wordwrap($message,70);
$message = date("d F Y") . "<br>NAME: ".$name. "<br>". "EMAIL: ".$email."<br>"."SUBJECT: ".$subject."<br><br>". $message;
$headers = 'From: contact@biofeedbacksa.co.za' . "\r\n" .
    'Reply-To: contact@biofeedbacksa.co.za' . "\r\n" .
    "Content-Type: text/html; charset=ISO-8859-1\r\n".
    'X-Mailer: PHP/' . phpversion();

$to = "contact@biofeedbacksa.co.za"; 
$subject = "QUERY | ".$name; 
$body =$message; 

if(!$captcha){
    $_SESSION["captcha_fail"] = 1;
    header('Location: https://biofeedbacksa.co.za/contact.php');
    exit;
}

$fields = array(
    'secret'    =>  "6Le4atkUAAAAANirCan6rOvdIRgbJ7UEy1qbKmhj",
    'response'  =>  $captcha,
    'remoteip'  =>  $_SERVER['REMOTE_ADDR']
);
$ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
$response = json_decode(curl_exec($ch));

if($response->success == 1) {
    mail($to, $subject, $body, $headers);
    $_SESSION["email_sent"] = 1;
    header('Location: https://biofeedbacksa.co.za/contact.php');
} else {
    header('Location: https://biofeedbacksa.co.za/contact.php');
}



?>