<?php
include_once 'database/database.php';

// Kiểm tra nếu là phương thức POST và các trường không trống
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['name'], $_POST['age'], $_POST['email'], $_POST['image_url']) &&
    is_numeric($_GET['id'])) {
    
    // Thực hiện kiểm tra dữ liệu, có thể thêm kiểm tra định dạng email hoặc tuổi
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $image_url = trim($_POST['image_url']);
    $studentId = $_GET['id'];

    if (empty($name) || empty($age) || $email === false || empty($image_url)) {
        // Xử lý khi dữ liệu không hợp lệ, có thể chuyển hướng lại form với thông báo lỗi
        // Ví dụ: header("location: form.php?error=InvalidData");
        exit;
    }

    // Gọi hàm để cập nhật dữ liệu sinh viên
    $success = updateStudent([
        'name' => $name,
        'age' => $age,
        'email' => $email,
        'image_url' => $image_url,
    ], $studentId);

    if ($success) {
        // Chuyển hướng sau khi cập nhật thành công
        header("location: index.php");
        exit;
    } else {
        // Xử lý khi cập nhật thất bại, có thể chuyển hướng lại form với thông báo lỗi
        // Ví dụ: header("location: form.php?error=UpdateFailed");
        exit;
    }
} else {
    // Xử lý khi không phải là phương thức POST hoặc các trường không tồn tại, có thể chuyển hướng với thông báo lỗi
    // Ví dụ: header("location: form.php?error=InvalidRequest");
    exit;
}
?>
