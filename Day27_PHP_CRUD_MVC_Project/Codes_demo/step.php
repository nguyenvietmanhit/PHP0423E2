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

+ B5: Tạo cấu trúc file/thư mục MVC để code
