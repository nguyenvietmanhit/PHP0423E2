<!--database.php-->
1/ Cơ sở dữ liệu MySQL
- CSDL là gì? LÀ kho lưu trữ dữ liệu, lưu trữ thông tin
về lâu dài và được tổ chức
- Là 1 thành phần bắt buộc để tạo 1 website động
- Có nhiều hệ quản trị CSDL khác nhau: MySQL, SQL Server,
Oracle, Postgree, SQLite, MongoDB ...
- PHP hay kết hợp với CSDL MySQL
+ CSDL MySQL:
Free
Hỗ trợ nhiều nền tảng Window, Linux, MacOS
XAMPP cài sẵn MySQL
MySQL có thể sử dụng thông qua giao diện hoặc Command line
-> dùng command line trước
- Sử dụng công cụ PHPMyadmin để quản trị CSDL MySQL cho
trực quan (Navicat, MySQLWorkbench ...)
- XAMPP cài sẵn PHPMyadmin
- Luôn luôn start module MySQL của XAMPP
Truy cập PHPMyadmin bằng cách sau: click button Admin ở module
MySQL của XAMPP
http://localhost/phpmyadmin

2/ Ngôn ngữ truy vấn SQL
+ SQL - Structure Query Language, là ngôn ngữ truy vấn
có cấu trúc dùng để tương tác với CSDL
+ Bắt buộc phải học SQL để biết cú pháp truy vấn dữ liệu
xuống CSDL

3/ Thuật ngữ liên quan đến CSDL:
- Database: tên CSDL. csdl_banhang
- Tables: 1 CSDL bao gồm 1 hoặc nhiều bảng, lưu trữ các
thông tin của từng đối tượng cụ thể
VD:
products: lưu thông tin các sản phẩm
users: lưu thông tin các user
orders: lưu thông tin đơn hàng
....
- Field/Column: các trường trong 1 bảng, các thuộc tính sẽ lưu
về đối tượng đó
VD:
products: name, price, amount ....
users: username, password, fullname, age, address ....
- Record/Row: bản ghi, là 1 thông tin cụ thể của 1 đối tượng
trong bảng
VD:
products: name, price, amount
Record 1: name=IphoneX, price=1000, amount=10
Record 2: name=Tivi, price=2000, amount=0
- Primary key: khóa chính, là 1 trường dùng để phân biệt các
bản ghi với nhau
Khóa chính thường được đặt tên là id, có cơ chế tự động tăng
lên 1
- Foreign key: khóa ngoại, là 1 trường bình thường trong 1
bảng, nhưng là khóa chỉnh của bảng có liên kết

4/ Học SQL để tương tác với CSDL thông qua giao diện của
PHPMyadmin:
Truy cập PHPMyadmin, click vào tab SQL để bắt đầu viết truy
vấn SQL

# Comment trong SQL
# 1 - Tạo CSDL:
# CREATE DATABASE abc;
CREATE DATABASE IF NOT EXISTS php1222e_demo
CHARACTER SET utf8
COLLATE utf8_general_ci;

# 2 - Xóa CSDL:
DROP DATABASE IF EXISTS abc;
