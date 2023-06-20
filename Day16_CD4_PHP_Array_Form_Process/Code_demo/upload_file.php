<!--upload_file.php
- Xử lý upload file trong form
+ File là dạng dữ liệu mà ko thể đọc hiểu đc, so với các
input còn lại
+ Xử lý file là cần upload file đó lên hệ thống
-->
<?php
// XỬ LÝ FORM: 8 bước
// + B1: Debug
// Mặc định get/post chỉ bắt đc tên file
// nên ko thể upload đc file
// - Để xử lý upload đc file, form bắt buộc phải thỏa mãn 2
//điều kiện sau:
// Method của form phải là post
// Phải thêm thuộc tính enctype cho form
// - Sử dụng mảng $_FILES để xem thông tin file đc gửi lên
// - Các thông tin trong $_FILES:
// + name: tên file
// + type: kiểu file
// + tmp_name: temporary name = tên đường dẫn tạm thời đang
//lưu file sau khi chọn file xong, dùng cho việc upload về sau
// + error: mã lỗi khi upload file vào đường dẫn tạm, nếu
// = 0 thì tải file thành công vào đường dẫn tạm
// + size: dung lượng file:  Gb Mb Kb Byte Bit, tính bằng Byte
// 1Mb = 1024Kb, 1Kb = 1024B, 1B = 8 bit
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// + B2: Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + B3: Xử lý form chỉ khi form submit:
if (isset($_POST['submit'])) {
    // + B4: Gán giá trị từ form:
    $avatars = $_FILES['avatar'];
    // + B5: Validate
    // - File upload phải là ảnh
    // - File upload ko đc vượt quá 2Mb
    // Chú ý khi xử lý file: luôn luôn phải check có file đc
    // tải lên vào đường dẫn tạm thành công -> dựa vào
    //error của $_FILES
    if ($avatars['error'] == 0) {
        // File upload phải là ảnh: dựa vào đuôi file
        // - Lấy đuôi file từ tên file
        $extension = pathinfo($avatars['name'],
            PATHINFO_EXTENSION);
        // - Chuyển về chữ thường
        $extension = strtolower($extension);
        // - Tạo mảng lưu các đuôi file ảnh hợp lệ:
        $allows = ['jpg', 'jpeg', 'png', 'gif'];
        // - Ktra đuôi file có nằm trong danh sách trên hay ko:
        if (!in_array($extension, $allows)) {
            $error = 'File upload phải là ảnh';
        }
        // File upload ko đc vượt quá 2Mb
        $size_b = $avatars['size'];
        // 1Mb = 1024Kb = 1024 * 1024 B;
        $size_mb = $size_b / 1024 / 1024;
        if ($size_mb > 2) {
            $error = 'File upload ko đc vượt quá 2Mb';
        }
    }
    // + B6: Xử lý logic bài toán chỉ khi ko có lỗi:
    if (empty($error)) {
        // Xử lý upload file lên hệ thống
        // + Tạo biến lưu lại tên file sinh ra sau khi upload:
        $filename = '';
        // + Chỉ upload file nếu có file đc tải lên thành công
        //vào đường dẫn tạm
        if ($avatars['error'] == 0) {
            // + Tạo thư mục sẽ lưu file sử dụng đường dẫn
            //tương đối:
            $dir_upload = 'uploads';
            // + Tạo thư mục trên bằng code để deploy web lên
            //host về sau, chỉ tạo nếu chưa tồn tại để tránh
            //ghi đè thư mục -> mất dữ liệu
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // + Upload file vào thư mục vừa tạo:
            // Cần tạo ra tên file mang tính duy nhất trước
            //khi upload, để tránh ghi đè file
            $filename = time() . '-' . $avatars['name'];
            // Upload file:
            $is_upload =
move_uploaded_file($avatars['tmp_name'],"$dir_upload/$filename");
            var_dump($is_upload);
            if ($is_upload) {
$result .= "<img src='$dir_upload/$filename' width='100px'>";
            }
        }

    }
}
// + B7: Đổ error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
	Chọn ảnh đại diện:
	<input type="file" name="avatar">
	<br>
	<input type="submit" name="submit" value="Upload">
</form>
