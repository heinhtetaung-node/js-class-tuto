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
		console.log(res)
		let div = '';

		for (let i in res.data) {
			const obj = res.data[i];

			div += `
				<div class='card' style="width: 18rem;">
					<div class='card-body'>
						<img src="http://localhost/MyProject5/public/asset/uploads/${obj.file}" style='max-width:150px; max-height: 200px;' alt="">
						<p onclick='productDetail(${obj.id})'>${obj.title}</p>
						<i>$ ${obj.price}</i>
					</div>	
				</div>	
			`;
		}
		products.innerHTML = div;
	});
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
			<img src="http://localhost/MyProject5/public/asset/uploads/${res.data.file}" style='max-width:150px; max-height: 200px;' alt="">
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