<!--php0423e_crud/create.php
- Form thêm mới sản phẩm
products: id, name, price, avatar, created_at
-->
<?php
session_start();
// Nhúng file kết nối để sử dụng biến kết nối
require_once 'connection.php';
// XỬ LÝ FORM:
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
        $filename = '';
        if ($avatars['error'] == 0) {
            $dir_upload = 'uploads';
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            $filename = time() . "-" . $avatars['name'];
            $is_upload =
            move_uploaded_file($avatars['tmp_name'],
            "$dir_upload/$filename");

        }
        // - Insert vào CSDL
        // + B1: Viết truy vấn:
        $sql_insert = "INSERT INTO products(name,price,avatar)
VALUES('$name',$price,'$filename')";
        // + B2: Thực thi: INSERT trả về boolean
        $is_insert = mysqli_query($connection, $sql_insert);
        var_dump($is_insert);
        if ($is_insert) {
            $_SESSION['success'] = 'Thêm mới sp thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Thêm mới thất bại';
    }
}
// + B7: Đổ error ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form thêm mới sp</h2>
<form action="" method="post" enctype="multipart/form-data">
    Nhập tên:
    <input type="text" name="name" value="">
    <br>
    Nhập giá: <input type="text" name="price" value="" >
    <br>
    Chọn ảnh: <input type="file" name="avatar">
    <br>
    <input type="submit" name="submit" value="Lưu sp">
    <a href="index.php">Về trang ds</a>
</form>
