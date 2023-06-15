<!--process_form.php
Xử lý form trong PHP
- LÀ xử lý rất quan trọng với bất cứ 1 website nào
- Bằng mắt thường: form là nơi cho nhập liệu trên web
- Form có dạng chính:
+ Form lấy thông tin dưới dạng cơ bản
+ Form lấy thông tin dưới dạng file
- Có thể lấy thông tin mà ko cần dùng form, sử dụng Ajax
VD: Có form nhập họ tên, sau đó hiển thị họ tên
-->
<!--
Form có 2 thuộc tính cơ bản:
+ action: là url/file mà thông tin từ form đc gửi lên và đc xử lý
thông thường set chính file hiện tại xử lý form = chuỗi rỗng
+ method: phương thức gửi dữ liệu lên action:
GET: dữ liệu gửi lên đc hiển thị trên url theo dạng
tên-file.php?param1=value1&param2=value2 ...., ko dùng GET cho
form có dữ liệu nhạy cảm như password, banking. Chức năng phổ
biến nhất với GET là tìm kiếm
POST: truyền ngầm dữ liệu, dùng cho form cần bảo mật
-->
<?php
// - Xử lý form phía trên HTML của form để có hiển thị thông tin
//sau khi xử lý PHP xong ở vị trí tùy ý
// - Quy trình xử lý form:
// + B1: Debug
// Dựa vào method của form để debug mảng lưu dữ liệu từ form
//gửi lên tương ứng
// method = GET => PHP có sẵn mảng $_GET
// method = POST => $_POST
// - Khi chưa submit form, mảng rỗng
echo '<pre>';
print_r($_POST);
echo '</pre>';
// + B2: Khai báo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// + B3: Chỉ xử lý form khi đã submit form, dựa vào debug mảng
// B1, dựa vào name của nút submit form
// Về mặt code, ktra nếu mảng tồn tại phần tử với key = name
//của nút submit thì chắc chắn form đc đã submit! Sử dụng hàm
//isset của PHP để ktra mảng có tồn tại phần tử theo key hay ko
if (isset($_POST['info'])) {
    // + B4: Lấy giá trị từ form:
    $fullname = $_POST['fullname'];
    // + B5: Validate form
    // - Tên ko đc để trống: hàm empty
    // - Tên phải từ 3 ký tự trở lên:  strlen
    // - Tên phải có định dạng email: filter_var
    if (empty($fullname)) {
        $error = 'Tên ko đc để trống';
    } elseif (strlen($fullname) < 3) {
		$error = 'Tên phải từ 3 ký tự trở lên';
    } elseif (!filter_var($fullname, FILTER_VALIDATE_EMAIL)) {
        $error = 'Tên phải có định dạng email';
    }
    // + B6: Xử lý logic của bài toán chỉ khi ko có lỗi nào xảy ra:
    if (empty($error)) {
        $result = "Tên của bạn: $fullname";
    }
}
// + B7: nằm ngoài bước 3, Hiển thị error và result ra form
// + B8: đổ lại dữ liệu đã nhập ra form, tăng trải nghiệm user
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="POST">
    Nhập họ tên:
<!--  Bắt buộc phải khai báo name cho input, vì PHP dựa vào
  name để biết dữ liệu gửi lên từ input nào-->
    <input type="text" name="fullname"
value="<?php echo isset($_POST['fullname']) ?
    $_POST['fullname'] : '' ?>" >
    <input type="submit" name="info" value="Hiển thị">
</form>
