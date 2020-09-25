<?php 
    require_once 'app/init.php';
    $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen jump", 30000, 100);
    $produk2 = new Game("Uncharted", "Neil Druckmann", "Sony", 250000, 50);

    $cetakProduk = new CetakInfoProduk();
    $cetakProduk->tambahProduk($produk1);
    $cetakProduk->tambahProduk($produk2);

    echo $cetakProduk->cetak();

?>