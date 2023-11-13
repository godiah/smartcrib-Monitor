<?php
include ('connect/dbConnect.php');
if (isset($_POST['btn_signin'])){
    $user=$_POST['username'];
    $password=$_POST['userpassword'];
    //Select Query
    $select_user_in = "Select * from `users` where username = '$user'";
    $result_user_in = mysqli_query($conn,$select_user_in);
    $row_count = mysqli_num_rows($result_user_in);
    $row_data = mysqli_fetch_assoc($result_user_in);
    
    if($row_count>0){
        $_SESSION['username']=$user;
        if(password_verify($password,$row_data['password'])){
            if($row_count==1){
                $_SESSION['username']=$user;
                echo "<script>alert('Welcome $user')</script>";
                echo "<script>window.open('babymonitor.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Incorrect Password!')</script>";
        }
    }else{
        echo "<script>alert('Incorrect Username!')</script>";
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
                <h2 class="title">Sign In</h2>
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
                <!-- Submit Button -->
                <input type="submit" name="btn_signin" id="signin" class="btn solid" value="Sign In">
                <div class="d-flex">
                    <p class="mx-1">Don't have an account ? </p>
                    <a href="sign_up.php"> Sign Up</a>
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