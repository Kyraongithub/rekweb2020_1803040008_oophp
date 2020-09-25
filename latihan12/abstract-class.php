<?php 

    abstract class Produk{
        private $judul,
                $penulis,
                $penerbit,
                $harga,
                $diskon = 0;

        public function __construct( $judul = "judul", $penulis = "Penulis", $penerbit = "Penerbit",$harga = 0){
            $this->judul = $judul;
            $this->penulis = $penulis;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
        }


        //setter
        public function setJudul($judul){
            $this->judul = $judul;
        }
        public function setPenulis($penulis){
            $this->penulis = $penulis;
        }
        public function setPenerbit($penerbit){
            $this->penerbit = $penerbit;
        }
        public function setHarga($harga){
            $this->harga = $harga;
        }
        public function setDiskon($diskon){
            $this->diskon = $diskon;
        }
        //getter
        public function getLabel(){
            return "$this->penulis, $this->penerbit";
        }
        abstract public function getInfoProduk();
        public function getInfo(){
            $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ";
            return $str;
        }
        public function getJudul(){
            return $this->judul;
        }
        public function getPenulis(){
            return $this->penulis;
        }
        public function getPenerbit(){
            return $this->penerbit;
        }
        public function getDiskon(){
            return $this->diskon;
        }
        public function getHarga(){
            return $this->harga - ($this->harga * $this->diskon / 100);
        }
    }

    class Komik extends Produk{
        public $jmlHalaman;
        public function __construct($judul = "judul", $penulis = "Penulis", $penerbit = "Penerbit",
        $harga = 0, $jmlHalaman = 0){
            parent::__construct($judul, $penulis, $penerbit,$harga);
            $this->jmlHalaman = $jmlHalaman;
        }
        public function getInfoProduk(){
            $str = "Komik : " . $this->getInfo(). " - {$this->jmlHalaman} Halaman.";
            return $str;
        }
    }
    
    class Game extends Produk{
        public $waktuMain;

        public function __construct($judul = "judul", $penulis = "Penulis", $penerbit = "Penerbit",
        $harga = 0, $waktuMain = 0){
            parent::__construct($judul, $penulis, $penerbit,$harga);
            $this->waktuMain = $waktuMain;
        }

        public function getInfoProduk(){
            $str = "Game : " .  $this->getInfo(). " - {$this->waktuMain} Jam.";
            return $str;
        }
    }


    class CetakInfoProduk{
        public $daftarProduk = array();


        public function tambahProduk(Produk $produk){
            $this->daftarProduk[] = $produk;
        }
        public function cetak(){
            $str = "Daftar produk : <br>";
            foreach( $this->daftarProduk as $p ){
                $str.= "- {$p->getInfoProduk()}<br>";
            }
            return $str;
        }

    }

    $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen jump", 30000, 100);
    $produk2 = new Game("Uncharted", "Neil Druckmann", "Sony", 250000, 50);

    $cetakProduk = new CetakInfoProduk();
    $cetakProduk->tambahProduk($produk1);
    $cetakProduk->tambahProduk($produk2);

    echo $cetakProduk->cetak();

?>