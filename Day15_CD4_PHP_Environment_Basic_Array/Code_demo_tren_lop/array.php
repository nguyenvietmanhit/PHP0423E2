<!--array.php-->
<?php
// 1 - Kiểu dữ liệu mảng trong PHP
// - Mảng là 1 kiểu dữ liệu trong PHP, lưu trữ đc nhiều giá trị
//tại 1 thời điểm, các giá trị này nó có thể là bất cứ kiểu
//dữ liệu nào, kể cả mảng
// Hiển thị tên của 500ae: tạo ra 500 biến và echo 500 lần
$name1 = 'A';
$name2 = 'B';
$name3 = 'C';
echo $name1;
echo $name2;
echo $name3;
// 2 - Cú pháp khai báo mảng: 2 cách
// C1: áp dụng cho mọi phiên bản PHP
$names = array('A', 'B', 'C');
// C2: PHP >= 5.4 , ưu tiên dùng C2
$names = ['A', 'B', 'C'];
// 3 - Thuật ngữ
$names = ['A', 'B', 'C', 'D', 'E'];
// + Element: là phần tử mảng, đặc trưng bởi cặp key/value
// + Key: giá trị để xác định phần tử mảng
// + Value: giá trị tương ứng của phần tử mảng theo key
// - Với mảng mà ko chỉ định key tường minh, key bắt đầu từ 0
// VD:
// Phần tử mảng thứ 3: key = 2, value = 'C'
// Phần tử mảng thứ 5: key = 4, value = 'E'
// - Cách debug để xem thông tin mảng tường mình key/value
var_dump($names);
// Cách debug hay dùng với mảng
echo '<pre>';
print_r($names);
echo '</pre>';
// 4 - Lấy giá trị của phần tử mảng: luôn luôn cần biết key
//tương ứng của phần tử mảng để lấy giá trị của nó
$names = ['A', 'B', 'C', 'D', 'E'];
echo $names[2]; //C
echo $names[4]; //E
//echo $names[10]; // Cần chú ý để ko thao tác với phần tử mảng
//ko tồn tại
// 5 - Vòng lặp foreach
// Cần hiển thị toàn bộ tên trong mảng -> thao tác với toàn
//bộ phần tử mảng -> vòng lặp
$names = ['A', 'B', 'C', 'D', 'E'];
// - Sử dụng for để lặp mảng:
$c = count($names); //5
for ($key = 0; $key < $c; $key++) {
    echo $names[$key];
}
// -> lặp mảng bằng for thì phải tính số phần tử mảng trước,
//và phải để ý điều kiện lặp -> nhiều thao tác, và ko áp dụng
//đc cho nhiều kiểu mảng khác trong PHP
// -> LUÔN LUÔN sử dụng foreach để lặp mảng trong PHP:
//  - Có 2 cú pháp:
$names = ['A', 'B', 'C', 'D', 'E'];
// + Dạng đầy đủ key/value:
foreach($names AS $key => $value) {
    echo "<br> Key: $key, Value: $value";
}
foreach ($names AS $k => $v) {
	echo "<br> Key: $k, Value: $v";
}
// Foreach lặp qua từng phần tử mảng, đi qua mỗi phần tử xác
//định đc luôn key/value tương ứng
// + Dạng khuyết key:
$names = ['A', 'B', 'C', 'D', 'E'];
foreach ($names AS $value) {
    echo "<br> Value: $value";
}
// 6 - Phân loại mảng:
// + Mảng tuần tự/số nguyên: key chỉ ở dạng số nguyên
$numbers = [1, 3, 4];
// + Mảng kết hợp: key xuất hiện ở dạng chuỗi
$infos = [
    'name' => 'manhnv',
    'age' => 33,
    'address' => 'HN'
];
// Lấy giá trị thủ công:
echo $infos['age']; //33
foreach ($infos AS $k => $v) {
    echo "<br>Key: $k, Value: $v";
}
// + Mảng đa chiều: mảng trong mảng
$infos = [
   'class_name' => 'PHP0423E2',
   'districts' =>  ['A', 'B', 'C']
];
echo '<pre>';
print_r($infos);
echo '</pre>';
// Cần chú ý khi xử lý mảng đa chiều với foreach, ko echo đơn
//thuần vì sẽ có phần tử mảng có giá trị là 1 mảng!
// Nếu mảng là do bạn tự định nghĩa, thì nên dừng ở tối đa 3
//3 chiều
// Lấy giá trị thủ công từ mảng đa chiều:
$infos = [
	'class_name' => 'PHP0423E2',
	'districts' =>  ['A', 'B', 'C']
];
echo $infos['districts'][2]; //C
// - 7 - Một số hàm có sẵn thao tác với mảng:
// + Tính tổng mảng: array_sum
$arr = [2, 5, 7];
echo array_sum($arr); //14
// + Ktra phải kiểu mảng hay ko: is_array
$check = is_array($arr);
var_dump($check); //true
// Tham khảo trên slide sau buổi học

?>

