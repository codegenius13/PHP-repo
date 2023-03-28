<?php
session_start();
@include_once 'db.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['password']); // secure password
$cpassword = md5($_POST['cpassword']);
$Role = 'user';
$verification_status = '0';

// checking if fields are not empty

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($password) && !empty($cpassword)) {
   // if the email is valid
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       // checking if email already exists
       $sql = mysqli_query($conn, "SELECT email FROM info_details WHERE email= '$email'");
       if (mysqli_num_rows($sql) > 0) {
          echo "Already Exists";
       }
       else {
        // checking password and confirm password match
        if ($password == $cpassword) {
          // lets check user upload file or not
          if (isset($_FILES['image'])) {
              $img_name = $_FILES['image']['name'];  // getting image name 
              $img_type = $_FILES['image']['type']; // getting image type
              $tmp_name = $_FILES['image']['tmp_name']; // getting tmp_name
              $img_explode = explode('.', $img_name); 
              $img_extension = end($img_explode);
              $extensions = ['png', 'jpeg', 'jpg', ]; //these are some valid extension images

            if (in_array($img_extension,$extensions) === true) {
                $time = time();
                $newimagename = $time . $img_name; // creating a unique name for the image
                if (move_uploaded_file($tmp_name, "images/" . $newimagename)) { // set the uploaded file folder
                    $random_id = rand(time(), 10000000); // create a user unique_id 
                    $otp = mt_rand(1111, 9999,); // creating 4 digits otp
                    // inserting data into table 
                    $sql2 = mysqli_query($conn, "INSERT INTO info_details(unique_id, fname, lname, email, phone, password, image, otp, verification_status, Role)
                    VALUES ($random_id, '$fname', '$lname', '$email', '$phone', '$password', '$newimagename', '$otp', '$verification_status', 
                    '$Role')");
                    if ($sql2) {
                        $sql3 = mysqli_query($conn, "SELECT FROM info_details WHERE email = '{$email}'");
                        if (mysqli_num_rows($sql3) > 0) {
                            $row = mysqli_fetch_assoc($sql3); //fetching data
                            $_SESSION['unique_id'] = $row ['unique_id'];
                            $_SESSION['email'] = $row ['email'];
                            $_SESSION['otp'] = $row ['otp'];

                            // lets start mail function
                            // make sure the xamp server is config to send email
                            if ($otp) {
                                $receiver = $email;
                                $subject = "From: $fname $lname <$email>";
                                $body = "Name:"." $fname $lname \n Email "." $email \n "." $otp";
                                $sender = "From: ikuerowob@gmail.com"; // write personal email here
                                if (mail($receiver, $subject, $body, $sender)) {
                                    echo "success";
                                }
                                else {
                                    echo "Email Problem!" . mysqli_error($conn);
                                }
                            }
                            // mail function end
                        }
                    }
                    else {
                        echo "Something went wrong!";
                    } 
                }
            }
            else {
                echo "Please select a profile image - JPG, PNG, JPEG";
            }
          } 
          else {
            echo "Please select a profile image";
        }
        }
        else {
            echo "Confirm Password Don't Match";
        }
     }
   }
   else {
    echo "$email ~ This is not a Valid Email";
   }
 }
 else {
    echo "All input fields are required";
}

?>