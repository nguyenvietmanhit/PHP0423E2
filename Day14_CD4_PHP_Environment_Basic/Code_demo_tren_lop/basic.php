<!--basic.php-->
<?php
// KIẾN THỨC CĂN BẢN CỦA PHP
// 1 - Biến
$name = 'manhnv';
echo $name;
echo '<br>';
// + Quy tắc đặt tên biến
//$1name = 'manhnv';
//$name% = 'manhnv';
// 2 - Kiểu dữ liệu:
// + integer: kiểu số nguyên, phạm vi - 2 tỉ -> 2 tỉ
$number1 = 123;
$number2 = -2;
// Hàm debug trong PHP:
var_dump($number1);
echo '<br>';
// + float/double: kiểu số thực hoặc số nguyên ngoài phạm vi của
//integer
$number3 = 1.23;
var_dump($number3);
// + string: kiểu chuỗi, đc bao bởi ' hoặc  "
$str1 = 'String 1';
$str2 = "String 2";
$str3 = "Hello, 'manhnv' ";
$fullname = 'manhnv';
// Nối chuỗi:
echo "Tên của bạn: " . $fullname;
// Hiển thị biến trực tiếp bên trong chuỗi mà ko cần nối chuỗi,
// với điều kiện phải dùng "
echo "Tên của bạn: $fullname";
echo 'Tên của bạn: $fullname';
// + boolean: kiểu true/false
$is_check = true;
$is_gender = false;
$is_test = True;
var_dump($is_check);
// + null: xảy ra khi gọi 1 đối tượng ko tồn tại
$var1 = null;
var_dump($var1);
// + array: kiểu mảng, lưu đc nhiều giá trị tại 1 thời điểm
$arr1 = array(123, 3.4, 'string1');// C1
$arr2 = [123, 3.4, 'string1']; // C2, PHP >= 5.6
// -> ưu tiên cách 2 cho ngắn gọn
// + object: kiểu đối tượng

// 4 - Ép kiểu: sử dụng tên kiểu dữ liệu muốn ép sang
$var = 11.2;
var_dump($var);//float
$var1 = (integer) $var;
var_dump($var1); //11
$var2 = (string) $var;
var_dump($var2); //
// Ép về boolean:
$var3 = (boolean) $var;
var_dump($var3);
// Các giá trị sau khi ép về boolean sẽ là false: số 0, chuỗi
//rỗng, giá trị null, mảng rỗng

// 5 - Hằng
// + Cú pháp:
// C1:
define('PI', 3.14);
echo PI; //3.14
// C2:
const MAX_UPLOAD = 10;
// Ưu tiên dùng C2 cho ngắn gọn
// + Một số hằng có sẵn của PHP:
echo '<br>';
echo __LINE__;
echo '<br>';
echo __FILE__;
echo '<br>';
echo __DIR__;
// 6 - Hàm:
// + Hàm ko có tham số, ko có giá trị trả về
// + Hàm có tham số, ko có giá trị trả về
// + Hàm có tham số, có giá trị trả về: nên viết hàm theo hướng
//này
// VD: Viết hàm tính tổng 2 số bất kỳ:
// - Xác định tham số: 2 tham số
// - Xác định kiểu dữ liệu trả về: integer/float
function sum($number1, $number2) {
    $s = $number1 + $number2;
    return $s;
}
// Gọi hàm:
$result1 = sum(1, 2);
echo $result1; //3
?>
