<?php
include '../../../inc/config.inc.php';
checkAuth($cfg);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Pacote TV | Dashboard</title>
  <meta charset="utf-8" />
  <meta content="width=device-width,initial-scale=1" name="viewport" />
  <link href="<?= $cfg['urls']['site'] ?>/img/favicon.ico" rel="shortcut icon" />
  <link href="<?php echo $cfg['urls']['browserComponents'] ?>/select2/dist/css/select2.min.css" rel="stylesheet" />
  <link href="<?php echo $cfg['urls']['browserComponents'] ?>/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="<?php echo $cfg['urls']['browserComponents'] ?>/dropzone/dist/dropzone.css" rel="stylesheet" />
  <link href="<?php echo $cfg['urls']['browserComponents'] ?>/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo $cfg['urls']['browserComponents'] ?>/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
  <link href="<?php echo $cfg['urls']['browserComponents'] ?>/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet" />
  <link href="<?php echo $cfg['urls']['browserComponents'] ?>/slick-carousel/slick/slick.css" rel="stylesheet" />
  <link href="css/main.css?version=4.5.0" rel="stylesheet" />
  <style>
    .cke {
      visibility: hidden;
    }
  </style>
  <style type="text/css">
    /* Chart.js */
    @keyframes chartjs-render-animation {
      from {
        opacity: 0.99;
      }

      to {
        opacity: 1;
      }
    }

    .chartjs-render-monitor {
      animation: chartjs-render-animation 1ms;
    }

    .chartjs-size-monitor,
    .chartjs-size-monitor-expand,
    .chartjs-size-monitor-shrink {
      position: absolute;
      direction: ltr;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      overflow: hidden;
      pointer-events: none;
      visibility: hidden;
      z-index: -1;
    }

    .chartjs-size-monitor-expand>div {
      position: absolute;
      width: 1000000px;
      height: 1000000px;
      left: 0;
      top: 0;
    }

    .chartjs-size-monitor-shrink>div {
      position: absolute;
      width: 200%;
      height: 200%;
      left: 0;
      top: 0;
    }
  </style>
</head>

