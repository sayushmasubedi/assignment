<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    include "database.php";

    $ID = $_GET['ID'];
   
    $sql = "DELETE FROM products WHERE ID = $ID";
    if($conn->query($sql) === TRUE){
        echo "Record updated successfully";
        session_start();
        $_SESSION['message'] = "Record Deleted Successfully";
        header("Location: index.php");
            exit();

    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}