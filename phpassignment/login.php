<?php
@include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="form-group mt-2">
                    <label for="username">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
    <?php
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "Email and password are required";
    }
    else {
    @include 'database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $email = mysqli_real_escape_string($conn, $email);
    
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password'] && $email == $row['email']) {
            $_SESSION['email'] = $email;
            header('Location: index.php');
        } else {
            echo "Incorrect password or email";
        }
    } 
    $conn->close();
    }
    ?>
    