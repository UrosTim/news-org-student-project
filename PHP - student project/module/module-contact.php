<?php

//provera da li se salju podaci
if ($_POST) {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

//sanitizacija
    $name = preg_replace('#[^\w]#', ' ', $name);
    $phone = preg_replace('#[^\d]#', ' ', $phone);
    $subject = preg_replace('#[^\w]#', ' ', $subject);
    $message = strip_tags($message);
    $message = htmlspecialchars($message, ENT_QUOTES);

//da li su uneti svi podaci
    if ($name == '')
        $_error[] = 'Enter your full name';
    if ($phone == '')
        $_error[] = 'Enter your phone number';
    if ($email == '')
        $_error[] = 'Enter your email';
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $_error[] = 'Email not valid';
    if ($subject == '')
        $_error[] = 'Enter the subject';
    if ($message == '')
        $_error[] = 'Enter your message';
//
    if(empty($_error)) {
        $headers = "From: $name < $email > \r\n"."Replay-to: $email\r\n";
        if (@mail('urostimapps@gmail.com','message from news org', $message, $headers))
            $_message[] = "We have received your message";
        else
            $_error[] = "Error. Your message was not sent.";
    }
}
    $_page_output = [
            'page_title' => 'Contact',
            'view' => 'module-contact.php'
    ];
?>
