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
    <link href="<?php echo $cfg['urls']['browserComponents'] ?>/dropzone/dropzone.min.css" rel="stylesheet" />
    <link href="<?php echo $cfg['urls']['browserComponents'] ?>/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $cfg['urls']['browserComponents'] ?>/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?php echo $cfg['urls']['browserComponents'] ?>/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="<?php echo $cfg['urls']['browserComponents'] ?>/slick-carousel/slick/slick.css" rel="stylesheet" />
    <link href="css/main.css?version=4.5.0" rel="stylesheet" />
    <?php scripts($cfg); ?>
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

            <div class="content-panel-toggler">
                <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
            </div>
            <div class="content-i">
                <div class="content-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="element-wrapper">
                                <div class="element-box">
                                    <?php
                                    $file = getModelByTable($cfg, $_GET['table']);
                                    include $file;
                                    include $cfg['dirs']['admin'] . '/inc/db/controllers/insert.php';
                                    ?>
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

</body>

</html>