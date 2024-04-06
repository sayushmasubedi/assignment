<?php include 'header.php'; ?>
<div class="container">
    <h2>Create Product</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="name">ID</label>
            <input type="number" class="form-control" name="id" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_FILES['image']['name'])) {
        echo "All fields are required";
    } else {
        @include 'database.php';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO products (id , name, description, price, image) VALUES ('$id' , '$name', '$description', '$price', '$image')";
            if ($conn->query($sql) === TRUE) {
                session_start();
                $_SESSION['message'] = 'Product created successfully';
                return header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $conn->close();
    }
}
?>
