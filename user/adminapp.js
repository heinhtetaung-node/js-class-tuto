const admin = document.getElementById('admin');
const detail = document.querySelector('.cat-detail');
const pro = document.getElementById('pro');
const thead = document.getElementById('head');


window.onload = function(){
	adminProduct();
}

function adminProduct(){
	axios.get('http://localhost/MyProject5/api/adminProducts').then(res => {
		console.log(res.data);
		let div = '';

		for (let i in res.data) {
			const obj  = res.data[i];

			div += `
				<tr class="table-light text-muted">
					<td><img src="http://localhost/MyProject5/public/asset/uploads/${obj.file}" style='max-width:150px; max-height: 200px;' alt=""></td>
					<td onclick='productDetail(${obj.id})'>${obj.title}</td>
					<td>$ ${obj.price}</td>
					<td>${obj.name}</td>			
					<td>
						<a href="#"><i class="fa fa-edit text-warning"></i></a>
						<a href="#"><i class="fa fa-trash text-danger"></i></a>
					</td>
				</tr>
			`;
		}

		admin.innerHTML = div;
	});
}

function productDetail(id){

	admin.style.display = 'none';
	detail.style.display = 'block';
	thead.style.display = 'none';

	axios.get('http://localhost/MyProject5/api/products/' + id).then(res => {
		console.log(res.data);

		let div = '';

		div += `
			<h1>${res.data.title}</h1><br>

			<img src="http://localhost/MyProject5/public/asset/uploads/${res.data.file}" style='max-width:250px; max-height: 300px;' alt=""><br>
			<i>$ ${res.data.price}</i><br>

			<p>${res.data.des}</p>
		`;

		pro.innerHTML = div;
	});

}