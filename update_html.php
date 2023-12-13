<?php require_once('partial/header.php'); ?>
    <div class="container p-4">
        <form action="update_model.php<?="?id=" . $_GET['id']?>" method="post">
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
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
    </div>
<?php require_once('partial/footer.php'); ?>