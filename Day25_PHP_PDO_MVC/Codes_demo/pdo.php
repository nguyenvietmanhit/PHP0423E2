<!--pdo.php
Kết nối CSDL MySQL từ PHP sử dụng thư viện PDO
- PDO - PHP Data Object, là 1 thư viện có sẵn của PHP
hỗ trợ kết nối tới nhiều CSDL khác nhau
- Sử dụng hoàn toàn cú pháp của OOP
- Hiện nay website ưu tiên dùng PDO làm phương thức
kết nối CSDL chính
+ Demo: tạo CSDL php0423e2_pdo
Bảng products: id, name, price, created_at
-->
<?php
// 1 - Khởi tạo kết nối
// + Chuỗi kết nối Data Source Name: ko đc chứa dấu cách
const DB_DSN = "mysql:host=localhost;dbname=php0423e2_pdo;port=3306";
// + Username login vào DB
const DB_USERNAME = 'root';
// + Password login vào DB
const DB_PASSWORD = '';

// Sử dụng try catch để bắt ngoại lệ khi kết nối PDO
try {
    $connection = new PDO(DB_DSN, DB_USERNAME,
    DB_PASSWORD);
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
echo 'Kết nối CSDL thành công';


// 2 - Truy vấn INSERT
// Bảng products: id, name, price, created_at
// + B1: Viết truy vấn dạng tham số để phòng tránh lỗi
// bảo mật SQLInjection
// Tên tham số đặt sau :
$sql_insert= "INSERT INTO products(name, price) 
VALUES(:name, :price)";
// + B2: Chuẩn bị obj truy vấn:
$obj_insert = $connection->prepare($sql_insert);
// + B3: [Tùy chọn] Chỉ có bước này khi câu truy vấn B1
// có tham số -> chống lỗi SQLInjection
// Tạo mảng để truyền giá trị thật cho tham số
$inserts = [
    ':name' => 'Tivi Sony',
    ':price' => 3000
];
// + B4: Thực thi obj truy vấn: INSERT UPDATE DELETE
// trả về boolean:
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);
// - 3 - Truy vấn UPDATE:
// Cập nhật name=abc, giá=123 cho sp có id = 1
// + B1: Viết truy vấn dạng tham số:
$sql_update = "UPDATE products 
SET name=:name,price=:price WHERE id=:id";
// + B2: Cbi obj truy vấn:
$obj_update = $connection->prepare($sql_update);
// + B3: Tạo mảng truyền giá trị thật cho tham số
$updates = [
    ':name' => 'abc',
    ':price' => 123,
    ':id' => 1
];
// + B4: Thực thi
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 4 - Truy vấn DELETE: xóa sp có id > 10
// + B1: Viết truy vấn dạng tham số:
$sql_delete = "DELETE FROM products WHERE id > :id";
// + B2: Cbi
$obj_delete = $connection->prepare($sql_delete);
// + B3: Tạo mảng
$deletes = [
    ':id' => 10
];
// + B4: Thực thi:
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
// 5 - Truy vấn SELECT:
// - Lấy 1 bản ghi: lấy sp có id = 1
// + B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id=:id";
// + B2: Cbi
$obj_select_one = $connection->prepare($sql_select_one);
// + B3: Tạo mảng
$selects = [
    ':id' => 1
];
// + B4: Thực thi: SELECT chưa lấy đc kết quả ở bước này
$obj_select_one->execute($selects);
// + B5: Lấy mảng kết hợp:
$product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($product);
echo '</pre>';

// - Lấy nhiều bản ghi: lấy tất cả sp theo thứ tự mới nhất
// + B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products
ORDER BY created_at DESC";
// + B2: Cbi
$obj_select_all = $connection->prepare($sql_select_all);
// + B3: Bỏ qua vì câu truy vấn ko có tham số nào
// + B4: Thực thi
$obj_select_all->execute();
// + B5: Trả về mảng kết hợp 2 chiều:
$products = $obj_select_all
    ->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';
?>
