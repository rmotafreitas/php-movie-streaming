<?php
include 'inc/config.inc.php';

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Pacote TV">
    <meta name="params" content="teste">
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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <?php
                // Get 3 random movies
                $sql = "SELECT * FROM movies ORDER BY RAND() LIMIT 3";
                $result = my_query($sql);
                foreach ($result as $movie) {
                    $query = "SELECT * FROM categories WHERE id IN (" . $movie['categories'] . ")";
                    $str = '';
                    $categorias = my_query($query);
                    foreach ($categorias as $categoria) {
                        $str .= '<div class="label">' . $categoria['name'] . '</div>&nbsp;';
                    }

                    $smallDesc = substr($movie['description'], 0, 80);
                    $url = 'movie-details.php?id=' . $movie['id'] . '&nome=' . $movie['title'];
                    $url = getUrlFriendly($url, $cfg);
                    echo ' <div class="hero__items set-bg" data-setbg="' . $cfg['urls']['site'] . '/upload/posters/' . $movie['poster'] . '">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                ' . $str . '
                                <h2>' . $movie['title'] . '</h2>
                                <p>' . $smallDesc . '...</p>
                                <a href="' . $url . '"><span>Ver Agora</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Popular Atualmente</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Ver mais <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM movies ORDER BY clicks ASC LIMIT 6, 6";
                            $arrLogs = my_query($sql);
                            $arrLogs = array_reverse($arrLogs);
                            if (count($arrLogs)) {
                                foreach ($arrLogs as $log) {
                                    movieDiv($log, $cfg);
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Popular</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Ver mais <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM movies ORDER BY clicks DESC LIMIT 6";
                            $arrLogs = my_query($sql);
                            if (count($arrLogs)) {
                                foreach ($arrLogs as $log) {
                                    movieDiv($log, $cfg);
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Filmes Adicionados Recentemente</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Ver mais <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM movies ORDER BY id DESC LIMIT 6";
                            $result = my_query($sql);
                            foreach ($result as $key => $movie) {
                                movieDiv($movie, $cfg);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="live__product">
                        <?php
                        // Get a random category with at least one movie
                        $sql = "SELECT * FROM categories WHERE id IN (SELECT categories FROM movies) ORDER BY RAND() LIMIT 1";
                        $result = my_query($sql);
                        $category = $result[0];
                        ?>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Filmes de <?= $category['name'] ?> </h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Ver mais <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            //Get a movie that have the category
                            $sql = "SELECT * FROM movies WHERE categories LIKE '%$category[id]%' ORDER BY RAND() LIMIT 6";
                            $result = my_query($sql);
                            foreach ($result as $key => $movie) {
                                movieDiv($movie, $cfg);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                sidebar($cfg);
                ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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
    <script src="<?= $cfg['urls']['site'] ?>/js/main.js"></script>


</body>

</html>