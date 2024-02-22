<?php

class Game extends Produk implements InfoProduk{
    public $waktuMain; // Properti khusus untuk class Game

    // Constructor class Game
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
        parent::__construct($judul, $penulis, $penerbit, $harga); // Memanggil constructor dari class parent (Produk)
        $this->waktuMain = $waktuMain; // Inisialisasi properti waktuMain
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} ({$this->harga})";
        return $str;
    }

    // Method untuk mendapatkan informasi produk khusus game
    public function getInfoProduk() {
        $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam"; // Menggunakan method getInfoProduk dari class Produk dan menambahkan informasi waktuMain
        return $str;
    }

}