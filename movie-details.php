<?php
include 'inc/config.inc.php';
include $cfg['dirs']['admin'] . '/inc/db/models/movies.model.php';
$vars = isset($params) ? $params : $_GET;
$id = $vars['id'];
$sql = "SELECT * FROM movies WHERE id = $id";
$movie = my_query($sql);


if (count($movie) == 0) {
    header('Location: ' . $cfg['urls']['site'] . '/404.php');
    exit;
}


$movie = $movie[0];
$views = $movie['clicks'] + 1;
$sqlAddClick = "UPDATE movies SET clicks = $views WHERE id = $id";
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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= getUrlFriendly('css/bootstrap.min.css', $cfg); ?>" type="text/css">
    <link rel="stylesheet" href="<?= getUrlFriendly('css/font-awesome.min.css', $cfg); ?>" type="text/css">
    <link rel="stylesheet" href="<?= getUrlFriendly('css/elegant-icons.css', $cfg); ?>" type="text/css">
    <link rel="stylesheet" href="<?= getUrlFriendly('css/plyr.css', $cfg); ?>" type="text/css">
    <link rel="stylesheet" href="<?= getUrlFriendly('css/nice-select.css', $cfg); ?>" type="text/css">
    <link rel="stylesheet" href="<?= getUrlFriendly('css/owl.carousel.min.css', $cfg); ?>" type="text/css">
    <link rel="stylesheet" href="<?= getUrlFriendly('css/slicknav.min.css', $cfg); ?>" type="text/css">
    <link rel="stylesheet" href="<?= getUrlFriendly('css/lightbox.min.css', $cfg); ?>" type="text/css">
    <link rel="stylesheet" href="<?= getUrlFriendly('css/style.css', $cfg); ?>" type="text/css">
    <link rel="icon" type="image/x-icon" href="<?= getUrlFriendly('img/favicon.ico', $cfg); ?>">


    <style>
        .carousel {
            position: relative;
        }

        .carousel-item img {
            object-fit: cover;
        }

        #carousel-thumbs {
            bottom: 0;
            left: 0;
            padding: 0 50px;
            right: 0;
        }

        #carousel-thumbs img {
            border: 5px solid transparent;
            cursor: pointer;
        }

        #carousel-thumbs img:hover {
            border-color: rgba(255, 255, 255, .3);
        }

        #carousel-thumbs .selected img {
            border-color: #fff;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
        }

        @media all and (max-width: 767px) {
            .carousel-container #carousel-thumbs img {
                border-width: 3px;
            }
        }

        @media all and (min-width: 576px) {
            .carousel-container #carousel-thumbs {
                position: absolute;
            }
        }

        @media all and (max-width: 576px) {
            .carousel-container #carousel-thumbs {
                background: #ccccce;
            }
        }
    </style>
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
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Filmes</a>
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
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="<?= $cfg['urls']['uploads'] ?>/covers/<?= $movie['cover'] ?>">
                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                            <div class="view"><i class="fa fa-eye"></i> <?= $views ?></div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?= $movie['title'] ?></h3>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <?php
                                    $stars = $movie['stars'];
                                    for ($i = 0; $i < $stars; $i++) {
                                        echo '<i class="fa fa-star"></i>';
                                    }
                                    for ($i = 0; $i < 5 - $stars; $i++) {
                                        echo '<i class="fa fa-star-o"></i>';
                                    }
                                    ?>
                                </div>
                                <!-- <span>1.029 Votes</span> -->
                            </div>
                            <p><?= $movie['description'] ?></p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Diretor:</span> <?= $movie['director'] ?></li>
                                            <li><span>Ano:</span> <?= $movie['year'] ?></li>
                                            <li><span>Categorias: </span>
                                                <?php
                                                $query = "SELECT * FROM categories WHERE id IN (" . $movie['categories'] . ")";
                                                $categorias = my_query($query);
                                                $nomes = array();
                                                foreach ($categorias as $categoria) {
                                                    $nomes[] = $categoria['name'];
                                                }
                                                echo (implode(', ', $nomes));
                                                ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Duration:</span> <?= $movie['duration'] ?></li>
                                            <li><span>Quality:</span> <?= $arrModel['fields']['quality']['select_options'][$movie['quality']]['label'] ?></li>
                                            <li><span>Views:</span> <?= $views ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="<?= getUrlFriendly('movie-watching.php?id=' . $id . '&nome=' . $movie['title'], $cfg); ?>" class="follow-btn"><i class="fa fa-play"></i> Ver Agora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php
                    //Get the arrPhotos and do the carousel
                    $arrPhotos = explode(',', $movie['arrPhotos']);
                    if (count($arrPhotos) > 0) {
                    ?>
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Fotos</h5>
                            </div>
                            <div id="carousel-thumbs" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                    <?php
                                    $i = 0;
                                    foreach ($arrPhotos as $photo) {
                                        if ($i != 0) {
                                            if ($i % 6 == 0) {
                                                echo '</div>';
                                                echo '</div>';
                                                echo '<div class="carousel-item">
                                                <div class="row mx-0">';
                                            }
                                        } else {
                                            echo '<div class="carousel-item active">
                                            <div class="row mx-0">';
                                        }
                                    ?>

                                        <div id="carousel-selector-0" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to=<?= $i + 1 ?>>
                                            <a class="example-image-link" href="<?= $cfg['urls']['uploads'] ?>/photos/<?= $photo ?>" data-lightbox="example-set"><img class="img-fluid" src="<?= $cfg['urls']['uploads'] ?>/photos/<?= $photo ?>" style="width: 100px; height: 100px;" /></a>
                                        </div>
                                    <?php
                                        $i++;
                                    }
                                    echo '</div>';
                                    echo '</div>';
                                    ?>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!--
                    <div class="blog__details__comment">
                        <h4>3 Comments</h4>
                        <div class="blog__details__comment__item">
                            <div class="blog__details__comment__item__pic">
                                <img src="img/blog/details/comment-1.png" alt="">
                            </div>
                            <div class="blog__details__comment__item__text">
                                <span>Sep 08, 2020</span>
                                <h5>John Smith</h5>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi</p>
                                <a href="#">Like</a>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                        <div class="blog__details__comment__item blog__details__comment__item--reply">
                            <div class="blog__details__comment__item__pic">
                                <img src="img/blog/details/comment-2.png" alt="">
                            </div>
                            <div class="blog__details__comment__item__text">
                                <span>Sep 08, 2020</span>
                                <h5>Elizabeth Perry</h5>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi</p>
                                <a href="#">Like</a>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                        <div class="blog__details__comment__item">
                            <div class="blog__details__comment__item__pic">
                                <img src="img/blog/details/comment-3.png" alt="">
                            </div>
                            <div class="blog__details__comment__item__text">
                                <span>Sep 08, 2020</span>
                                <h5>Adrian Coleman</h5>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi</p>
                                <a href="#">Like</a>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                    </div>
                    -->
                    <?php
                    //Select all categories with at least one movie
                    $sql = "SELECT * FROM categories WHERE id IN ($movie[categories]) ORDER BY RAND() LIMIT 2";
                    $res = my_query($sql);
                    foreach ($res as $category) {
                        echo '<div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Mais filmes de ' . $category['name'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="btn__all">
                                        <a href="' . $cfg['urls']['site'] . '/category.php?id=' . $category['id'] . '" class="primary-btn">Ver mais <span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">';
                        //Select all movies from the current category
                        $sql = "SELECT * FROM movies WHERE categories LIKE '%$category[id]%' ORDER BY RAND() LIMIT 3";
                        $resMoives = my_query($sql);
                        foreach ($resMoives as $movie) {
                            movieDiv($movie, $cfg);
                        }
                        echo '
                        </div>
                    </div>';
                    }
                    ?>
                </div>
                <?php
                sidebar($cfg);
                ?>
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
    <script src="<?= getUrlFriendly('js/jquery-3.3.1.min.js', $cfg); ?>"></script>
    <script src="<?= getUrlFriendly('js/bootstrap.min.js', $cfg); ?>"></script>
    <script src="<?= getUrlFriendly('js/player.js', $cfg); ?>"></script>
    <script src="<?= getUrlFriendly('js/jquery.nice-select.min.js', $cfg); ?>"></script>
    <script src="<?= getUrlFriendly('js/mixitup.min.js', $cfg); ?>"></script>
    <script src="<?= getUrlFriendly('js/jquery.slicknav.js', $cfg); ?>"></script>
    <script src="<?= getUrlFriendly('js/owl.carousel.min.js', $cfg); ?>"></script>
    <script src="<?= getUrlFriendly('js/lightbox-plus-jquery.min.js', $cfg); ?>"></script>
    <script src="<?= getUrlFriendly('js/main.js', $cfg); ?>"></script>
</body>

</html>