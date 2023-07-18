<?php
if (!empty($_GET["seflink"])) {
    $seflink = $VT->filter($_GET["seflink"]);

    $bilgi = $VT->VeriGetir("bloglar", "WHERE seflink=? AND durum=?", array($seflink, 1), "ORDER BY ID ASC", 1);

    if ($bilgi != false) {
        ?>
        <link href="<?= SITE ?>css/account.css" rel="stylesheet">
        <main class="bg_gray">

            <div class="container margin_30">
                <div class="page_header">
                    <h1>
                        <?= stripslashes($bilgi[0]["baslik"]) ?>
                    </h1>
                </div>
                <!-- /page_header -->
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <?php
                        if (!empty($bilgi[0]["resim"])) {
                            ?>

                                <img src="<?=SITE?>images/bloglar/<?=$bilgi[0]["resim"]?>" style="width: 40%; height: auto; padding: 5px; margin: 15px; border: 1px solid #ddd; float: left; display: block;">
                            <?php
                        }
                        ?>

                        <?= stripslashes($bilgi[0]["metin"]) ?>

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