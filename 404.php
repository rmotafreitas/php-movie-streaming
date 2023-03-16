<?php
include 'inc/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <!-- Css Styles -->
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/elegant-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/plyr.css" type="text/css" />
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/nice-select.css" type="text/css" />
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/owl.carousel.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/slicknav.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/style.css" type="text/css" />
  <link rel="icon" type="image/x-icon" href="<?= $cfg['urls']['site'] ?>/img/favicon.ico" />
  <link rel="stylesheet" href="<?= $cfg['urls']['site'] ?>/css/404.css" />
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.39), rgba(0, 0, 0, 0.39)), url(<?= $cfg['urls']['site'] ?>/img/4040.gif)">
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          <div class="header__logo">
            <a href="<?= getUrlFriendly('index.php', $cfg); ?>">
              <img src="<?= $cfg['urls']['site'] ?>/img/logo.png" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="rigthCorner">
    <p class="error">Código de Erro: 404</p>
  </div>
  <div class="text404">
    <div>
      <?php
      $sql = "SELECT * FROM movies WHERE `title` = 'Gambito de Dama'";
      $result = my_query($sql);
      $id = $result[0]['id'];
      $url = 'movie-details.php?id=' . $id . '&nome=Gambito+de+Dama';
      $url = getUrlFriendly($url, $cfg);
      ?>


      <h1 class="title404">Oops, é um erro.</h1>
      <p class="paragraph404">
        Vamos voltar um passo para trás. <br />
        Ou, devemos dar uma opurtonidade ao
        <a class="linkref" href="<?= $url ?>">Gambito de Dama</a>?
      </p>
      <div class="btn">
        <a class="homeBtn" href="<?= getUrlFriendly('index.php', $cfg); ?>">Voltar para o menu inical da Pacote TV</a>
      </div>
    </div>
  </div>
</body>

</html>