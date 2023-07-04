<!-- crud/create.php
products: id, name, price, created_at
-->
<?php
session_start();
require_once 'connection.php';
// - XỬ LÝ FORM
// B1: Debug
echo '<pre>';
print_r($_POST);
echo '</pre>';
// B2: Khai báo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// B3: Xử lý form chỉ khi user submit form:
if (isset($_POST['submit'])) {
	// B4: Lấy giá trị từ form:
	$name = $_POST['name'];
	$price = $_POST['price'];
	// B5: Validate:
	// - Tên và giá ko đc để trống: empty
	// - Giá phải là số: is_numeric
    if (empty($name) || empty($price)) {
        $error = 'Tên và giá ko đc để trống';
    } else if (!is_numeric($price)) {
        $error = 'Giá phải là số';
    }
    // B6: Xử lý logic chính chỉ khi ko có lỗi nào xảy ra:
    if (empty($error)) {
        // Insert dữ liệu vào bảng products
        // Nhúng file kết nối vào để sử dụng đc biến $connection
        // + B1: Viết truy vấn:
        $sql_insert = "INSERT INTO products(name,price) 
VALUES('$name', $price)";
        // + B2: Thực thi truy vấn: INSERT trả về boolean
        $is_insert = mysqli_query($connection, $sql_insert);
        var_dump($is_insert);
        // Chuyển hướng sau khi đã chắc chắn insert thành công
        // Chuyển hướng về trang danh sách kèm theo 1 thông báo
        //thành công
        $_SESSION['success'] = 'Thêm mới thành công';
        header('Location: index.php');
        exit();
    }
}
// B7: Hiển thị error ra form:
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form thêm mới sp</h2>
<form action="" method="post">
	Nhập tên sp:
	<input type="text" name="name" value="">
	<br>
	Nhập giá sp:
	<input type="text" name="price" value="">
	<br>
	<input type="submit" name="submit" value="Lưu sp">
	<a href="index.php">Về trang danh sách sp</a>
</form>
