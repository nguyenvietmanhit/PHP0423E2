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
