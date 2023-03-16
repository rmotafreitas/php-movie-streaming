<?php
function movieDiv($movie, $cfg)
{
    $views = getViews($movie, $cfg);
    $url = 'movie-details.php?id=' . $movie['id'] . '&nome=' . $movie['title'];
    $url = getUrlFriendly($url, $cfg);
?>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <a href="<?= $url ?>">
                <div class="product__item__pic set-bg" data-setbg="<?= $cfg['urls']['site'] ?>/upload/covers/<?= $movie['cover'] ?>">
                    <div class="ep"><?= $movie['stars'] ?> / 5 <i class="fa fa-star"></i></div>
                    <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                    <div class="view"><i class="fa fa-eye"></i> <?= $views ?></div>
                </div>
            </a>
            <div class="product__item__text">
                <ul>
                    <?php
                    $query = "SELECT * FROM categories WHERE id IN (" . $movie['categories'] . ")";
                    $categorias = my_query($query);
                    foreach ($categorias as $categoria) {
                        echo '<li>' . $categoria['name'] . '</li>&nbsp;';
                    }
                    ?>
                </ul>
                <h5><a href="<?= $url ?>"><?= $movie['title'] ?></a></h5>
            </div>
        </div>
    </div>
<?php
}


function getViews($movie, $cfg)
{
    return $movie['clicks'];
}

function getNewsViews($new, $cfg)
{
    return $new['clicks'];
}

function newSideDiv($new, $cfg)
{
    $views = getNewsViews($new, $cfg);
    $url = 'news-details.php?id=' . $new['id'] . '&nome=' . $new['title'];

    $url = getUrlFriendly($url, $cfg);

    echo '<a href="' . $url . '"><div class="product__sidebar__view__item set-bg mix" data-setbg="' . $cfg['urls']['site'] . '/upload/news/' . $new['image'] . '">
    <div class="ep">' . $new['date'] . '</div>
    <div class="view"><i class="fa fa-eye"></i> ' . $views . '</div>
    <h5><a href="' . $url . '">' . $new['title'] . '</a></h5>
</div></a>';
}

function movieSideDiv($movie, $cfg)
{
    $views = getViews($movie, $cfg);
    $url = 'movie-details.php?id=' . $movie['id'] . '&nome=' . $movie['title'];

    $url = getUrlFriendly($url, $cfg);

    echo '<div class="product__sidebar__comment__item">
    <div class="product__sidebar__comment__item__pic">
    <a href="' . $url . '"><img src="' . $cfg['urls']['site'] . '/upload/covers/' . $movie['cover'] . '" style="witdh: 90px; height: 130px;" alt=""></a>
        
    </div>
    <div class="product__sidebar__comment__item__text">
        <ul>
            ';
    $query = "SELECT * FROM categories WHERE id IN (" . $movie['categories'] . ")";
    $categorias = my_query($query);
    foreach ($categorias as $categoria) {
        echo '<li>' . $categoria['name'] . '</li>&nbsp;';
    }
    echo '
        </ul>
        <h5><a href="' . $url . '">' . $movie['title'] . '</a></h5>
        <span><i class="fa fa-eye"></i> ' . $views . ' Viewes</span>
    </div>
</div>';
}

function randomMoviesDiv($cfg)
{ ?>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>Filmes Aleatórios</h5>
        </div>
        <?php
        $sql = "SELECT * FROM movies ORDER BY RAND() LIMIT 3";
        $result = my_query($sql);
        foreach ($result as $movie) {
            movieSideDiv($movie, $cfg);
        }
        ?>
    </div>
<?php
}
