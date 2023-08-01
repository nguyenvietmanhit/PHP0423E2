<?php
//models/Product.php
// Model truy vấn CSDL cho sp
require_once 'models/Model.php';
class Product extends Model {
	public function insertData($name, $price) {
		// + B1: Viết truy vấn dạng tham số
		$sql_insert = "INSERT INTO products(name,price)
VALUES(:name,:price)";
		// + B2: Chuẩn bị
		$obj_insert = $this->connection->prepare($sql_insert);
		// + B3: Tạo mảng truyền giá trị thật cho câu truy vấn
		$inserts = [
			':name' => $name,
			':price' => $price
		];
		// + B4: Thực thi: INSERT UPDATE DELETE trả về boolean
		$is_insert = $obj_insert->execute($inserts);
		return $is_insert;
	}
}
