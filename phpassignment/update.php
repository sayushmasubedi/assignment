<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "database.php";
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sql = "UPDATE products SET Name = '$name', description = '$description', price = '$price' WHERE ID = $ID";
    if($conn->query($sql) === TRUE){
        echo "Record updated successfully";
        session_start();
        $_SESSION['message'] = "<b>Product Updated Successfully</b>";
        header("Location: index.php");
            exit();

    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}
