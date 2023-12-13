<?php require_once('partial/header.php'); ?>
<?php
    include_once 'database/database.php';
    $students = selectAllStudents(); 
?>
<div class="container p-4">
    <div class="d-flex justify-content-end p-2">
        <a href="create_html.php" class="btn btn-primary">Add +</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="card-image mr-3">
                    <img class="img-fluid" width="200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Young_girl_smiling_in_sunshine_%282%29.jpg/1200px-Young_girl_smiling_in_sunshine_%282%29.jpg" alt="">
                </div>
                <div class="info">
                    <h1 class="display-4">Name: Kanha </h1>
                    <strong>Age: 10</strong>
                    <p>Email: kanha@gmail.com</p>
                </div>
            </div>
            <div class="action d-flex justify-content-end">
                <a href="update_html.php" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                <a href="delete_model.php" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>
    
    <?php foreach ($students as $person) :
        echo $person["profile"];
    ?>
    <div class="container p-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="card-image mr-3">
                        <img class="img-fluid" width="200" src="<?= $person["profile"]; ?>" alt="">
                    </div>
                    <div class="info">
                        <h1 class="display-4">Name: <?= $person["name"]; ?> </h1>
                        <strong>Age: <?= $person["age"]; ?></strong>
                        <p>Email: <?= $person["email"]; ?></p>
                    </div>
                </div>
                <div class="action d-flex justify-content-end">
                    <a href="update_html.php<?="?id=" . $person['id']?> " class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                    <a href="delete_model.php<?="?id=" . $person['id']?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php require_once('partial/footer.php'); ?>