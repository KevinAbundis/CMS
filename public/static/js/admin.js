var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function(){
	var btn_search = document.getElementById('btn_search');
	var form_search = document.getElementById('form_search');
	if(btn_search){
		btn_search.addEventListener('click', function(e){
			e.preventDefault();
			if(form_search.style.display === 'block'){
				form_search.style.display = 'none';
			}else{
				form_search.style.display = 'block';
			}
		});
	}
	if(route == "product_edit"){
		var btn_product_file_image = document.getElementById('btn_product_file_image');
		var product_file_image = document.getElementById('product_file_image');
		btn_product_file_image.addEventListener('click', function(){
			product_file_image.click();
		}, false);

		product_file_image.addEventListener('change', function(){
			document.getElementById('form_product_gallery').submit();
		});
	}

	document.getElementsByClassName('lk-'+route)[0].classList.add('active');

});

$(document).ready(function(){
	editor_init('editor');

});
function editor_init(field){
	CKEDITOR.replace(field,{
		toolbar: [
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo'] },
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Unlink', 'Blockquote'] },
		{ name: 'document', item: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source'] }
		]
	});
}