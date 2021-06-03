const cat = document.getElementById('cat');
const inner = document.querySelector('.inner-new');
const list = document.querySelector('.inner-list');
const edit = document.getElementById('edit');


window.onload = function(){
	getCategory();
}


function getCategory(){
	axios.get('http://localhost/MyProject5/api/categories').then(res => {
		let div = '';

		for (let i in res.data) {
			const obj = res.data[i];

			div += `
				<li>
					[ <a onclick="deleteCate(${obj.id})">del</a> ] [ <a onclick="editInfo(${obj.id})">edit</a> ] ${obj.name}
				</li>
			`;
		}

		cat.innerHTML = div;
	});
}

// ============================================ edit category list ===============================================

edit.addEventListener('click', editAjax);

const name = document.getElementById('name');
var editId;

function editInfo(id){
	editId = id;

	axios.get('http://localhost/MyProject5/api/categories/' + id).then(res => {
		console.log(res);
		name.value = res.data.name;	
	});

	inner.style.display = 'block';
	list.style.display = 'none';
}

function deleteCate(id){
	axios.get('http://localhost/MyProject5/api/catDelete/'+ id).then(res =>{
		getCategory();
	});
}

function editAjax(){
	const name  = document.getElementById('name').value;

	const arr = {
		name :  name,
		id : editId
	}

	debugger;

	upAjax(arr);
}

function upAjax(arr){
	axios.post('http://localhost/MyProject5/api/categories/', JSON.stringify(arr)).then(res => {
		
		console.log(res.data);
		getCategory();
	}).catch(err => {
		console.log(err);
	});

	// inner.style.display = 'none';
	// list.style.display = 'block';
}