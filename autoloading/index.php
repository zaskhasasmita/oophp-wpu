<?php

require_once 'App/init.php';

$produk1 = new Komik("One Piece", "Eichiro Oda", "Shonen Jump", 30000, 100); // Objek komik
$produk2 = new Game("Mobile Legend", "Justin Yuan", "Moontoon", 12000, 50); // Objek game

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );

echo $cetakProduk->cetak();

echo "<hr>";

new Coba();