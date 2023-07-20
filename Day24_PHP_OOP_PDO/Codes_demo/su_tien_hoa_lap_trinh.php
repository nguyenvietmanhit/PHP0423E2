su_tien_hoa_lap_trinh.php
Sự tiến hóa của lập trình
- Lập trình bao gồm 4 phương chính:
+ Tuần tự
+ Thủ tục
+ Hướng đối tượng
+ Design Pattern
<?php
// Demo 3 phương pháp lập trình với bài toán cộng 2 số
// + Lập trình tuần tự: nghĩ gì code nấy
$number1 = 1;
$number2 = 2;
$sum = $number1 + $number2;
echo $sum;
// + Lập trình thủ tục: viết hàm
function sum($num1, $num2) {
	$sum = $num1 + $num2;
	return $sum;
}
echo sum(1, 2);
// Nhược điểm: phải gọi hàm nhiều lần nên độ phức tạp tăng
// + Lập trình hướng đối tượng:
class Number {
	public $number1;
	public $number2;
	public function sum() {
		$sum = $this->number1 + $this->number2;
		return $sum;
	}
}
$number = new Number();
$number->number1 = 2;
$number->number2 = 3;
$sum = $number->sum();
echo $sum; //5
?>
