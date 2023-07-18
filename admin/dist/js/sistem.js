var SITE = $("html").data("url");
var ANASITE = $("html").data("anaurl");
$(function () {
  $("#example1").DataTable();
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
  });
});
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2();
  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
});
$(function () {
  // Summernote
  $('.textarea').summernote();
});
function aktifpasif(ID, tablo) {
  var durum = 0;
  if ($(".aktifpasif" + ID).is(':checked')) {
    durum = 1;
  }
  else {
    durum = 2;
  }
  $.ajax({
    method: "POST",
    url: SITE + "ajax.php",
    data: { "tablo": tablo, "ID": ID, "durum": durum },
    success: function (sonuc) {
      if (sonuc == "TAMAM") {
      }
      else {
        alert("İşleminiz şuan geçersizdir. Lütfen daha sonra tekrar deneyiniz.");
      }
    }
  });
}
function stokOlustur() {
  $.ajax({
    method: "POST",
    url: SITE + "ajax.php",
    data: $(".urunEklemeFormu").serialize(),
    success: function (sonuc) {
      if (sonuc == "BOS") {
      }
      else {
        $(".stokYonetimAlani").html(sonuc);
      }
    }
  });
}
function secenekSil(secenekNo) {
  $(".liste" + secenekNo).remove();
}
var listeSira = 0;
function secenekEkleme(varyasyonID, varyasyonAdi) {
  listeSira = (listeSira + 1);
  swal(varyasyonAdi + " Seçeneğiniz:", {
    content: "input",
  })
    .then((value) => {
      if (value == null) {
      }
      else {
        $(".secenekler_" + varyasyonID).append('<li class="liste' + listeSira + '">' + value + '<a class="btn btn-sm btn-danger" style="color:#fff;" onclick="secenekSil(' + listeSira + ');">Sil</a><input type="hidden" name="secenek' + varyasyonID + '[]" value="' + value + '" /></li>');
      }
    });
}

function vitrinaktifpasif(ID, tablo) {
  var durum = 0;
  if ($(".vitrinaktifpasif" + ID).is(':checked')) {
    durum = 1;
  }
  else {
    durum = 2;
  }
  $.ajax({
    method: "POST",
    url: SITE + "ajax.php",
    data: { "tablo": tablo, "ID": ID, "vitrindurum": durum },
    success: function (sonuc) {
      if (sonuc == "TAMAM") {
      }
      else {
        alert("İşleminiz şuan geçersizdir. Lütfen daha sonra tekrar deneyiniz.");
      }
    }
  });
}


$(function () {
  $(".silmeAlani").click(function (e) {
    e.preventDefault();
    var yonlenecekAdres = e.currentTarget.getAttribute("href");
    swal({
      title: "Kaldırmak istediğinizden emin misiniz?",
      text: "Bu veriyi sildiğinizde bir daha geri alamayacaksınız.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = yonlenecekAdres;
        } else {
          swal("İşleminiz başarıyla iptal edildi.");
        }
      });
  });
  var varyasyonNo = 0;
  $(".varyasyonEkleme").click(function () {
    varyasyonNo = (varyasyonNo + 1);
    swal("Varyasyon İsminiz:", {
      content: "input",
    })
      .then((value) => {
        if (value == null) {
        }
        else {
          $(".butonuKontrolEt").show();
          if (varyasyonNo > 2) {
            swal("Maksimum 2 adet varyasyon tanımlayabilirsiniz.");
          }
          else {
            $(".varyasyonGrup").append('<div class="col-md-3 varyasyonNo_' + varyasyonNo + '"><h2>' + value + '<a class="btn btn-success varyasyonButon_' + varyasyonNo + '" onclick="secenekEkleme(' + varyasyonNo + ',\'' + value + '\');" style="color:#fff; float:right;"><i class="fa fa-plus"></i> Seçenek Ekle</a><input type="hidden" name="varyasyon' + varyasyonNo + '" value="' + value + '" /></h2><ul class="secenekler_' + varyasyonNo + '"></ul></div>');
          }
        }
      });
  });
});