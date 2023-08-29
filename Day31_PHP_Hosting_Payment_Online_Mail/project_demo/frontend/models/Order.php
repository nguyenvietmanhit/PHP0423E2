<?php
require_once 'models/Model.php';
class Order extends Model {
	
	public function insertOrder($fullname, $address, $mobile, $email, $note, $price_total, $payment_status) {
		$sql_insert = "INSERT INTO orders(fullname, address, mobile, email, note, price_total, payment_status)
    VALUES (:fullname, :address, :mobile, :email, :note, :price_total, :payment_status)";
		$obj_insert = $connection->prepare($sql_insert);
		$arr_insert = [
			':fullname' => $fullname,
			':address' => $address,
			':mobile' => $mobile,
			':email' => $email,
			':note' => $note,
			':price_total' => $price_total,
			':payment_status' => $payment_status,
		];
		$obj_insert->execute($arr_insert);
		// Trả về id của order vừa mới insert thành công
		$order_id = $this->connection->lastInsertId();
		
		return $order_id;
//    return $obj_insert->execute($arr_insert);
	}
	
}
