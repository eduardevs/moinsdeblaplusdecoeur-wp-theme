<?php


// namespace Webluthier\Models;

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

namespace Webluthier\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Manually include PHPMailer files
require_once ABSPATH . WPINC . '/PHPMailer/PHPMailer.php';
require_once ABSPATH . WPINC . '/PHPMailer/SMTP.php';
require_once ABSPATH . WPINC . '/PHPMailer/Exception.php';



class Mailer {

    public function send_email($to, $subject, $body) {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'moinsdeblaplusdecoeur@gmail.com';  // Your Gmail address moinsdeblaplusdecoeur@gmail.com eduardopina.dev@gmail.com
            $mail->Password = 'acad mukv ogbv esaf';  // App password (Gmail with 2FA)
            // prod: acad mukv ogbv esaf dev: juca lioe oxej tliv
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('test@example.com', 'test');
            $mail->addAddress('moinsdeblaplusdecoeur@gmail.com', 'Recipient Name');  // Add a recipient moinsdeblaplusdecoeur@gmail.com

            // Content
            $mail->isHTML(false);  // Plain text email
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Send the email
            $mail->send();
        } catch (Exception $e) {
            // Handle error (optional)
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}
