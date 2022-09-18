<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Mailer extends PHPMailer {
    private $subject ;
    private $body;
    public function __construct($subject,$body,$target){
        parent::__construct(true) ;
         //Server settings
        $this->SMTPDebug = 0;                      //Enable verbose debug output
        $this->isSMTP();                                            //Send using SMTP
        $this->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->Username   = 'fstm.licence.irm@gmail.com';                     //SMTP username
        $this->Password   = 'qzxprvycpkhuhcze';                               //SMTP password
        $this->SMTPSecure = 'tls';         
        $this->Port       = 587;  
        $this->setFrom('fstm.licence.irm@gmail.com', 'Licence IRM');
        $this->addAddress($target) ;
        //Content
        $this->isHTML(true);                                  //Set email format to HTML
        $this->Subject = $subject;
        $this->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }
    public function sendMail(){
        try {
        $this->send();
        echo 'Message has been sent';
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->ErrorInfo}";
        }
    }
}
?>