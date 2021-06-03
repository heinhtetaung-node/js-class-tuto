<?php

namespace Controllers\API;

use Controllers\BaseController;
use Models\CategoryModel;
use Models\ProductModel;
use Sysgem\Session;
use Models\OrderModel;


class ProductController extends BaseController
{

	private $category;
	private $product;
	private $order;

	public function __construct()
	{
		$this->category = new CategoryModel();
		$this->product = new ProductModel();
		$this->order = new OrderModel;
	}

	public function index()
	{
		if (empty($_GET['cat'])) {
			$objs = $this->product->getTable();
			echo json_encode($objs);
		}else {
			$objs = $this->product->cat_id($_GET['cat']);
			echo json_encode($objs);
		}		
		exit;
	}

	public function detail($id)
	{
		$obj = $this->product->detail($id);
		echo json_encode($obj);
		exit();
	}

	public function customers()
	{
		$obj = $this->order->getTable();
		echo json_encode($obj);
		exit();
	}

	public function adminProducts()
	{
		$obj = $this->product->getTables();
		echo json_encode($obj);
		exit();
	}

	public function categories()
	{
		$obj = $this->category->getTable();
		echo json_encode($obj);
		exit();
	}

	public function categoriesUpdate($id)
	{
		$obj = $this->category->edit($id);
		echo json_encode($obj);
		exit();
	}

	public function catDel($id)
	{
		$obj = $this->category->delete($id);
		echo json_encode($obj);
		exit();
	}

	public function categoriesPost($id, $name)
	{
		$obj = $this->category->update($id, $name);
		echo json_encode($obj);
		exit();
	}

	public function insert($data)
	{
		$res = $this->product->productPost($data->title, $data->price, $data->category_id, $data->des, '');
		echo json_encode(['success' => $res]);
	}

	public function insertWithPhto($file, $data) {
		$root = dirname(dirname(dirname(__FILE__)));

		$files = $file['file'];
		if (!empty($files['name'])) {
			move_uploaded_file($files['tmp_name'], $root . '/public/asset/uploads/' . $files['name']);
		}

		$result = $this->product->productPost($data['title'], $data['price'], $data['category_id'], $data['des'], $files['name']);

		echo json_encode(['success' => $result]);
	}
}