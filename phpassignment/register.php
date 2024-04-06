<?php
@include('header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
<?php

if (isset($_POST['register'])) {
    @include('database.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>