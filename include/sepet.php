<link href="<?= SITE ?>css/cart.css" rel="stylesheet">
<?php
if (!empty($_SESSION["sepet"])) {
    ?>
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <h1>Sepetim</h1>
            </div>
            <?php
            if ($_POST) {
                if (!empty($_POST["adet"])) {
                    $toplamNesneAdeti = count($_POST["adet"]);
                    $adetsayaci = 0;
                    foreach ($_SESSION["sepet"] as $urunID => $bilgi) {
                        $urunbilgisi = $VT->VeriGetir("urunler", "WHERE durum=? AND ID=?", array(1, $urunID), "ORDER BY ID ASC", 1);
                        if ($urunbilgisi != false) {

                            if ($bilgi["varyasyondurumu"] != false) {
                                if (!empty($_SESSION["sepetVaryasyon"])) {
                                    foreach ($_SESSION["sepetVaryasyon"][$urunbilgisi[0]["ID"]] as $secenekID => $secenekAdet) {

                                        $stokTablo = $VT->VeriGetir("urunvaryasyonstoklari", "WHERE ID=? AND urunID=?", array($secenekID, $urunbilgisi[0]["ID"]), "ORDER BY ID ASC", 1);
                                        if ($stokTablo != false) {
                                            $varyasyonOzellikleri = "";
                                            $varyasyonID = $stokTablo[0]["varyasyonID"];
                                            $secimID = $stokTablo[0]["secenekID"];

                                            if (strpos($varyasyonID, "@") != false) {
                                                /*Eğer 1den fazla varyasyon var ise*/

                                                $varyasyondizi = explode("@", $varyasyonID);
                                                $secenekdizi = explode("@", $secimID);
                                                for ($i = 0; $i < count($varyasyondizi); $i++) {
                                                    $varyasyonBilgisi = $VT->VeriGetir("urunvaryasyonlari", "WHERE ID=?", array($varyasyondizi[$i]), "ORDER BY ID ASC", 1);
                                                    $secenekBilgisi = $VT->VeriGetir("urunvaryasyonsecenekleri", "WHERE ID=?", array($secenekdizi[$i]), "ORDER BY ID ASC", 1);
                                                    if ($varyasyonBilgisi != false && $secenekBilgisi != false) {
                                                        $varyasyonOzellikleri .= stripslashes($secenekBilgisi[0]["baslik"]) . " " . $varyasyonBilgisi[0]["baslik"] . " ";
                                                        /* Mavi Renk Small Beden*/
                                                    }
                                                }
                                            } else {
                                                /*Eğer 1 adet varyasyon var ise*/
                                                $varyasyonBilgisi = $VT->VeriGetir("urunvaryasyonlari", "WHERE ID=?", array($varyasyonID), "ORDER BY ID ASC", 1);
                                                $secenekBilgisi = $VT->VeriGetir("urunvaryasyonsecenekleri", "WHERE ID=?", array($secimID), "ORDER BY ID ASC", 1);
                                                if ($varyasyonBilgisi != false && $secenekBilgisi != false) {
                                                    $varyasyonOzellikleri = stripslashes($secenekBilgisi[0]["baslik"]) . " " . $varyasyonBilgisi[0]["baslik"];
                                                }
                                            }

                                            /*Burada varyasyonlu ürün stok kontolü yapılacak*/


                                            $adetpost = $VT->filter($_POST["adet"][$adetsayaci]);
                                            if ($stokTablo[0]["stok"] >= $adetpost) {
                                                $_SESSION["sepetVaryasyon"][$urunbilgisi[0]["ID"]][$stokTablo[0]["ID"]]["adet"] = $adetpost;
                                            }

                                        }

                                        $adetsayaci++;
                                    }
                                }
                            } else {
                                /*Burada varyasyonsuz ürün stok kontolü yapılacak*/
                                $adetpost = $VT->filter($_POST["adet"][$adetsayaci]);
                                if ($urunbilgisi[0]["stok"] >= $adetpost) {
                                    $_SESSION["sepet"][$urunbilgisi[0]["ID"]]["adet"] = $adetpost;
                                }
                                $adetsayaci++;
                            }


                        }
                    }

                    ?>
                    <div class="alert alert-success">Sepetiniz başarıyla güncellenmiştir.</div>
                    <?php
                }
            }
            ?>
            <!-- /page_header -->
            <?php
            $sepetkdvharictutar = 0;
            $sepetkdvtutar18 = 0;
            $sepetkdvtutar8 = 0;
            $sepetkdvtutar6 = 0;
            $sepetkdvtutar1 = 0;
            $sepetTutar = 0;

            ?>
            <form action="#" method="post">
                <table class="table table-striped cart-list">
                    <thead>
                        <tr>
                            <th>
                                Açıklama
                            </th>
                            <th>
                                Birim Fiyat
                            </th>
                            <th>
                                Adet
                            </th>
                            <th>
                                Toplam Tutar
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($_SESSION["sepet"] as $urunID => $bilgi) {
                            $urunbilgisi = $VT->VeriGetir("urunler", "WHERE durum=? AND ID=?", array(1, $urunID), "ORDER BY ID ASC", 1);
                            if ($urunbilgisi != false) {

                                if ($bilgi["varyasyondurumu"] != false) {
                                    if (!empty($_SESSION["sepetVaryasyon"])) {
                                        foreach ($_SESSION["sepetVaryasyon"][$urunbilgisi[0]["ID"]] as $secenekID => $secenekAdet) {

                                            $stokTablo = $VT->VeriGetir("urunvaryasyonstoklari", "WHERE ID=? AND urunID=?", array($secenekID, $urunbilgisi[0]["ID"]), "ORDER BY ID ASC", 1);
                                            if ($stokTablo != false) {
                                                $varyasyonOzellikleri = "";
                                                $varyasyonID = $stokTablo[0]["varyasyonID"];
                                                $secimID = $stokTablo[0]["secenekID"];

                                                if (strpos($varyasyonID, "@") != false) {
                                                    /*Eğer 1den fazla varyasyon var ise*/

                                                    $varyasyondizi = explode("@", $varyasyonID);
                                                    $secenekdizi = explode("@", $secimID);
                                                    for ($i = 0; $i < count($varyasyondizi); $i++) {
                                                        $varyasyonBilgisi = $VT->VeriGetir("urunvaryasyonlari", "WHERE ID=?", array($varyasyondizi[$i]), "ORDER BY ID ASC", 1);
                                                        $secenekBilgisi = $VT->VeriGetir("urunvaryasyonsecenekleri", "WHERE ID=?", array($secenekdizi[$i]), "ORDER BY ID ASC", 1);
                                                        if ($varyasyonBilgisi != false && $secenekBilgisi != false) {
                                                            $varyasyonOzellikleri .= stripslashes($secenekBilgisi[0]["baslik"]) . " " . $varyasyonBilgisi[0]["baslik"] . " ";
                                                            /* Mavi Renk Small Beden*/
                                                        }
                                                    }
                                                } else {
                                                    /*Eğer 1 adet varyasyon var ise*/
                                                    $varyasyonBilgisi = $VT->VeriGetir("urunvaryasyonlari", "WHERE ID=?", array($varyasyonID), "ORDER BY ID ASC", 1);
                                                    $secenekBilgisi = $VT->VeriGetir("urunvaryasyonsecenekleri", "WHERE ID=?", array($secimID), "ORDER BY ID ASC", 1);
                                                    if ($varyasyonBilgisi != false && $secenekBilgisi != false) {
                                                        $varyasyonOzellikleri = stripslashes($secenekBilgisi[0]["baslik"]) . " " . $varyasyonBilgisi[0]["baslik"];
                                                    }
                                                }

                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="thumb_cart">
                                                            <img src="<?= SITE ?>images/urunler/<?= $urunbilgisi[0]["resim"] ?>"
                                                                data-src="<?= SITE ?>images/urunler/<?= $urunbilgisi[0]["resim"] ?>" class="lazy"
                                                                alt="Image">
                                                        </div>
                                                        <span class="item_cart">
                                                            <?= stripslashes($urunbilgisi[0]["baslik"]) ?><br>
                                                            <small style="float: left; color: #d24474; display: block;">
                                                                <?= $varyasyonOzellikleri ?>
                                                            </small>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            <?php
                                                            if (!empty($urunbilgisi[0]["indirimlifiyat"])) {
                                                                $fiyat = $urunbilgisi[0]["indirimlifiyat"] . "." . $urunbilgisi[0]["indirimlikurus"];
                                                                if ($urunbilgisi[0]["kdvdurum"] == 1) {
                                                                    if ($urunbilgisi[0]["kdvoran"] > 9) {
                                                                        $oran = "1." . $urunbilgisi[0]["kdvoran"];
                                                                    } else {
                                                                        $oran = "1.0" . $urunbilgisi[0]["kdvoran"];
                                                                    }
                                                                    $kdvsizBirimfiyat = ($fiyat / $oran); /*kdvsiz hali*/
                                                                } else {
                                                                    $kdvsizBirimfiyat = $fiyat;
                                                                }
                                                            } else {
                                                                $fiyat = $urunbilgisi[0]["fiyat"] . "." . $urunbilgisi[0]["kurus"];
                                                                if ($urunbilgisi[0]["kdvdurum"] == 1) {
                                                                    if ($urunbilgisi[0]["kdvoran"] > 9) {
                                                                        $oran = "1." . $urunbilgisi[0]["kdvoran"];
                                                                    } else {
                                                                        $oran = "1.0" . $urunbilgisi[0]["kdvoran"];
                                                                    }
                                                                    $kdvsizBirimfiyat = ($fiyat / $oran); /*kdvsiz hali*/
                                                                } else {
                                                                    $kdvsizBirimfiyat = $fiyat;
                                                                }
                                                            }

                                                            echo number_format($kdvsizBirimfiyat, 2, ",", ".") . " TL";
                                                            ?>
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <div class="numbers-row">
                                                            <input type="text" value="<?= $secenekAdet["adet"] ?>" id="adet" class="qty2 adet"
                                                                name="adet[]">
                                                            <div class="inc button_inc">+</div>
                                                            <div class="dec button_inc">-</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            <?php
                                                            $toplamtutar = ($fiyat * $secenekAdet["adet"]);
                                                            if ($urunbilgisi[0]["kdvdurum"] == 1) {
                                                                if ($urunbilgisi[0]["kdvoran"] > 9) {
                                                                    $oran = "1." . $urunbilgisi[0]["kdvoran"];
                                                                } else {
                                                                    $oran = "1.0" . $urunbilgisi[0]["kdvoran"];
                                                                }
                                                                $kdvsizToplamTutar = ($fiyat / $oran); /*kdvsiz hali*/
                                                            } else {
                                                                $kdvsizToplamTutar = $fiyat;
                                                            }
                                                            $kdvsizToplamTutar = ($kdvsizToplamTutar * $secenekAdet["adet"]);


                                                            if ($urunbilgisi[0]["kdvdurum"] == 1) {
                                                                /*KDV li fiyat*/

                                                                if ($urunbilgisi[0]["kdvoran"] > 9) {
                                                                    $oran = "1." . $urunbilgisi[0]["kdvoran"];
                                                                } else {
                                                                    $oran = "1.0" . $urunbilgisi[0]["kdvoran"];
                                                                }
                                                                $kdvlifiyat = $toplamtutar;
                                                                $kdvsizfiyat = ($toplamtutar / $oran); /*kdvsiz hali*/
                                                                $kdvtutari = ($toplamtutar - $kdvsizfiyat); /*KDV Fiyatı*/
                                                                if ($urunbilgisi[0]["kdvoran"] == 18) {
                                                                    $sepetkdvtutar18 = ($sepetkdvtutar18 + $kdvtutari);
                                                                }
                                                                if ($urunbilgisi[0]["kdvoran"] == 8) {
                                                                    $sepetkdvtutar8 = ($sepetkdvtutar8 + $kdvtutari);
                                                                }
                                                                if ($urunbilgisi[0]["kdvoran"] == 6) {
                                                                    $sepetkdvtutar6 = ($sepetkdvtutar6 + $kdvtutari);
                                                                }
                                                                if ($urunbilgisi[0]["kdvoran"] == 1) {
                                                                    $sepetkdvtutar1 = ($sepetkdvtutar1 + $kdvtutari);
                                                                }
                                                                $sepetkdvharictutar = ($sepetkdvharictutar + $kdvsizfiyat);
                                                                $sepetTutar = ($sepetTutar + $kdvlifiyat);
                                                            } else {
                                                                /*KDV Hariç Fiyat*/
                                                                $oran = $urunbilgisi[0]["kdvoran"];
                                                                $kdvsizfiyat = $toplamtutar;
                                                                $kdvtutari = (($kdvsizfiyat * $oran) / 100);
                                                                $kdvlifiyat = ($kdvsizfiyat + $kdvtutari);
                                                                if ($urunbilgisi[0]["kdvoran"] == 18) {
                                                                    $sepetkdvtutar18 = ($sepetkdvtutar18 + $kdvtutari);
                                                                }
                                                                if ($urunbilgisi[0]["kdvoran"] == 8) {
                                                                    $sepetkdvtutar8 = ($sepetkdvtutar8 + $kdvtutari);
                                                                }
                                                                if ($urunbilgisi[0]["kdvoran"] == 6) {
                                                                    $sepetkdvtutar6 = ($sepetkdvtutar6 + $kdvtutari);
                                                                }
                                                                if ($urunbilgisi[0]["kdvoran"] == 1) {
                                                                    $sepetkdvtutar1 = ($sepetkdvtutar1 + $kdvtutari);
                                                                }
                                                                $sepetkdvharictutar = ($sepetkdvharictutar + $kdvsizfiyat);
                                                                $sepetTutar = ($sepetTutar + $kdvlifiyat);
                                                            }
                                                            echo number_format($kdvsizToplamTutar, 2, ",", ".") . " TL";
                                                            ?>

                                                        </strong>
                                                    </td>
                                                    <td class="options">
                                                        <a href="<?= SITE ?>sepet-sil/<?= $urunbilgisi[0]["ID"] ?>/<?= $secenekID ?>"><i
                                                                class="ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php




                                            }


                                        }
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="thumb_cart">
                                                <img src="<?= SITE ?>images/urunler/<?= $urunbilgisi[0]["resim"] ?>"
                                                    data-src="<?= SITE ?>images/urunler/<?= $urunbilgisi[0]["resim"] ?>" class="lazy"
                                                    alt="Image">
                                            </div>
                                            <span class="item_cart">
                                                <?= stripslashes($urunbilgisi[0]["baslik"]) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <strong>
                                                <?php
                                                if (!empty($urunbilgisi[0]["indirimlifiyat"])) {
                                                    $fiyat = $urunbilgisi[0]["indirimlifiyat"] . "." . $urunbilgisi[0]["indirimlikurus"];
                                                } else {
                                                    $fiyat = $urunbilgisi[0]["fiyat"] . "." . $urunbilgisi[0]["kurus"];
                                                }

                                                if ($urunbilgisi[0]["kdvdurum"] == 1) {
                                                    if ($urunbilgisi[0]["kdvoran"] > 9) {
                                                        $oran = "1." . $urunbilgisi[0]["kdvoran"];
                                                    } else {
                                                        $oran = "1.0" . $urunbilgisi[0]["kdvoran"];
                                                    }
                                                    $kdvsizBirimfiyat = ($fiyat / $oran); /*kdvsiz hali*/
                                                } else {
                                                    $kdvsizBirimfiyat = $fiyat;
                                                }
                                                echo number_format($kdvsizBirimfiyat, 2, ",", ".") . " TL";
                                                ?>
                                            </strong>
                                        </td>
                                        <td>
                                            <div class="numbers-row">
                                                <input type="text" value="<?= $bilgi["adet"] ?>" id="adet" class="qty2 adet"
                                                    name="adet[]">
                                                <div class="inc button_inc">+</div>
                                                <div class="dec button_inc">-</div>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>
                                                <?php
                                                $toplamtutar = ($fiyat * $bilgi["adet"]);
                                                if ($urunbilgisi[0]["kdvdurum"] == 1) {
                                                    if ($urunbilgisi[0]["kdvoran"] > 9) {
                                                        $oran = "1." . $urunbilgisi[0]["kdvoran"];
                                                    } else {
                                                        $oran = "1.0" . $urunbilgisi[0]["kdvoran"];
                                                    }
                                                    $kdvsizToplamTutar = ($fiyat / $oran); /*kdvsiz hali*/
                                                } else {
                                                    $kdvsizToplamTutar = $fiyat;
                                                }
                                                $kdvsizToplamTutar = ($kdvsizToplamTutar * $bilgi["adet"]);

                                                if ($urunbilgisi[0]["kdvdurum"] == 1) {
                                                    /*KDV li fiyat*/
                                                    if ($urunbilgisi[0]["kdvoran"] > 9) {
                                                        $oran = "1." . $urunbilgisi[0]["kdvoran"];
                                                    } else {
                                                        $oran = "1.0" . $urunbilgisi[0]["kdvoran"];
                                                    }
                                                    $kdvlifiyat = $toplamtutar;
                                                    $kdvsizfiyat = ($toplamtutar / $oran); /*kdvsiz hali*/
                                                    $kdvtutari = ($toplamtutar - $kdvsizfiyat); /*KDV Fiyatı*/
                                                    if ($urunbilgisi[0]["kdvoran"] == 18) {
                                                        $sepetkdvtutar18 = ($sepetkdvtutar18 + $kdvtutari);
                                                    }
                                                    if ($urunbilgisi[0]["kdvoran"] == 8) {
                                                        $sepetkdvtutar8 = ($sepetkdvtutar8 + $kdvtutari);
                                                    }
                                                    if ($urunbilgisi[0]["kdvoran"] == 6) {
                                                        $sepetkdvtutar6 = ($sepetkdvtutar6 + $kdvtutari);
                                                    }
                                                    if ($urunbilgisi[0]["kdvoran"] == 1) {
                                                        $sepetkdvtutar1 = ($sepetkdvtutar1 + $kdvtutari);
                                                    }
                                                    $sepetkdvharictutar = ($sepetkdvharictutar + $kdvsizfiyat);
                                                    $sepetTutar = ($sepetTutar + $kdvlifiyat);
                                                } else {
                                                    /*KDV Hariç Fiyat*/
                                                    $oran = $urunbilgisi[0]["kdvoran"];
                                                    $kdvsizfiyat = $toplamtutar;
                                                    $kdvtutari = (($kdvsizfiyat * $oran) / 100);
                                                    $kdvlifiyat = ($kdvsizfiyat + $kdvtutari);
                                                    if ($urunbilgisi[0]["kdvoran"] == 18) {
                                                        $sepetkdvtutar18 = ($sepetkdvtutar18 + $kdvtutari);
                                                    }
                                                    if ($urunbilgisi[0]["kdvoran"] == 8) {
                                                        $sepetkdvtutar8 = ($sepetkdvtutar8 + $kdvtutari);
                                                    }
                                                    if ($urunbilgisi[0]["kdvoran"] == 6) {
                                                        $sepetkdvtutar6 = ($sepetkdvtutar6 + $kdvtutari);
                                                    }
                                                    if ($urunbilgisi[0]["kdvoran"] == 1) {
                                                        $sepetkdvtutar1 = ($sepetkdvtutar1 + $kdvtutari);
                                                    }
                                                    $sepetkdvharictutar = ($sepetkdvharictutar + $kdvsizfiyat);
                                                    $sepetTutar = ($sepetTutar + $kdvlifiyat);
                                                }

                                                echo number_format($kdvsizToplamTutar, 2, ",", ".") . " TL";
                                                ?>

                                            </strong>
                                        </td>
                                        <td class="options">
                                            <a href="<?= SITE ?>sepet-sil/<?= $urunbilgisi[0]["ID"] ?>"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }


                            }
                        }

                        ?>


                    </tbody>
                </table>

                <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-right">
                        <button type="submit" class="btn_1 gray">Sepeti Güncelle</button>
                        <a href="<?= SITE ?>sepet-sil/clear" class="btn_1">Sepeti Temizle</a>
                    </div>
                    <div class="col-sm-8">

                    </div>
                </div>
            </form>
            <!-- /cart_actions -->

        </div>
        <!-- /container -->

        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                <span>KDV Hariç Tutar</span>
                                <?= number_format(($sepetkdvharictutar), 2, ",", ".") ?> TL
                            </li>
                            <?php
                            if ($sepetkdvtutar1 > 0) {
                                ?>
                                <li>
                                    <span>KDV Tutar (%1)</span>
                                    <?= number_format(($sepetkdvtutar1), 2, ",", ".") ?> TL
                                </li>
                                <?php
                            }
                            if ($sepetkdvtutar6 > 0) {
                                ?>
                                <li>
                                    <span>KDV Tutar (%6)</span>
                                    <?= number_format(($sepetkdvtutar6), 2, ",", ".") ?> TL
                                </li>
                                <?php
                            }
                            if ($sepetkdvtutar8 > 0) {
                                ?>
                                <li>
                                    <span>KDV Tutar (%8)</span>
                                    <?= number_format(($sepetkdvtutar8), 2, ",", ".") ?> TL
                                </li>
                                <?php
                            }
                            if ($sepetkdvtutar18 > 0) {
                                ?>
                                <li>
                                    <span>KDV Tutar (%18)</span>
                                    <?= number_format(($sepetkdvtutar18), 2, ",", ".") ?> TL
                                </li>
                                <?php
                            }
                            ?>

                            <li class="sonodemen">
                                <span>Ödenecek Tutar</span>
                                <?= number_format(($sepetTutar), 2, ",", ".") ?> TL
                            </li>
                        </ul>
                        <?php

                        if (!empty($_SESSION["uyeID"])) {
                            $uyeID = $VT->filter($_SESSION["uyeID"]);
                            $uyebilgisi = $VT->VeriGetir("uyeler", "WHERE ID=? AND durum=?", array($uyeID, 1), "ORDER BY ID ASC", 1);
                            if ($uyebilgisi != false) {
                                ?>
                                <a href="<?= SITE ?>odeme-tipi" class="btn_1 full-width cart">Ödeme Yap</a>
                                <?php
                            } else {
                                ?>
                                <a href="<?= SITE ?>uyelik" class="btn_1 full-width cart">Ödeme Yap</a>
                                <?php
                            }
                        } else {
                            ?>
                            <a href="<?= SITE ?>uyelik" class="btn_1 full-width cart">Ödeme Yap</a>
                            <?php
                        }


                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /box_cart -->

    </main>
    <!--/main-->
    <?php
} else {
    ?>
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <h1>Sepetim</h1>
            </div>
            <p>Sepetinizde henüz ürün bulunmuyor.</p>
            <p><a href="<?= SITE ?>" class="btn_1">Alışverişe Başla</a></p>
        </div>
    </main>
    <?php
}
?>