<?php

session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($cek) > 0){

        $data = mysqli_fetch_array($cek);

        $_SESSION['username'] = $data['username'];
        $_SESSION['role']     = $data['role'];

        header("Location:index.php");
        exit();

    }else{

        echo "<script>
        alert('Login Gagal');
        window.location='login.php';
        </script>";

    }

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login Posyandu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#e9d5ff,#c084fc);
    height:100vh;
}

.login-box{
    margin-top:100px;
}

.card{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
}

.card-header{
    background:#9333ea;
    color:white;
    text-align:center;
    font-size:24px;
    font-weight:bold;
    border-radius:20px 20px 0 0 !important;
}

.btn-login{
    background:#9333ea;
    color:white;
    border:none;
}

.btn-login:hover{
    background:#7e22ce;
    color:white;
}

</style>

</head>
<body>

<div class="container">

<div class="row justify-content-center login-box">

<div class="col-md-4">

<div class="card">

<div class="card-header">
🩺 LOGIN POSYANDU
</div>

<div class="card-body p-4">

<form method="POST">

<label>Username</label>

<input
type="text"
name="username"
class="form-control mb-3"
required>

<label>Password</label>

<input
type="password"
name="password"
class="form-control mb-3"
required>

<button
type="submit"
name="login"
class="btn btn-login w-100">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>