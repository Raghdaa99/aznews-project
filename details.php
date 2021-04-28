<?php
$page_title="details";

include "config/menu.php";
$id = $_GET['id'];
//$sql="select * from news where id = '$id'";
//$res=mysqli_query($conn,$sql);

$sql=$conn->prepare("select * from news where id=?");
$sql->bind_param("i", $id);
$sql->execute();
$res=$sql->get_result();
//if ($res->num_rows>0){
    $row=$res->fetch_assoc();
    $title=$row['title'];
    $desc=$row['description'];
    $image=$row['image'];
    $category_id=$row['category_id'];
    $date=$row['date_news'];

?>

    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                    <!-- Hot Animated News Tittle-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consecrated adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                        <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                        <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Tittle -->
                            <div class="about-right mb-90">
                                <div class="about-img">
                                    <img src="<?php echo $image?>" alt="">
                                </div>
                                <div class="section-tittle mb-30 pt-30">
                                    <h3><?php echo $title?></h3>
                                </div>
                                <div class="about-prea">

                                    <p class="about-pera1 mb-25">
                                        <?php echo $desc?>
                                    </p>
                                </div> 

                                <div class="social-share pt-30">
                                    <div class="section-tittle">
                                        <h3 class="mr-20">Share:</h3>
                                        <ul>
                                            <li><a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- From -->
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="comments-area">
                                    <?php

//                                    $sql_comments="select * from comments where id_news='$id'";
//                                    $res_comments=mysqli_query($conn,$sql_comments);
                                    $sql_comments=$conn->prepare("select * from comments where id_news=?");
                                    $sql_comments->bind_param("i", $id);
                                    $sql_comments->execute();
                                    $res_comments=$sql_comments->get_result();
                                    if ($res_comments->num_rows>0){ ?>
                                        <h4><?php echo $res_comments->num_rows?> Comments</h4>

                                        <?php
                                        while($row=$res_comments->fetch_assoc()){

                                            $date=$row['comment_date'];
                                            $message=$row['message'];
                                            $user_id= $row['id_user'];
                                            $sql_user="select * from users where id='$user_id'";
                                            $res_users=mysqli_query($conn,$sql_user);
                                            if ($res_users->num_rows>0){
                                            $row_user=$res_users->fetch_assoc();
                                            $name=$row_user['username'];
                                            ?>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="assets/img/comment/user_default.png" alt="">
                                                        </div>
                                                        <div class="desc">
                                                            <p class="comment">
                                                                <?php echo $message?>
                                                            </p>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <h5>
                                                                        <a href="#"><?php echo $name?></a>
                                                                    </h5>
                                                                    <p class="date"><?php echo $date?> </p>
                                                                </div>
                                                                <div class="reply-btn">
                                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php
                                            }
                                        }
                                    }

                                    else{ ?>
                                        <h4>0 Comments</h4>
                                            <?php


                                    }
                                    ?>
                                    </div>
                                    <div class="comment-form">
                                        <h4>Leave a Reply</h4>
                                        <form class="form-contact comment_form" action="details.php?id=<?php echo $id?>"  method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                        placeholder="Write Comment"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="button button-contactForm btn_1 boxed-btn">Send Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-40">
                                <h3>Follow Us</h3>
                            </div>
                            <!-- Flow Socail -->
                            <div class="single-follow mb-45">
                                <div class="single-box">
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">  
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div> 
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                        <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- New Poster -->
                            <div class="news-poster d-none d-lg-block">
                                <img src="assets/img/news/news_card.jpg" alt="">
                            </div>
                        </div>
                   </div>
            </div>
        </div>
        <!-- About US End -->
    </main>


<?php
if (isset($_POST['submit'])){
if (isset ($_SESSION ['user_id'] )) {
    $message=$_POST['comment'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $date=date("M d,Y h:i a");
    $id_user=$_SESSION ['user_id'];
//    $sql="insert into comments set id_news='$id',message='$message',comment_date='$date',id_user='$id_user'";
//    $res = mysqli_query($conn,$sql);

    $sql=$conn->prepare("insert into comments set id_news=?,message=?,comment_date=?,id_user=?");
    $sql->bind_param("issi", $id,$message,$date,$id_user);
    $res=$sql->execute();

    if ($res){
        mysqli_close($conn);
        $_SESSION['comment']="comment is sent";
      header("location:details.php?id=$id");
    }else{
        $_SESSION['comment']="comment is failed";
        header("location:details.php?id=$id");
    }
}else{

    $_SESSION['failed_comment_login']="comment is failed";
    header("location:login_user.php");
}
}
include "config/footer.php";
?>
