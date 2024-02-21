<?php

use Produk as GlobalProduk;

interface InfoProduk {
    public function getInfoProduk();
}

// Mendefinisikan sebuah class bernama Produk
abstract class Produk {
    // Properti dari class Produk
    // Enkapsulasi properi-produk menggunakan penandaan availability private
    protected  $judul, 
            $penulis, 
            $penerbit,
            $harga,
            $diskon = 0;

    // Constructor akan dijalankan secara otomatis pada saat pembuatan objek
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul; // Inisialisasi properti judul
        $this->penulis = $penulis; // Inisialisasi properti penulis
        $this->penerbit = $penerbit; // Inisialisasi properti penerbit
        $this->harga = $harga; // Inisialisasi properti harga
    }

    // Metode "setter" dan "getter" untuk intervension pada properi khusus
    public function setJudul( $judul ) {
        $this->judul = $judul;
    }
    public function getJudul() {
        return $this->judul;
    }

    public function setPenulis( $penulis ) {
        $this->penulis = $penulis;
    }
    public function getPenulis() {
        return $this->penulis;
    }
    
    public function setPenerbit( $penerbit ) {
        $this->penerbit = $penerbit;
    }
    public function getPenerbit() {
        return $this->penerbit;
    }

    public function setDiskon( $diskon ) {
        $this->diskon = $diskon;
    }
    public function getDiskon() {
        return $this->diskon;
    }
    
    public function setHarga ( $harga ) {
        $this->harga = $harga;
    }
    public function getHarga() {
        return $this->harga - ( $this->harga * $this->diskon / 100 );
    }

    // Method untuk mendapatkan label dari produk
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    abstract public function getInfo();
    
}


// Mendefinisikan class Komik yang merupakan turunan dari class Produk
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


// Mendefinisikan class Game yang merupakan turunan dari class Produk
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


// Mendefinisikan class untuk mencetak informasi produk
class CetakInfoProduk {
    public $daftarProduk = array();

    public function tambahProduk( Produk $produk ) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $str = "DAFTAR PRODUK : <br>";

        foreach( $this->daftarProduk as $p ) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}

$produk1 = new Komik("One Piece", "Eichiro Oda", "Shonen Jump", 30000, 100); // Objek komik
$produk2 = new Game("Mobile Legend", "Justin Yuan", "Moontoon", 12000, 50); // Objek game

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );

echo $cetakProduk->cetak();

