
<?php 
require "connection.php";
if(empty($_GET["type"]) || !isset($_GET["type"])){
    echo "Please Select Any Type to Continue";
        exit();
    }
$type = $_GET["type"];
$sql = "SELECT * FROM $type";
$result = mysqli_query($conn,$sql);

function replacespecialChars($str){
    $str = str_replace('<',"&lt;",$str);
    $str = str_replace('>',"&gt;",$str);
    
    return $str;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Android Studio Cheatsheet</title>
    <link rel="icon" type="image/x-icon" href="icon.svg">

    <link rel="stylesheet" href="prism/prism.css">
    <script src="prism/prism.js"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
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
        width: 100%;
    }
    .header img {
        width: 50px;
        margin-right: 25px;

    }
    pre{
    margin-right: 30px !important;
    }
.copy-to-clipboard-button{    margin-right: 40px; !important}
ol p{
    color: rgb(85, 85, 85);
    font-size: 13px;
    display: inline;
}

.content{
    padding: 23px;
}
.submitbtn{
    padding: 10px;
    border: 1px solid grey;
    border-radius: 8px;
    margin: 0px 14px;
    color: white;
    background: black;

}
</style>

<body >
    

    <header class="header">

        <img src="icon.svg" alt="" srcset="">

        <h3>Android Studio Cheatsheet by AtharApps</h3>

<a href="login.php"> <button class="submitbtn">Submit Snippits</button></a>
    </header>


<div class="content">
<ol>

<?php

if(mysqli_num_rows($result)>= 1){
    
    while($value = mysqli_fetch_assoc($result)){

        echo '<li>'.$value['title'].'</li>
        <p>'.$value['details'].'</p>
        <pre><code class="language-'.$value['language'].'">'.replacespecialChars($value['code']).'</code></pre>
        <hr>';
    }
}
else{
    echo "No Code Found";
}

?>
</ol>



    </div>
<hr>

</body>

</html>