<?php

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