<?php
// Buat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "belajardata");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $nis     = htmlspecialchars($data["nis"]);
    $nama    = htmlspecialchars($data["nama"]);
    $email   = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // Upload file gambar
    if ($_FILES['gambar']['error'] === 4) {
        // 4 = UPLOAD_ERR_NO_FILE → tidak ada file diupload
        $gambar = "default.jpg";
    } else {
        // upload gambar
        $gambar = $_FILES['gambar']['name'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        
        // simpan file ke folder image/
        $targetDir = "image/cache/";
        $targetFile = $targetDir . basename($gambar);
        move_uploaded_file($tmpName, $targetFile);
    }
     
// Cek apakah gambar ada sebelum ditampilkan
        $gambar = isset($row['gambar']) && $row['gambar'] ? $row['gambar'] : 'default.jpg';
        echo '<img src="image/' . htmlspecialchars($gambar) . '" width="100">';
        $rows[] = $row;

    // Insert ke database
    $query = "INSERT INTO siswa (nis, nama, email, jurusan, gambar) 
              VALUES ('$nis', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($no) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE no = $no");
    return mysqli_affected_rows($conn);
}


?>
