<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
//controllers/ProductController.php
// Controller xử lý sp
class ProductController extends Controller {
	//index.php?controller=product&action=create
	public function create() {
		// - Xử lý form:
		// Debug:
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$price = $_POST['price'];
			//Validate:
			// - Phải nhập tên và giá
			// - Giá phải là số
			if (empty($name) || empty($price)) {
				$this->error = 'Phải nhập tên và giá';
			} elseif (!is_numeric($price)) {
				$this->error = 'Giá phải là số';
			}
			// Nếu ko có lỗi thì xử lý logic chính
			if (empty($this->error)) {
				// - Controller gọi Model để insert vào
				//CDSL = khởi tạo đối tượng từ model
				$product_model = new Product();
				$is_insert =
					$product_model->insertData($name, $price);
				var_dump($is_insert);
				if ($is_insert) {
					$_SESSION['success'] = 'Thêm mới thành công';
					header('Location:index.php?controller=product&action=index');
					exit();
				}
			}
		}

//		echo 'Tạo mới sp';
		// - Gọi view để hiển thị
		// + Gán giá trị tương ứng cho thuộc tính cần
		//thiết trong controller cha
		$this->page_title = 'Trang thêm mới sp';
		$this->content =
	$this->render('views/products/create.php');
		// + Gọi layout để hiển thị các giá trị trên
		require_once 'views/layouts/main.php';
	}
}
