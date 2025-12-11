<?php
include 'koneksi.php';

header("Content-Type: application/json");

// ======================
// 1. AMBIL DATA (GET)
// ======================
if (isset($_GET['id']) && !isset($_POST['submit'])) {

    $id = (int)$_GET['id'];

    $sql = "SELECT * FROM karyawan WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0){
        echo json_encode(["status"=>"error","msg"=>"Data tidak ditemukan"]);
        exit;
    }

    $data = $result->fetch_assoc();
    echo json_encode($data);
    exit;
}



// ======================
// 2. UPDATE DATA (POST)
// ======================
if (isset($_POST['submit'])) {

    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $gaji   = $_POST['gaji'];

    $sql_update = "UPDATE karyawan SET nama=?, posisi=?, gaji=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("ssii", $nama, $posisi, $gaji, $id);

    if($stmt->execute()){
        header("location: dashboard.php");  

    } else {
        echo json_encode(["status"=>"error","msg"=>$stmt->error]);
    }

    exit;
}


echo json_encode(["status"=>"invalid request"]);
exit;

?>
