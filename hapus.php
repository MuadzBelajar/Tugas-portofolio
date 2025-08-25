<?php
require 'function.php';

if (isset($_GET['no'])) {
    $no = (int)$_GET['no']; // pastikan integer
    if (hapus($no) > 0) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'laporan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'laporan.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('ID/No tidak ditemukan!');
        document.location.href = 'laporan.php';
    </script>
    ";
}
?>
