<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'helpers/Helper.php';

class PaymentController extends Controller
{
	public function online() {
		if (isset($_POST['submit'])) {
			require_once 'libraries/vnpay_php/vnpay_create_payment.php';
		}
		$view_vnpay = $this->render('libraries/vnpay_php/vnpay_pay.php');
		echo $view_vnpay;
	}
}
