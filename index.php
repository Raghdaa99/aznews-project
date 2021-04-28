<?php
$page_title="home";

include "config/menu.php";

?>
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                        <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                        <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <?php
//                                $sql = "select * from news where featured='Yes' and active='Yes'";
//                                $res = mysqli_query($conn, $sql);
                                $feature='Yes';
                                $active='Yes';
                                $sql=$conn->prepare("select * from news where featured=? and active=?");
                                $sql->bind_param("ss", $feature, $active);
                                $sql->execute();
                                $res=$sql->get_result();
                                if ($res->num_rows > 0) {
                                    $row = $res->fetch_assoc();
                                    $id_news = $row['id'];
                                    $title = $row['title'];
                                    $image = $row['image'];
                                    $category_id = $row['category_id'];
                                    $sql_cat = "select * from category where id = '$category_id'";
                                    $res_cat = mysqli_query($conn, $sql_cat);
                                    if ($res_cat->num_rows > 0) {
                                        $row_cat = $res_cat->fetch_assoc();
                                        $category_name = $row_cat['title'];
                                        ?>
                                        <div class="trend-top-img">
                                            <img src="<?php echo $image ?>" alt="">
                                            <div class="trend-top-cap">
                                                <span><?php echo $category_name ?></span>
                                                <h2>
                                                    <a href="details.php?id=<?php echo $id_news ?>"><?php echo $title ?></a>
                                                </h2>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">

                                    <?php
//                                    $sql = "select * from news where featured='Yes' and active='Yes' limit 3 offset 1";
//                                    $res = mysqli_query($conn, $sql);
                                    $feature='Yes';
                                    $active='Yes';
                                    $limit=6;
                                    $offset=1;
                                    $sql=$conn->prepare("select * from news where featured=? and active=? limit ? offset ?");
                                    $sql->bind_param("ssii", $feature, $active,$limit,$offset);
                                    $sql->execute();
                                    $res=$sql->get_result();
                                    if ($res->num_rows > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                            $id_news = $row['id'];
                                            $title = $row['title'];
                                            $image = $row['image'];
                                            $category_id = $row['category_id'];
                                            $sql_cat=$conn->prepare("select * from category where id=?");
                                            $sql_cat->bind_param("i", $category_id);
                                            $sql_cat->execute();
                                            $res_cat=$sql_cat->get_result();
                                            if ($res_cat->num_rows > 0) {
                                                $row_cat = $res_cat->fetch_assoc();
                                                $category_name = $row_cat['title'];
                                                ?>
                                                <div class="col-lg-4">
                                                    <div class="single-bottom mb-35">
                                                        <div class="trend-bottom-img mb-30">
                                                            <img height="200px" src="<?php echo $image ?>" alt="">
                                                        </div>
                                                        <div class="trend-bottom-cap">
                                                            <span class="color1"><?php echo $category_name ?></span>
                                                            <h4>
                                                                <a href="details.php?id=<?php echo $id_news ?>"><?php echo $title ?></a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>


                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <aside class="single_sidebar_widget search_widget">
                                    <form action="search_news.php" method="post">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder='Search Keyword'
                                                       name="search"
                                                       onfocus="this.placeholder = ''"
                                                       onblur="this.placeholder = 'Search Keyword'" required>
                                                <div class="input-group-append">
                                                    <button class="btns" type="button"><i class="ti-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                                type="submit">Search
                                        </button>
                                    </form>
                                </aside>
                                <aside class="single_sidebar_widget post_category_widget">
                                    <h4 class="widget_title">Category</h4>
                                    <ul class="list cat-list">
                                        <?php
                                        $sql = "select * from category";
                                        $res = mysqli_query($conn, $sql);

                                        if ($res->num_rows > 0) {

                                            while ($row = $res->fetch_assoc()) {
                                                $title = $row['title'];
                                                $id = $row['id'];
                                                ?>
                                        <li>
                                            <a href="categori.php?id=<?php echo $id?>" class="d-flex">
                                                <p><?php echo $title?></p>
                                            </a>
                                        </li>
                                                <?php

                                            }
                                        }
                                        ?>
                                    </ul>
                                </aside>
                                <aside class="single_sidebar_widget popular_post_widget">
                                    <h3 class="widget_title">Recent Post</h3>
                                    <?php
                                    $sql = "select * from news  order by id DESC  limit 4";
                                    $res = mysqli_query($conn, $sql);
//
//                                    $order = 'id';
//                                    $limit=5;
//                                    $sql=$conn->prepare("select * from news  order by ? DESC  limit ?");
//                                    $sql->bind_param("si", $order,$limit);
//                                    $sql->execute();
//                                    $res=$sql->get_result();
                                    if ($res->num_rows > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                            $id_news = $row['id'];
                                            $title = $row['title'];
                                            $image = $row['image'];
                                            $category_id = $row['category_id'];
                                            $date_news = $row['date_news'];
//                                            $sql_cat = "select * from category where id = '$category_id'";
//                                            $res_cat = mysqli_query($conn, $sql_cat);
                                            $sql_cat=$conn->prepare("select * from category where id=?");
                                            $sql_cat->bind_param("i", $category_id);
                                            $sql_cat->execute();
                                            $res_cat=$sql_cat->get_result();
                                            if ($res_cat->num_rows > 0) {
                                                $row_cat = $res_cat->fetch_assoc();
                                                $category_name = $row_cat['title']; ?>
                                                <div class="media post_item">
                                                    <img width="100px" height="100px" src="<?php echo $image ?>" alt="post">
                                                    <div class="media-body">
                                                        <a href="details.php?id=<?php echo $id_news ?>">
                                                            <h3><?php echo $title ?></h3>
                                                        </a>
                                                        <p><?php echo $date_news ?></p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    } ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active dot-style d-flex dot-style">
                                <?php
//                                $sql = "select * from news where featured='Yes' and active='Yes' limit 5";
//                                $res = mysqli_query($conn, $sql);
                                 $feature='Yes';
                                 $active='Yes';
                                 $limit=5;
                                $sql=$conn->prepare("select * from news where featured=? and active=? limit ?");
                                $sql->bind_param("ssi", $feature, $active,$limit);
                                $sql->execute();
                                $res=$sql->get_result();
                                if ($res->num_rows > 0) {

                                    while ($row = $res->fetch_assoc()) {
                                        $class_name = "weekly-single";
                                        $id_news = $row['id'];
                                        $title = $row['title'];
                                        $image = $row['image'];
                                        $category_id = $row['category_id'];
//                                        $sql_cat = "select * from category where id = '$category_id'";
//                                        $res_cat = mysqli_query($conn, $sql_cat);
                                        $sql_cat=$conn->prepare("select * from category where id=?");
                                        $sql_cat->bind_param("i", $category_id);
                                        $sql_cat->execute();
                                        $res_cat=$sql_cat->get_result();
                                        if ($res_cat->num_rows > 0) {
                                            $row_cat = $res_cat->fetch_assoc();
                                            $category_name = $row_cat['title'];
                                            ?>
                                            <div class="weekly-single">
                                                <div class="weekly-img">
                                                    <img height="400px" src="<?php echo $image ?>" alt="">
                                                </div>
                                                <div class="weekly-caption">
                                                    <span class="color1"><?php echo $category_name ?></span>
                                                    <h4><a href="details.php?id=<?php echo $id_news ?>"><?php echo $title ?></a></h4>
                                                </div>
                                            </div>

                                            <?php
                                        }

                                    }
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- Start Youtube -->
        <div class="youtube-area video-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="video-items-active">
                            <div class="video-items text-center">
                                <iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            </div>
                            <div class="video-items text-center">
                                <iframe src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            </div>
                            <div class="video-items text-center">
                                <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>

                            </div>
                            <div class="video-items text-center">
                                <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>

                            </div>
                            <div class="video-items text-center">
                                <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="video-info">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="video-caption">
                                <div class="top-caption">
                                    <span class="color1">Politics</span>
                                </div>
                                <div class="bottom-caption">
                                    <h2>Welcome To The Best Model Winner Contest At Look of the year</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum
                                        dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                        eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit
                                        sed do eiusmod ipsum dolor sit lorem ipsum dolor sit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testmonial-nav text-center">
                                <div class="single-video">
                                    <iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    <div class="video-intro">
                                        <h4>Welcotme To The Best Model Winner Contest</h4>
                                    </div>
                                </div>
                                <div class="single-video">
                                    <iframe src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    <div class="video-intro">
                                        <h4>Welcotme To The Best Model Winner Contest</h4>
                                    </div>
                                </div>
                                <div class="single-video">
                                    <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    <div class="video-intro">
                                        <h4>Welcotme To The Best Model Winner Contest</h4>
                                    </div>
                                </div>
                                <div class="single-video">
                                    <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    <div class="video-intro">
                                        <h4>Welcotme To The Best Model Winner Contest</h4>
                                    </div>
                                </div>
                                <div class="single-video">
                                    <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    <div class="video-intro">
                                        <h4>Welcotme To The Best Model Winner Contest</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Start youtube -->

    </main>

<?php
include "config/footer.php";
?>