<?php
$page_title="search";

include "config/menu.php";

$search=$_POST['search'];
?>

    <!--================Blog Area =================-->
<h4 style="text-align: center; margin-top: 15px">Search on <?php echo $search?></h4>
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php
//                        $sql="select * from news where title like '%$search%' or description like '%$search%' ";
//                        $res=mysqli_query($conn,$sql);
                        $sql=$conn->prepare("select * from news where title like CONCAT('%',?,'%') or description like CONCAT('%',?,'%')");
                        $sql->bind_param("ss", $search, $search);
                        $sql->execute();
                        $res=$sql->get_result();

                        if ($res->num_rows>0){
                            while ($row=$res->fetch_assoc()){
                        $id_news=$row['id'];
                        $title = $row['title'];
                        $image = $row['image'];
                        $description = $row['description'];
                        $category_id = $row['category_id'];
                        $date_news = $row['date_news'];
                        $sql_cat = "select * from category where id = '$category_id'";
                        $res_cat = mysqli_query($conn, $sql_cat);
                        if ($res_cat->num_rows > 0) {
                        $row_cat = $res_cat->fetch_assoc();
                        $category_name = $row_cat['title'];
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?php echo $image?>" alt="">
                                <a href="#" class="blog_item_date">

                                    <p><?php echo $date_news?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="details.php?id=<?php echo $id_news ?>">
                                    <h2><?php echo $title?></h2>
                                </a>
                                <p><?php echo substr($description, 0, 50) ?>...</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> <?php echo $category_name?></a></li>
                                    <?php
                                     $sql_comments="select * from comments where id_news='$id_news'";
                                     $res_comments=mysqli_query($conn,$sql_comments);
                                     $num_comments=$res_comments->num_rows;

                                    ?>
                                    <li><a href="#"><i class="fa fa-comments"></i> <?php echo $num_comments?> Comments</a></li>
                                </ul>
                            </div>
                        </article>
                        <?php
                            }
                        }
                        }else{

                            ?>
                            <h3> No results search</h3>
                        <?php
                        }

                        ?>

                    </div>
                </div>
                <!-----Right -->
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="search_news.php" method="post">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword' name="search"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit" >Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">love</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">restaurant</a>
                                </li>
                                <li>
                                    <a href="#">life style</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Instagram Feeds</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </aside>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

<?php
include "config/footer.php";
?>