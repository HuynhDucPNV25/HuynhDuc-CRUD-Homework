<?php
include_once 'database/database.php';

// Kiểm tra nếu là phương thức POST và các trường không trống
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['name'], $_POST['age'], $_POST['email'], $_POST['image_url'])) {
    
    // Thực hiện kiểm tra dữ liệu, có thể thêm kiểm tra định dạng email hoặc tuổi
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $image_url = trim($_POST['image_url']);

    if (empty($name) || empty($age) || $email === false || empty($image_url)) {
        // Xử lý khi dữ liệu không hợp lệ, có thể chuyển hướng lại form với thông báo lỗi
        // Ví dụ: header("location: form.php?error=InvalidData");
        exit;
    }

    // Gọi hàm để chèn dữ liệu vào cơ sở dữ liệu
    $success = createStudent([
        'name' => $name,
        'age' => $age,
        'email' => $email,
        'image_url' => $image_url,
    ]);

    if ($success) {
        // Chuyển hướng sau khi chèn thành công
        header("location: index.php");
        exit;
    } else {
        // Xử lý khi chèn vào cơ sở dữ liệu thất bại, có thể chuyển hướng lại form với thông báo lỗi
        // Ví dụ: header("location: form.php?error=DatabaseError");
        exit;
    }
}
?>
