<?php

namespace Models;
use Sysgem\Session;
use Models\ProductModel;

class OrderModel extends BaseModel
{
	public function insert($name, $email, $phone, $address)
	{

		$sql = "INSERT INTO customers (name, email, phone, address, created_at) VALUES ('$name', '$email', '$phone', '$address', now())";

		if (!$this->mysqli->query($sql)) {
			return false;
		}

		$customer_id = $this->mysqli->insert_id;


		$cart = Session::get('cart');
		$qtys = Session::get('qtys');

		$finalArr = [];
		$product = new ProductModel();
		$total = 0;

		foreach ($cart as $key => $prdid) {

			$prd = $product->get($prdid);
			
			$prd[0]['qty'] = $qtys[$prdid];
			$total += $prd[0]['price'] * $prd[0]['qty'];
			array_push($finalArr, $prd[0]);
		}		


        $sql = "INSERT INTO orders (customer_id, order_date, total) VALUES ('$customer_id', now(), '{$total}')";

        if (!$this->mysqli->query($sql)) {
			return false;
		}

        $order_id = $this->mysqli->insert_id;

        $cart = Session::get('cart');
		$qtys = Session::get('qtys');

		foreach ($finalArr as $key => $value) {

			$sql = "INSERT INTO order_items (product_id, order_id, qty, price) VALUES ('{$value["id"]}', '$order_id', '{$value["qty"]}', '{$value["price"]}')";

			$result = $this->mysqli->query($sql);
		}

		unset($_SESSION['cart']);

		if ($result) {
			return true;
		}
	}

	public function getTable(){
		$sql = "SELECT * FROM customers";
		$result = $this->mysqli->query($sql);
		$products = $result->fetch_all(MYSQLI_ASSOC);
		return $products;
	}

	public function detail($id){
		$sql = "SELECT orders.*, customers.name FROM orders LEFT JOIN customers ON orders.customer_id = customers.id WHERE customer_id = $id";
		$result = $this->mysqli->query($sql);
		$product = $result->fetch_assoc();
		return $product;
	}

	public function product($id){
		$sql = "SELECT order_items.*, products.title FROM order_items LEFT JOIN products ON order_items.product_id = products.id WHERE order_items.order_id = $id";
		$result = $this->mysqli->query($sql);
		$product = $result->fetch_all(MYSQLI_ASSOC);
		return $product;
	}
}