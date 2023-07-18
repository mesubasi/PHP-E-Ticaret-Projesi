<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=SITE?>" class="brand-link">
      <img src="<?=SITE?>dist/img/logo.png" alt="MARKASION" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MARKASION</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=SITE?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION["adsoyad"]?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="<?=SITE?>modul-ekle" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Modül Ekle
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=SITE?>banner-liste" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Banner İşlemleri
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=SITE?>kategori-liste" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori İşlemleri
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=SITE?>urun-liste" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Ürün İşlemleri
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=SITE?>siparis-liste" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Siparişler
                
                <?php
                $yenisiparisler=$VT->VeriGetir("siparisler","WHERE durum=?",array(1));
                if($yenisiparisler!=false)
                {
                  ?>
                  <span class="right badge badge-danger"><?=count($yenisiparisler)?> 

                  </span>
                  <?php
                }
               ?>
              </p>
            </a>
          
          </li>
          <li class="nav-item">
            <a href="<?=SITE?>iade-liste" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                İadeler
                <?php
                $yeniiadeler=$VT->VeriGetir("iadeler","WHERE durum=?",array(1));
                if($yeniiadeler!=false)
                {
                  ?>
                  <span class="right badge badge-danger"><?=count($yeniiadeler)?> 

                  </span>
                  <?php
                }
               ?>
              </p>
            </a>
          
          </li>

          <li class="nav-item">
            <a href="<?=SITE?>yorumlar" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Yorum İşlemleri
                <?php
                $yeniyorumlar=$VT->VeriGetir("yorumlar","WHERE durum=?",array(2));
                if($yeniyorumlar!=false)
                {
                  ?>
                  <span class="right badge badge-danger"><?=count($yeniyorumlar)?> 

                  </span>
                  <?php
                }
               ?>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sayfalar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <?php
			 $moduller=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY ID ASC");
			 if($moduller!=false)
			 {
				 for($i=0;$i<count($moduller);$i++)
				 {
					 ?>
                      <li class="nav-item">
                        <a href="<?=SITE?>liste/<?=$moduller[$i]["tablo"]?>" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?=$moduller[$i]["baslik"]?></p>
                        </a>
                      </li>
                     <?php
				 }
			 }
			 ?>
             
             
              
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=SITE?>seo-ayarlari" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Seo Ayarları
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?=SITE?>iletisim-ayarlari" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                İletişim Ayarları
              </p>
            </a>
          </li>
         <li class="nav-item">
            <a href="<?=SITE?>cikis" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Çıkış Yap
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>