<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Content-Type: application/json; charset=UTF-8");


    require("./src/PHPMailer.php");
    require("./src/SMTP.php");
     
    $errors = '';
     
    if(empty($errors))
    {
        $codigo = '034589039485';//$_REQUEST['c'];
        $correo_destino = 'kevinmontoya64@gmail.com';///$_REQUEST['m'];
     

        $from_email = "shoppingappworld@gmail.com";
        $message = 333333;
        $from_name = "Shoppingapp";

     
     
        //Información del contacto
        $contact = "<p><strong>Nombre:</strong> $from_name</p>
                    <p><strong>Email:</strong> $from_email</p>";
                    
        
        $content = "<p>$message</p>";
     
        $email_body = '<html><body>';
        $email_body .= "$contact $content";
        $email_body .= '</body></html>';
     
       
        $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "From: $from_email\r\n";
    
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP(); // enable SMTP

      $mail->SMTPDebug = 1; 
      $mail->SMTPAuth = true; 
      $mail->SMTPSecure = 'tls'; 
      $mail->Host = "smtp-mail.outlook.com";
      $mail->Port = 587; 
      $mail->IsHTML(true);
      $mail->Username = "noe_k@outlook.com";
      $mail->Password = "Bravia4000";
      $mail->SetFrom('noe_k@outlook.com');
      $mail->Subject = "Confirmación";
      $mail->Body = $email_body;
      $mail->AddAddress($correo_destino);
      $mail->addCustomHeader('Content-Type', 'text/html;charset=utf-8');

       if(!$mail->Send()) {
           echo "Mailer Error: " . $mail->ErrorInfo;
       } else {
           echo "Message has been sent";
       }
     
        
    } else {
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }

?>