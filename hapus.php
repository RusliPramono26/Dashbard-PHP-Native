<?php 
include 'koneksi.php';

if(!isset($_GET['id'])){
    header("location: dashboard.php");
    exit;
}
$id = (int)$_GET['id'];
$sql = "DELETE FROM karyawan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if($stmt->execute()){
    echo "<script>alert('Data BERHASIL dihapus'); window.location.href= 'dashboard.php';</script>";
} else{
    echo "<script>alert('Data GAGAL dihapus'); window.location.href= 'dashboard.php';</script>";
}

$stmt->close();
$conn->close();
?>