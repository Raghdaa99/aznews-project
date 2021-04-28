<?php
$page_title="category";
include "config/menu.php";
if (isset($_GET['id'])&&$_GET['id']!=null){
    $id_cat=$_GET['id'];
    echo $id_cat;
}else{
    $sql = "select * from category";
    $res = mysqli_query($conn, $sql);
    $row = $res->fetch_assoc();
    $id_cat = $row['id'];
    echo $id_cat;
}

?>

    <main>
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <?php
                                            $sql = "select * from category";
                                            $res = mysqli_query($conn, $sql);

                                            if ($res->num_rows > 0) {

                                                while ($row = $res->fetch_assoc()) {
                                                    $title = $row['title'];
                                                    $id = $row['id'];
                                                    ?>
                                                    <a class="nav-item nav-link" id="nav-home-tab"
                                                       href="categori.php?id=<?php echo $id?>" role="tab" aria-controls="nav-home"
                                                       aria-selected="false"><?php echo $title?></a>
                                                    <?php

                                                }
                                            }
                                            ?>

                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">

                                    <!-- Card two -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <?php
//                                                $sql = "select * from category where id='$id_cat'";
//                                                $res = mysqli_query($conn, $sql);
                                                $sql=$conn->prepare("select * from category where id=?");
                                                $sql->bind_param("i", $id_cat);
                                                $sql->execute();
                                                $res=$sql->get_result();
                                                if ($res->num_rows > 0) {
                                                    $row = $res->fetch_assoc();
//                                                    $sql = "select * from news where category_id='$id_cat'";
//                                                    $res = mysqli_query($conn, $sql);
                                                    $sql=$conn->prepare("select * from news where category_id=?");
                                                    $sql->bind_param("i", $id_cat);
                                                    $sql->execute();
                                                    $res=$sql->get_result();
                                                    if ($res->num_rows > 0) {
                                                        while ($row = $res->fetch_assoc()) {
                                                            $id = $row['id'];
                                                            $title = $row['title'];
                                                            $img = $row['image'];
                                                            $category_id = $row['category_id'];
//                                                            $sql_cat = "select * from category where id = '$category_id'";
//                                                            $res_cat = mysqli_query($conn, $sql_cat);

                                                            $sql_cat=$conn->prepare("select * from category where id=?");
                                                            $sql_cat->bind_param("i", $category_id);
                                                            $sql_cat->execute();
                                                            $res_cat=$sql_cat->get_result();
                                                            if ($res_cat->num_rows > 0) {
                                                                $row_cat = $res_cat->fetch_assoc();
                                                                $category_name = $row_cat['title'];
                                                                ?>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="single-what-news mb-100">
                                                                        <div class="what-img">
                                                                            <img height="300px" src="<?php echo $img ?>" alt="">
                                                                        </div>
                                                                        <div class="what-cap">
                                                                            <span class="color1"><?php echo $category_name ?></span>
                                                                            <h4><a href="details.php?id=<?php echo $id ?>"><?php echo $title ?></a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Nav Card -->
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
        </section>
        <!-- Whats New End -->


    </main>

<?php
function add($conn, $title_cate)
{

}

include "config/footer.php";
?>