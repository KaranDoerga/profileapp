<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailTo = "karanv29@hotmail.com";
    $headers  = "Van: ".$email;
    $txt = "Je hebt een nieuw bericht ontvangen van ".$name.".\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
}
