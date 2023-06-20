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
    if (empty($error)) {
        $result .= "Tuổi: $age <br>";
        // Xử lý radio:
        $gender = $_GET['gender'];// 1 2 3
        $gender_text = '';
        switch ($gender) {
            case 1: $gender_text = 'Nam';break;
            case 2: $gender_text = 'Nữ';break;
            case 3: $gender_text = 'Khác';
        }
        $result .= "Giới tính: $gender_text <br>";
        // Xử lý checkbox:
        $jobs = $_GET['jobs'];
        $job_text = '';
        foreach ($jobs AS $job) {
            switch ($job) {
                case 1: $job_text .= " Tester";break;
                case 2: $job_text .= " Dev";break;
                case 3: $job_text .= " BrSE";
            }
        }
        $result .= "Nghề nghiệp: $job_text <br>";
        // Xử lý select: giống hệt radio
        $country_text = '';
        switch ($country) {
            case 1: $country_text = 'VN';break;
            case 2: $country_text = 'JP';break;
            case 3: $country_text = 'KR';
        }
        $result .= "Quốc gia: $country_text <br>";
        // Xử lý textarea
        $result .= "Ghi chú: $note";
    }
}
// + B7: Đổ error và result ra form
// + B8: Đổ lại dữ liệu đã nhập ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="GET">
	Nhập tuổi:
	<input type="text" name="age"
value="<?php echo isset($_GET['age']) ? $_GET['age'] : '' ?>">
	<br>
	Chọn giới tính:
<!--  Với radio, PHP dựa vào value tương ứng để biết đc dữ
  liệu gửi lên là của radio nào-->
    <?php
    // - Đổ dữ liệu radio là can thiệp thuộc tính checked
    // + Có bao nhiêu radio thì tạo từng đó biến để lưu checked
    $checked_male = '';
    $checked_female = '';
    $checked_another = '';
    // + Xử lý nếu submit form thì mới gán:
    if (isset($_GET['gender'])) {
        switch ($_GET['gender']) {
            case 1: $checked_male = 'checked';break;
            case 2: $checked_female = 'checked';break;
            case 3: $checked_another = 'checked';
        }
    }
    // + Hiển thị vào tương ứng với radio
    ?>
	<input <?php echo $checked_male ?> type="radio" name="gender" value="1"> Nam
	<input <?php echo $checked_female ?> type="radio" name="gender" value="2"> Nữ
	<input <?php echo $checked_another ?> type="radio" name="gender" value="3"> Khác
    <br>
    Chọn nghề nghiệp:
<!--  Với checkbox, nếu có từ 2 checkbox trở lên thì bắt buộc
  name phải ở dạng mảng -->
    <?php
    // - Đổ dữ liệu cho checkbox thì cũng can thiệp checked
    // + Có bao nhiêu checkbox thì có từng đó biến
    $checked_dev = '';
    $checked_tester = '';
    $checked_brse = '';
    // + Ktra nếu submit form thì xử lý gán checked
    if (isset($_GET['jobs'])) {
        foreach ($_GET['jobs'] AS $job) {
            switch ($job) {
                case 1: $checked_dev = 'checked';break;
                case 2: $checked_tester = 'checked';break;
                case 3: $checked_brse = 'checked';
            }
        }
    }
    // + Hiển thị biến ra input tương ứng
    ?>
    <input <?php echo $checked_dev ?> type="checkbox" name="jobs[]" value="1"> Dev
    <input <?php echo $checked_tester ?> type="checkbox" name="jobs[]" value="2"> Tester
    <input <?php echo $checked_brse ?> type="checkbox" name="jobs[]" value="3"> brSE
    <br>
    Chọn quốc gia:
    <?php
    // - Can thiệp selected vào option, xử lý giống hệt radio
    $selected_vn = '';
    $selected_jp = '';
    $selected_kr = '';
    if (isset($_GET['country'])) {
        switch ($_GET['country']) {
            case 1: $selected_vn = 'selected';break;
            case 2: $selected_jp = 'selected';break;
            case 3: $selected_kr = 'selected';
        }
    }
    ?>
    <select name="country">
        <option <?php echo $selected_vn ?> value="1">VN</option>
        <option <?php echo $selected_jp ?> value="2">JP</option>
        <option <?php echo $selected_kr ?> value="3">KR</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note"><?php echo isset($_GET['note']) ? $_GET['note'] : ''?></textarea>
    <br>
    <input type="submit" name="submit" value="Hiển thị">
</form>
