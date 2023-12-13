<?php
include_once 'database/database.php';

// Kiểm tra xác định rõ ràng để tránh lỗi Undefined index
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $studentId = $_GET['id'];

    // Thực hiện hàm xóa sinh viên
    if (deleteStudent($studentId)) {
        // Chuyển hướng sau khi xóa thành công
        header("location: index.php");
        exit;
    } else {
        // Xử lý khi xóa thất bại, có thể chuyển hướng với thông báo lỗi
        // Ví dụ: header("location: index.php?error=DeleteFailed");
        exit;
    }
} else {
    // Xử lý khi không có ID hoặc ID không hợp lệ, có thể chuyển hướng với thông báo lỗi
    // Ví dụ: header("location: index.php?error=InvalidID");
    exit;
}
?>
