<?php
class Buku {
    public $judul, $penulis, $stok;

    function __construct($judul, $penulis, $stok) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->stok = $stok;
    }

    function tampilkanBuku() {
        echo "Judul Buku: $this->judul<br>";
        echo "Penulis: $this->penulis<br>";
        echo "Stok: $this->stok<br>";
    }
}

class Anggota {
    public $nama, $id;

    function __construct($nama, $id) {
        $this->nama = $nama;
        $this->id = $id;
    }

    function tampilkanAnggota() {
        echo "Nama Anggota: $this->nama<br>";
        echo "ID Anggota: $this->id<br>";
    }
}

class Aktivitas {
    function tampilkanPesan() {
        echo "Aktivitas perpustakaan.<br>";
    }
}

class Peminjaman extends Aktivitas {
    public $buku, $anggota, $tanggal;

    function __construct($buku, $anggota, $tanggal) {
        $this->buku = $buku;
        $this->anggota = $anggota;
        $this->tanggal = $tanggal;
    }

    function tampilkanPesan() {
        echo "Proses peminjaman buku.<br>";
    }

    function pinjamBuku() {
        if ($this->buku->stok > 0) {
            $this->buku->stok--;

            echo $this->anggota->nama
                . " berhasil meminjam buku "
                . $this->buku->judul
                . " pada tanggal "
                . $this->tanggal . ".<br>";
        } else {
            echo "Buku tidak dapat dipinjam karena stok habis.<br>";
        }
    }
}

$buku = new Buku("Langkah Kecil", "Dewi Lestari", 5);
$anggota = new Anggota("Semadi", "AG25301");
$peminjaman = new Peminjaman($buku, $anggota, "25-10-2026");

echo "<b>DATA BUKU</b><br>";
$buku->tampilkanBuku();

echo "<br><b>DATA ANGGOTA</b><br>";
$anggota->tampilkanAnggota();

echo "<br><b>AKTIVITAS</b><br>";
$aktivitas = new Aktivitas();
$aktivitas->tampilkanPesan();
$peminjaman->tampilkanPesan();

echo "<br><b>PROSES PEMINJAMAN</b><br>";
$peminjaman->pinjamBuku();

echo "<br><b>DATA BUKU SETELAH DIPINJAM</b><br>";
$buku->tampilkanBuku();
?>
