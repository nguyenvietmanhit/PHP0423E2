<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'helpers/Helper.php';

class PaymentController extends Controller
{
	public function index() {

		if (isset($_POST['submit'])) {
			$method = $_POST['method'];
			if ($method == 0) {
				header('Location: index.php?controller=payment&action=online');
				exit();
			}
		}
		
		$this->content = $this->render('views/payments/index.php');
		require_once 'views/layouts/main.php';
	}
	
	public function online() {
		if (isset($_POST['submit'])) {
			require_once 'libraries/vnpay_php/vnpay_create_payment.php';
		}
		$view_vnpay = $this->render('libraries/vnpay_php/vnpay_pay.php');
		echo $view_vnpay;
	}
}
