<?php
//backend/controllers/CategoryController.php
require_once 'controllers/Controller.php';
class CategoryController extends Controller {
	public function create() {
		// Controller gọi View
		$this->page_title = 'Form thêm mới';
		$this->content =
		$this->render('views/categories/create.php');
		require_once 'views/layouts/main.php';
	}
}
