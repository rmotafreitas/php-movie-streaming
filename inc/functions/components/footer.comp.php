<?php
function footer($cfg)
{ ?>

    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="footer__logo">
                        <a href="<?= getUrlFriendly('index.php', $cfg) ?>"><img src="<?= $cfg['urls']['site'] ?>/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        Copyright: &copy;<script>
                            document.write(new Date().getFullYear());
                        </script><br>Ricardo Freitas Colgaia 12ITM <i class="fa fa-heart" aria-hidden="true"></i><br><a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </p>

                </div>
            </div>
        </div>
    </footer>

<?php
}
