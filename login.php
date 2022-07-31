<?php
session_start();

if(isset($_SESSION["Login"])){
    header("Location: admin.php");
  }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aCodes - Login</title>
</head>
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap'); */
    body {
        padding: 0px;
        font-family: 'Ubuntu', sans-serif;
        margin: 0px;
        background-color: rgb(250, 251, 252);
        background-image: url("background.jpeg");
        /* background-repeat: no-repeat; */
        background-size: 100%;
    }


    .card {
        /* height: 56vh; */
        background: #fcfcfc;
        border: 1.5px solid rgb(251, 255, 0);
        border-radius: 5px;
        padding: 91px 4px;
        width: 70%;
        margin: 40px auto;
        /* margin-top: 40px;*/
    }

    input {
        width: 75%;
        padding: 17px;
        border: 2px solid rgb(108, 85, 210);
        border-radius: 5px;
        margin: 5px auto;
        transition: all 0.3s ease-in-out;
        align-items: center;
    }

    input:active {
        border: 2px solid rgb(73, 57, 145);

    }

    button {
        margin: 5px auto;
        padding: 7px 36px;
        /* width: 30%; */
        color: white;
        border: none;
        background: rgb(108, 85, 210);
        font-size: 14px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    button:hover {
        background: rgb(94, 74, 184);
        /* border: 3px solid rgba(68, 53, 135, 0.074); */

    }
</style>

<body>
    <center>
        <h2 style="color: white;">Login to Continue</h2>
    </center>
    <div class="card">
        <center>

            <form action="" method="post">
                <input type="text" name="username" id="username" placeholder="Enter Username">
                <br>
                <input type="password" name="password" id="password" placeholder="Enter Password">
                <br>
                <button class="btnsubmit" type="submit">Login</button>

            </form>


            <?php
            require 'connection.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                // $hashed_password = password_hash($password, PASSWORD_DEFAULT);


                // echo password_verify($password,password_hash($password,1));

                $sql = "SELECT * FROM adminlogincheatsheet WHERE password = '" . $password . "' AND username = '" . $username . "'";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                    echo "Login Successfully";
                  //  var_dump($result);
                    session_start();
                    $_SESSION['Login'] = "TRUE";
                    header("Location:admin.php");

                } else {
                    session_start();
                  //  $_SESSION['Login'] = "NO";
                    echo "Login Unsuccessfully";
                    // session_destroy();
                }
            }
            ?>
        </center>
    </div>




</body>

</html>