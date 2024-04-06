<?php
 include('header.php');
    ?>

<div class="contact-hero">
    <h1>Contact</h1>
</div>

<div class="contact-form mx-auto w-50 mt-5">
    <h2>Reach out by filling this form</h2>
    <form action="contact.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
</div>
<?php
include('footer.php');
?>