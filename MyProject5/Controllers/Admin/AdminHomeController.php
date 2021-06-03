<?php
namespace Controllers\Admin;

use Controllers\BaseController;
use Models\CategoryModel;
use Models\ProductModel;
use Models\OrderModel;
use Sysgem\Session;


class AdminHomeController extends BaseController
{
	private $category;
	private $product;
	private $order;

	public function __construct()
	{
		$this->category = new CategoryModel();
		$this->product = new ProductModel();
		$this->order = new OrderModel();
	}

	public function index()
	{
		$login_user = Session::get('user_id');
		$obj = $this->product->getTables();
		$products = json_decode(json_encode($obj));
		$this->renderBlade('admin.index', ['product' => $products]);
	}

	public function catList()
	{
		$category = $this->category->getTable();
		$this->renderBlade('admin.cat-list',  ['categories' => $category]);
	}

	public function catNew()
	{
		$this->renderBlade('admin.cat-new');
	}

	public function catEdit($id)
	{
		$obj = $this->category->edit($id);
		$rows = json_decode(json_encode($obj));
		$this->renderBlade('admin.cat-edit', ['row' => $rows]);
	}

	public function pro_edit($id)
	{
		$obj = $this->product->edit($id);
		$category = $this->category->getTable();
		$rows = json_decode(json_encode($obj));
		$categories = json_decode(json_encode($category));
		$this->renderBlade('admin.pro-edit', [
			'row' => $rows,
			'category' => $categories
		]);
	}

	public function catDetail($id)
	{
		$obj = $this->product->edit($id);
		$rows = json_decode(json_encode($obj));
		$this->renderBlade('admin.detail', ['row' => $rows]);
	}

	public function orderTable(){
		$obj = $this->order->getTable();
		$rows = json_decode(json_encode($obj));
		$this->renderBlade('admin.order', ['rows' => $rows]);
	}

	public function detail($id){
		$obj = $this->order->detail($id);
		$rows = json_decode(json_encode($obj));
		$product = $this->order->product($id);
		$products = json_decode(json_encode($product));
		$this->renderBlade('admin.orderDetail', [
			'row' => $rows,
			'product' => $products
		]);
	}
}