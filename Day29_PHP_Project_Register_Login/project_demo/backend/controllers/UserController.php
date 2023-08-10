<?php
//controllers/UserController.php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
	//index.php?controller=user&action=register
	public function register() {
		// - Controller xử lý form
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_confirm = $_POST['password_confirm'];
			// Validate:
			if (empty($username) || empty($password)) {
				$this->error = 'Phải nhập username và pass';
			} elseif ($password != $password_confirm) {
				$this->error = 'Mk nhập lại chưa đúng';
			}
			if (empty($this->error)) {
				// Mã hóa mật khẩu theo bcrypt
				$pass_hash = password_hash($password,
					PASSWORD_BCRYPT);
				var_dump($pass_hash);
				// - Controller gọi Model để insert
				$user_model = new User();
				$is_register = $user_model
					->registerUser($username, $pass_hash);
				var_dump($is_register);
				if ($is_register) {
					$_SESSION['success'] = 'Đky thành công';
					header('Location:index.php?controller=user&action=login');
					exit();
				}
				$this->error = 'Đky thất bại';
			}
		}

		// - Controller gọi View
		$this->page_title = 'Form đăng ký';
		$this->content =
			$this->render('views/users/register.php');
		// Sử dụng layout khác cho user mà chưa login
//		require_once 'views/layouts/main.php';
		require_once 'views/layouts/main_login.php';
	}

	//index.php?controller=user&action=login
	public function login() {
	// - Controller xử lý form login
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if (empty($this->error)) {
				// - Xử lý đăng nhập
				// + Controller gọi Model lấy ra user
				//tương ứng với username từ form
				$user_model = new User();
				$user = $user_model->getUser($username);
				echo '<pre>';
				print_r($user);
				echo '</pre>';
				if (empty($user)) {
					$this->error = 'Username ko tồn tại';
				} else {
					// + Lấy mk đã mã hóa của user đó, so sánh
					// với mk lấy từ form xem có khớp với thuật
					//toán đã cho hay ko
					$pass_hash = $user['password'];
					$is_login = password_verify($password,$pass_hash);
					var_dump($is_login);
					if ($is_login) {
						$_SESSION['user'] = $user;
						$_SESSION['success'] = 'Đăng nhập thành công';
						header('Location:index.php?controller=product&action=index');
						exit();
					}
					$this->error = 'Sai tk/mk';
				}

			}
		}
	// - Controller gọi View
		$this->page_title = 'Form đăng nhập';
		$this->content =
			$this->render('views/users/login.php');
		require_once 'views/layouts/main_login.php';
	}

	public function logout() {
		unset($_SESSION['user']);
		$_SESSION['success'] = 'Logout thành công';
		header('Location:index.php?controller=user&action=login');
		exit();
	}
}
