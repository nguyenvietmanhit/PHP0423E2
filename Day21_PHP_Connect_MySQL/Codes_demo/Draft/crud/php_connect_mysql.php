<?php
// php_connect_mysql.php
// - PHP kết nối CSDL MySQL thông qua thư viện mysqli
// 1 - Thư viện mysqli
// + LÀ thư viện giúp kết nối PHP với CSDL MySQL
// + Chỉ hỗ trợ kết nối tới 1 CSDL duy nhất là MySQL, thực tế
//sử dụng thư viện PDO hỗ trợ kết nối nhiều Database hơn
// + Dễ học vì hỗ trợ cú pháp của PHP thuần
// + Giúp hình dung đc các bước kết nối và tương tác với CSDL để
// dễ làm quen với thư viện PDO về sau
// + XAMPP cài sẵn
// 2 - Code PHP kết nối và tương tác với CSDL MySQL:
// Tạo CSDL php1222e_crud
// Bảng products: id, name, price, created_at
// - Khởi tạo kết nối từ PHP tới MySQL:
// Máy chủ đang lưu trữ CSDL:
const DB_HOST = 'localhost'; //127.0.0.1
// Username truy cập vào CSDL:
const DB_USERNAME = 'root'; //XAMPP tạo sẵn tài khoản root
// Password truy cập vào CSDL:
const DB_PASSWORD = ''; //Password rỗng tương ứng với root
// Tên CSDL kết nối tới:
const DB_NAME = 'php1222e_crud';
// Cổng CSDL kết nối tới:
const DB_PORT = 3306;
// + Code kết nối: tên hàm đều có tiền tố là mysqli_
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
	die("Lỗi kết nối: " . mysqli_connect_error());
}
echo "Kết nối CSDL thành công";

// products: id, name, price, created_at
// 3 - Code INSERT:
// + B1: Viết truy vấn SQL:
$sql_insert = "INSERT INTO products(name,price) VALUES('IPhone X',100)";
// + B2: Thực thi truy vấn: INSERT trả về boolean sau khi thực thi
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);
// 4 - Code UPDATE:
// CẬp nhật name = abc, price = 200 cho sp có id = 1
// + B1: Viết truy vấn:
$sql_update = "UPDATE products SET name='abc',price=200 WHERE id=1";
// + B2: Thực thi truy vấn: UPDATE trả về boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);
// 5 - Code DELETE:
// Xóa các sp có id > 5
// + B1: Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id > 5";
// + B2: Thực thi truy vấn: DELETE trả về boolean
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
// -> INSERT, UPDATE, DELETE các bước giống hệt nhau, chỉ khác câu
//truy vấn
// 6 - Code SELECT
// + Lấy nhiều bản ghi cùng 1 lúc: lấy tất cả sp đang có
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// B2: Thực thi truy vấn: SELECT trả về obj trung gian, chứ ko
//phải boolean như INSERT UPDATE DELETE
$result_all = mysqli_query($connection, $sql_select_all);
// B3: Trả về mảng kết hợp 2 chiều: associate - kết hợp
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';
foreach ($products AS $product) {
	echo $product['name'] . "<br>";
}
// + Lấy 1 bản ghi duy nhất: lấy sp có id = 1
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = 1";
// B2: Thực thi: SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// B3: Trả về mảng kết hợp 1 chiều
$product = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';
echo $product['price'];


?>
