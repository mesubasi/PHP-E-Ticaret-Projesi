<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">İade Listesi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">İade Listesi</li>
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
                                    NO
                                </th>
                                <th>MÜŞTERİ BİLGİSİ</th>
                               
                                <th>
                                    DURUM
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
                            $iadeler = $VT->VeriGetir("iadeler", "", "", "ORDER BY ID DESC");
                            

                            if ($iadeler != false) {
                                foreach ($iadeler as $iade) {
                                    $uyelikbilgisi = $VT->VeriGetir("uyeler", "WHERE ID=? AND durum=?", array($iade["uyeID"], 1), "ORDER BY ID ASC", 1);
                                    if ($uyelikbilgisi != false) {
                                        $uyelikbilgisi = $uyelikbilgisi[0]; // $uyelikbilgisi dizisini ilk elemanıyla güncelleyin
                                        $iadeler["iadekodu"] = $iade["iadekodu"];
                                        $iadeler["ID"] = $iade["ID"];
                                        $adsoyad = $uyelikbilgisi["ad"] . " " . $uyelikbilgisi["soyad"];
                                        
                                        ?>
                                        <tr>
                                            <td>
                                            <?=$iadeler["ID"]?>
                                            </td>
                                            <td><?= $adsoyad ?>
                                        <br>
                                        <small style="color: red;"> İade Kodu: <?= $iadeler["iadekodu"] ?></small>
                                        </td>
                                            
                                            <td>
                                            <?php if ($iade["durum"] == 1) { ?>
                                                    <strong style="color: #ff9800;">BEKLİYOR</strong>
                                                <?php } else { ?>
                                                    <strong style="color: #4caf50;">CEVAPLANDI</strong>
                                                <?php } ?>
                                            </td>
                                           
                                            <td>
                                                <?= date("Y-m-d", strtotime($iadeler[0]["tarih"])) ?>
                                            </td>
                                            <td>
                                                <a href="<?= SITE ?>iade-detay/<?= $iadeler["iadekodu"] ?>">İncele</a>
                                            </td>
                                        </tr>
                                    <?php
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7">
                                                Henüz kayıtlı bir iade bildirimi bulunmamaktadır.
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">
                                        Henüz kayıtlı bir iade bildirimi bulunmamaktadır.
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
