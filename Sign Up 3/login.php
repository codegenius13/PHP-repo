<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form">
        <h2>Login Form</h2>
        <form action="" autocomplete="off">
            <div class="error-text">Error</div>
            <div class="input">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter Your Email" required>
             </div>
             <div class="input">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
             </div>
           <div class="submit">
            <input type="submit" value="Login Now" class="button">
           </div>
        </form>
        <div class="link">Don't Have an Account?<a href="register.php">SignUp Now</a></div>
    </div>
</body>
</html>