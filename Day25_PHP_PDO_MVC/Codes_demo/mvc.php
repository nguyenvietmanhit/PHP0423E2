mvc.php
1 - Mô hình MVC trong lập trình Web
- Là mô hình kiến trúc phần mềm 3 lớp giúp tách biệt
ứng dụng Web  ra 3 thành phần riêng biệt -> giúp dễ
mở rộng và bảo trì code, giúp tổ chức cấu trúc thư
mục/file dễ quản lý
- Hầu hết website hiện này đều dựa trên MVC
- Khó tiếp cận vì dựa trên OOP và logic phức tạp
- Viết tắt Model - View - Controller
2 - Thành phần MVC
- M - Model: tương tác với CSDL
- V - View: hiển thị giao diện
- C - Controller: trung gian luân chuyển dữ liệu giữa
Model và View
3 - Luồng xử lý dữ liệu: tham khảo slide
4 - Cấu trúc thư mục code:
mvc /
    /assets: chứa các file css, js, image
           /images: chứa các ảnh tĩnh
           /css: chứa các file .css
               /style.css
           /js: chứa các file .js
               /script.js
    /configs: chứa cấu hình như CSDL, log, cache ...
            /Database.php : chứa class lưu lại thông tin
                            kết nối CSDL với PDO
    /controllers: chứa class controller
                /Controller.php: controller cha
                /ProductController.php: controller xử lý sp
    /models: chứa các class model
            /Model.php: model cha
            /Product.php: model xử lý truy vấn cho sp
    /views: chứa các file hiển thị dữ liệu
          /layouts: chứa file bố cục trang web
                  /main.php: file layout chính
          /products: chứa các file view lq đến sp:
                   /create.php: thêm mới
                   /update.php: sửa
                   /index.php: danh sách
    .htaccess: cấu hình truy cập và Rewrite URL
    index.php: file index gốc của ứng dụng MVC

