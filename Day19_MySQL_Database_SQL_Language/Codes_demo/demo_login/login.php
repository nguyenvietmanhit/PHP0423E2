<!--login.php-->
<?php
session_start();
// - Nếu tồn tại cookie username thì nghĩa là user đã
//chọn chức năng Ghi nhớ đăng nhập, thì chuyển hướng
//sang trang profile
if (isset($_COOKIE['username'])) {
    // Tạo session để lưu lại trạng thái login thành công
    $_SESSION['username'] = $_COOKIE['username'];

    $_SESSION['success'] = 'Ghi nhớ đăng nhập thành công';
    header('Location: profile.php');
    exit();
}

// - Nếu user đã đăng nhập thì chuyển hướng sang trang
//profile, ko thể truy cập dc trang login khi đã đăng
//nhập thành công
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi';
    header('Location: profile.php');
    exit();
}

// - QUY TRÌNH XỬ LÝ FORM:
// + B1: Debug
echo '<pre>';
print_r($_POST);
echo '</pre>';
// + B2:
$error = '';
$result = '';
// + B3: Chỉ xử lý form nếu form đã đc submit:
if (isset($_POST['login'])) {
    // + B4: Lấy giá trị từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    // + B5: Validate form:
    // - Username và password ko đc để trống: empty
    // - Password phải từ 2 ký tự trở lên: strlen
    if (empty($username) || empty($password)) {
        $error = 'Username và password ko đc để trống';
    } elseif (strlen($password) < 2) {
        $error = 'Password phải từ 2 ký tự trở lên';
    }
    // + B6: Xử lý logic chính chỉ khi ko có lỗi:
    if (empty($error)) {
        // Xử lý logic đăng nhập: khi login thành công tạo
        //session để lưu lại thông tin của user, dựa
        //vào session này để cho phép user sử dụng các
        //chức năng đc phép
        // - Giả lập login thành công: mật khẩu = 123
        if ($password == 123) {
            // - Chỉ xử lý ghi nhớ đăng nhập khi login
            //thành công và có tích vào
            //checkbox, lưu username vào cookie
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + 3600);
            }

            // Login thành công
            $_SESSION['success'] = 'Đăng nhập thành công';
            $_SESSION['username'] = $username;
            // Chuyển hướng: mang theo session vừa tạo đi
            //theo sang trang profile
            header('Location: profile.php');
            exit();
        } else {
            $error = 'Sai tài khoản hoặc mật khẩu';
        }
    }
}
// + B7: Đổ error và result ra form
?>
<?php
// Hiển thị session error:
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
// Hiển thị session success:
if (isset($_SESSION['success'])) {
	echo $_SESSION['success'];
	unset($_SESSION['success']);
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
	Username:
	<input type="text" name="username">
	<br>
	Password:
	<input type="password" name="password">
	<br>
<!-- Nếu chỉ có duy nhất 1 checkbox thì name ko cần
	ở dạng mảng-->
	<input type="checkbox" name="remember">
	Ghi nhớ đăng nhập
	<br>
	<input type="submit" name="login" value="Đăng nhập">
</form>
