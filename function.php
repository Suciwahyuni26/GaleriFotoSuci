<?php
session_start();

class Connection{
    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "gallery";
    public $conn;
    
    public function __construct(){
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    }
}

class Register extends Connection{
    public function registration($Username, $Password, $Email, $NamaLengkap, $Alamat){
        $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE Username = '$Username' OR Email = '$Email'");
        if(mysqli_num_rows($duplicate) > 0){
            return 10;
            //Nama Pengguna atau email sudah diambil
        }
        else{
            $query = "INSERT INTO user VALUES('', '$Username', '$Password', '$Email', '$NamaLengkap', '$Alamat')";
            mysqli_query($this->conn, $query);
            return 1;
            //Registration berhasil
            }
        }
    }


    class Login extends Connection{
        public $UserID; 
        public function login($usernameemail, $password){
            $result = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
            $row = mysqli_fetch_assoc($result);


            if(mysqli_num_rows($result) > 0){
                if($password = $row["pasword"]){
                    
                    $this->UserID = $row["UserID"];
                    return 1;
                    //Login Succesful
                }
                else{
                    return 10;
                    //Wrong Password
                }
            }
            else{
                return 100;
                //User not registered
            }
        }
    

        public function UserID(){
            return $this->UserID;
        }
    }

    class Select extends Connection{
        public function selectUserById($UserID){
            $result - mysqli_query($this->conn, "SELECT * FROM user WHERE UserID = $UserID");
            return mysqli_fetch_assoc($result);
        }
    }

