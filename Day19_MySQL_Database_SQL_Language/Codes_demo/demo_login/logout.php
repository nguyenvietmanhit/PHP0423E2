<?php
session_start();
//logout.php
// - Xóa session tạo ra lúc đăng nhập thành công,
//chuyển hướng về trang login
unset($_SESSION['username']);
// Xóa cookie ghi nhớ đăng nhập:
setcookie('username', '', time() - 1);

$_SESSION['success'] = 'Logout thành công';
header('Location: login.php');
exit();
?>
