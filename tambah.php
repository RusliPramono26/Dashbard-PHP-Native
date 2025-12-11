<?php 
include 'koneksi.php';

if(isset($_POST['submit'])){
    $nama = $conn->real_escape_string($_POST['nama']);
    $posisi = $conn->real_escape_string($_POST['posisi']);
    $gaji = $_POST['gaji'];

    $sql = "INSERT INTO karyawan (nama,posisi,gaji) VALUES(?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi',$nama,$posisi,$gaji);

    if($stmt->execute()){
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='dashboard.php'</script>";
    } else {
        echo "ERROR". $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
