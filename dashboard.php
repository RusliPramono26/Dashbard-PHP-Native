<?php 
include 'koneksi.php';
$sql = "SELECT * FROM karyawan ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard | Karyawan</title>

<style>
    body{
        margin:0;
        font-family:Arial, sans-serif;
        background:#f4f6f8;
        display:flex;
    }

    .sidebar{
        width:240px;
        background:#2c3e50;
        color:white;
        padding:20px;
        height:100vh;
        position:fixed;
    }
    .sidebar h2{text-align:center;margin-bottom:20px;}
    .sidebar a{
        display:block;
        text-decoration:none;
        color:white;
        padding:10px 15px;
        border-radius:4px;
        margin-bottom:6px;
    }
    .sidebar a:hover{background:#1abc9c;}

    .content{
        margin-left:300px;
        padding:20px;
        width:100%;
    }

    table{
        width:100%;
        border-collapse:collapse;
        background:white;
        border: 1px solid #ddd;
    }
    th, td{
        padding:10px;
        border:1px solid #ddd;
        text-align:center;
    }
    th{background:#3498db;color:white;}

    .btn{
        padding:6px 12px;
        background:#1abc9c;
        color:white;
        text-decoration:none;
        border-radius:4px;
        margin-right:4px;
    }
    .btn:hover{background:#17a589;}

    /* FORM STYLE */
    .form-box{
        background:white;
        padding:20px;
        border-radius:6px;
        width:50%;
    }
    input{
        width:100%;
        padding:10px;
        border:1px solid #ccc;
        border-radius:4px;
        margin-bottom:10px;
    }

</style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>MENU</h2>
    <a href="#" onclick="showTable()">📋 Lihat Data</a>
    <a href="#" onclick="showForm()">➕ Tambah Data</a>
    <a href="#"></a>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- TABLE SECTION -->
    <div id="tableSection">
        <h2>📃 Daftar Karyawan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NAMA</th>
                    <th>POSISI</th>
                    <th>GAJI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['posisi']; ?></td>
                        <td>Rp <?php echo number_format($row['gaji'], 0, ',', '.'); ?></td>
                        <td>
                            <a class="btn" href="#" onclick="loadUbah(<?= $row['id']; ?>)">UBAH</a>
                            <a class="btn" href="hapus.php?id=<?= $row['id'];?>" style="background:#e74c3c;">HAPUS</a>
                        </td>
                    </tr>
                <?php }} else { echo "<tr><td colspan='4'>Tidak ada data</td></tr>"; } ?>
            </tbody>
        </table>
    </div>

    <!-- FORM SECTION -->
    <div id="formSection" style="display:none;">
        <h2>➕ Tambah Data Karyawan</h2>
        <div class="form-box">
            <form action="tambah.php" method="POST">
                <label>Nama</label>
                <input type="text" name="nama" required>

                <label>Posisi</label>
                <input type="text" name="posisi" required>
                
                <label>Gaji</label>
                <input type="number" name="gaji" required>

                <button class="btn" type="submit" name="submit">SIMPAN</button>
            </form>
        </div>
    </div>

    <!-- FORM UBAH SECTION -->
    <div id="editSection" style="display:none;">
        <h2>✏ Ubah Data Karyawan</h2>
        <div class="form-box">
            <form action="ubah.php" method="POST">
                <input type="hidden" id="edit_id" name="id">

                <label>Nama</label>
                <input type="text" name="nama" id="edit_nama" required>

                <label>Posisi</label>
                <input type="text" name="posisi" id="edit_posisi" required>
                
                <label>Gaji</label>
                <input type="number" name="gaji" id="edit_gaji" required>

                <button class="btn" type="submit" name="submit">UPDATE</button>
            </form>
        </div>
    </div>


</div>

<script>
// Tampilkan Form, sembunyikan tabel
function showForm(){
    document.getElementById("formSection").style.display = "block";
    document.getElementById("tableSection").style.display = "none";
}

// Tampilkan tabel, sembunyikan form
function showTable(){
    document.getElementById("formSection").style.display = "none";
    document.getElementById("tableSection").style.display = "block";
}

function loadUbah(id){
    fetch("ubah.php?id="+id)             // ambil datanya dari ubah.php
    .then(response => response.json())
    .then(data => {

        // isi input form ubah
        document.getElementById("edit_id").value = id;
        document.getElementById("edit_nama").value = data.nama;
        document.getElementById("edit_posisi").value = data.posisi;
        document.getElementById("edit_gaji").value = data.gaji;

        // tampilkan form ubah
        document.getElementById("formSection").style.display = "none";
        document.getElementById("tableSection").style.display = "none";
        document.getElementById("editSection").style.display = "block";
    });
}
</script>

</body>
</html>
