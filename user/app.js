const products = document.getElementById('products');
const categories = document.getElementById('categories');
const del = document.getElementById('detail');
const appearDetail = document.getElementById('appearDetail');

const categoryDetails = document.getElementById('categoryDetails');
const categoryDetail = document.getElementById('categoryDetail');


window.onload = function(){
	getCategories();
	getProducts();
}

function getProducts(){
	axios.get('http://localhost/MyProject5/api/products').then(res => {
		// console.log(res.data);
		let div = '';

		for (let i in res.data) {
			const obj = res.data[i];

			div += `
				<div class='card' style="width: 18rem;">
					<div class='card-body'>
						<img style='width:100px; height: 150px' src='http://localhost/MyProject5/public/asset/uploads/${obj.file}'
						<p onclick='productDetail(${obj.id})'>${obj.title}</p>
						<i>$ ${obj.price}</i>
						<button onclick='addCart(${obj.id})'>Add Cart</button>
					</div>	
				</div>	
			`;
		}
		products.innerHTML = div;
	});
}

function addCart(id) {
	const existingCart = localStorage.getItem('cart')
	if (existingCart == null) {
		localStorage.setItem('cart', JSON.stringify([id]));
	} else {
		const existingCartArr = JSON.parse(existingCart);
		existingCartArr.push(id);
		localStorage.setItem('cart', JSON.stringify(existingCartArr));
	}
	console.log(localStorage.getItem('cart'));
}

function getCategories(){
	axios.get('http://localhost/MyProject5/api/categories').then(res => {
		let div = '';

		for (let i in res.data) {
			const obj = res.data[i];

			div += `
				<ul>
					<li onclick="category(${obj.id})">${obj.name}</li>
				</ul>
			`;
		}

		categories.innerHTML = div;
	});
}


function category(cat){
	axios.get('http://localhost/MyProject5/api/products?cat=' + cat).then(res => {
		console.log(res.data);

		let div = '';

		for (let i in res.data) {
			const obj = res.data[i];

			div += `
				<div class='card' style="width: 18rem;">
					<div class='card-body'>
						<p onclick='productDetail(${obj.id})'>${obj.title}</p>
						<i>$ ${obj.price}</i>
					</div>	
				</div>	
			`;
		}

		categoryDetail.innerHTML = div;

		products.style.display = 'none';
		categoryDetails.style.display = 'block';
	});
}


function productDetail(detail){
	axios.get('http://localhost/MyProject5/api/products/' + detail).then(res => {
		console.log(res.data);

		let div = '';

		div += `
			<h3>${res.data.title}</h3>
			<p>${res.data.des}</p>

			<i>$ ${res.data.price}</i><br>
			<b>${res.data.updated_at}</b>

			<p onclick='backProduct()'>Back</p>
		`;

		del.innerHTML = div;

		products.style.display = 'none';
		categoryDetails.style.display = 'none';
		appearDetail.style.display = 'block';

	});
}

function backProduct(){

	products.style.display = 'block';
	appearDetail.style.display = 'none';

}