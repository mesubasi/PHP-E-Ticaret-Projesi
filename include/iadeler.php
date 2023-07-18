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
											İADE KODU
										</th>
										<th>
											AÇIKLAMA
										</th>
										<th>
											DURUMU
										</th>
										<th>
											TARİH
										</th>
										<th>
											İNCELE
										</th>
									</tr>
									<?php
									$iadeler = $VT->VeriGetir("iadeler", "WHERE uyeID=?", array($uyelikbilgisi[0]["ID"]), "ORDER BY ID DESC");
									if ($iadeler != false) {
										for ($i = 0; $i < count($iadeler); $i++) {
											
											
											?>
											<tr>
												<td>
													<?= $iadeler[$i]["iadekodu"] ?>
												</td>
												
												<td>
													<?=mb_substr(stripslashes($iadeler[$i]["metin"]),0,55,"UTF-8")?>......
												</td>
												
												
												<td>
													<?php
													if ($iadeler[$i]["durum"] == 1) {
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
												<td>
													<?= date("d.m.Y", strtotime($iadeler[$i]["tarih"])) ?>
												</td>
												<td>
													<a href="<?= SITE ?>iade-detay/<?= $iadeler[$i]["iadekodu"] ?>">İncele</a>
												</td>
											</tr>
											<?php
										}
									} else {
										?>

										<tr>
											<td colspan="5">
                                            Henüz kayıtlı bir iade bildiriminiz bulunmamaktadır.
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