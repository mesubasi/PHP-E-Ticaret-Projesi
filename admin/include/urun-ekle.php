<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ürün Ekle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Ürün Ekle</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= SITE ?>urun-liste" class="btn btn-info"
                        style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a>
                    <a href="<?= SITE ?>urun-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i
                            class="fa fa-plus"></i> YENİ EKLE</a>
                </div>
            </div>
            <?php
            if ($_POST) {
                if (!empty($_POST["kategori"]) && !empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"]) && !empty($_POST["sirano"]) && !empty($_POST["urunkodu"]) && !empty($_POST["fiyat"]) && !empty($_POST["kdvoran"]) && !empty($_POST["kdvdurum"]) && !empty($_POST["genelstok"]) && !empty($_FILES["resim"]["name"])) {
                    $kategori = $VT->filter($_POST["kategori"]);
                    $baslik = $VT->filter($_POST["baslik"]);
                    $anahtar = $VT->filter($_POST["anahtar"]);
                    $seflink = $VT->seflink($baslik);
                    $description = $VT->filter($_POST["description"]);
                    $sirano = $VT->filter($_POST["sirano"]);
                    $metin = $VT->filter($_POST["metin"], true);
                    $urunkodu = $VT->filter($_POST["urunkodu"]);
                    $fiyat = $VT->filter($_POST["fiyat"]);
                    $kdvoran = $VT->filter($_POST["kdvoran"]);
                    $kdvdurum = $VT->filter($_POST["kdvdurum"]);
                    $stok = $VT->filter($_POST["genelstok"]);
                    if (!empty($_POST["kurus"])) {
                        $kurus = $_POST["kurus"];
                    } else {
                        $kurus = "0";
                    }
                    $indirimlifiyat = false;
                    if (!empty($_POST["indirimlifiyat"])) {
                        $indirimlifiyat = $VT->filter($_POST["indirimlifiyat"]);
                        if (!empty($_POST["indirimlikurus"])) {
                            $indirimlikurus = $_POST["indirimlikurus"];
                        } else {
                            $indirimlikurus = "0";
                        }
                    }
                    $yukle = $VT->upload("resim", "../images/urunler/");
                    if ($yukle != false) {
                        $urunID = $VT->IDGetir("urunler");
                        if ($indirimlifiyat != false) {
                            $ekle = $VT->SorguCalistir("INSERT INTO urunler", "SET baslik=?, seflink=?, kategori=?, metin=?, urunkodu=?, resim=?, anahtar=?, description=?, fiyat=?, kurus=?, indirimlifiyat=?, indirimlikurus=?, kdvoran=?, kdvdurum=?, stok=?, durum=?, sirano=?, tarih=?", array($baslik, $seflink, $kategori, $metin, $urunkodu, $yukle, $anahtar, $description, $fiyat, $kurus, $indirimlifiyat, $indirimlikurus, $kdvoran, $kdvdurum, $stok, 1, $sirano, date("Y-m-d")));
                        } else {
                            $ekle = $VT->SorguCalistir("INSERT INTO urunler", "SET baslik=?, seflink=?, kategori=?, metin=?, urunkodu=?, resim=?, anahtar=?, description=?, fiyat=?, kurus=?, kdvoran=?, kdvdurum=?, stok=?, durum=?, sirano=?, tarih=?", array($baslik, $seflink, $kategori, $metin, $urunkodu, $yukle, $anahtar, $description, $fiyat, $kurus, $kdvoran, $kdvdurum, $stok, 1, $sirano, date("Y-m-d")));
                        }
                    } else {
                        $ekle = false;
                        ?>
                        <div class="alert alert-info">Resim yükleme işleminiz başarısız.</div>
                        <?php
                    }
                    $genelStokToplami = 0;
                    if ($ekle != false) {
                        if (!empty($_SESSION["varyasyonlar"]) && !empty($_SESSION["secenekler"])) {
                            foreach ($_SESSION["varyasyonlar"] as $value) {
                                $varyasyonAdi = $VT->filter($value);
                                $varyasyonID = $VT->IDGetir("urunvaryasyonlari");
                                $varyasyonEkle = $VT->SorguCalistir("INSERT INTO urunvaryasyonlari", "SET urunID=?, baslik=?, tarih=?", array($urunID, $varyasyonAdi, date("Y-m-d")));
                                foreach ($_SESSION["secenekler"][$varyasyonAdi] as $secenek) {
                                    $secenekAdi = $VT->filter($secenek);
                                    $secenekID = $VT->IDGetir("urunvaryasyonsecenekleri");
                                    $secenekEkle = $VT->SorguCalistir("INSERT INTO urunvaryasyonsecenekleri", "SET urunID=?, varyasyonID=?, baslik=?, tarih=?", array($urunID, $varyasyonID, $secenekAdi, date("Y-m-d")));
                                }
                            }
                            $varyasyonAdet = count($_SESSION["varyasyonlar"]);
                            switch ($varyasyonAdet) {
                                case 1:
                                    $varyasyon = $_SESSION["varyasyonlar"][0];
                                    for ($w = 0; $w < count($_SESSION["secenekler"][$varyasyon]); $w++) {
                                        $varyasyonIDOgreneme = $VT->VeriGetir("urunvaryasyonlari", "WHERE baslik=? AND urunID=?", array($varyasyon, $urunID));
                                        $secenekIDOgreneme = $VT->VeriGetir("urunvaryasyonsecenekleri", "WHERE baslik=? AND urunID=?", array($_SESSION["secenekler"][$varyasyon][$w], $urunID));
                                        if ($varyasyonIDOgreneme != false && $secenekIDOgreneme != false) {
                                            $varyasyonStok = $VT->filter($_POST["stok"][$w]);
                                            $genelStokToplami = ($genelStokToplami + $varyasyonStok);
                                            $stokEkle = $VT->SorguCalistir("INSERT INTO urunvaryasyonstoklari", "SET urunID=?, varyasyonID=?, secenekID=?, stok=?, tarih=?", array($urunID, $varaysyonIDOgreneme[0]["ID"], $secenekIDOgreneme[0]["ID"], $varyasyonStok, date("Y-m-d")));
                                        }
                                    }
                                    break;
                                case 2:
                                    $varyasyon = $_SESSION["varyasyonlar"][0];
                                    $varyasyon2 = $_SESSION["varyasyonlar"][1];
                                    $stokNo = 0;
                                    for ($w = 0; $w < count($_SESSION["secenekler"][$varyasyon]); $w++) {
                                        $varyasyonIDOgreneme = $VT->VeriGetir("urunvaryasyonlari", "WHERE baslik=? AND urunID=?", array($varyasyon, $urunID));
                                        $secenekIDOgreneme = $VT->VeriGetir("urunvaryasyonsecenekleri", "WHERE baslik=? AND urunID=?", array($_SESSION["secenekler"][$varyasyon][$w], $urunID));
                                        for ($r = 0; $r < count($_SESSION["secenekler"][$varyasyon2]); $r++) {
                                            $varyasyonIDOgreneme2 = $VT->VeriGetir("urunvaryasyonlari", "WHERE baslik=? AND urunID=?", array($varyasyon2, $urunID));
                                            $secenekIDOgreneme2 = $VT->VeriGetir("urunvaryasyonsecenekleri", "WHERE baslik=? AND urunID=?", array($_SESSION["secenekler"][$varyasyon2][$r], $urunID));
                                            if ($varyasyonIDOgreneme != false && $secenekIDOgreneme != false && $varyasyonIDOgreneme2 != false && $secenekIDOgreneme2 != false) {
                                                $varyasyonStok = $VT->filter($_POST["stok"][$stokNo]);
                                                $genelStokToplami = ($genelStokToplami + $varyasyonStok);
                                                $stokNo++;
                                                $stokEkle = $VT->SorguCalistir("INSERT INTO urunvaryasyonstoklari", "SET urunID=?, varyasyonID=?, secenekID=?, stok=?,
                tarih=?", array($urunID, $varyasyonIDOgreneme[0]["ID"] . "@" . $varyasyonIDOgreneme2[0]["ID"], $secenekIDOgreneme[0]["ID"] . "@" . $secenekIDOgreneme2[0]["ID"], $varyasyonStok, date("Y-m-d")));
                                            }
                                        }
                                    }
                                    break;
                            }
                            unset($_SESSION["varyasyonlar"]);
                            unset($_SESSION["secenekler"]);
                            $urunStokGuncelle = $VT->SorguCalistir("UPDATE urunler", "SET stok=? WHERE ID=?", array($genelStokToplami, $urunID), 1);
                        }
                        ?>
                        <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar
                            deneyiniz.</div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
                    <?php
                }
            }
            ?>
            <form action="#" method="post" class="urunEklemeFormu" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body card card-primary">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kategori Seç</label>
                                        <select class="form-control select2" style="width: 100%;" name="kategori">
                                            <?php
                                            $sonuc = $VT->kategoriGetir("urunler", "", -1);
                                            if ($sonuc != false) {
                                                echo $sonuc;
                                            } else {
                                                $VT->tekKategori("urunler");
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" class="form-control" placeholder="Başlık ..." name="baslik">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <textarea class="textarea" placeholder="Açıklama alanıdır." name="metin"
                                            style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Anahtar</label>
                                        <input type="text" class="form-control" placeholder="Anahtar ..."
                                            name="anahtar">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" placeholder="Description ..."
                                            name="description">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Resim</label>
                                        <input type="file" class="form-control" placeholder="Resim Seçiniz ..."
                                            name="resim">
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body card card-primary">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ürün Kodu</label>
                                        <input type="text" class="form-control" placeholder="Ürün Kodu ..."
                                            name="urunkodu">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Fiyat</label>
                                        <input type="text" class="form-control" placeholder="Fiyat ..." name="fiyat">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kuruş</label>
                                        <input type="text" class="form-control" placeholder="Kuruş ..." name="kurus"
                                            maxlength="2" value="00">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>İndirimli Fiyat</label>
                                        <input type="text" class="form-control" placeholder="İndirimli Fiyat ..."
                                            name="indirimlifiyat">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>İndirimli Kuruş</label>
                                        <input type="text" class="form-control" placeholder="İndirimli Kuruş ..."
                                            name="indirimlikurus" maxlength="2" value="00">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>KDV Oranı</label>
                                        <select class="form-control" name="kdvoran">
                                            <option value="18">%18</option>
                                            <option value="8">%8</option>
                                            <option value="6">%6</option>
                                            <option value="1">%1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>KDV Durumu</label>
                                        <select class="form-control" name="kdvdurum">
                                            <option value="1">KDV Dahil</option>
                                            <option value="2">KDV Hariç</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" placeholder="Stok ..."
                                            name="genelstok" style="width:100px;" min="1" value="1">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sıra No</label>
                                        <input type="number" class="form-control" placeholder="Sıra No ..."
                                            name="sirano" style="width:100px;" value="<?php
                                            $sirano = $VT->IDGetir("urunler");
                                            if ($sirano != false) {
                                                echo $sirano;
                                            } else {
                                                echo "1";
                                            }
                                            ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <a class="btn btn-primary varyasyonEkleme" style="color:#fff; float: right;"><i
                                class="fa fa-plus"></i> Varyasyon Ekle</a>
                        <style type="text/css">
                            .varyasyonGrup h2 {
                                background: #eee;
                                border: 1px solid #ddd;
                                padding: 3px;
                                font-size: 15px;
                                display: block;
                                overflow: hidden;
                            }

                            .varyasyonGrup .col-md-3 {
                                float: left;
                            }

                            .varyasyonGrup ul {
                                display: block;
                                list-style-type: none;
                                padding: 3px;
                                min-height: 100px;
                                background: #fff;
                                border: 1px solid #ddd;
                            }

                            .varyasyonGrup ul li {
                                padding: 3px;
                                border-bottom: 1px solid #ddd;
                                padding-bottom: 8px;
                            }

                            .varyasyonGrup ul li a {
                                float: right;
                            }
                        </style>
                        <div class="row stokYonetimAlani" style="display: block; clear: both;">
                            <div class="row varyasyonGrup" style="display:block; clear: both;"> </div>
                            <div class="row butonuKontrolEt" style="display:none; clear: both;">
                                <a class="btn btn-warning" onclick="stokOlustur();" style="color: #fff;">Varyasyon
                                    Stoklarını Oluştur</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section> <!-- /.content -->
</div>