<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Redirect;


class MailController extends Controller
{
    //
    public function index(){

    	return view('emails.testMail');

    }

    public function send($reciever, $subject, $message){

    	// $name = $request->name;
    	// $email = $request->email;
    	// $subject = $request->subject;
    	// $message = $request->message;


    require("PHPMailer-master/src/PHPMailer.php");
 	require("PHPMailer-master/src/SMTP.php");
    require("PHPMailer-master/src/Exception.php");

    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP

	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'justinesarabia77@gmail.com';                     //SMTP username
    $mail->Password   = 'justine190201';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($reciever, "Lani Scholarship Admin");
    // $mail->addAddress('joe@example.net', 'Joe User');               //Add a recipient
    $mail->addAddress($reciever);               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
     //$mail->addAttachment(public_path().'/images/608be2eed7605.png');         //Add attachments

    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    return Redirect::route('email_index');
    }





    public function sendWithAttach($reciever, $subject, $message, $attachment){

        // $name = $request->name;
        // $email = $request->email;
        // $subject = $request->subject;
        // $message = $request->message;


    require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");
    require("PHPMailer-master/src/Exception.php");

    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'justinesarabia77@gmail.com';                     //SMTP username
    $mail->Password   = 'justine190201';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($reciever, "Lani Scholarship Admin");
    // $mail->addAddress('joe@example.net', 'Joe User');               //Add a recipient
    $mail->addAddress($reciever);               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
     $mail->addAttachment(public_path().$attachment);         //Add attachments

    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    return Redirect::route('email_index');
    }

}
