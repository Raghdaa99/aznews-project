<?php
include '../config/constants.php';
$id = $_GET['id'];
//$sql = "delete from comments where id ='$id'";
$sql=$conn->prepare("delete from comments where id = ?");
$sql->bind_param("i",$id );
$res=$sql->execute();
//$res = mysqli_query($conn, $sql);
if ($res) {
    $_SESSION['admin'] = "deleted";
    header("location:manage_comments.php");
} else {
    $_SESSION['admin'] = " not deleted";
    header("location:manage_comments.php");
}