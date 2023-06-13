<!--demo.php-->
<?php
echo 'Hello World';
// 1 - Truyền tham trị và tham chiếu
// Viết hàm đổi giá trị của 1 biến bên ngoài

function changeNumber($num) {
	$num = 3;
	echo "Bên trong hàm, biến có giá trị = $num <br>";
}
$number = 5;
echo "Bên ngoài hàm, biến có giá trị = $number <br>";
changeNumber($number);
echo "Sau khi gọi hàm, biến có giá trị = $number"; // 5
// Hàm changeNumber đang truyền giá trị theo kiểu tham trị,
//là chỉ truyền giá trị của biến ban đầu vào hàm, tạo ra 1 bản
//sao chứa giá trị truyền vào hàm, bản gốc ko hề thay đổi

// - Truyền tham chiếu, thêm dấy & trước tên tham số của hàm
function changeNumber1(&$num) {
	$num = 3;
	echo "Bên trong hàm, biến có giá trị = $num <br>";
}
$number = 5;
echo "Bên ngoài hàm, biến có giá trị = $number <br>";
changeNumber1($number);
echo "Sau khi gọi hàm, biến có giá trị = $number";
// Truyền tham chiếu là truyền bản gốc vào hàm, còn truyền tham
//trị là truyền bản sao
// VD hàm truyền tham chiếu:
$arr = [3, 5, 1, 6];
sort($arr);
?>
