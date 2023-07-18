<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sipariş Listesi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Sipariş İşlemleri</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    SİPARİŞ KODU
                                </th>
                                <th>MÜŞTERİ BİLGİSİ</th>
                                <th>
                                    KDV HARİÇ TUTAR
                                </th>
                                <th>
                                    KDV TUTAR
                                </th>
                                <th>
                                    ÖDENEN TUTAR
                                </th>
                                <th>
                                    ÖDEME TİPİ
                                </th>
                                <th>
                                    ÖDEME DURUMU
                                </th>
                                <th>
                                    TARİH
                                </th>
                                <th>
                                    İNCELE
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $siparisler = $VT->VeriGetir("siparisler", "", "", "ORDER BY ID DESC");

                            if ($siparisler != false) {
                                foreach ($siparisler as $siparis) {
                                    $uyelikbilgisi = $VT->VeriGetir("uyeler", "WHERE ID=? AND durum=?", array($siparis["uyeID"], 1), "ORDER BY ID ASC", 1);
                                    if ($uyelikbilgisi != false) {
                                        $uyelikbilgisi = $uyelikbilgisi[0]; // $uyelikbilgisi dizisini ilk elemanıyla güncelleyin

                                        if ($siparis["odemetipi"] == 1) {
                                            $odemetipi = "Kredi Kartı";
                                        } elseif ($siparis["odemetipi"] == 2) {
                                            $odemetipi = "Havale / EFT";
                                        } elseif ($siparis["odemetipi"] == 3) {
                                            $odemetipi = "Kapıda Ödeme";
                                        }
                                        if ($uyelikbilgisi["tipi"] == 1) {
                                            $adsoyad = $uyelikbilgisi["ad"] . " " . $uyelikbilgisi["soyad"];
                                        } else {
                                            $adsoyad = stripslashes($uyelikbilgisi["firmaadi"]);
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $siparis["sipariskodu"] ?>
                                            </td>
                                            <td><?= $adsoyad ?></td>
                                            <td>
                                                <?= number_format($siparis["kdvharictutar"], 2, ".", ",") ?> TL
                                            </td>
                                            <td>
                                                <?= number_format($siparis["kdvtutar"], 2, ".", ",") ?> TL
                                            </td>
                                            <td>
                                                <?= number_format($siparis["odenentutar"], 2, ".", ",") ?> TL
                                            </td>
                                            <td>
                                                <?= $odemetipi ?>
                                            </td>
                                            <td>
                                                <?php if ($siparis["durum"] == 1) { ?>
                                                    <strong style="color: #4caf50;">ÖDENDİ</strong>
                                                <?php } else { ?>
                                                    <strong style="color: #ff9800;">ÖDEME BEKLİYOR</strong>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?= date("d.m.Y", strtotime($siparis["tarih"])) ?>
                                            </td>
                                            <td>
                                                <a href="<?= SITE ?>siparis-detay/<?= $siparis["sipariskodu"] ?>">İncele</a>
                                            </td>
                                        </tr>
                                    <?php
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7">
                                                Henüz kayıtlı bir siparişiniz bulunmamaktadır.
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">
                                        Henüz kayıtlı bir siparişiniz bulunmamaktadır.
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                           
                            
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
