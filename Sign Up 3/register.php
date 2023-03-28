<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form">
        <h2>Sign Up Form</h2>
        <p>It's free and always will be</p>
        <form action="signup.php" ontype="multipart/form-data">
            <div class="error-text">Error</div>
            <div class="grid-details">
                 <div class="input">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" placeholder="First Name" required pattern="[a-zA-Z'-'\s]*">
                 </div>
                 <div class="input">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" required pattern="[a-zA-Z'-'\s]*">
                 </div>
            </div>
            <div class="input">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter Your Email" required>
             </div>
             <div class="input">
                <label for="tel">Phone Number</label>
                <input type="tel" name="phone" placeholder="Phone Number" required pattern="[0-9]{11}" 
                oninvalid="this.setCustomValidity('Enter 11 Digits Number')" oninput="this.setCustomValidity('')">
             </div>
             <div class="grid-details">
                <div class="input">
                   <label for="password">Password</label>
                   <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input">
                   <label for="cpassword">Confirm Password</label>
                   <input type="password" name="cpassword" placeholder="Confirm Password" required>
                </div>
           </div>
           <div class="profile-img">
              <div class="file-upload">
                <input type="file" id="image-preview" name="image" class="file-input" required
                oninvalid="this.setCustomValidity('Select an Image')" oninput="this.setCustomValidity('')">
                <img src="images/user.png" alt="img" id="user">
              </div>
           </div>
           <div class="submit">
            <input type="submit" value="Sign Up Now" class="button">
           </div>
        </form>
        <div class="link">Already Signed Up?<a href="">Login Now</a></div>
    </div>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="register.js"></script>
</body>
</html>