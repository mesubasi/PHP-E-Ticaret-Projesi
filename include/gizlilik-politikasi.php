<?php
if (!empty($_GET["seflink"])) {
    $seflink = $VT->filter($_GET["seflink"]);

    $bilgi = $VT->VeriGetir("gizlilikpolitikasi", "WHERE seflink=? AND durum=?", array($seflink, 1), "ORDER BY ID ASC", 1);

    if ($bilgi != false) {
        ?>
        <link href="<?= SITE ?>css/account.css" rel="stylesheet">
        <main class="bg_gray">

            <div class="container margin_30">
                <div class="page_header">
                    <h1><?=stripslashes($bilgi[0]["baslik"])?></h1>
                </div>
                <!-- /page_header -->
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                    <?=stripslashes($bilgi[0]["metin"])?>

                    </div>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </main>
        <!--/main-->
        <?php


    }

}

?>