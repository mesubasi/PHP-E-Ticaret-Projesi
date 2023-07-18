function sepeteEkle(SITE,urunID)
{
    var adet=$(".adet").val();
    $.ajax({
        method:"POST",
        url:SITE+"ajax.php",
        data:$("form#urunbilgisi").serialize()+"&urunID="+urunID+"&islemtipi=sepeteEkle",
        success: function(sonuc)
        {
            if(sonuc=="TAMAM")
            {
                alert("Sepete Eklendi.");
            }
            else if (sonuc=="STOK")
            {
                alert("Bu ürün stokta bulunmuyor.");
            }
            else
            {
                alert("İşleminiz şuan geçersizdir. Lütfen daha sonra tekrar deneyiniz."+sonuc);
            }
         }
        });
}



function sifreIste(SITE) {

    var mailadresi=$(".sifremail").val();
    $.ajax({
        method:"POST",
        url:SITE+"ajax.php",
        data:{"mailadresi":mailadresi,"islemtipi":"sifreIste"},
        success: function(sonuc)
        {
            if(sonuc=="TAMAM")
            {
               window.location.href=SITE+"sifre-belirle/dogrulama";
            }
            else
            {
                alert("İşleminiz şuan geçersizdir. Lütfen daha sonra tekrar deneyiniz.");
            }
           
            
         }
         
        });
    
}


function favoriyeEkle(SITE,urunID,key)
{
    $.ajax({
        method:"POST",
        url:SITE+"ajax.php",
        data:{"urunID":urunID,"urunKey":key,"islemtipi":"favoriyeEkle"},
        success: function(sonuc)
        {
            if(sonuc=="TAMAM")
            {
               alert("Ürününüz Favoriye Eklendi.");
            }
            else if (sonuc=="VAR")
            {
                alert("Bu ürün zaten favorinizde!");
            }
            else if(sonuc=="GUVENLIK")
            {
                alert("Güvenlik ihlali tespit edildi!");
            }
            else
            {
                alert("İşleminiz şuan geçersizdir. Üyelik girişi yapınız.");
            }
           
            
         }
         
        });
}