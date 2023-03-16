<?php
include '../../../inc/config.inc.php';
checkAuth($cfg);
$limit = 20;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
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
</head>

<body class="menu-position-side menu-side-left full-screen with-content-panel">
  <div class="all-wrapper with-side-panel solid-bg-all">
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

        <div class="content-panel-toggler">
          <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
        </div>
        <div class="content-i">
          <div class="content-box">
            <div class="element-wrapper">
              <div class="element-box-tp">
                <?php
                $file = getModelByTable($cfg, $_GET['table']);
                include $file;
                $onlyDelete = isset($arrModel['onlyDelete']) ? $arrModel['onlyDelete'] : 0;
                ?>
                <h5 class="form-header"><?= $arrModel['label'] ?></h5>
                <div class="element-box-tp">
                  <div class="table-responsive">
                    <table class="table table-bordered table-lg table-v2 table-striped">
                      <?php
                      include '../../inc/db/controllers/list.php';
                      ?>
                    </table>
                  </div>
                  <div class="controls-below-table">
                    <div class="table-records-info">
                      <?php
                      $resTable = "SELECT * FROM {$arrModel['table']} LIMIT $offset, $limit";
                      $resTable = my_query($resTable);

                      $sql = "SELECT COUNT(*) AS total FROM {$arrModel['table']}";
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
                      <p>A mostrar <?php echo $offset + 1; ?>-<?php echo $offset + count($resTable); ?> de <?php echo $total, ' registos da tabela ' . $arrModel['label']; ?></p>
                    </div>
                    <div class="table-records-pages">
                      <ul>
                        <?php
                        if ($previousPage > 0) {
                          echo '<li><a href="?table=' . $arrModel['table'] . '&page=' . $previousPage . '"><</a></li>';
                        }
                        for ($i = $start; $i <= $end; $i++) {
                          if ($i == $currentPage) {
                            echo '<li class="current">' . $i . '</li>';
                          } else {
                            if ($i > 0 && $i <= $totalPages) {
                              echo '<li><a href="?table=' . $arrModel['table'] . '&page=' . $i . '">' . $i . '</a></li>';
                            }
                          }
                        }
                        if ($nextPage <= $totalPages) {
                          echo '<li><a href="?table=' . $arrModel['table'] . '&page=' . $nextPage . '">></a></li>';
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              if (!$onlyDelete) { ?>
                <button class="mr-2 mb-2 btn btn-primary btn-lg" type="button" onclick="window.location.href='<?= $cfg['urls']['admin'] . '/pages/dashboard/insertForm.php?table=' . $arrModel['table'] ?>'">Insert</button>
              <?php
              }
              ?>
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