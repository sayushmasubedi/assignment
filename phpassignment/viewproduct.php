<?php
include('header.php');
?>

<?php
//view the one product
@include('database.php');
$id = $_GET['ID'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

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
    <div class="view-product">
        <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top"alt="<?php echo $row['name']; ?>">
        <div class="product-detail">
        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <p>Price: $<?php echo $row['price']; ?></p>
        <button><a href="index.php">Back</a></button>
        <?php if($isLoggedIn): ?>
                <button><a href="edit.php?ID=<?php echo $row['id']; ?>">Edit</a></button>
                <button><a href="delete.php?ID=<?php echo $row['id']; ?>">Delete</a></button>
                <?php endif; ?>
        </div>
    </div>
