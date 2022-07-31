<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'Cheatsheet';


$conn = mysqli_connect($server,$username,$password,$database);


if (!$conn) {
    echo('Connection error to my sql'.mysqli_connect_error());
    # code...
}
else{
   // echo'Connection Successfull';
}





?>