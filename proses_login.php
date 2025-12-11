<?php 
session_start();

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $password  = $_POST['password'];

    $sql = "SELECT id,username,password FROM users WHERE username = ?";

    $stmt=$conn->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $user = $result->fetch_assoc(); //[1,admin,akafkhasnkask] fetch_assoch() = //[id=>1,usename => admin]
        if(password_verify($password,$user['password'])){

            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header('location: dashboard.php');
            exit();
        } else {
            echo "password salah";
        }
    } else {
        echo "email salah";
    }
    $stmt->close();
}
$conn->close();
?>