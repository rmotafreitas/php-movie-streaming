<?php

function sideMenuDashboard($cfg)
{
?>
    <div class="menu-w color-scheme-light color-style-default menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
        <div class="logo-w">
            <a class="logo" href="index.php">
                <div class="logo-label">Pacote TV - Admin</div>
            </a>
        </div>
        <div class="logged-user-w avatar-inline">
            <div class="logged-user-i">
                <div class="avatar-w"><img alt="" src="img/admin.jpg" /></div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">Administrator</div>
                </div>
            </div>
        </div>

        <h1 class="menu-page-header">Page Header</h1>
        <?php
        menuDashboard($cfg);
        ?>
    </div>
    <div class="menu-mobile menu-activated-on-click color-scheme-dark">
        <div class="mm-logo-buttons-w">
            <a class="mm-logo" href="index.php"><span>Pacote TV - Admin</span></a>
            <div class="mm-buttons">
                <div class="mobile-menu-trigger">
                    <div class="os-icon os-icon-hamburger-menu-1"></div>
                </div>
            </div>
        </div>
        <div class="menu-and-user">
            <div class="logged-user-w">
                <div class="avatar-w"><img alt="" src="img/admin.jpg" /></div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">Administrator</div>
                </div>
            </div>
            <?php
            menuDashboard($cfg);
            ?>
        </div>
    </div>
<?php
}

function menuDashboard($cfg)
{ ?>
    <ul class="main-menu">
        <li>
            <a href="index.php">
                <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Logs</span>
            </a>
        </li>

        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-edit-32"></div>
                </div>
                <span>Tables</span>
            </a>
            <ul class="sub-menu">
                <?php
                $path = $cfg['dirs']['adminIncludes'] . '/db/models';
                foreach (new DirectoryIterator($path) as $file) {
                    if (!is_dir($file)) {
                        include $path . "/$file";
                        echo '<li><a href="' . $cfg['urls']['admin'] . '/pages/dashboard/listTable.php?table=' . $arrModel['table'] . '">' . $arrModel['label'] . '</a></li>';
                    }
                }

                ?>
            </ul>
        </li>


        <li>
            <a href="logout.php">
                <div class="icon-w">
                    <div class="os-icon os-icon-signs-11"></div>
                </div>
                <span>Logout</span>
            </a>
        </li>
    </ul>
<?php
}
