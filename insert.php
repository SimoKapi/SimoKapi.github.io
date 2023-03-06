<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "test", "", "insert");

$author = 'Simo';
$title = $_POST['title'];
$article = $_POST['article'];
$date = date('l jS \of F Y h:i:s A');

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO form (author, title, article, date) VALUES ('$author', '$title', '$article', '$date')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
    header("Location: index.php");
    die();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>