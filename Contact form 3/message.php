<?php 


// let's get all four values 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['url'];
$message = $_POST['message'];

if (!empty($email) && !empty($message)) { // if email and message field is not empty
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {// if user entered email is valid
        $receiver = "ikuerowob@gmail.com"; // email receiver email address
        $subject = "From: $name <$email> "; //subject of the email
        // merging concating all user values inside body variable. \n is used for new line 
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\nMessage: $message\nRegards, \n$name";
        $sender = "From: $email"; // sender email
        if (mail($receiver, $subject, $body, $sender)) { // mail() is a inbuilt php function to send mail
            echo "Your message has been sent!";
        }
        else {
            echo "Sorry, failed to send message!";
        }
    }
    else {
        echo "Enter a Valid Email Address!";
    }
}
else {
    echo "Email and password field is required!";
}
?>