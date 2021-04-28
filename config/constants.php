<?php
ob_start();
session_start();
define("SITURL",'http://localhost:63342/aznews-master/');
define("servername","localhost");
define("username","root");
define("password","");
define("dbname","news_portal");
$conn = mysqli_connect(servername,username,password,dbname);?>