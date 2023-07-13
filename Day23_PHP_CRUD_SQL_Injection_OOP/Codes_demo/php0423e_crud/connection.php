<?php
//php0423e_crud/connection.php
// - Kết nối CSDL sử dụng thư viện mysqli, tạo ra biến
//kết nối dùng chung cho 4 chức năng CRUD
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0423e2_test';
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOST,
	DB_USERNAME, DB_PASSWORD,
	DB_NAME, DB_PORT);
if (!$connection) {
	die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo 'Kết nối CSDL thành công';
