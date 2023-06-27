<?php
session_start();
// - Nếu chưa đăng nhập thì ko cho truy cập trang này,
// bằng cách chuyển hướng về trang login
if (!isset($_SESSION['username'])) {
	$_SESSION['error'] = 'Bạn chưa đăng nhập, ko thể
	vào trang profile!';
	header('Location: login.php');
	exit();
}

//profile.php
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// Chỉ hiển thị 1 lần với session dạng thông báo -
//session flash
if (isset($_SESSION['success'])) {
	echo $_SESSION['success'];
	unset($_SESSION['success']);
}

echo "<br>Chào bạn, {$_SESSION['username']}";
echo "<br><a href='logout.php'>Logout</a>";
?>
