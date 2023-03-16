<?php
$pageSize = 20;
include 'inc/config.inc.php';
$vars = isset($params) ? $params : $_GET;
$c = $vars['id'];
$sqlGetCat = "SELECT * FROM categories WHERE id = $c";
$resCat = my_query($sqlGetCat);
$cat = $resCat[0];
$page = isset($_GET['p']) ? $_GET['p'] : 1;
$offset = ($page - 1) * $pageSize;
$sql = "SELECT * FROM movies WHERE categories LIKE '%$c%' LIMIT $offset, $pageSize";
$result = my_query($sql);
$sql = "SELECT * FROM movies WHERE categories LIKE '%$c%'";
$total = count(my_query($sql));

if (count($result) == 0) {
    header('Location: ' . $cfg['urls']['site'] . '/404.php');
    exit;
}

$totalPage = ceil($total / $pageSize);
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
                        <a href="<?= $cfg['urls']['site'] ?>/categories.html">Categories</a>
                        <span><?= $cat['name'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4><?= $cat['name'] ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($result as $movie) {
                                movieDiv($movie, $cfg);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="product__pagination">
                        <?php
                        $currentPage = $page;
                        $previousPage = $currentPage - 1;
                        $nextPage = $currentPage + 1;
                        $start = $currentPage - 2;
                        $end = $currentPage + 2;
                        $oUrl = "category.php?id=$c&nome={$cat['name']}";
                        if ($currentPage > 1) {
                            $url = $oUrl . "&p=$previousPage";
                            $url = getUrlFriendly($url, $cfg);
                            echo '<a href="?p=' . $previousPage . '"><i class="fa fa-angle-double-left"></i></a>';
                        }
                        for ($i = $start; $i <= $end; $i++) {
                            if ($i > 0 && $i <= $totalPage) {
                                $url = $oUrl . "&p=$i";
                                $url = getUrlFriendly($url, $cfg);
                                $class = $i == $currentPage ? 'current-page' : '';
                                echo '<a class="' . $class . '" href="' . $url . '">' . $i . '</a>';
                            }
                        }
                        if ($currentPage < $totalPage) {
                            $url = $oUrl . "&p=$nextPage";
                            $url = getUrlFriendly($url, $cfg);
                            echo '<a href="' . $url . '"><i class="fa fa-angle-double-right"></i></a>';
                        }
                        ?>
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