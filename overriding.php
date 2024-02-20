<?php

// Mendefinisikan sebuah class bernama Produk
class Produk {
    // Properti dari class Produk
    public $judul, $penulis, $penerbit, $harga;

    // Constructor akan dijalankan secara otomatis pada saat pembuatan objek
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul; // Inisialisasi properti judul
        $this->penulis = $penulis; // Inisialisasi properti penulis
        $this->penerbit = $penerbit; // Inisialisasi properti penerbit
        $this->harga = $harga; // Inisialisasi properti harga
    }

    // Method untuk mendapatkan label dari produk
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // Method untuk mendapatkan informasi produk
    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} ({$this->harga})";
        return $str;
    }
}


// Mendefinisikan class Komik yang merupakan turunan dari class Produk
class Komik extends Produk {
    public $jmlHalaman; // Properti khusus untuk class Komik

    // Constructor class Komik
    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman) {
        parent::__construct($judul, $penulis, $penerbit, $harga); // Memanggil constructor dari class parent (Produk)
        $this->jmlHalaman = $jmlHalaman; // Inisialisasi properti jmlHalaman
    }

    // Method untuk mendapatkan informasi produk khusus komik
    public function getInfoProduk() {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman"; // Menggunakan method getInfoProduk dari class Produk dan menambahkan informasi jmlHalaman
        return $str;
    } 
}


// Mendefinisikan class Game yang merupakan turunan dari class Produk
class Game extends Produk {
    public $waktuMain; // Properti khusus untuk class Game

    // Constructor class Game
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
        parent::__construct($judul, $penulis, $penerbit, $harga); // Memanggil constructor dari class parent (Produk)
        $this->waktuMain = $waktuMain; // Inisialisasi properti waktuMain
    }
    
    // Method untuk mendapatkan informasi produk khusus game
    public function getInfoProduk() {
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam"; // Menggunakan method getInfoProduk dari class Produk dan menambahkan informasi waktuMain
        return $str;
    }
}


// Mendefinisikan class untuk mencetak informasi produk
class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


// Membuat objek dari class Komik dan Game
$produk1 = new Komik("One Piece", "Eichiro Oda", "Shonen Jump", 30000, 100); // Objek komik
$produk2 = new Game("Mobile Legend", "Justin Yuan", "Moontoon", 12000, 50); // Objek game

// Menampilkan informasi produk
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
