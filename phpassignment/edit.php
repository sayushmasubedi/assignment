<?php include "header.php";
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    include "database.php";
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM products WHERE ID = $ID";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
        }
    }}
?>
  <div class="m-5">
    <h3 class="text-center">Edit Details</h3>
<form method="POST" class="w-50 m-auto" action="update.php">
<div class="mb-3" style="display: none;">
    <label for="ID" class="form-label">ID</label>
    <input type="number" name="ID" class="form-control" id="ID" aria-describedby="ID" value="<?php echo $ID;?>">
</div>

  <div class="mb-3">
    <label for="name" class="form-label">NAME</label>
    <input type="name" class="form-control" name="name" id="name" value="<?php echo $name;?>">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Description</label>
    <input type="name" class="form-control" name="description" id="name" value="<?php echo $description;?>">
  </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Price</label>
        <input type="phone" class="form-control" id="phone" name="price" value="<?php echo $price;?>">
    </div>
   <button type="submit" class="btn btn-primary">SAVE CHANGES</button>                
</div>
</form>
</div>
<?php
?>