<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: FormLogin.php"); 
  exit;
}

require 'function.php';
$siswa = mysqli_query($conn, "SELECT * FROM siswa");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Detail Laporan</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
      background-color: #ecf0f1;
      overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      width: 240px;
      height: 100%;
      background-color: #16A085;
      color: #FFFFFF;
      padding-top: 20px;
      transform: translateX(-100%);
      transition: transform 0.3s ease;
      z-index: 1001;
    }

    .sidebar.open {
      transform: translateX(0);
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 15px;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      transition: background-color 0.2s;
    }

    .sidebar a:hover {
      background-color: #FFFFFF;
      color: #000;
    }

    .logout-btn {
      background-color: #c0392b;
      color: white;
      padding: 10px 20px;
      display: block;
      margin-top: 20px;
      text-align: center;
      text-decoration: none;
    }

    .logout-btn:hover {
      background-color: #e74c3c;
    }

    /* Overlay */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.3s ease;
      z-index: 1000;
    }

    .overlay.show {
      opacity: 1;
      pointer-events: auto;
    }

    /* Content */
    .content {
      flex-grow: 1;
      padding: 30px 50px;
      transition: filter 0.3s ease;
      width: 100%;
      margin-left: 10px;    
    }

    /* Toggle button */
    .toggle-btn {
      position: fixed;
      left: 10px;
      top: 10px;
      background-color: #16A085;
      color: white;
      border: none;
      padding: 8px 12px;
      cursor: pointer;
      font-size: 18px;
      z-index: 1100;
      border-radius: 4px;
    }

    /* Detail card */
    .detail-card {
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .btn-brown {
      background: #096b57ff;
      color: white;
      padding: 8px 15px;
      border-radius: 15px;
      border: none;
      cursor: pointer;
      margin-top: 1px;
      transition: background-color 0.3s ease;
    }

    .btn-brown:hover {
      background-color: #16A085;
    }

    /* Comment section */
    .comment-box {
      margin-top: 10px;
      background: white;
      border-radius: 8px;
      padding: 10px;
    }

    .comment-input {
      display: flex;
      margin-top: 5px;
      border: 2px solid #16A085;
      border-radius: 5px;
      overflow: hidden;
    }

    .comment-input input {
      flex: 1;
      border: none;
      padding: 8px;
      outline: none;
      height: 35px;
      font-size: 14px;
    }

    .comment-input button {
      background: #16A085;
      color: white;
      border: none;
      padding: 8px 15px;
      cursor: pointer;
    }

    .comment-meta {
      font-size: 12px;
      color: gray;
    }

    /* Table-rossi */

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;

        }
        h1 {
            margin-bottom: 10px;
        }
        .top-bar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom: 15px;
        }
        .btn {
            display:inline-block;
            padding:6px 12px;
            background:#2d8f4f;
            color:white;
            text-decoration:none;
            border-radius:4px;
            font-size:14px;
        }
        .btn.secondary { background:#3498db; }
        .btn.danger { background:#16A085; }
        table {
            width:100%;
            border-collapse:collapse;
            background:white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }
        th, td {
            padding:10px 12px;
            border-bottom:1px solid #eee;
            text-align:left;
            vertical-align:middle;
        }
        th {
            background:#fafafa;
            font-weight:600;
        }
        tr:last-child td { border-bottom: none; }
        .thumb {
            width:60px;
            height:60px;
            object-fit:cover;
            border-radius:6px;
            border:1px solid #ddd;
        }
        .aksi-btns a {
            margin-right:6px;
            font-size:13px;
            padding:6px 8px;
            border-radius:4px;
            text-decoration:none;
            color:white;
        }
        .aksi-btns .view { background:#27ae60; }
        .aksi-btns .edit { background:#f39c12; }
        .aksi-btns .delete { background:#e74c3c; }
        .note { color:#666; font-size:13px; margin-top:8px; }
        @media (max-width:800px) {
            .top-bar { flex-direction:column; align-items:flex-start; gap:8px; }
            th, td { font-size:14px; padding:8px; }
        } </style>

</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <h2>Menu</h2>
  <a href="welcome.php">🏡 Home</a>
  <a href="nilai.php">📈 Nilai</a>
  <a href="kehadiran.php">📃 Kehadiran</a>
  <a href="jadwal.php">📆 Jadwal</a>
  <a href="pengaturan.php">⚙️ Pengaturan</a>
  <a href="laporan.php">📩 Laporan</a>
  <a href="logout.php" class="logout-btn">⭕ Logout</a>
</div>

<!-- Overlay -->
<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

<!-- Toggle button -->
<button class="toggle-btn" onclick="toggleSidebar()">☰</button>

<!-- Content -->
<div class="content" id="content">
  <div class="detail-card">

<div class="container">
    <div class="top-bar">
        <div>
            <h1>Daftar Laporan Siswa</h1>
        </div>
        <div>
            <a href="laporan.php" class="btn secondary">Refresh</a>
            <a href="#" class="btn">Tambah Baru</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width:56px">No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Gambar</th>
                <th style="width:200px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($siswa)): ?>
                <tr>
                    <td colspan="7" style="text-align:center; padding:30px;">Data kosong.</td>
                </tr>
            <?php else: ?>
                <?php $i = 1; foreach ($siswa as $row): ?>
                <tr>
                   <tr>
                     <td><?= $i++; ?></td>
                     <td><?= htmlspecialchars($row['nama']); ?></td>
                     <td><?= htmlspecialchars($row['nis']); ?></td>
                     <td><?= htmlspecialchars($row['email']); ?></td>
                     <td><?= htmlspecialchars($row['jurusan']); ?></td>
                     <td>
                    <img src="<?= htmlspecialchars($row['gambar']); ?>" alt="gambar-<?= $i ?>" class="thumb">
                  </td>
                <td class="aksi-btns">
                  <a href="view.php?nis=<?= urlencode($row['nis']); ?>" class="view">View</a>
                  <a href="edit.php?nis=<?= urlencode($row['nis']); ?>" class="edit">Edit</a>
                  <a href="delete.php?nis=<?= urlencode($row['nis']); ?>" class="delete" onclick="return confirm('Hapus data <?= addslashes($row['nama']) ?>?')">Delete</a>
                </td>
               </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>



<script>
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('overlay').classList.toggle('show');
  }
</script>

</body>
</html>


