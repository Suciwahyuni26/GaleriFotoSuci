<?php
require 'function.php';

$register = new Register();

if(isset($_POST["submit"])){
    $result = $register->registration($_POST["username"], $_POST["password"], $_POST["email"], $_POST["name"], $_POST["alamat"]);

    if($result == 1){
        echo
        "<script> alert('Registrasi Sukses');</script>";
    }

    elseif($result == 10){
        echo
        "<script> alert('username sudah diambil');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
            <link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
            <title>register | Suci Wahyuni </title>
    </head>

    <style>
        *{  
        font-family: 'Poppins', sans-serif; }        
        .wrapper{
            background: #ececec;
            padding: 0 20px 0 20px;
        }
        .main{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .row{
            width: 900px;
            height: 550px;
            border-radius: 10px;
            background: #fff;
            box-shadow:5px 5px 10px 1px rgba(0,0,0,0.2);
        }
        .side-image{
            background-image: url("images/2.jpeg");
            background-position: center top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            border-radius: 10px 0 0 10px;
        }
        img{
            width: 35px;
            position: absolute;
            top: 30px;
            left: 30px;
        }
        .text{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .text p {
            color: #fff;
            font-size: 18px;
        }
        i{
            font-weight: 400;
            font-size: 15px;
        }
        .right{
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .input-box{
            width: 330px;
            box-sizing: border-box;
        }
        .input-box header{
            font-weight: 700;
            text-align: center;
            margin-bottom: 45px;
        }
        .input-field{
            display: flex;
            flex-direction: column;
            position: relative;
            padding: 10px 10px 10px 10px;
        }
        .input{
            height: 25px;
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0,0,0,0.2);
            outline: none;
            margin-bottom: 20px;
            color: #40414a;
        }
        .input-box .input-field label{
            position: absolute;
            top: 10px;
            left: 10px;
            pointer-events: none;
            transition: .5s;
        }
        .input-field .input:focus ~ label{
            top: -10px;
            font-size: 13px;
        }
        .input-field .input:valid ~ label{
            top: -10px;
            font-size: 13px;
            color: #5d5076;
        }
        .input-field .input:focus, .input-field .input:valid{
            border-bottom: 1px solid #743ae1;
        }
        .submit{
            border: none;
            outline: none;
            height: 45px;
            background: #ececec;
            border-radius: 6px;
            transition: .4s;
        }
        .submit:hover{
            background: rgba(37, 95, 156,0.9);
            color: #fff;
        }
        .signin{
            text-align: center;
            font-size: small;
            margin-top:25px;
        }
        .span a{
            text-decoration: underline;
            color: #000;
        }
        @media only screen and (max-width: 768px){
            .side-image{
                border-radius: 10px 10px 0 0;
            }
            img{
                width: 35px;
                position: absolute;
                top: 20px;
                left: 47%;
            }
            .text{
                position: absolute;
                top: 70%;
                text-align: center;
            }
            .text p,i{
                font-size: 17px;
            }
            .row{
                max-width: 420px;
                width: 100%;
            }
        }

    </style>

    <body>
        <div class="wrapper">
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image">
                        <!---------image--------->
                        <img src="images/white.jpg" alt="">
                        <div class="text">
                            <p>Registrasi ke website galeri foto<i>-suci wahyuni</i></p>
                        </div>
                    </div>
                    <div class="col-md-6 right"> 
                        <div class="input-box">
                            <header>Registration</header>    
                            <form class="" action="" method="POST" autocomplete="off">                        
                            <div class="input-field">
                                <input class="input" type="text" name="name" required value="">
                                <label for="">Nama Lengkap : </label>
                            </div>
                            <div class="input-field">
                                <input class="input" type="text" name="username" required value="">
                                <label for="">Username : </label>
                            </div>
                            <div class="input-field">
                                <input class="input" type="email" name="email" required value="">
                                <label for="">Email : </label>
                            </div>
                            <div class="input-field">
                                <input class="input" type="password" name="password" required value="">
                                <label for="">Password : </label> 
                            </div>
                            <div class="input-field">
                                <input class="input" type="text" name="alamat" required value="">
                                <label for="">Alamat : </label>
                            </div>
                            <center>
                            <button type="submit" class="submit" name="submit">Register</button>  
                            </center>           
                            <div class="signin">
                                <span>Sudah memiliki akun? <a href="login.php">Silahkan login disini</a></span>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
            
