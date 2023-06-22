<!--var2.php-->
<?php
// Có cách nào để sử dụng đc biến $fullname từ
// file var1.php ?
// Sử dụng nhúng file: PHP có 4 hàm nhúng file: include,
//require, include_once, require_once
// Nhóm include và require khác nhau ở điểm là khi nhúng
//1 file ko tồn tại, require báo lỗi và dừng chương trình,
//còn include báo lỗi nhưng vẫn thực thi tiếp
// Trong thực tế ưu tiên dùng require_once để nhúng file
//để tránh nhúng trùng file vào dừng chương trình khi
//file ko tồn tại
require_once 'var1.php';
// Vấn đề khi nhúng file sẽ bị code dư thừa và ko
//thực tế khi số lượng file lớn
// -> khởi tạo 1 lần, dùng đc ở mọi nơi hay ko ?
// -> dùng session/cookie

echo "<br>File var2.php, biến fullname = $fullname";
?>

