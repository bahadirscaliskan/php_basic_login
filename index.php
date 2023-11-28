<?php

// Database bağlantısını bu sayfaya dahil etme
include_once ('db.php');

//Gerekli html kodları
echo '<!DOCTYPE html>
<html>
<head>
<title>Giriş Yap</title>
</head>
<body>
  <div id="frm">
<form action="" method = "GET" >

  <label for="fname">İsminiz:</label><br>
  <input type="text" name="fname" ><br><br>
  <label for="lname">Soyisminiz:</label><br>
  <input type="text" name="lname" ><br><br>
  <label for="lsifre">Şifreniz:</label><br>
  <input type="text" name="lsifre" ><br><br>
  <input type="submit" value="Gönder">
</form>
</div>
</body>
</html>';

//İnputlar boşmu diye kontrol ettirme
if (!empty($_GET)) {

  $isim = $_GET['fname'];
  $soyisim = $_GET['lname'];
  $sifre = $_GET['lsifre'];


  
  if ($isim == "") {

      echo "Kullanıcı adı boş bırakılamaz";
      
  } elseif ($soyisim == "") {

      
      echo "Kullanıcı soyisim boş bırakılamaz";

  } elseif ($sifre == "") {

    
    echo "Şifre Giriniz";

  } else {

      //İlgili inputları doldurduktan sonrasında veritabanında varmı diye kontrol ettirme
      $sorgu = "SELECT * FROM kullanici  WHERE isim = '$isim' AND soyisim = '$soyisim' AND sifre = '$sifre' ";

      $sonuc = mysqli_query($dbCon, $sorgu);
      $row = mysqli_fetch_assoc($sonuc);

      if (empty($row)) {
          echo "Yanlış Kullanıcı Adı ve Şifre";

      } else {

          header("Location: giris.php");
      }


  }


}






?>