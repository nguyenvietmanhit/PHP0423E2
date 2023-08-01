<?php
//controllers/Controller.php
// Controller chứa TT và PT dùng chung cho controller
//con kế thừa từ nó
class Controller {
	public $page_title; //tiêu đề trang
	public $error; //lỗi validate
	public $content; //nội dung file view tương ứng,
	//để xử lý cho layout động

	// Lấy/đọc nội dung 1 file, có kèm theo cơ chế
	// truyền biến vào file 1 cách tường minh
	public function render($file_path, $variables = []) {
		extract($variables);
		ob_start();
		require_once $file_path;
		$content = ob_get_clean();
		return $content;
	}
}
?>
