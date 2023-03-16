<?php
include 'inc/config.inc.php';
$vars = isset($params) ? $params : $_GET;
$id =  $vars['id'];
$sql = "SELECT * FROM movies WHERE id = $id";
$res = my_query($sql);

if (count($res) == 0) {
    header('Location: ' . $cfg['urls']['site'] . '/404.php');
    exit;
}


$movie = $res[0];
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="<?= $cfg['urls']['site'] ?>/index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="<?= $cfg['urls']['site'] ?>/categories.html">Filmes</a>
                        <span><?= $movie['title'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player" style="
    display: grid;
    place-items: center;
">
                        <video id="player" playsinline controls data-poster="upload/posters/<?= $movie['poster'] ?>">
                            <source src="<?= $cfg['urls']['site'] ?>/upload/movies/<?= $movie['file'] ?>" type="video/mp4" />
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->

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