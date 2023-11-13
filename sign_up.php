<?php
include ('connect/dbConnect.php');
if(isset($_POST['btn_signup'])){
    $user = $_POST['username'];            
    $password = $_POST['userpassword'];            
    $cfmpassword = $_POST['userpasswordcfm']; 
    $hashpassword = password_hash($password,PASSWORD_DEFAULT);         
    //Select Query
    $select_user = "Select * from `users` where username = '$user'";
    $result_count = mysqli_query($conn,$select_user);
    $rows_count = mysqli_num_rows($result_count);
    if($rows_count>0){                
        echo "<script>alert('Username already exists!')</script>";
    }else if($password!=$cfmpassword){
        echo "<script>alert('Password Mismatch!')</script>";
    }            
    else{
         //Insert User Into The System
            $insert_user = "insert into `users` (username,password) 
            values ('$user','$hashpassword')";
            $result_user = mysqli_query($conn,$insert_user);
                if($result_user){
                    echo "<script>alert('Registration Successful!')</script>";
                    echo "<script>window.open('babymonitor.php','_self')</script>";
                }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/signup.css">
     <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>    
    <title>IntelliCradle</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
</head>
<body>
    <div class="container-fluid">
        <div class="empty"></div>
        <div class="forms-container">
            <div class="sign-up">
            <form action="" method="post" class="sign-up-form">
                <h2 class="title">Sign Up</h2>
                <!-- Username -->
                <div class="input-field">
                    <span class="material-icons-outlined">account_circle</span>
                    <input type="text" name="username" id="" placeholder="Username" required autocomplete="off">
                </div>            
                <!-- Password -->
                <div class="input-field" id="password-container">
                    <span class="material-icons-outlined">lock</span>
                    <input type="password" name="userpassword" id="password" placeholder="Password" required>
                    <i class="fa-solid fa-eye" id="togglePassword"></i>                    
                </div>  
                <!-- Confirm Password -->
                <div class="input-field" id="password-container">
                    <span class="material-icons-outlined">lock</span>
                    <input type="password" name="userpasswordcfm" id="passwordcfm" placeholder="Confirm Password" required>
                    <i class="fa-solid fa-eye" id="togglePassword"></i>                    
                </div>     
                <!-- Submit Button -->
                <input type="submit" name="btn_signup" id="signin" class="btn solid" value="Sign Up">
                <div class="d-flex">
                    <p class="mx-1">Have an account ? </p>
                    <a href="sign_in.php"> Sign In</a>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Js Links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>