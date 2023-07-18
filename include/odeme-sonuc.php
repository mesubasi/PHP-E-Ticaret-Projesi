<link href="<?= SITE ?>css/checkout.css" rel="stylesheet">
<?php
if (!empty($_SESSION["siparisKodu"])) {
    ?>
    <main class="bg_gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div id="confirm">
                        <div class="icon icon--order-success svg add_bottom_15">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                                <g fill="none" stroke="#8EC343" stroke-width="2">
                                    <circle cx="36" cy="36" r="35"
                                        style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                    <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                        style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                </g>
                            </svg>
                        </div>
                        <h2>Ödemeniz Tamamlandı!</h2>
                        <p>Siparişinizi <strong>
                                <?= $_SESSION["siparisKodu"] ?>
                            </strong>'nolu numara üzerinden takip edebilirsiniz.</p>

                        <meta http-equiv="refresh" content="3;url=<?= SITE ?>siparislerim">
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

    </main>
    <!--/main-->
    <?php
} else {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>hesabim">
    <?php
}
?>