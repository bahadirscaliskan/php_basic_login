<?php

include_once ('db.php');

echo '<!DOCTYPE html>
<html>
<head>
<title>Giriş Yap</title>
</head>
<body>
  <div id="frm">
<form action="" method = "GET" >

  <label for="fname">İsminiz:</label><br>
  <input type="text" id="fname" name="fname" ><br><br>
  <label for="lname">Soyisminiz:</label><br>
  <input type="text" id="lname" name="lname" ><br><br>
  <label for="lsifre">Şifreniz:</label><br>
  <input type="text" id="lsifre" name="lsifre" ><br><br>
  <input type="submit" value="Gönder">
</form>
</div>
</body>
</html>';


if (!empty($_GET)) {

  $isim = $_GET['fname'];
  $soyisim = $_GET['lname'];
  $sifre = $_GET['lsifre'];


  //$hatavarmi = false;
  if ($isim == "") {

      echo "Kullanıcı adı boş bırakılamaz";
      //$hatavarmi = true;
  } elseif ($soyisim == "") {

      //$hatavarmi = true;
      echo "Kullanıcı soyisim boş bırakılamaz";

  } elseif ($sifre == "") {

    //$hatavarmi = true;
    echo "Şifre Giriniz";

  } else {


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