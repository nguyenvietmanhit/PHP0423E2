<!--Day29/note.php-->
1/ Xây dựng chức năng đăng ký user:
- Gồm tối thiểu 2 trường: username và password
- Trường nhập lại mật khẩu
- Cơ chế lưu mật khẩu vào CSDL ? bắt buộc phải mã hóa mật
khẩu trc khi lưu vào CSDL
123 -> dsahkdhsakdhsajkdhsajkdasjkda
Thuật toán mã hóa: md5 (ko nên dùng vì dễ bị giải mã
ngược), bcrypt (nên dùng)
- Url: index.php?controller=user&action=register
UserController.php, phương thức register
2/ Chức năng đăng nhập:
- Giao diện: form nhập username và password
- Logic: dựa vào logic mã hóa khi đăng ký
Dùng session lưu lại phiên đăng nhập
Xử lý 1 số case: chưa login thì ko truy cập đc admin, login
r thì ko truy cập lại đc trang login ...

Day30/project_demo/backend/index.php
Thêm 1 vài danh mục, sau đó thêm 1 vài sản phẩm
có ảnh

- sửa trường name = title trong bảng products của CSDL
php0423e2_project

- Chạy frontend:
Day30/project_demo/frontend/index.php

- Chức năng giỏ hàng:
+ Lưu giỏ hàng bằng gì ? CSDL, File, Session, Cookie ...
Ưu tiên lưu bằng session vì giỏ hàng lưu tạm thời sản phẩm
+ Cấu trúc của session giỏ hàng:
$_SESSION['cart'] = [
    3 => [
        'name' => 'Iphone X',
        'avatar' => 'ip.jpg',
        'price' => 123,
        'quantity' => 4
    ]
]
+ Áp dụng kỹ thuật Ajax - Asynchronous Javascript and XML
cho chức năng Thêm sản phẩm vào giỏ để tạo hiệu ứng ko cần
tải lại trang mỗi thêm thêm sp vào giỏ

- Kỹ năng Rewrite URL
Tạo ra các url thân thiện với user
URL MVC:
index.php?controller=cart&action=index
-> gio-hang-cua-ban.html
Cần sử dụng Rewrite để viết lại URL, sử dụng file .htaccess
để xử lý

- Upload code lên server:
Tham khảo file
Slides
/Huong_dan_day_code_server_itplus_PHP0423E2.docx
+ Domain: vnxpress.net, dantri.com.vn hoặc IP: 3.33.152.147
http://localhost -> http://127.0.0.1
+ Nơi lưu trữ source code Web: Hosting/VPS/Cloud

- Thanh toán trực tuyến với VNPAY
Tham khảo file Slides/C:\xampp\htdocs\PHP0423E2\Day31_PHP_Hosting_Payment_Online_Mail\Slides
\Huong_dan_tich_hop_VNPay_thanh_toan_online.docx

- Gửi mail:

