<?php 
include_once 'database/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['image_url'])) :
    // gọi hàm inser 
    $right = updateStudent($_POST, $_GET['id']);
    var_dump($right);
    if($right){
        header("location: index.php");
    }
endif;   
?>
