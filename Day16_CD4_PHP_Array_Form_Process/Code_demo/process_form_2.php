<!--process_form_2.php
Xử lý form với các input phức tạp
-->
<?php
// XỬ LÝ FORM:
// + B1: Debug
echo '<pre>';
print_r($_GET);
echo '</pre>';
// + B2: KHai báo biến
$error = '';
$result = '';
// + B3: Chỉ xử lý form khi đã submit form
if (isset($_GET['submit'])) {
    // + B4: Lấy giá trị từ form:
    $age = $_GET['age'];
    // PHP sẽ ko bắt dữ liệu từ radio và checkbox nếu như ko tích
    //vào cái nào, nên ko đc lấy giá trị trước
//    $gender = $_GET['gender'];
//    $jobs = $_GET['jobs'];
    $country = $_GET['country'];
    $note = $_GET['note'];
    // + B5: Validate form:
    // - Tuổi phải là số: is_numeric
    // - Bắt buộc phải chọn Giới tính và Nghề nghiệp: ktra
    //tồn tại của phần tử mảng theo key -> isset
    if (!is_numeric($age)) {
        $error = 'Tuổi phải là số';
    } elseif (!isset($_GET['gender'])) {
        $error = 'Phải chọn giới tính';
    } elseif (!isset($_GET['jobs'])) {
        $error = 'Phải chọn ít nhất 1 nghề nghiệp';
    }
    // + B6: Xử lý logic chính chỉ khi ko có lỗi
}
// + B7: Đổ error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="GET">
	Nhập tuổi:
	<input type="text" name="age" value="">
	<br>
	Chọn giới tính:
<!--  Với radio, PHP dựa vào value tương ứng để biết đc dữ
  liệu gửi lên là của radio nào-->
	<input type="radio" name="gender" value="1"> Nam
	<input type="radio" name="gender" value="2"> Nữ
	<input type="radio" name="gender" value="3"> Khác
    <br>
    Chọn nghề nghiệp:
<!--  Với checkbox, nếu có từ 2 checkbox trở lên thì bắt buộc
  name phải ở dạng mảng -->
    <input type="checkbox" name="jobs[]" value="1"> Dev
    <input type="checkbox" name="jobs[]" value="2"> Tester
    <input type="checkbox" name="jobs[]" value="3"> brSE
    <br>
    Chọn quốc gia:
    <select name="country">
        <option value="1">VN</option>
        <option value="2">JP</option>
        <option value="3">KR</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note"></textarea>
    <br>
    <input type="submit" name="submit" value="Hiển thị">
</form>
