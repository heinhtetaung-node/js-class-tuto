const order = document.getElementById('order');

window.onload = function(){
	getOrder();
}

function getOrder(){
	axios.get('http://localhost/MyProject5/api/customers').then(res => {
		console.log(res.data);

		let div = '';

		for (let i in res.data) {
			const obj = res.data[i];

			div += `
				<tr>
					<td>${obj.name}</td>
					<td>${obj.email}</td>
					<td>${obj.phone}</td>
					<td>${obj.address}</td>
				</tr>
			`;
		}

		order.innerHTML = div;
	});
}