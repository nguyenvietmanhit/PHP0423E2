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
?>
