<?php
if (!empty($_SESSION["uyeID"])) {
	$uyeID = $VT->filter($_SESSION["uyeID"]);
	$uyelikbilgisi = $VT->VeriGetir("uyeler", "WHERE ID=? AND durum=?", array($uyeID, 1), "ORDER BY ID ASC", 1);
	if ($uyelikbilgisi != false) {
		?>
		<link href="<?= SITE ?>css/account.css" rel="stylesheet">
		<link href="<?= SITE ?>css/faq.css" rel="stylesheet">

		<main class="bg_gray">

			<div class="container margin_30">
				<div class="page_header">
					<h1>FAVORİ ÜRÜNLERİM</h1>
				</div>
				<!-- /page_header -->
				<div class="row">
					<div class="col-lg-2 col-md-4">
						<a class="box_topic" href="">
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
						<a class="box_topic" href="<?=SITE?>iadeler">
							<i class="ti-help"></i>
							<h3>İade Takibi</h3>

						</a>
					</div>
					<div class="col-lg-2 col-md-4">
						<a class="box_topic" href="<?= SITE ?>siparis-takip">
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
						<div class="box_account" style="background-color: #fff;">
							<form action="#" method="post">
								<table class="table">
									<tr>
										<th>
											ÜRÜN BİLGİSİ
										</th>
										<th>
											TARİH
										</th>
										<th>
											İNCELE
										</th>
										<th>
											KALDIR
										</th>
									</tr>
									<?php
									$favoriler = $VT->VeriGetir("favoriler", "WHERE uyeID=?", array($uyelikbilgisi[0]["ID"]), "ORDER BY ID DESC");
									if ($favoriler != false) {
										for ($i = 0; $i < count($favoriler); $i++) {
											$urunbilgisi=$VT->VeriGetir("urunler","WHERE ID=? AND durum=?",array($favoriler[$i]["urunID"],1),"ORDER BY ID ASC",1);
                                    if($urunbilgisi!=false)
                                    {
											?>
											<tr>
												<td>
													<?= stripslashes($urunbilgisi[0]["baslik"]) ?>
												</td>
												
												
												
												<td>
													<?= date("d.m.Y", strtotime($favoriler[$i]["tarih"])) ?>
												</td>
												<td>
													<a href="<?= SITE ?>urun/<?= $urunbilgisi[0]["seflink"] ?>">İncele</a>
												</td>
                                               <td><a href="<?=SITE?>favori-sil/<?=$favoriler[$i]["ID"]?>" class="btn btn-danger btn-sm silmeAlani">Sil</a></td>
											</tr>
											<?php
                                    }
										}
									} else {
										?>

										<tr>
											<td colspan="4">
												Favorinizde hiç ürün bulunmuyor.
											</td>
										</tr>
										<?php
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