<?php
require "connection.php";
session_start();
if($_SESSION["Login"]=="TRUE"){
  // echo "Logged In";
}
else{
    session_destroy();
    header("Location:login.php");
    echo "NOT LOGGED IN";
}
if(isset($_POST['logout'])){
    session_destroy();
    header("Location:login.php");
    echo "NOT LOGGED IN";  
}


function insertSnippit($title, $details, $type, $code)
{
    global $conn;
    if(!isset($_GET['type'])){
        echo "<center><h4 style = 'color:red;'>PLEASE SELECT CATEGORY**</h4></center>";
        exit();
    }
    $table = $_GET['type'];
   
    $title = replacespecialChars($title);
    $details = replacespecialChars($details);
    $type = replacespecialChars($type);
    $code = replacespecialChars($code);
   // echo$table;
    $sql = "INSERT INTO `$table` (`sno`, `title`, `details`, `language`, `code`) VALUES (NULL, '$title', '$details', '$type', '$code')";
   // echo $sql;
    $result = mysqli_query($conn, $sql);
   
    if ($result) {
        echo "<center>Snippit has successfully added into database</center>";
    } else {
        echo "<center>Snippit has not successfully added into database</center>";
    }
}

function replacespecialChars($str){
    $str = str_replace('\'',"\'",$str);
    // $str = str_replace('>',"&gt;",$str);
    // $str = str_replace('<',"&lt;",$str);
    
    return trim($str);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aCodes- Dashboard</title>
</head>


<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap'); */
    body {
        padding: 0px;
        font-family: 'Ubuntu', sans-serif;
        margin: 0px;
    }



    .header {
        display: flex;
        align-items: center;
        background-color: rgb(108, 85, 210);
        justify-content: center;
        padding: 10px;
        color: white;
        transition: 0.3s;
        /* width: 100%; */
    }

    .header img {
        width: 50px;
        margin-right: 25px;

    }

    /* .header:hover{
height: 100px;
    } */
    pre {
        margin-right: 30px !important;
    }

    .copy-to-clipboard-button {
        margin-right: 40px;
         !important
    }

    ol p {
        color: rgb(85, 85, 85);
        font-size: 13px;
        display: inline;
    }

    .content {
        padding: 23px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
    }

    input {
        width: 45%;
        padding: 17px;
        border: 2px solid rgb(108, 85, 210);
        border-radius: 5px;
        margin: 0px 5px;
        transition: all 0.3s ease-in-out;

    }

    input:active {
        border: 2px solid rgb(73, 57, 145);

    }

    select {
        margin-top: 13px;
        margin-left: 7px;
        width: 45%;
        padding: 14px;
        font-size: 15px;
        border: 2px solid rgb(108, 85, 210);
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    select:active {
        border: 2px solid rgb(73, 57, 145);

    }

    textarea {
        margin-top: 13px;
        margin-left: 7px;
        width: 85%;
        padding: 14px;
        font-size: 15px;
        border: 2px solid rgb(108, 85, 210);
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    textarea:active {
        border: 2px solid rgb(73, 57, 145);

    }

    button {
        margin: 5px auto;
        padding: 18px;
        width: 85%;
        color: white;
        border: none;
        background: rgb(108, 85, 210);
        font-size: 19px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    button:hover {
        background: rgb(94, 74, 184);

    }
    .btnlogout {
           /* margin: 5px auto; */
    /* padding: 18px; */
    color: white;
    border: none;
    background: rgb(0 0 0);
    font-size: 14px;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    transition: all 0.3s ease-in-out;
    /* float: right;*/
    }

    .btnlogout:hover {
        background: rgb(94, 74, 184);

    }
</style>

<header class="header">

    <img src="icon.svg" alt="" srcset="">

    <h3>Add Your Code Snippits Here -- Athar Apps</h3>
    <form action="" method="post">
    <button class="btnlogout" type="submit" name="logout">Logout</button>

    </form>

</header>
<div class="content">


    <form action="" method="post">
        <div class="row">

            <input name="title" id="title" type="text" placeholder="Enter Snippit Title Here">
            <input name="details" id="details" type="text" placeholder="Enter Snippit Description Here">

        </div>
        <center>
            <select name="langs" id="langs">
                <option value="java">Java</option>
                <option value="gradle">Gradle</option>
                <option value="xml">XML</option>
                <option value="kotlin">Kotlin</option>
                <option value="php">PHP</option>
                <option value="python">Python</option>
                <option value="javascript">Java Script</option>

            </select>
            <br>
            <textarea name="code" id="code" cols="30" rows="10" placeholder="Enter Your Code Here"></textarea>
            <br>
            <button class="submit" type="submit">Submit Snippit</button>
        </center>
    </form>

</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $details = $_POST['details'];
    $type = $_POST['langs'];
    $code = $_POST['code'];

    insertSnippit($title,$details,$type,$code);
   // echo "hi";
}
?>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
    </script>

<body>

</body>

</html>