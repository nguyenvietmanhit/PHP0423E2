<!--php0434e_crud/sql_injection.php
- Lỗi bảo mật SQL Injection
+ Là lỗi bảo mật mà tấn công vào câu truy vấn SQL, làm SQL
bị thay đổi
+ Thường sẽ tấn công qua form
- Demo với chức năng tìm kiếm sp
-->
<?php
require_once 'connection.php';
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
	// Chống lỗi bảo mật SQL Injection bằng cách sau:
    $name = mysqli_real_escape_string($connection, $name);

    // Truy vấn CSDL tìm các sp chứa $name
    // + B1: Viết truy vấn: lấy nhiều
    $sql_select_all = "SELECT * FROM products WHERE name LIKE '%$name%'";
    // + B2: Thực thi
    $obj_all = mysqli_query($connection, $sql_select_all);
    // + B3: Lấy mảng 2 kết hợp 2 chiều
    $products = mysqli_fetch_all($obj_all, MYSQLI_ASSOC);
    echo '<pre>';
    print_r($products);
    echo '</pre>';
    //  123456' OR name != '

}
?>
<form action="" method="get">
    Nhập tên sp:
    <input type="text" name="name" value="">
    <input type="submit" name="submit" value="Tìm kiếm">
</form>
