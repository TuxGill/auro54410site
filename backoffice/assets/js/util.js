/* PRODUTOS */
function deleteProduct(id){

	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="../../components/products/views/admin/del.product.php?id="+id;
	}
}

function pubProduct(id){
	
	if (confirm('Tem a certeza que deseja publicar?')) {
    	window.location="../../components/products/views/admin/managepub.product.php?id="+id+"&pub=1";
	}
}

function unpubProduct(id){
	
	if (confirm('Tem a certeza que deseja despublicar?')) {
    	window.location="../../components/products/views/admin/managepub.product.php?id="+id+"&pub=0";
	}
}

/* ARTIGOS */
function deleteContent(id){

	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="../../components/content/views/admin/del.content.php?id="+id;
	}
}

function pubContent(id){
	
	if (confirm('Tem a certeza que deseja publicar?')) {
    	window.location="../../components/content/views/admin/managepub.content.php?id="+id+"&pub=1";
	}
}

function unpubContent(id){
	
	if (confirm('Tem a certeza que deseja despublicar?')) {
    	window.location="../../components/content/views/admin/managepub.content.php?id="+id+"&pub=0";
	}
}





