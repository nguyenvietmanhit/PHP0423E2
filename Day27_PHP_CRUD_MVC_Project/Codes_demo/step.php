step.php
Các bược xây dựng Website thực tế từ con số 0
+ B1: Lên ý tưởng website:
Bán hàng: đa số
Tin tức: ko nên làm
Thi trắc nghiệm:
...
+ B2: Xác định thành viên nhóm: làm độc lập hoặc 1 nhóm
tối đa 3 bạn

Cần xác định chủ đề web và số lượng thành viên để giảng
viên lưu lại -> tạo 1 post trên group face

+ B3: Dựng giao diện tĩnh (HTML CSS JS) cho Web:
- Tự code: nâng cao kỹ năng + đánh giá cao hơn
=> mất thời gian
- Tìm template có sẵn: nhàn, chỉ cần tập trung vào code
chức năng
-> theo hướng tìm template
Search gg: template ecommerce html css free, download
template về
Template chỉ cung cấp giao diện cho 1 số trang như trang
chủ, trang danh sách, muốn bổ sung giao diện chức năng
nào thì tìm trang thực tế mà có giao diện của chức năng
đó, r tự code thêm
Trong source code tham khảo thư mục mockup
- backend: giao diện quản trị
- frontend: giao diện người dùng

+ B4: Phân tích CSDL
Dựa trên B3
- Dựa trên các trang frontend để phân tích
- Chạy lần lượt các trang HTML của frontend
- Với 1 file HTML, phân tích giao diện từ trên xuống dưới
Để xác định 1 thông tin hiển thị có nên đc lưu vào 1
bảng của CSDL hay ko, thì dựa vào 1 câu hỏi: thông tin
đó có hay thay đổi hay ko
+ Nếu thông tin ít khi thay đổi -> ko cần thiết lưu vào
bảng và ngược lại
+ Nếu lưu vào CSDL thì cần code CRUD để user có thể thao
tác bằng giao diện, ưu điểm tiện cho user, nhược điểm
phải code nhiều hơn, web chậm hơn vì phải tốn time truy
vấn
+ Nếu ko lưu vào CSDL -> ko phải code CRUD, nhược điểm
là phải fix cứng và sửa trong code, ưu điểm : ko tốn
time truy vấn CSDL
Demo 1 số bảng: 1 bảng có 2 dạng trường: mặc định, nghiệp
vụ
+ Bảng settings: lưu thông tin cấu hình hệ thống
id: khóa chính
status: trạng thái TINYINT (0 = ẩn, 1 = hiển thị
key: quy định kiểu setting (key=email ..)
value: giá trị tương ứng với key
created_at

+ Bảng menus: lưu thông tin menu
id
name: tên menu
link: link gắn với menu
status
created_at
+ Bảng products: lưu thông tin về sp
id
status
created_at
avatar: lưu tên file ảnh
name: tên sp
price: giá sp
description: mô tả ngắn TEXT
content: mô tả chi tiết sp TEXT
seo_title: seo về tên sp VARCHAR
seo_description: seo chi tiết sp TEXT
seo_keywords: seo từ khóa tìm sp
category_id: khóa ngoại liên kết đến bảng categories
amount: số lượng sp trong kho

+ B5: Tạo cấu trúc file/thư mục MVC để code:
project_demo
            /backend: cấu trúc MVC đã học
            /frontend: cấu trúc MVC đã học
- Code backend trước r mới code frontend
- Chuẩn bị CSDL: tạo CSDL php0423e2_project
Import file project_demo.sql
- Cấu hình CSDL của MVC tại backend/configs/Database.php
- Chạy file index.php gốc của backend
Dựng chức năng thêm mới danh mục trc
index.php?controller=category&action=create
Demo 1 số chức năng:
+ Cách ghép layout từ giao diện tĩnh có sẵn
- Copy tài nguyên vào source MVC: file js ->
assets/js,
file css -> assets/css, images, fonts ...
- Copy nội dung file HTML trang chủ của template vào file
layout chính của MVC
mockup/backend/index.html -> views/layouts/main.php
- Sửa lại đường dẫn của các file css, js, image
cho đúng với MVC
- Hiển thị thuộc tính class controller vào layout:
page_title, content

* PV thực tập hỏi gì ?
- PHP cơ bản: session cookie ...
- CSDL: INSERT UPDATE DELETE SELECT: cú pháp,
- OOP: 4 tính chất của OOP: đóng gói, kế thừa, trừu tượng
, đa hình. Lấy vd về tính trừu tượng: có 4 loại xe máy
Lead, Vision, Airblade, Vespa -> trừu tượng hóa lên 1
class trừu tương, khai báo phương thức trừu tượng chung
để các class con khi kế thừa thì phải khai báo cụ thể
- MVC: ý nghĩa MVC + luồng hoạt động MVC



+ Tích hợp trình soạn thảo CKEditor và trình upload ảnh
CKFinder vào hệ thống chỉnh sửa bài viết:
- Trình soạn thảo: tạo ra giao diện dễ sử dụng khi soạn
thảo nội dung, thay vì phải sử dụng thẻ HTML
Sử dụng CKEditor
- Cách tích hợp CKEditor:
+ Chỉ tích hợp CKEditor đc vào thẻ textarea
+ Download thư viện CKEditor về, mặc định ko free,
sử dụng ckeditor trong thư mục assets, đã đc crack
+ Nhúng file ckeditor/ckeditor.js vào file layout main

- Cách tích hợp CKFinder:
+ Là trình upload ảnh đc tích hợp vào CKEditor, vì mặc
định CKEditor ko có sẵn tính năng upload ảnh từ máy
+ Tải thư viện về, sử dụng sẵn ckfinder trong source code
và đã đc crack
+ Check version PHP trên máy để sử dụng CKFinder tương
ứng. XAMPP -> Shell -> php -v
PHP8 -> ckfinder_php.8.x
PHP7 -> ckfinder_php.7.x
+ PHP8 yêu cầu cấu hình thì mới dùng đc CKFinder, cần
cho phép thư viện GD bật lên thì mới dùng đc
XAMPP -> Apache -> Config -> php.ini, search(Ctrl F): gd
, bỏ dấu ; trước extension=gd r lưu file
Cần restart Apache để nhận cấu hình -> Stop r Start lại
-> test lại
