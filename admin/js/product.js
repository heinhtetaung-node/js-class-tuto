window.onload = function(){
	getCategories();	
}

let fileDataURL = null;
function getCategories(){
	axios.get('http://localhost/MyProject5/api/categories').then(res => {
		let div = '';

		for (let i in res.data) {
			const obj = res.data[i];

			div += `
				<option value="${obj.id}">${obj.name}</option>				
			`;
		}
		console.log(document.getElementById('categories'));
		document.getElementById('categories').innerHTML = div;
	});
}


function insertProdct(){
	const form = document.forms['product-form'];
	// post without file
	// const postArr = {
	// 	title : form.title.value,
	// 	price : form.price.value,
	// 	category_id : form.category_id.value,
	// 	des : form.des.value
	// }
	// console.log(postArr);

	// axios.post('http://localhost/MyProject5/api/products', postArr).then(res => {

	// });




	console.log(form.file);
	const arr = new FormData();
	arr.append('title', form.title.value);
	arr.append('price', form.price.value);
	arr.append('category_id', form.category_id.value);
	arr.append('des', form.des.value);	
	arr.append('file', dataURItoBlob(fileDataURL));	
	axios.post('http://localhost/MyProject5/api/products', arr, {
        headers: {
          'Content-type': 'multipart/form-data'
        },
      }).then(res => {

	});

	return false;
}


// function onSelectFile() {

// }

// document.getElementById('abc').onClick(() => {

// })
const onSelectFile = (e) => {
    if (e.target.files && e.target.files.length > 0) {
      const reader = new FileReader();
      reader.addEventListener('load', () => { 
      	fileDataURL=reader.result
      	document.getElementById('image-preview').innerHTML = `<img src="${fileDataURL}" style="max-width:200px" />`
      	console.log(fileDataURL);
      });
      reader.readAsDataURL(e.target.files[0]);
    }
};


const dataURItoBlob = function(dataURI) {
    // convert base64 to raw binary data held in a string
    // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
    var byteString = atob(dataURI.split(',')[1]);

    // separate out the mime component
    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to an ArrayBuffer
    var ab = new ArrayBuffer(byteString.length);
    var ia = new Uint8Array(ab);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    //Old Code
    //write the ArrayBuffer to a blob, and you're done
    //var bb = new BlobBuilder();
    //bb.append(ab);
    //return bb.getBlob(mimeString);

    //New Code
    return new Blob([ab], {type: mimeString});


}