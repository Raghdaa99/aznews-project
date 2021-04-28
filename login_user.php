<?php
$page_title="login user";

include 'config/menu.php';?>

<div id="login-box" style="text-align: center">
    <div class="left" >
        <h1>Sign in</h1>

        <form method="POST" action="">
        <input type="text" name="email" placeholder="E-mail" />
        <input type="password" name="password" placeholder="Password" />

        <input type="submit" name="Login" value="Sign in" />
        </form>
        <?php
        if (isset($_SESSION['user'])){
            echo $_SESSION['user'];
            unset($_SESSION['user']);
        }
        if (isset($_SESSION['failed_comment_login'])){
            unset($_SESSION['failed_comment_login']);
            echo '<script type="text/javascript"> alert("you must login before"); </script>';

        }
        ?>
    </div>

</div>
<?php
if(isset($_POST['Login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass=md5($pass);
    echo $pass;
//    $sql = "select * from users where email ='$email' and password = '$pass'";
//    $res = mysqli_query($conn,$sql);
    $sql=$conn->prepare("select * from users where email=? and password=?");
    $sql->bind_param("ss", $email, $pass);
    $res=$sql->execute();
    $res=$sql->get_result();
    if($res->num_rows>0){
        $row = $res->fetch_assoc();
        $_SESSION ['user_id'] = $row['id'];
        header ( "location:index.php" );
        exit ();
    }else{
        $_SESSION ['user'] = '<span style="color:red;"><strong>Invalid User ID/ Password</strong></span>';
        header("location:login_user.php");
    }

}
include "config/footer.php";

?>