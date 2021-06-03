<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

require 'vendor/autoload.php';
require 'init.php';


use Controllers\Admin\AdminHomeController;
use Controllers\Admin\AdminRegisterController;
use Controllers\Admin\AdminPostController;
use Controllers\Admin\AdminProductController;
use Controllers\Customer\CustomerController;
use Controllers\HomeController;
use Controllers\Customer\OrderController;
use Controllers\API\ProductController;


$adminHomeController = new AdminHomeController();
$adminRegisterController = new AdminRegisterController();
$homeController = new HomeController();
$adminPostController = new AdminPostController();
$adminProductController = new AdminProductController();
$customerController = new CustomerController();
$orderController = new OrderController();
$productController = new ProductController();


$action = isset($_GET['action'])? $_GET['action'] : '';
$method = isset($_GET['method'])? $_GET['method'] : '';
$method1 = isset($_GET['method1'])? $_GET['method1'] : '';

$id = '';

switch ($action) {
	case '':
		if ($method == '') {
			$customerController->index();
		}
		break;


	case 'products':
		if ($method == 'cat') {
			$id = $_GET['id'];
			$customerController->cat_id($id);
		}else if ($method == 'detail') {
			$id = $_GET['id'];
			$customerController->detail($id);
		}else if ($method == 'finish') {
			$orderController->finish();
		}else {
			echo '404';
		}
		break;

	case 'addcart':
		$id = $_GET['id'];
		$customerController->addcart($id);	
		break;

	case 'clear':
		$id = $_GET['id']; 
		if (count($_SESSION['cart']) == 1) {
			unset($_SESSION['cart']);
			unset($_SESSION['qtys']);
		}else {
			unset($_SESSION['cart'][$id]);
		}
		header('location: checkout');
		break;

	case 'checkout':
		$customerController->out()->checkout();
		break;

	case 'order':
		$orderController->order();
		break;


	case 'admin':
		if ($method == 'index') {
			$adminHomeController->checklogin()->index();
		}else if ($method == 'cat-list') {
			$adminHomeController->checklogin()->catList();
		}else if ($method == 'cat-new'){
			$adminHomeController->checklogin()->catNew();
		}else if ($method == 'cat-edit') {
			$id = $_GET['id'];
			$adminHomeController->checklogin()->catEdit($id);
		}else if ($method == 'cat-detail') {
			$id = $_GET['id'];
			$adminHomeController->checklogin()->catDetail($id);
		}else if ($method == 'cat-new') {
			$adminPostController->checklogin()->cat_new();
		}else if ($method == 'login') {
			$adminRegisterController->login();
		}else if ($method == 'register') {
			$adminRegisterController->register();
		}else if ($method == 'registerInsert') {
			$adminRegisterController->regInsert();
		}else if ($method == 'loginMember') {
			$adminRegisterController->loginMember();
		}else if ($method == 'logout') {
			$adminRegisterController->checklogin()->logout();
		}else if ($method == 'product-update') {
			$adminProductController->checklogin()->update();
		}else if ($method == 'cat-update') {
			$adminPostController->checklogin()->cat_update();
		}else if ($method == 'cat-add') {
			$adminPostController->checklogin()->cat_add();
		}else if ($method == 'cat-del') {
			$id = $_GET['id'];
			$adminPostController->checklogin()->cat_del($id);
		}else if ($method == 'pro-del') {
			$id = $_GET['id'];
			$adminProductController->checklogin()->pro_delete($id);
		}else if($method == 'products-new') {
			$adminProductController->checklogin()->index();
		}else if ($method == 'product-add') {
			$adminProductController->checklogin()->product_add();
		}else if ($method == 'nav-form') {
			$adminProductController->checklogin()->nav_form();
		}else if ($method == 'pro-edit') {
			$id = $_GET['id'];
			$adminHomeController->checklogin()->pro_edit($id);
		}else if ($method == 'orderTable') {
			$adminHomeController->checklogin()->orderTable();
		}else if ($method == 'orderDetail') {
			$id = $_GET['id'];
			$adminHomeController->checklogin()->detail($id);
		}
		else{
			echo '404 not found';
		}
		break;


	case 'api':

	if ($method == 'products') {
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			if ($method1 == '') {
				$productController->index();
			}else {
				$productController->detail($method1);
			}
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// If not include photo
			// $data = json_decode(file_get_contents("php://input"));  // getting post data 	from api json
			// $productController->insert($data);

			// if include photo
			$productController->insertWithPhto($_FILES, $_POST);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
     		echo 'updated';
		}

		if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
     		echo 'deleted';
		}
	}

	if ($method == 'categories') {
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			if ($method1 == '') {
				$productController->categories();
			}else {
				$productController->categoriesUpdate($method1);
			}
			
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($method1) {
				$productController->categoriesPost($method1);
			}
     		
		}

		if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
     		echo 'updated';
		}

		if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
     		echo 'deleted';
		}
	}

	if ($method == 'catDelete') {
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			if ($method1) {
				$productController->catDel($method1);
			}		
		}
	}

	if ($method == 'customers') {
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$productController->customers();
		}
	}

	if ($method == 'adminProducts') {
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$productController->adminProducts();
		}
	}

	break;
		
				
	default:
		echo '404 not found';
		break;
}
