<?php
if (!empty($_GET["ID"])) {
    $ID = $VT->filter($_GET["ID"]);
    $urunBilgisi = $VT->VeriGetir("urunler", "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
    if ($urunBilgisi != false) {
        ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Ürün Düzenleme</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Ürün Düzenleme</li>
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
                        if (!empty($_POST["kategori"]) && !empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"]) && !empty($_POST["sirano"]) && !empty($_POST["urunkodu"]) && !empty($_POST["fiyat"]) && !empty($_POST["kdvoran"]) && !empty($_POST["kdvdurum"])) {
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
                            if (!empty($_FILES["resim"]["name"])) {
                                $yukle = $VT->upload("resim", "../images/urunler/");
                                if ($yukle != false) {
                                    if ($indirimlifiyat != false) {
                                        $guncelle = $VT->SorguCalistir("UPDATE urunler", "SET baslik=?, seflink=?, kategori=?, metin=?, urunkodu=?, resim=?, anahtar=?, description=?, fiyat=?, kurus=?, indirimlifiyat=?, indirimlikurus=?, kdvoran=?, kdvdurum=?, sirano=?, tarih=? WHERE ID=?", array($baslik, $seflink, $kategori, $metin, $urunkodu, $yukle, $anahtar, $description, $fiyat, $kurus, $indirimlifiyat, $indirimlikurus, $kdvoran, $kdvdurum, $sirano, date("Y-m-d"), $urunBilgisi[0]["ID"]), 1);
                                    } else {
                                        $guncelle = $VT->SorguCalistir("UPDATE urunler", "SET baslik=?, seflink=?, kategori=?, metin=?, urunkodu=?, resim=?, anahtar=?, description=?, fiyat=?, kurus=?, kdvoran=?, kdvdurum=?, sirano=?, tarih=? WHERE ID=?", array($baslik, $seflink, $kategori, $metin, $urunkodu, $yukle, $anahtar, $description, $fiyat, $kurus, $kdvoran, $kdvdurum, $sirano, date("Y-m-d"), $urunBilgisi[0]["ID"]), 1);
                                    }
                                }
                            } else {
                                if ($indirimlifiyat != false) {
                                    $guncelle = $VT->SorguCalistir("UPDATE urunler", "SET baslik=?, seflink=?, kategori=?, metin=?, urunkodu=?, anahtar=?, description=?, fiyat=?, kurus=?, indirimlifiyat=?, indirimlikurus=?, kdvoran=?, kdvdurum=?, sirano=?, tarih=? WHERE
ID=?", array($baslik, $seflink, $kategori, $metin, $urunkodu, $anahtar, $description, $fiyat, $kurus, $indirimlifiyat, $indirimlikurus, $kdvoran, $kdvdurum, $sirano, date("Y-m-d"), $urunBilgisi[0]["ID"]), 1);
                                } else {
                                    $guncelle = $VT->SorguCalistir("UPDATE urunler", "SET baslik=?, seflink=?, kategori=?, metin=?, urunkodu=?, anahtar=?, description=?, fiyat=?, kurus=?, kdvoran=?, kdvdurum=?, sirano=?, tarih=? WHERE ID=?", array($baslik, $seflink, $kategori, $metin, $urunkodu, $anahtar, $description, $fiyat, $kurus, $kdvoran, $kdvdurum, $sirano, date("Y-m-d"), $urunBilgisi[0]["ID"]), 1);
                                }
                            }
                            if ($guncelle != false) {
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
                                                    $sonuc = $VT->kategoriGetir("urunler", $urunBilgisi[0]["kategori"], -1);
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
                                                <input type="text" class="form-control" placeholder="Başlık ..." name="baslik"
                                                    value="<?= stripslashes($urunBilgisi[0]["baslik"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Açıklama</label>
                                                <textarea class="textarea" placeholder="Açıklama alanıdır." name="metin"
                                                    style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= stripslashes($urunBilgisi[0]["metin"]) ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Anahtar</label>
                                                <input type="text" class="form-control" placeholder="Anahtar ..." name="anahtar"
                                                    value="<?= stripslashes($urunBilgisi[0]["anahtar"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" placeholder="Description ..."
                                                    name="description"
                                                    value="<?= stripslashes($urunBilgisi[0]["description"]) ?>">
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
                                                    name="urunkodu" value="<?= stripslashes($urunBilgisi[0]["urunkodu"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Fiyat</label>
                                                <input type="text" class="form-control" placeholder="Fiyat ..." name="fiyat"
                                                    value="<?= stripslashes($urunBilgisi[0]["fiyat"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Kuruş</label>
                                                <input type="text" class="form-control" placeholder="Kuruş ..." name="kurus"
                                                    maxlength="2" value="<?= stripslashes($urunBilgisi[0]["kurus"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>İndirimli Fiyat</label>
                                                <input type="text" class="form-control" placeholder="İndirimli Fiyat ..."
                                                    name="indirimlifiyat"
                                                    value="<?= stripslashes($urunBilgisi[0]["indirimlifiyat"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>İndirimli Kuruş</label>
                                                <input type="text" class="form-control" placeholder="İndirimli Kuruş ..."
                                                    name="indirimlikurus" maxlength="2"
                                                    value="<?= stripslashes($urunBilgisi[0]["indirimlikurus"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>KDV Oranı</label>
                                                <select class="form-control" name="kdvoran">
                                                    <option value="18" <?php if ($urunBilgisi[0]["kdvoran"] == "18") {
                                                        echo ' selected';
                                                    } ?>>%18</option>
                                                    <option value="8" <?php if ($urunBilgisi[0]["kdvoran"] == "8") {
                                                        echo ' selected';
                                                    } ?>>%8</option>
                                                    <option value="6" <?php if ($urunBilgisi[0]["kdvoran"] == "6") {
                                                        echo ' selected';
                                                    } ?>>%6</option>
                                                    <option value="1" <?php if ($urunBilgisi[0]["kdvoran"] == "1") {
                                                        echo ' selected';
                                                    } ?>>%1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>KDV Durumu</label>
                                                <select class="form-control" name="kdvdurum">
                                                    <option value="1" <?php if ($urunBilgisi[0]["kdvdurum"] == "1") {
                                                        echo ' selected';
                                                    } ?>>KDV Dahil</option>
                                                    <option value="2" <?php if ($urunBilgisi[0]["kdvdurum"] == "2") {
                                                        echo ' selected';
                                                    } ?>>KDV Hariç</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Sıra No</label>
                                                <input type="number" class="form-control" placeholder="Sıra No ..."
                                                    name="sirano" style="width:100px;" value="<?php
                                                    echo $urunBilgisi[0]["sirano"];
                                                    ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">ÜRÜN BİLGİLERİNİ GÜNCELLE</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <?php
    }
}
?>