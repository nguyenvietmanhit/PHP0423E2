<!--process_file.php
Thao tác đọc ghi file:
- Thực tế: import sử dụng đọc file, export sử dụng ghi file
1/ Đọc file:
+ Đọc từng dòng
+ Đọc toàn bộ file
Tạo 1 file note.txt cùng cấp file hiện tại, n
hập nội dung tùy ý từ 3 hàng trở lên
-->
<?php
// 1 - Đọc file
// + Đọc từng dòng: giữ nguyên ddc fomat của file
$reads = file('note.txt');
echo '<pre>';
print_r($reads);
echo '</pre>';
foreach ($reads AS $read) {
	echo $read . "<br>";
}
// + Đọc toàn bộ: bỏ qua khoảng trắng giữa các hàng
$content = file_get_contents('note.txt');
echo $content;
// echo file_get_contents('https://vnxpress.net');
// 2 - Ghi file:
// + Ghi đè
file_put_contents('demo.txt', 'abc 123');
// + Ghi nối tiếp
file_put_contents('test.txt', 'def',
    FILE_APPEND);
// 3 - Xóa file:
unlink('abc.txt');
// 4 - Ktra đường dẫn file/thư mục có tồn tại hay ko:
//file_exists
?>
