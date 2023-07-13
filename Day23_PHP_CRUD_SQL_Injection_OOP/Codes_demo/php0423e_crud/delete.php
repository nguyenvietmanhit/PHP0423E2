<?php
//delete.php: xóa sp
session_start();
require_once 'connection.php';

// delete.php?id=3
// delete.php?id=dsadsadasdsa
// delete.php
// - Validate tham số id hợp lệ, vì url dạng GET có thể
//chỉnh sửa đc
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	$_SESSION['error'] = 'Tham số id ko hợp lệ';
	header('Location: index.php');
	exit();
}
$id = $_GET['id'];
// - Truy vấn CSDL để xóa sp theo id:
// + B1: Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id = $id";
// + B2: Thực thi
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
	$_SESSION['success'] = "Xóa sp thành công";
} else {
	$_SESSION['error'] = "Xóa sp thất bại";
}
header('Location: index.php');
exit();
?>
