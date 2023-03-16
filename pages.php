<?php
include 'inc/config.inc.php';
$vars = isset($params) ? $params : $_GET;
$id = $vars['id'];
$sql = "SELECT * FROM pages WHERE id = $id";
$result = my_query($sql);

if (count($result) == 0) {
    header('Location: ' . $cfg['urls']['site'] . '/404.php');
    exit;
}

$page = $result[0];
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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
                        <h2><?= $page['title'] ?></h2>
                        <?php
                        redessociais($cfg)
                        ?>
                    </div>
                </div>
                <?php
                if ($page['imageLocation'] == 0) {
                    echo '<div class="col-lg-12 blog__details__item__text">
                    <p>' . $page['text'] . '</p>
                    </div>';
                } elseif ($page['imageLocation'] == 1) {
                    echo '<div class="col-lg-12">
                    <img src="' . $cfg['urls']['site'] . '/upload/pages/' . $page['image'] . '" alt="">
                    </div>';
                    echo '<div class="col-lg-12 blog__details__item__text">
                    <p>' . $page['text'] . '</p></div>';
                } elseif ($page['imageLocation'] == 3) {
                    echo '<div class="col-lg-12 blog__details__item__text">
                    <p>' . $page['text'] . '</p></div>';
                    echo '<div class="col-lg-12">
                    <img src="' . $cfg['urls']['site'] . '/upload/pages/' . $page['image'] . '" alt="">
                    </div>';
                } elseif ($page['imageLocation'] == 2) {
                    echo '<div class="col-lg-6 blog__details__item__text">
                    <p>' . $page['text'] . '</p></div>';
                    echo '<div class="col-lg-6">
                    <img src="' . $cfg['urls']['site'] . '/upload/pages/' . $page['image'] . '" alt="">
                    </div>';
                } else {
                    echo '<div class="col-lg-6">
                    <img src="' . $cfg['urls']['site'] . '/upload/pages/' . $page['image'] . '" alt="">
                    </div>';
                    echo '<div class="col-lg-6 blog__details__item__text">
                    <p>' . $page['text'] . '</p></div>';
                }
                ?>
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