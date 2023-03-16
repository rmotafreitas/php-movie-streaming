<?php
include 'inc/config.inc.php';
$vars = isset($params) ? $params : $_GET;
$id = $vars['id'];
$sql = "SELECT * FROM news WHERE id = $id";
$result = my_query($sql);

if (count($result) == 0) {
    header('Location: ' . $cfg['urls']['site'] . '/404.php');
    exit;
}

$new = $result[0];
$sqlAll = "SELECT * FROM news";
$resultAll = my_query($sqlAll);


$indexedArr = indexedArray('id', $resultAll);
$views = $new['clicks'] + 1;
$sqlAddClick = "UPDATE news SET clicks = $views WHERE id = $id";
$res = my_query($sqlAddClick);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Pacote TV">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacote.TV</title>

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="<?= $cfg['urls']['site'] ?>/img/favicon.ico">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php
    headerTop($cfg);
    ?>
    <!-- Header End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__title">
                        <h2><?= $new['title'] ?></h2>
                        <?php
                        redessociais();
                        ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__item__text">
                            <img src="<?= $cfg['urls']['site'] ?>/upload/news/<?= $new['image'] ?>" alt="">
                            <p><?= $new['content'] ?></p>
                        </div>
                        <div class="blog__details__tags">
                            <a href="#"><?= $new['date'] ?></a>
                        </div>
                        <div class="blog__details__btns">
                            <div class="row">
                                <?php
                                // Do the previous, if dosent exist, dont show
                                if ($new['id'] != $resultAll[0]['id']) {
                                    while (key($indexedArr) != $id) next($indexedArr);
                                    $prevNew = prev($indexedArr);
                                    echo '<div class="col-lg-6">
                                    <div class="blog__details__btns__item">
                                        <h5><a href="' . $cfg['urls']['site'] . '/news-details.php?id=' . $prevNew['id'] . '"><span class="arrow_left"></span> ' . $prevNew['title'] . '</a></h5>
                                    </div>
                                </div>';
                                } else {
                                    echo '<div class="col-lg-6">
                                    <div class="blog__details__btns__item"></div>
                                    </div>';
                                }
                                // Do the next, if dosent exist, dont show
                                if ($new['id'] != $resultAll[count($resultAll) - 1]['id']) {
                                    while (key($indexedArr) != $id) next($indexedArr);
                                    $nextNew = next($indexedArr);
                                    echo '<div class="col-lg-6">
                                    <div class="blog__details__btns__item next__btn">
                                        <h5><a href="' . $cfg['urls']['site'] . '/news-details.php?id=' . $nextNew['id'] . '">' . $nextNew['title'] . '<span class="arrow_right"></span></a></h5>
                                    </div>
                                </div>';
                                }
                                ?>


                            </div>
                        </div>
                        <!--
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Comentários</h5>
                            </div>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="img/anime/review-1.jpg" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                    <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                        "demons" LOL</p>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__form">
                            <div class="section-title">
                                <h5>Comentar</h5>
                            </div>
                            <form action="#">
                                <textarea placeholder="O teu comentário"></textarea>
                                <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                            </form>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Footer Section Begin -->
    <?php
    footer($cfg);
    ?>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="<?= $cfg['urls']['site'] ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= $cfg['urls']['site'] ?>/js/bootstrap.min.js"></script>
    <script src="<?= $cfg['urls']['site'] ?>/js/player.js"></script>
    <script src="<?= $cfg['urls']['site'] ?>/js/jquery.nice-select.min.js"></script>
    <script src="<?= $cfg['urls']['site'] ?>/js/mixitup.min.js"></script>
    <script src="<?= $cfg['urls']['site'] ?>/js/jquery.slicknav.js"></script>
    <script src="<?= $cfg['urls']['site'] ?>/js/owl.carousel.min.js"></script>
    <script src="<?= $cfg['urls']['site'] ?>/js/lightbox-plus-jquery.min.js"></script>
    <script src="<?= $cfg['urls']['site'] ?>/js/main.js"></script>

</body>

</html>