<?php require_once('./partial/header.php'); ?>
    <div class="container p-4">
        <?php
        if (isset($_GET['error'])) {
            $error_message = urldecode($_GET['error']);
            echo '<div class="alert alert-danger">' . htmlspecialchars($error_message) . '</div>';
        }
        ?>
        <form action="create_model.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Age" name="age">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Image URL" name="image_url">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Create</button>
            </div>
        </form>
    </div>
<?php require_once('./partial/footer.php');