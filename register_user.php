<?php
$page_title="register user";

include 'config/menu.php';?>

<div id="login-box">
    <div class="left">
        <h1>Sign up</h1>

        <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" />
        <input type="text" name="email" placeholder="E-mail" />
        <input type="password" name="password" placeholder="Password" />
        <input type="password" name="password2" placeholder="Retype password" />

        <input type="submit" name="signup_submit" value="Sign me up" />
        </form>
        <?php
        if (isset($_SESSION['register_user'])){
            echo $_SESSION['register_user'];
            unset($_SESSION['register_user']);
        }
        ?>
    </div>

    <div class="right">
        <span class="loginwith">Sign in with<br />social network</span>

        <button class="social-signin facebook">Log in with facebook</button>
        <button class="social-signin twitter">Log in with Twitter</button>
        <button class="social-signin google">Log in with Google+</button>
    </div>
    <div class="or">OR</div>
</div>
<?php

if (isset($_POST['signup_submit'])) {

    $email=$_POST['email'];
    $username=$_POST['username'];
    $password = $_POST['password'];
    $password2=$_POST['password2'];
    if ($password==$password2){
        $password=md5($password);
//        $sql = "insert into users set email = '$email',username = '$username', password ='$password'";
//        $res = mysqli_query($conn, $sql);
        $stmt = $conn->prepare("INSERT INTO users(email,username,password) VALUES(?,?,?)");
        $stmt->bind_param("sss", $email, $username,$password);

        // set parameters and execute
        $stmt->execute();
        if ($stmt) {
            $_SESSION['register_user'] = "user is added";
            header("location:login_user.php");
        } else {
            $_SESSION['register_user'] = "user is not added";
            header("location:register_user.php");

        }
    }else{
        $_SESSION ['register_user'] = '<span style="color:red;"><strong>Passwords not matched</strong></span>';
        header("location:register_user.php");
    }
  echo "<meta http-equiv='refresh' content='0'>";
}

include "config/footer.php";

?>