<body class="menu-position-side menu-side-left full-screen">
  <div class="all-wrapper solid-bg-all">
    <div class="search-with-suggestions-w">
      <div class="search-with-suggestions-modal">
        <div class="element-search">
          <input class="search-suggest-input" placeholder="Start typing to search..." />
          <div class="close-search-suggestions">
            <i class="os-icon os-icon-x"></i>
          </div>
        </div>
        <div class="search-suggestions-group">
          <div class="ssg-header">
            <div class="ssg-icon">
              <div class="os-icon os-icon-box"></div>
            </div>
            <div class="ssg-name">Projects</div>
            <div class="ssg-info">24 Total</div>
          </div>
          <div class="ssg-content">
            <div class="ssg-items ssg-items-boxed">
              <a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(img/company6.png)"></div>
                <div class="item-name">
                  Integ<span>ration</span> with API
                </div>
              </a><a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(img/company7.png)"></div>
                <div class="item-name">
                  Deve<span>lopm</span>ent Project
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="search-suggestions-group">
          <div class="ssg-header">
            <div class="ssg-icon">
              <div class="os-icon os-icon-users"></div>
            </div>
            <div class="ssg-name">Customers</div>
            <div class="ssg-info">12 Total</div>
          </div>
          <div class="ssg-content">
            <div class="ssg-items ssg-items-list">
              <a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(img/avatar1.jpg)"></div>
                <div class="item-name">John Ma<span>yer</span>s</div>
              </a><a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
                <div class="item-name">Th<span>omas</span> Mullier</div>
              </a><a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
                <div class="item-name">Kim C<span>olli</span>ns</div>
              </a>
            </div>
          </div>
        </div>
        <div class="search-suggestions-group">
          <div class="ssg-header">
            <div class="ssg-icon">
              <div class="os-icon os-icon-folder"></div>
            </div>
            <div class="ssg-name">Files</div>
            <div class="ssg-info">17 Total</div>
          </div>
          <div class="ssg-content">
            <div class="ssg-items ssg-items-blocks">
              <a class="ssg-item" href="#">
                <div class="item-icon">
                  <i class="os-icon os-icon-file-text"></i>
                </div>
                <div class="item-name">Work<span>Not</span>e.txt</div>
              </a><a class="ssg-item" href="#">
                <div class="item-icon">
                  <i class="os-icon os-icon-film"></i>
                </div>
                <div class="item-name">V<span>ideo</span>.avi</div>
              </a><a class="ssg-item" href="#">
                <div class="item-icon">
                  <i class="os-icon os-icon-database"></i>
                </div>
                <div class="item-name">User<span>Tabl</span>e.sql</div>
              </a><a class="ssg-item" href="#">
                <div class="item-icon">
                  <i class="os-icon os-icon-image"></i>
                </div>
                <div class="item-name">wed<span>din</span>g.jpg</div>
              </a>
            </div>
            <div class="ssg-nothing-found">
              <div class="icon-w">
                <i class="os-icon os-icon-eye-off"></i>
              </div>
              <span>No files were found. Try changing your query...</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="layout-w">
      <?php
      sideMenuDashboard($cfg);
      ?>
      <div class="content-w">
        <div class="content-i">
          <div class="content-box">
            <div class="row pt-4">
              <div class="col-sm-12">
                <div class="element-wrapper">
                  <h6 class="element-header">Logs</h6>
                  <div class="element-box-tp">
                    <div class="table-responsive">
                      <table class="table table-padded">
                        <thead>
                          <?php
                          // I want to show only 20 logs per page
                          $limit = 20;
                          $page = isset($_GET['page']) ? $_GET['page'] : 1;
                          $offset = ($page - 1) * $limit;
                          $dbname = $cfg['db']['name'];
                          $sql = "SELECT *
                          FROM INFORMATION_SCHEMA.COLUMNS
                          WHERE TABLE_NAME = N'logs' AND TABLE_SCHEMA = N'$dbname'";
                          $resArrows = my_query($sql);;
                          ?>
                          <tr>
                            <?php
                            foreach ($resArrows as $key => $value) {
                              if ($value['COLUMN_NAME'] != 'id') {
                                echo '<th>' . $value['COLUMN_NAME'] . '</th>';
                              }
                            }
                            ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = "SELECT * FROM logs ORDER BY data, hora DESC LIMIT $offset, $limit";
                          $resLogs = my_query($sql);
                          ?>
                          <?php
                          foreach ($resLogs as $key => $value) {
                            echo '<tr>';
                            foreach ($value as $key2 => $value2) {
                              if ($key2 != 'id') {
                                if ($key2 == 'autor') {
                                  if ($value2 == 'admin') {
                                    $value2 = '<div class="user-with-avatar">
                                    <img alt="" src="img/admin.jpg" /><span>' . $value2 . '</span>
                                </div>';
                                  } else {
                                    $value2 = '<div class="user-with-avatar">
                                    <img alt="" src="img/user.jpg" /><span>' . $value2 . '</span>
                                </div>';
                                  }
                                } /*elseif ($key2 == "dispositivo") {
                                  if ($value2 == "Desktop") {
                                    $value2 = '<i class="os-icon os-icon-system"></i>';
                                  } else {
                                    $value2 = '<i class="os-icon os-icon-phone"></i>';
                                  }
                                } */
                                echo '<td>' . $value2 . '</td>';
                              }
                            }
                            echo '</tr>';
                          }
                          ?>
                        </tbody>
                      </table>
                      <div class="controls-below-table">
                        <div class="table-records-info">
                          <?php
                          $sql = "SELECT COUNT(*) AS total FROM logs";
                          $resTotal = my_query($sql);
                          $total = $resTotal[0]['total'];

                          $totalPages = ceil($total / $limit);
                          $currentPage = $page;
                          $previousPage = $currentPage - 1;
                          $nextPage = $currentPage + 1;
                          $start = $currentPage - 2;
                          $end = $currentPage + 2;
                          if ($start < 1) {
                            $start = 1;
                            $end = 5;
                          }
                          if ($end > $totalPages) {
                            $end = $totalPages;
                            $start = $end - 4;
                          }
                          ?>
                          <p>A mostrar <?php echo $offset + 1; ?>-<?php echo $offset + count($resLogs); ?> de <?php echo $total; ?> logs</p>
                        </div>
                        <div class="table-records-pages">
                          <ul>
                            <?php
                            if ($previousPage > 0) {
                              echo '<li><a href="?page=' . $previousPage . '"><</a></li>';
                            }
                            for ($i = $start; $i <= $end; $i++) {
                              if ($i == $currentPage) {
                                echo '<li class="current">' . $i . '</li>';
                              } else {
                                if ($i > 0 && $i <= $totalPages) {
                                  echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                              }
                            }
                            if ($nextPage <= $totalPages) {
                              echo '<li><a href="?page=' . $nextPage . '">></a></li>';
                            }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="display-type"></div>
  </div>
  <?php scripts($cfg); ?>
</body>

</html>