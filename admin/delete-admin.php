<?php
include "../config/constants.php";

$id = $_GET['id'];
//$del = mysqli_query($conn,"delete from admin where id = '$id'");
$sql=$conn->prepare("delete from admin where id = ?");
$sql->bind_param("i",$id );
$res=$sql->execute();
if($res)
{
    $_SESSION['admin'] = "<span style='color: #2ed573'>admin is deleted</span>";
    header("location:manage-admin.php");
    exit;
}
else
{
    $_SESSION['admin'] = "<span style='color: #d52e2e'>admin is not deleted</span>";
    header("location:manage-admin.php");
}
