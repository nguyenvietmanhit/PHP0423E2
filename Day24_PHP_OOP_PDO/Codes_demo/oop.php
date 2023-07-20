<!--oop.php
Lập trình hướng đối tượng:
+ OOP - Object Oriented Programming, là 1 phương pháp
lập trình
+ OOP đc ưu tiên để dựng các website thực tế
+ Ưu điểm lớn nhất: có tính mở rộng và bảo trì cao,
nhược điểm: khó học và khó tiếp cận
+ OOP khó học vì thay đổi hoàn toàn tư duy lập trình
so với các pp khác và có nhiều thuật ngữ khó hiểu
+ Thay đổi tư duy lập trình: lấy đối tượng làm trọng
tâm để phân tích ra hành vi và đặc điểm, còn lập trình
thủ tục/hàm thì lấy chức năng để phân tích
VD: code website bán hàng:
+ Thủ tục: các chức năng login, register, payment ...
+ OOP: đối tượng user: tên, tuổi, sđt; hành vi: login,
register ...
obj product: tên, giá, ảnh đại diện ..., hành vi: CRUD
- Các thuật ngữ cơ bản của OOP
-->
<?php
// 1 - Class: là 1 khuôn mẫu cho các đối tượng sinh ra
//từ nó
// - Tên class nên viết hoa ký tự đầu tiên của từng từ
// - Nếu 1 file PHP mà chỉ khai báo duy nhất 1 class thì
// tên class nên đặt trùng tên file
class Person {

}
class CheckPerson {

}
// 2 - Object: đối tượng, đc sinh ra từ 1 class, class
// và object luôn đi đôi với nhau
class Person1 {

}
$p1 = new Person1();
$manhnv = new Person1();
var_dump($p1);
// 3 - Thuộc tính: là đặc điểm 1 obj, được khai báo bên
// trong class, giống như 1 biến nhưng đc khai báo bên
// trong class
class Product {
    public $name;
    public $price;
}
$computer = new Product();
// 1 obj sinh bởi 1 class truy cập đc thuộc tính và
//phương thức public bên trong 1 class
// Gán giá trị cho thuộc tính sử dụng ký hiệu ->
$computer->name = 'Asus';
$computer->price = 1000;

$mobile = new Product();
$mobile->name = 'IphoneX';
$mobile->price = 2000;
echo "Tên đt: " . $mobile->name; //Tên đt: IphoneX
// 4 - Phương thức: là hành vi của đối tượng, đc khai báo
//ở bên trong class, PT trong class chính là 1 hàm
class Product1 {
    public function create() {
        echo 'create';
    }
    public function edit($id) {
        echo "Edit $id";
    }
}
$book = new Product1();
$book->create(); //create
$book->edit(3); //Edit 3

// 5 - PHương thức khởi tạo: là phương thức tự động đc
//chạy mỗi khi có 1 obj sinh ra bởi 1 class
// Hay dùng để khởi tạo giá mặc định cho thuộc tính class
class Person2 {
    // PT khởi tạo
    public function __construct() {
        echo 'PT khởi tạo';
    }
    public function create() {
        echo 'create';
    }
}
$p1 = new Person2();
$p1->create();
// 6 - Từ khóa this: tham chiếu đến chính class hiện tại,
//đc khai báo bên trong class
class Person3 {
    public $name;
    public $age;
    public function showName() {
        echo $this->name;
    }
}
$p3 = new Person3();
$p3->name = 'manhnv';
$p3->showName(); //manhnv
// 7 - Phạm vi truy cập: là từ khóa đặt trc tên TT/PT để
//gán quyền truy cập tới TT/PT đó
// + private: chỉ truy cập đc bên trong class khai báo ra
// TT/PT
class Person4 {
    private $name;

    private function showName() {
        echo $this->name;
    }
}
$p4 = new Person4();
//$p4->name = 'manh'; báo lỗi ko truy cập đc
// + protected: truy cập đc bên trong class và các class
//con kế thừa từ class cha của nó, bên ngoài class cũng
//ko truy cập đc
// + public: truy cập đc từ mọi nơi, cả trong và ngoài
//class
// - 8 - Từ khóa extends: thể hiện cho tính kế thừa.
// Tính kế thừa cho phép 1 class con sử dụng lại TT/PT
//của class cha. PHP là đơn kế thừa
class Person5 {
    public $name;
    public $age;
}
class Student extends Person5 {
    // class con truy cập đc TT/PT public/protected
    // từ class cha
}
$s = new Student();
$s->name = 'manhnv'; //chạy bt
// 9 - Từ khóa abstract: thể hiện cho tính trừu tượng của
// OOP
// 10 - Từ khóa implements: thể hiện cho tính đa hình của
// OOP, sử dụng interafce
// => tính trừu tượng và đa hình rất khó hiểu vì liên
//quan đến thiết kế hệ thống
// + 4 tính chất của OOP (câu hỏi pv)
// - Tính đóng gói: thể hiện qua pv truy cập
// - Tính kế thừa: extends
// - Tính trừu tượng: abstract
// - Tính đa hình: interface
?>
