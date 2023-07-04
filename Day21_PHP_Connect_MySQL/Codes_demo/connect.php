<!--connect.php
1 - Cách PHP kết nối CSDL MySQL sử dụng thư viện mysqli
+ Thư viện mysqli hỗ trợ kết nối từ PHP tới MySQL
+ Mặc định khi cài XAMPP enable sẵn thư viện mysqli
+ Chỉ hỗ trợ kết nối tới 1 CSDL duy nhất là MySQL
+ Hỗ trợ code PHP thuần và cả hướng đối tượng -> theo
PHP thuần vì dễ học và định hình các bước tương tác CSDL
+ Thực tế nên sử dụng khác là PDO để kết nối CSDL, tuy
nhiên PDO hoàn toàn sử dụng code hướng đối tượng
-->
<?php
// + Chuẩn bị CSDL: php0423e2_crud
// + Chuẩn bị 2 bảng: danh mục và sản phẩm có liên
//kết với nhau:
// categories: id, name, created_at
// products:
// id: khóa chính
// category_id: khóa ngoại, INT, nên đặt tên theo quy tắc
// name: VARCHAR
// price: INT
// avatar: VARCHAR, chỉ lưu tên file
// created_at: TIMESTAMP

/**
 * # Tạo CSDL php0423e2_crud
CREATE DATABASE IF NOT EXISTS php0423e2_crud
CHARACTER SET utf8
COLLATE utf8_general_ci;
 *
 * # Tạo bảng categories và products
# Chú ý: khi tạo bảng có liên kết với nhau, thì cần tạo bảng chứa khóa ngoại sau -> categories, products
CREATE TABLE IF NOT EXISTS categories(
id INT(11) AUTO_INCREMENT,
name VARCHAR(100),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS products(
id INT(11) AUTO_INCREMENT,
category_id INT(11),
name VARCHAR(150),
price INT(11),
avatar VARCHAR(200),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id),
FOREIGN KEY (category_id) REFERENCES categories(id)
);
 * Dùng chức năng Desginer để vẽ sơ đồ quan hệ giữa các
 * bảng có liên kết, bắt buộc phải khai báo tường minh
 * khóa ngoại thì mới vẽ đc
 */
// - Các bước kết nối CSDL MySQL từ PHP:
// + B1: Khởi tạo kết nối:
// Tên máy chủ đang lưu CSDL: localhost
const DB_HOST = 'localhost';
// Username đăng nhập vào CSDL: root (XAMPP)
const DB_USERNAME = 'root';
// Password đăng nhập vào CSDL: chuỗi rỗng (XAMPP)
const DB_PASSWORD = '';
// Tên CSDL sẽ kết nối
const DB_NAME = 'php0423e2_crud';
// Cổng CSDL sẽ kết nối:
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST,
    DB_USERNAME, DB_PASSWORD,
DB_NAME, DB_PORT
);
if (!$connection) {
    die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo 'Kết nối CSDL thành công';
// 2 - Truy vấn INSERT
// products: id, category_id, name, price,
// avatar, created_at
// + B1: Viết truy vấn:
$sql_insert = "INSERT INTO products(category_id,name,
price,avatar) VALUES(1,'IphoneX',1000,'iphone.png')";
// + B2: Thực thi truy vấn: mysqli_query, với INSERT
//UPDATE DELETE trả về boolean
$is_insert = mysqli_query($connection,$sql_insert);
var_dump($is_insert);
// Cách debug khi bị false: copy câu truy vấn ở B1, chạy
//trực tiếp trên PHPMyadmin
// 3 - Truy vấn UPDATE:
// Sửa name=abc, price=123 cho bản ghi có id = 1
// + B1: Viết truy vấn:
$sql_update = "UPDATE products SET name='abc', price=123
WHERE id = 1";
// + B2: Thực thi
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);
// 4 - Truy vấn DELETE
// Xóa sp có id > 10
// + B1: Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id > 10";
// + B2: Thực thi:
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
// -> INSERT UPDATE DELETE các bước giống hệt nhau, chỉ
//khác câu truy vấn
// 5 - Truy vấn SELECT:
// - Lấy 1 bản ghi: lấy sp có id = 1
// + B1: Viết truy vấn
$sql_select_one = "SELECT * FROM products WHERE id=1";
// + B2: Thực thi truy vấn: SELECT trả về 1 obj trung
//gian sau khi thực thi
$result_one = mysqli_query($connection, $sql_select_one);
echo '<pre>';
print_r($result_one);
echo '</pre>';
// + B3: Lấy thông tin dưới dạng mảng kết hợp từ obj
//trung gian:
$product = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';

// - Lấy nhiều bản ghi: lấy tất cả sp theo thứ tự mới nhất
// -> cũ nhất
// + B1: Viết truy vấn:
$sql_select_all =
"SELECT * FROM products ORDER BY created_at DESC"; //ASC
// + B2: Thực thi: SELECT trả về obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// + B3: Lấy thông tin dưới dạng mảng kết hợp 2 chiều:
$products = mysqli_fetch_all($result_all,
    MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';

?>
