
<?php
if (!empty($_SESSION["uyeID"]) && !empty($_GET["iadekodu"])) {
    $uyeID = $VT->filter($_SESSION["uyeID"]);
    $iadekodu = $VT->filter($_GET["iadekodu"]);
    $uyelikbilgisi = $VT->VeriGetir("uyeler", "WHERE ID=? AND durum=?", array($uyeID, 1), "ORDER BY ID ASC", 1);
    if ($uyelikbilgisi != false) {
        $iadeler = $VT->VeriGetir("iadeler", "WHERE iadekodu=? AND uyeID=?", array($iadekodu, $uyelikbilgisi[0]["ID"]), "ORDER BY ID ASC", 1);
        if ($iadeler != false) {
            $siparisler = $VT->VeriGetir("siparisler", "WHERE ID=?", array($iadeler[0]["siparisID"]), "ORDER BY ID ASC", 1);
            if ($siparisler != false) {
                $odemetipi = $siparisler[0]["odemetipi"];
            } else {
                $odemetipi = "Bilinmiyor"; // Varsayılan ödeme tipi değeri
            }
        } else {
            ?>
            <meta http-equiv="refresh" content="0;url=<?= SITE ?>iadeler">
            <?php
            exit();
        }
        
        // ... Kodun geri kalanı

        ?>
        <link href="<?= SITE ?>css/account.css" rel="stylesheet">
        <link href="<?= SITE ?>css/faq.css" rel="stylesheet">

        <main class="bg_gray">

            <div class="container margin_30">
                <div class="page_header">
                    <h1>İade Takibi</h1>
                </div>
                <!-- /page_header -->
                <div class="row">
                    <div class="col-lg-2 col-md-4">
                        <a class="box_topic" href="<?=SITE?>siparislerim">
                            <i class="ti-wallet"></i>
                            <h3>Siparişlerim</h3>

                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <a class="box_topic" href="<?= SITE ?>hesabim">
                            <i class="ti-user"></i>
                            <h3>Hesabım</h3>

                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <a class="box_topic" href="#0">
                            <i class="ti-help"></i>
                            <h3>İade Takibi</h3>

                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <a class="box_topic" href="<?=SITE?>siparis-takip">
                            <i class="ti-truck"></i>
                            <h3>Sipariş Takibi</h3>

                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <a class="box_topic" href="<?= SITE ?>sepet">
                            <i class="ti-shopping-cart"></i>
                            <h3>Sepetim</h3>

                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <a class="box_topic" href="<?= SITE ?>cikis-yap">
                            <i class="ti-power-off"></i>
                            <h3>Çıkış</h3>


                        </a>
                    </div>
                </div>
                <!--/row-->
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="box_account" style="background-color: #fff; padding-top: 5px; padding-bottom: 50px;">
                        <form action="#" method="post">
                                <table class="table">
                                    <h3>İADE ÖZETİ</h3>
                                    <tr>
                                        <th>
                                            İADE KODU
                                        </th>
                                       
                                        
                                        <th>
                                            DURUM
                                        </th>
                                        <th>ADRES</th>
                                        
                                        
                                        
                                        <th>
                                            TARİH
                                        </th>
                                        <th>İADE SEBEBİ</th>
                                        <th>İADE CEVABI</th>

                                    </tr>
                               
                                    
                                    <tr>
                                        <td>
                                            <?= $iadeler[0]["iadekodu"] ?>
                                        </td>
                                        <td>
                                            <?php
                                                if ($iadeler[0]["durum"] == 1) {
                                                    ?>
                                                    <strong style="color: #ff9800;;">BEKLİYOR</strong>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <strong style="color: #4caf50;">CEVAPLANDI</strong>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        
                                        <td><?php $ilBilgisi=$VT->VeriGetir("il","WHERE ID=?",array($uyelikbilgisi[0]["ilID"]),"ORDER BY ID ASC",1); echo stripslashes(mb_substr($uyelikbilgisi[0]["adres"],0,1,"UTF-8"). "****** ".$uyelikbilgisi[0]["ilce"])?></td>
                                       
                                        
                                        
                                        <td>
                                            <?= date("d.m.Y", strtotime($iadeler[0]["tarih"])) ?>
                                        </td>
                                        <td colspan=""> <?=stripslashes($iadeler[0]["metin"])?></td>
                                        <td colspan=""> <?=stripslashes($iadeler[0]["cevap"])?></td>
                                    </tr>




                                </table>

                                <h3>İADE EDİLEN ÜRÜNLER</h3>
                                
                                <table class="table">
                                            <tr>

                                                <th>ÜRÜN KODU</th>
                                                <th>RESİM</th>
                                                <th>AÇIKLAMA</th>
                                                <th>ÜRÜN FİYATI</th>
                                                <th>ADET</th>
                                                <th>TOPLAM TUTAR</th>
                                            </tr>

                                    <?php
                                    $iadeurunler=$VT->VeriGetir("iadeurunler","WHERE uyeID=? AND iadeID=?",array($uyelikbilgisi[0]["ID"],$iadeler[0]["ID"]));
                                    if($iadeurunler!=false)
                                    {
                                        for ($q=0; $q < count($iadeurunler); $q++) { 
                                            $siparisurunler = $VT->VeriGetir("siparisurunler", "WHERE ID=?", array($iadeurunler[$q]["siparisurunID"]), "ORDER BY ID ASC",1);
                                    if ($siparisurunler != false) {
                                        for ($i = 0; $i < count($siparisurunler); $i++) {
                                            $urunler = $VT->VeriGetir("urunler", "WHERE ID=?", array($siparisurunler[$i]["urunID"]), "ORDER BY ID ASC", 1);
                                            if ($urunler != false) {
                                                $ozellikler="";
                                                if(!empty($siparisurunler[$i]["varyasyonID"]))
                                                {
                                                    $varyasyonKontrol=$VT->VeriGetir("urunvaryasyonstoklari","WHERE ID=?",array($siparisurunler[$i]["varyasyonID"]),"ORDER BY ID ASC",1);
                                                    if($varyasyonKontrol!=false)
                                                    {
                                                        $varyasyonID=$varyasyonKontrol[0]["varyasyonID"];
                                                        $secenekID=$varyasyonKontrol[0]["secenekID"];
                                                        if(strpos($varyasyonID,"@")>0)
                                                        {
                                                            $varyasyonDizi=explode("@",$varyasyonID);
                                                            $secenekDizi=explode("@",$secenekID);  
                                                            for($x=0;$x<count($varyasyonDizi);$x++)
                                                            {
                                                                $varyasyonBilgisi=$VT->VeriGetir("urunvaryasyonlari","WHERE ID=?",array($varyasyonDizi[$x]),"ORDER BY ID ASC",1);
                                                                $secenekBilgisi=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE ID=?",array($secenekDizi[$x]),"ORDER BY ID ASC",1);
                                                                if($varyasyonBilgisi!=false && $secenekBilgisi!=false)
                                                                {
                                                                    $ozellikler=$ozellikler.stripslashes($secenekBilgisi[0]["baslik"])." ".stripslashes($varyasyonBilgisi[0]["baslik"])." ";
                                                                }
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $varyasyonBilgisi=$VT->VeriGetir("urunvaryasyonlari","WHERE ID=?",array($varyasyonID),"ORDER BY ID ASC",1);
                                                            $secenekBilgisi=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE ID=?",array($secenekID),"ORDER BY ID ASC",1);
                                                            if($varyasyonBilgisi!=false && $secenekBilgisi!=false)
                                                            {
                                                                $ozellikler=stripslashes($secenekBilgisi[0]["baslik"])." ".stripslashes($varyasyonBilgisi[0]["baslik"]);
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                <tr>
                                               
                                                    <td>
                                                        <?= $urunler[0]["urunkodu"] ?>
                                                    </td>
                                                    <td><img src="<?= SITE ?>images/urunler/<?= $urunler[0]["resim"] ?>"
                                                            style="height: 50px; width: auto; display: block;"></td>
                                                    <td>
                                                        <?= stripslashes($urunler[0]["baslik"]) ?><br>  <small style="color: #009688; font-size: 13px;">  <?=$ozellikler?></small>
                                                    </td>
                                                    <td>
                                                        <?= number_format($siparisurunler[$i]["uruntutar"], 2, ",", ".") ?>
                                                    </td>
                                                    <td>
                                                        <?= $siparisurunler[$i]["adet"] ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($siparisurunler[$i]["toplamtutar"], 2, ",", ".") ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                        }
                                    }
                                    
                                    ?>
                                </table>

                               

                            </form>
                            <!-- /form_container -->
                        </div>
                        <!-- /box_account -->
                    </div>


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </main>
        
        <!--/main-->
        <?php
        $iadeguncelleme=$VT->SorguCalistir("UPDATE iadeurunler SET iadeID = ID");
    } else {
        ?>
        <meta http-equiv="refresh" content="0;url=<?= SITE ?>uyelik">
        <?php
        exit();
    }
} else {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>uyelik">
    <?php
    exit();
}

?>