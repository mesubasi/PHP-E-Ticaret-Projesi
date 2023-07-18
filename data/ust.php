<header class="version_1">
	<div class="layer"></div><!-- Mobile menu overlay mask -->
	<div class="main_header">
		<div class="container">
			<div class="row small-gutters">
				<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
					
				</div>
				<nav class="col-xl-6 col-lg-7">
					<a class="open_close" href="javascript:void(0);">
						<div class="hamburger hamburger--spin">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</a>
					<!-- Mobile menu button -->
					<div class="main-menu">
						<div id="header_menu">
							
							
						</div>
						<ul>
							<li class="">
								<a href="<?= SITE ?>">Anasayfa</a>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);" class="show-submenu">Kurumsal</a>
								<ul>
									<?php
									$kurumsal = $VT->VeriGetir("kurumsal", "WHERE durum=?", array(1), "ORDER BY sirano ASC");
									if ($kurumsal != false) {
										for ($i = 0; $i < count($kurumsal); $i++) {
											?>
											<li><a href="<?= SITE ?>kurumsal/<?= $kurumsal[$i]["seflink"] ?>"><?= stripslashes($kurumsal[$i]["baslik"]) ?></a></li>
											<?php
										}
									}
									?>



								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);" class="show-submenu">GİZLİLİK VE KULLANIM</a>
								<ul>
									<?php
									$gizlilikvekullanim = $VT->VeriGetir("gizlilikpolitikasi", "WHERE durum=?", array(1), "ORDER BY sirano ASC", 1);
									if ($gizlilikvekullanim != false) {
										for ($i = 0; $i < count($gizlilikvekullanim); $i++) {
											?>
											<li><a
													href="<?= SITE ?>gizlilik-politikasi/<?= $gizlilikvekullanim[$i]["seflink"] ?>"><?= stripslashes($gizlilikvekullanim[$i]["baslik"]) ?></a></li>
											<?php
										}
									}
									?>


								</ul>
							</li>


							<li>
								<a href="<?= SITE ?>blog">Blog</a>
							</li>
							<li>
								

								<a href="<?=SITE?>iletisim">İLETİŞİM</a>
							</li>
						</ul>
					</div>
					<!--/main-menu -->
				</nav>
				<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">

				</div>
			</div>
			<!-- /row -->
		</div>
	</div>
	<!-- /main_header -->

	<div class="main_nav Sticky">
		<div class="container">
			<div class="row small-gutters">
				<div class="col-xl-3 col-lg-3 col-md-3">
					<nav class="categories">
						<ul class="clearfix">
							<li><span>
									<a href="">
										<span class="hamburger hamburger--spin">
											<span class="hamburger-box">
												<span class="hamburger-inner"></span>
											</span>
										</span>
										KATEGORİLER
									</a>
								</span>
								<div id="menu">
									<ul>
										<?php
										$kategoriler = $VT->VeriGetir("kategoriler", "WHERE durum=? AND tablo=?", array(1, "urunler"), "ORDER BY sirano ASC");
										if ($kategoriler != false) {
											for ($i = 0; $i < count($kategoriler); $i++) {
												?>
												<li><span><a href="<?= SITE ?>kategori/<?= $kategoriler[$i]["seflink"] ?>"><?= stripslashes($kategoriler[$i]["baslik"]) ?></a></span>
													<?php
													$altkategoriler = $VT->VeriGetir("kategoriler", "WHERE durum=? AND tablo=?", array(1, $kategoriler[$i]["seflink"]), "ORDER BY sirano ASC");
													if ($altkategoriler != false) {
														echo "<ul>";
														for ($j = 0; $j < count($altkategoriler); $j++) {
															?>
														<li><a href="<?= SITE ?>kategori/<?= $altkategoriler[$j]["seflink"] ?>"><?= stripslashes($altkategoriler[$j]["baslik"]) ?></a>
														</li>
														<?php

														}
														echo "</ul>";
													}
													?>
									</li>
									<?php
											}
										}
										?>





						</ul>
				</div>
				</li>
				</ul>
				</nav>
			</div>
			<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
				<div class="custom-search-input">
					<input type="text" placeholder="Ürün Ara">
					<button type="submit"><i class="header-icon_search_custom"></i></button>
				</div>
			</div>
			<div class="col-xl-3 col-lg-2 col-md-3">
				<ul class="top_tools">
					<li>
						<div class="dropdown dropdown-cart">
							<a href="<?= SITE ?>sepet" class="cart_bt"></a>
							<div class="dropdown-menu">

								<div class="total_drop">

									<a href="<?= SITE ?>sepet" class="btn_1 outline">Sepeti Göster</a>
									<a href="<?=SITE?>odeme-tipi" class="btn_1">Ödemeye Geç</a>
								</div>
							</div>
						</div>
						<!-- /dropdown-cart-->
					</li>
					<li>
						<a href="<?=SITE?>favorilerim" class="wishlist"><span>Favori</span></a>
					</li>
					<li>
						<div class="dropdown dropdown-access">
							<a href="<?= SITE ?>uyelik" class="access_link"><span>Hesabım</span></a>
							<div class="dropdown-menu">
								<?php
								if (!empty($_SESSION["uyeID"])) {

									echo "Hoşgeldin " . $_SESSION["uyeAdi"];

								} else {
									?>
									<a href="<?= SITE ?>uyelik" class="btn_1">Giriş Yap Veya Üye Ol</a>
									<?php

								}
								?>

								<ul>
									<li>
										<a href="<?= SITE ?>siparis-takip"><i class="ti-truck"></i>Sipariş Takibi</a>
									</li>
									<?php
									if (!empty($_SESSION["uyeID"])) {

										?>
										<li>
											<a href="<?= SITE ?>siparislerim"><i class="ti-package"></i>Siparişlerim</a>
										</li>
										<li>
											<a href="<?= SITE ?>hesabim"><i class="ti-user"></i>Hesabım</a>
										</li>
										<li>
											<a href="<?= SITE ?>cikis-yap"><i class="ti-power-off"></i>Çıkış Yap</a>
										</li>
										<?php

									}
									?>

								</ul>
							</div>
						</div>
						<!-- /dropdown-access-->
					</li>
					<li>
						<a href="javascript:void(0);" class="btn_search_mob"><span>Ara</span></a>
					</li>
					<li>
						<a href="#menu" class="btn_cat_mob">
							<div class="hamburger hamburger--spin" id="hamburger">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
							Kategoriler
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<div class="search_mob_wp">
		<input type="text" class="form-control" placeholder="">
		<input type="submit" class="btn_1 full-width" value="Search">
	</div>
	<!-- /search_mobile -->
	</div>
	<!-- /main_nav -->
</header>
<!-- /header -->