database.php
1/ Cơ sở dữ liệu:
- Lưu trữ dữ liệu có tổ chức và có tính lâu dài
- Website luôn luôn cần CSDL để tạo ra website động
- Có nhiều hệ quản trị CSDL: MySQL, Oracle, SQL Server,
MongoDB, SQLite, Postgre ...
2/ CSDL MySQL:
- Free, luôn kết hợp với PHP
- Phù hợp cho nhiều loại ứng dụng
- Sử dụng ngôn ngữ SQL để truy vấn dữ liệu
- Cài MySQL ? XAMPP cài sẵn, cần start Module MySQL để
có thể thao tác đc với CSDL MySQL, port mặc định = 3306
3/ Thuật ngữ liên quan đến CSDL:
- Database: tên CSDL. VD: db_ban_may_tinh, db_php0423e2
- Table: các bảng trong 1 database, lưu trữ các dữ liệu
cho các đối tượng khác nhau trong 1 database
Bảng users: lưu thông tin user
Bảng products: lưu sản phẩm
Bảng categories: lưu danh mục
...
Quy tắc đặt tên bảng: ký tự thường ở dạng số nhiều
- Field/column: trường của bảng, lưu các thông tin liên
quan đến đối tượng của bảng:
Bảng users: username, password, fullname, age ....
Bảng products: id, title, price, producer ....
- Record: bản ghi, mô tả thông tin
cụ thể của đối tượng trong bảng
BẢng users: username, fullname, age
Bản ghi: username=manhnv, fullname=Mạnh, age=33
- Primary key: khóa chính, là 1 trường phân biệt các bản
ghi với nhau, ko cho phép trùng giá trị khóa chính
- Foreign key: khóa ngoại, là trường dùng để liên kết
các bảng với nhau. 1 - n, n - 1, 1 - 1, n - n

4 / Ngôn ngữ truy vấn SQL:
- Structure Query Language, là ngôn ngữ dùng để truy vấn
CSDL quan hệ
- Học 1 số dạng truy vấn cơ bản: SELECT, INSERT, UPDATE,
DELETE
- Có 2 hình thức để có thể tương tác đc với CSDL sử dụng
SQL:
+ Command line
+ UI: ưu tiên beginner: PHPMyadmin, MySQL Workbench,
Navicat ....
XAMPP cài sẵn PHPMyadmin, mặc định cần tài khoản để
truy cập vào CSDL, XAMPP tạo ra username=root, password
để trống và auto đăng nhập vào PHPMyadmin
http://localhost/phpmyadmin/

5 / Câu truy vấn SQL cơ bản: CSDL MySQL ko phân biệt
hoa thường khi viết truy vấn
# 1 - Tạo CSDL
# CREATE DATABASE php0423e_test;
CREATE DATABASE IF NOT EXISTS php0423e_demo
CHARACTER SET utf8 # lưu ký tự có dấu
COLLATE utf8_general_ci; #case insensitive
# 2 - Sử dụng CSDL: chỉ có tác dụng trong command line
USE php0423e_demo;
# 3 - Xóa CSDL:
DROP DATABASE abc;
