<?php
include './database/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $image_url = trim($_POST['image_url']);

    if (empty($name) || $age === false || $email === false || empty($image_url)) {
        $error_message = "Invalid input. Please fill in all fields with valid data.";
        header("location: create_html.php?error=" . urlencode($error_message));
        exit;
    }

    try {
        $success = createStudent([
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'image_url' => $image_url,
        ]);

        if ($success) {
            header("location: index.php");
            exit;
        } else {
            $error_message = "Failed to insert data into the database.";
            header("location: create_html.php?error=" . urlencode($error_message));
            exit;
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        $error_message = "An error occurred while processing your request. Please try again later.";
        header("location: create_html.php?error=" . urlencode($error_message));
        exit;
    }
}
?>
