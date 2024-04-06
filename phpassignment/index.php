<?php
@include('header.php');
?>
<?php
// Show uploaded products
@include('database.php');
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
// session_start();

?>


<div class="hero">
<h1>Manage Your Products <br> Anywhere Anytime</h1>
<button>View Products</button>

</div>
<div class="container mt-4">
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-light alert-dismissible fade show" role="alert">
        <p><?php echo $_SESSION['message']; ?></p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
</div>
<div class="products">
        <h2>Our Products</h2>
        <p>Check out our products below</p>        
        
        <div class="product-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="product-card">
            <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top"alt="<?php echo $row['name']; ?>">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo substr($row['description'], 0, 20); ?>...</p>
                <p>Price: $<?php echo $row['price']; ?></p>
                <button><a href="viewproduct.php?ID=<?php echo $row['id']; ?>">View</a></button>
                <?php if($isLoggedIn): ?>
                <button><a href="edit.php?ID=<?php echo $row['id']; ?>">Edit</a></button>
                <button><a href="delete.php?ID=<?php echo $row['id']; ?>">Delete</a></button>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col">
                <p>No products found.</p>
            </div>
        <?php endif; ?>
        </div>
        
</div>


<?php
@include('footer.php');
$conn->close();
?>
