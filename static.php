<?php

// class ContohStatic {
//     public static $angka = 1;

//     public static function halo() {
//         return "Halo! " . self::$angka++ . " kali";
//     }
// }

// // bisa langsung akses properti nya tanpa di instance dulu
// echo ContohStatic::$angka; //properti
// echo "<br>";
// echo ContohStatic::halo(); //method
// echo "<hr>";
// echo ContohStatic::halo();



class Contoh {
    public static $angka = 1;

    public function halo() {
        return "Halo " . self::$angka++ . " Kali.<br>";
    }
}

$obj = new Contoh();
echo $obj->halo();
echo $obj->halo();
echo $obj->halo();

echo "<hr>";

$obj2 = new Contoh();
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();