<?php
require_once 'Koneksi.php';

class Model {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllMembers() {
        $sql = "SELECT * FROM member";
        $result = $this->conn->query($sql);
        $members = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $members[] = $row;
            }
        }
        return $members;
    }

    public function getMemberById($id) {
        $sql = "SELECT * FROM member WHERE id_member = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
        $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) 
                VALUES ('$nama', '$nomor', '$alamat', '$tgl_mendaftar', '$tgl_terakhir_bayar')";
        return $this->conn->query($sql);
    }

    public function updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
        $sql = "UPDATE member SET 
                nama_member = '$nama', 
                nomor_member = '$nomor', 
                alamat = '$alamat', 
                tgl_mendaftar = '$tgl_mendaftar', 
                tgl_terakhir_bayar = '$tgl_terakhir_bayar' 
                WHERE id_member = $id";
        return $this->conn->query($sql);
    }

    public function deleteMember($id) {
        $sql = "DELETE FROM member WHERE id_member = $id";
        return $this->conn->query($sql);
    }

    public function getAllBooks() {
        $sql = "SELECT * FROM buku";
        $result = $this->conn->query($sql);
        $books = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
        }
        return $books;
    }

    public function getBookById($id) {
        $sql = "SELECT * FROM buku WHERE id_buku = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function insertBook($judul, $penulis, $penerbit, $tahun) {
        $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) 
                VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
        return $this->conn->query($sql);
    }

    public function updateBook($id, $judul, $penulis, $penerbit, $tahun) {
        $sql = "UPDATE buku SET 
                judul_buku = '$judul', 
                penulis = '$penulis', 
                penerbit = '$penerbit', 
                tahun_terbit = '$tahun' 
                WHERE id_buku = $id";
        return $this->conn->query($sql);
    }

    public function deleteBook($id) {
        $sql = "DELETE FROM buku WHERE id_buku = $id";
        return $this->conn->query($sql);
    }

    public function getAllPeminjaman() {
        $sql = "SELECT * FROM peminjaman";
        $result = $this->conn->query($sql);
        $peminjaman = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $peminjaman[] = $row;
            }
        }
        return $peminjaman;
    }

    public function getPeminjamanById($id) {
        $sql = "SELECT * FROM peminjaman WHERE id_peminjaman = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
        $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) 
                VALUES ('$id_member', '$id_buku', '$tgl_pinjam', '$tgl_kembali')";
        return $this->conn->query($sql);
    }

    public function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
        $sql = "UPDATE peminjaman SET 
                id_member = '$id_member', 
                id_buku = '$id_buku', 
                tgl_pinjam = '$tgl_pinjam', 
                tgl_kembali = '$tgl_kembali' 
                WHERE id_peminjaman = $id";
        return $this->conn->query($sql);
    }

    public function deletePeminjaman($id) {
        $sql = "DELETE FROM peminjaman WHERE id_peminjaman = $id";
        return $this->conn->query($sql);
    }
}
?>

<?php
require_once 'Model.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    $model = new Model();
    $result = false;

    if ($type == 'member') {
        $result = $model->deleteMember($id);
        $redirectUrl = "Member.php";
    } elseif ($type == 'book') {
        $result = $model->deleteBook($id);
        $redirectUrl = "Buku.php";
    } elseif ($type == 'peminjaman') {
        $result = $model->deletePeminjaman($id);
        $redirectUrl = "Peminjaman.php";
    }

    if ($result) {
        header("Location: $redirectUrl");
    } else {
        echo "Gagal menghapus data.";
    }
}
?>

