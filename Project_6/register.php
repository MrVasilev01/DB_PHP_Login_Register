<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css">
    <!-- <script defer src='style/verify.js'></script> -->
    <title>Register</title>

</head>
<body> 
    <div class="container">
        <div class="box form-box">

            <?php
            
            include("php/config.php");
            
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                //verifying the unique email

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email ='$email'");

                if(mysqli_num_rows($verify_query) !=0){
                    echo "<div class = 'message'> 
                            <p>This email is used, Try anouther one!</p>
                        </div> <br>";
                    echo "<div class='ext'>
                            <a href = 'javascript:self.history.back()'>
                            <button class='btn'>Go back</button>
                        </div>";
                }
                else{
                    mysqli_query($con, "INSERT INTO users(Username,Email,Phone,Password) VALUES('$username','$email','$phone','$password')") or die("Error Occured");

                    echo "<div class = 'message'> 
                            <p>Registration successfully!</p>
                        </div> <br>";
                    echo "<div class='ext'>
                        <a href = 'index.php'>
                        <button class='btn'>Login Now</button>
                        </div>";
                }
            }else{

            ?>

                
            <header>Sign up</header>
            <form id="form" action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off">
                    <div class="error-text"></div>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off">
                    <div class="error-text"></div>
                </div>
                <div class="field input">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" autocomplete="off">
                    <div class="error-text"></div>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off">
                    <div class="error-text"></div>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
                <div class="links">
                    Already have an account? <a class="link" href="index.php">Sign in</a>
                </div>
            </form>

            <?php } ?>
        </div>
    </div>
</body>
</html>