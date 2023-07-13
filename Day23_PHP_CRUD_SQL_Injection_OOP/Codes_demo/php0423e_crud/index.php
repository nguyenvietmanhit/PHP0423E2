<!--Xây dựng ứng dụng CRUD sản phẩm
- CRUD - Create Read Update Delete, là 4 chức năng cơ
bản của mọi chức năng trong thực tế
- Là cách tiếp cận tốt nhất để hiểu đc 1 ngôn ngữ lập
trình tương tác với CSDL thông qua giao diện user như
thế nào
+ Tạo cấu trúc file/thư mục:
php0423e_crud /
              /create.php: thêm mới
              /index.php: danh sách
              /update.php: sửa
              /delete.php: xóa
              /connection.php: kết nối CSDL dùng chung
                               cho 4 chức năng CRUD
+ Tạo CSDL: php0423e2_test
+ Tạo bảng products: id, name, price, avatar, created_at
- Code CRUD: code chức năng nào trc ?? C - R - U - D
index.php
Danh sách sản phẩm: là trang đầu tiên trong CRUD show cho user
-->
<?php
session_start();
require_once 'connection.php';
// Truy vấn CSDL lấy ra tất cả sp:
// + B1: Viết truy vấn: lấy ra tất cả sp theo thứ tự mới nhất
// -> cũ nhất
$sql_select_all =
    "SELECT * FROM products ORDER BY created_at DESC";
// + B2: Thực thi: SELECT trả về obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// + B3: Trả về mảng kết hợp 2 chiều:
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';
?>
<?php
// Hiển thị session dạng thông báo (flash)
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
<a href="create.php">Thêm mới sp</a>
<h2>Danh sách sản phẩm</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Avatar</th>
        <th>Created at</th>
        <th></th>
    </tr>
    <?php foreach($products AS $product): ?>
    <tr>
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td>
<?php echo number_format($product['price'],
    0,'.', '.') ?> vnđ
        </td>
        <td>
            <img src="uploads/<?php echo $product['avatar']?>"
                 height="50px">
        </td>
        <td>
<!--            06/07/2023 20:13:30-->
<!--            Trong csdl, Y-m-d H:i:s -->
<?php echo date('d/m/Y H:i:s',
    strtotime($product['created_at'])); ?>
        </td>
        <td>
            <a href="update.php?id=<?php echo $product['id']?>">Sửa</a>
            <a href="delete.php?id=<?php echo $product['id']?>"
               onclick="return confirm('Chắc chắn muốn xóa?')">
                Xóa
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
