<!--basic2.php-->
<?php
// 1 - Toán tử
// - Toán tử số học: + - * / % ++ --
$x = 5;
$sum = $x++ + ++$x; //12
// - Toán tử so sánh: > < >= <= != !== == ===
$check = (3 == '3'); //
// - Toán tử logic: && || !
// - Toán tử gán: = += -= *= /= %=
$x = 5;
$x *= 2; // $x = $x * 2
// - Toán tử điều kiện:
$age = 5;
if ($age > 0) {
    echo 'Tuổi > 0';
} else {
    echo 'Tuổi <= 0';
}
echo $age > 0 ? 'Tuổi > 0' : 'Tuổi <= 0'; //ưu tiên
// 2 - Câu lệnh điều kiện: if elseif else switch case
// Thẻ viết tắt của câu lệnh điều kiện khi hiển thị 1 khối
//HTML phức tạp
// VD: Ktra nếu biểu thức là true thì hiển thị cấu trúc bảng HTML
// 1 hàng 4 cột
$number = 2;
if ($number > 0) {
    echo "<table border='1' cellspacing='0'>";
        echo "<tr>";
            echo '<td>A</td>';
            echo '<td>B</td>';
            echo '<td>C</td>';
            echo '<td>D</td>';
        echo "</tr>";
    echo "</table>";
}
// -> code phức tạp và dễ sai sót (thiếu thẻ mở thẻ đóng)
// khi hiển thị HTML phức tạp bằng echo của PHP
// -> nên dùng thẻ viết tắt để tách biệt code HTML và PHP
?>
<?php if ($number > 0): ?>
    <table border="1" cellspacing="0">
        <tr>
            <td>A</td>
            <td>B</td>
            <td>C</td>
            <td>D</td>
        </tr>
    </table>
<?php endif; ?>
<?php if (1 > 2): ?>
    <h1>Thẻ h1</h1>
<?php else: ?>
    <h2>Thẻ h2</h2>
<?php endif; ?>

<?php
// 3 - Vòng lặp: for,  while, do...while
// 4 - Từ khóa break - continue
//
?>

