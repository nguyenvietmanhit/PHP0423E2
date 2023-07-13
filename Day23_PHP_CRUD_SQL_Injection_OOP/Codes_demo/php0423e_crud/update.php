<!--php0423e_crud/update.php
Cập nhật sp theo id
update.php?id=2
- Tận dụng chức năng thêm mới để dựng update
-->
<?php
session_start();
require_once 'connection.php';
// + Validate tham số id trên url, tham khảo chức năng Xóa
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	$_SESSION['error'] = 'Tham số id ko hợp lệ';
	header('Location: index.php');
	exit();
}
$id = $_GET['id'];
// - Truy vấn CSDL lấy sp theo id để đổ ra form
// + B1: Viết truy vấn: lấy 1 bản ghi
$sql_select_one = "SELECT * FROM products WHERE id = $id";
// + B2: Thực thi
$obj_one = mysqli_query($connection, $sql_select_one);
// + B3: Trả về mảng kết hợp 1 chiều:
$product = mysqli_fetch_assoc($obj_one);

// - Xử lý form: luôn nằm sau logic lấy sp theo id: tận dụng
//từ chức năng Thêm mới
// + B1: Debug:
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// + B2:
$error = '';
// ko cần biến result vì khi xử lý thành công sẽ chuyển hướng
// + B3:
if (isset($_POST['submit'])) {
	// + B4:
	$name = $_POST['name'];
	$price = $_POST['price'];
	$avatars = $_FILES['avatar'];
	// + B5:
	// TÊn và giá phải nhập: empty
	// Giá phải là số: is_numeric
	// File upload phải là ảnh
	// File upload dung lượng ko vượt quá 2Mb
	if (empty($name) || empty($price)) {
		$error = 'TÊn và giá phải nhập';
	} elseif (!is_numeric($price)) {
		$error = 'Giá phải là số';
	} elseif ($avatars['error'] == 0) {
		// File upload phải là ảnh
		$ext = pathinfo($avatars['name'], PATHINFO_EXTENSION);
		$ext = strtolower($ext);
		$allows = ['jpg', 'png', 'jpeg', 'gif'];
		if (!in_array($ext, $allows)) {
			$error = 'File upload phải là ảnh';
		}
		// File upload dung lượng ko vượt quá 2Mb
		$size_b = $avatars['size']; //
		// 1MB = 1024Kb
		// 1Kb = 1024B
		// 1Mb = 1024 * 1024 B
		$size_mb = $size_b / 1024 / 1024;
		if ($size_mb > 2) {
			$error = 'File upload dung lượng ko vượt quá 2Mb';
		}
	}
	// + B6: Xử lý logic chính chỉ khi ko có lỗi
	if (empty($error)) {
		// - Upload file để lấy ra tên file
        // Lưu lại tên file từ thông tin sp lấy ở trên
		$filename = $product['avatar'];
		if ($avatars['error'] == 0) {
			$dir_upload = 'uploads';
			if (!file_exists($dir_upload)) {
				mkdir($dir_upload);
			}
			// Xóa file cũ để tránh nặng hệ thống:
            unlink("$dir_upload/$filename");
			$filename = time() . "-" . $avatars['name'];
			$is_upload =
				move_uploaded_file($avatars['tmp_name'],
					"$dir_upload/$filename");
		}
		// - Update vào CSDL
		// + B1: Viết truy vấn:
        $sql_update = "UPDATE products SET name='$name',
price=$price,avatar='$filename' WHERE id=$id";
		// + B2: Thực thi: UPDATE trả về boolean
        $is_update = mysqli_query($connection, $sql_update);
        if ($is_update) {
            $_SESSION['success'] = "Update thành công";
            header('Location: index.php');
            exit();
        }
        $error = 'Cập nhật thất bại';
	}
}
// + B7: Đổ error ra form

?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form sửa sp</h2>
<form action="" method="post" enctype="multipart/form-data">
	Nhập tên:
	<input type="text" name="name"
           value="<?php echo $product['name']; ?>">
	<br>
	Nhập giá: <input type="text" name="price"
           value="<?php echo $product['price'] ?>" >
	<br>
	Chọn ảnh: <input type="file" name="avatar">
    <img src="uploads/<?php echo $product['avatar'] ?>"
    height="80px">
	<br>
	<input type="submit" name="submit" value="Lưu sp">
	<a href="index.php">Về trang ds</a>
</form>
