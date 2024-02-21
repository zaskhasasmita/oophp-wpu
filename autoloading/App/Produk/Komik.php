<?php

class Komik extends Produk implements InfoProduk{
    public $jmlHalaman; // Properti khusus untuk class Komik

    // Constructor class Komik
    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman) {
        parent::__construct($judul, $penulis, $penerbit, $harga); // Memanggil constructor dari class parent (Produk)
        $this->jmlHalaman = $jmlHalaman; // Inisialisasi properti jmlHalaman
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} ({$this->harga})";
        return $str;
    }
    
    // Method untuk mendapatkan informasi produk khusus komik
    public function getInfoProduk() {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman"; // Menggunakan method getInfoProduk dari class Produk dan menambahkan informasi jmlHalaman
        return $str;
    } 

}