<?php
function bigSquare($new, $cfg)
{
    echo '<div class="col-lg-12">
    <div class="blog__item set-bg" data-setbg="upload/news/' . $new['image'] . '">
        <div class="blog__item__text">
            <p><span class="icon_calendar"></span> ' . $new['date'] . '</p>
            <h4><a href="' . getUrlFriendly('news-details.php?id=' . $new['id'], $cfg) . '">' . $new['title'] . '</a></h4>
        </div>
    </div>
</div>';
}

function smallSquare($new, $cfg)
{
    echo '<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="blog__item small__item set-bg" data-setbg="upload/news/' . $new['image'] . '">
        <div class="blog__item__text">
            <p><span class="icon_calendar"></span> ' . $new['date'] . '</p>
            <h4><a href="' . getUrlFriendly('news-details.php?id=' . $new['id'], $cfg) . '">' . $new['title'] . '</a></h4>
        </div>
    </div>
</div>';
}

function sidebar($cfg)
{ ?>
    <div class="col-lg-4 col-md-6 col-sm-8">
        <div class="product__sidebar">
            <?php
            $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
            $result = my_query($sql);
            if (count($result)) {
            ?>
                <div class="product__sidebar__view">
                    <div class="section-title">
                        <h5>Ultimas Notícias</h5>
                    </div>
                    <div class="filter__gallery">
                        <?php
                        //Get 3 random movies
                        foreach ($result as $key => $movie) {
                            newSideDiv($movie, $cfg);
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            randomMoviesDiv($cfg);
            ?>
        </div>
    </div>
<?php }
