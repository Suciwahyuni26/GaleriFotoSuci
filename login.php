<?php
require 'function.php';

if(isset($_SESSION["id"])){
    header("Location: dashboard.php");
}

$login = new Login();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | GaleriFoto</title>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <style>
    *{  padding:0;
        margin:0;
        font-family: 'Quicksand',sans-serif; }

    .body { background-color: #E0F4FF; }

    *{  color: inherit; }

    #bg-login { display: flex;
                height: 100vh; 
                justify-content: center;
                align-items: center; }

    .box-login {    width: 350px;
                    min-height: 300px;
                    border:1px solid #ccc;
                    background-color: #610C9F;
                    padding:15px;
                    box-sizing: border-box; 
                    box-shadow : 10px 10px 10px 10px lightblue;}

    .box-login h2 { text-align: center;
                    margin-bottom: 15px; }

    .input-control{ width:100%;
                    padding:10px;
                    margin-bottom: 15px;
                    box-sizing: border-box; }

    .btn {  padding:8px 15px;
            background-color: #910A67 ;
            color: #fff;
            border:none;
            cursor: pointer; }
        
    .class {text-align : center;
            margin-top }
    
    .box-login p{
        margin-top: 10px;
        color : #9ACD32;        
    }
    </style>
    </head>

    <body id="bg-login">
    <div class = "box-login">

        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" 
            placeholder="Username" class="input-control">
            <input type="password" name="pass" 
            placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
            <p class= "login-register-text"> Belum Mempunyai Akun? <a href= "registration.php">Silahkan Buat Akun disini!</a></p>
            <script src="script.js"></script>
        </form>

        <?php
            if(isset($_POST['submit'])){
            include 'db.php';

            $user = mysqli_real_escape_string($conn, $_POST['user']);
            $pass = mysqli_real_escape_string($conn,$_POST['pass']);

            $cek = mysqli_query($conn, "SELECT * FROM user WHERE Username = '".$user."' AND Password ='".$pass."' ");
            if (mysqli_num_rows($cek) > 0){
                $d = mysqli_fetch_array ($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['UserID']=$d['UserID'];
                $_SESSION['a_global'] = $d;
                echo '<script>alert("Login Berhasill!")</script>';
                echo '<script>window.location="dashboard.php"</script>';
            }else{
                echo '<script>alert("Username atau Password Anda salah!")</script>';
            }
        }
    
        ?>
    </div>
    
</body>
</html>