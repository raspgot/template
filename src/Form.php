<?php
    namespace App;

    use Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    class Form {

        public $post;
        public $handler   = [
            'success'         => 'Your message has been sent 🙂',
            'recaptcha-error' => 'Error in recaptcha response',
            'error'           => 'Sorry, an error occurred while sending your message 😕',
            'enter_name'      => 'Please enter your name.',
            'enter_email'     => 'Please enter a valid email.',
            'enter_message'   => 'Please enter your message.',
            'ajax_only'       => 'Asynchronous anonymous 🎭',
            'body'            => '
                <h1>{{subject}}</h1>
                <p><strong>Name :</strong> {{name}}</p>
                <p><strong>E-Mail :</strong> {{email}}</p>
                <p><strong>Message :</strong> {{message}}</p>
            ',
        ];
    
        public function __construct($posts)
        {
            $this->post = $posts;

            # Check if request is Ajax request
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 'XMLHttpRequest' !== $_SERVER['HTTP_X_REQUESTED_WITH']) {
                $this->statusHandler('ajax_only', 'error');
            }

            # Get secure post data
            $name    = $this->secure($this->post['name'] ?? '');
            $email   = filter_var($this->secure($this->post['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $message = $this->secure($this->post['message'] ?? '');

            # Check if fields has been entered and valid
            if (!$name) $this->statusHandler('enter_name', 'error');
            if (!$email) $this->statusHandler('enter_email', 'error');
            if (!$message) $this->statusHandler('enter_message', 'error');

            # Prepare body
            $body = $this->getString('body');
            $body = $this->template( $body, [
                'subject' => MAIL_SUBJECT,
                'name'    => $name,
                'email'   => $email,
                'message' => $message,
            ] );

            # Verifying the user's response
            $recaptcha = new \ReCaptcha\ReCaptcha(RECAPTCHA_SECRET_KEY);
            $resp = $recaptcha
                ->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($this->post['token'] ?? '', $_SERVER['REMOTE_ADDR']);

            if ($resp->isSuccess()) {

                $mail = new PHPMailer(true);

                try {
                    # Server settings
                    $mail->SMTPDebug  = SMTP::DEBUG_OFF;     # Enable verbose debug output
                    $mail->isSMTP();                         # Set mailer to use SMTP
                    $mail->Host       = SMTP_HOST;           # Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true;                # Enable SMTP authentication
                    $mail->Username   = SMTP_USERNAME;       # SMTP username
                    $mail->Password   = SMTP_PASSWORD;       # SMTP password
                    $mail->SMTPSecure = SMTP_SECURE === 'tls' ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = SMTP_PORT;           # TCP port
                
                    # Recipients
                    $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
                    $mail->addAddress($email, $name);
                    $mail->AddCC(SMTP_USERNAME, 'Dev_copy');
                    $mail->addReplyTo(SMTP_USERNAME, 'Information');
                
                    # Content
                    $mail->CharSet = 'UTF-8';
                    $mail->isHTML(true);
                    $mail->Subject = MAIL_SUBJECT;
                    $mail->Body    = $body;
                    $mail->AltBody = strip_tags($body);
                
                    $mail->send();
                    $this->statusHandler('success', 'success');

                } catch (Exception $e) {
                    $this->statusHandler('error', 'error');
                }
            } else {
                $this->statusHandler('recaptcha-error', 'error');
            }
        }

        /**
         * Template string
         *
         * @param string $string
         * @param array $vars
         * @return string
         */
        public function template($string, $vars)
        {
            foreach ($vars as $name => $val) {
                $string = str_replace("{{{$name}}}", $val, $string);
            }
            return $string;
        }

        /**
         * Get string from $string variable
         *
         * @param string $string
         * @return string
         */
        public function getString($string)
        {
            return isset($this->handler[$string]) ? $this->handler[$string] : $string;
        }

        /**
         * Secure inputs fields
         *
         * @param string $post
         * @return string
         */
        public function secure($post)
        {
            $post = htmlspecialchars($post);
            $post = stripslashes($post);
            $post = trim($post);
            return $post;
        }

        /**
         * Error or success message
         *
         * @param string $message
         * @param string $status
         * @return json
         */
        public function statusHandler($message, $status)
        {
            die(json_encode([
                'type'     => $status,
                'response' => $this->getString($message)
            ]));
        }
        
    }
?>