<!--test_session.php
Test đặc điểm của session là khởi tạo 1 lần, sử
dụng mọi nơi
-->
<?php
session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// Khi khởi tạo sesion r thì hiển thị sẽ ko bị lỗi,
//nếu chưa khởi tạo mà cố tình truy cập thì sẽ báo lỗi
echo isset($_SESSION['address']) ? $_SESSION['address']
: '';
// Khi xử lý session/cookie cần chắc chắn đã khởi tạo
//thì mới thao tác, nên cần ktra tồn tại thì mới xử lý

?>
