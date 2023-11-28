<?php  


// Bağlancı Cümleciği
$dbCon = mysqli_connect("localhost", "root", "", "deneme");

// Türkçe Karakter Sorunu için çözüm
mysqli_set_charset($dbCon, "utf8");

// Bağlantı Kontrolü
if (mysqli_connect_errno()) {
    echo "Database Bağlantısı Sağlanamadı! Lütfen iletişime geçin!";
    exit;
}




?>
